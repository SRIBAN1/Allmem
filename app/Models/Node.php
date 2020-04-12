<?php

namespace Pterodactyl\Models;

use Symfony\Component\Yaml\Yaml;
use Illuminate\Container\Container;
use Illuminate\Notifications\Notifiable;
use Pterodactyl\Models\Traits\Searchable;
use Illuminate\Contracts\Encryption\Encrypter;

/**
 * @property int $id
 * @property string $uuid
 * @property bool $public
 * @property string $name
 * @property string $description
 * @property int $location_id
 * @property string $fqdn
 * @property string $scheme
 * @property bool $behind_proxy
 * @property bool $maintenance_mode
 * @property int $memory
 * @property int $memory_overallocate
 * @property int $disk
 * @property int $disk_overallocate
 * @property int $upload_size
 * @property string $daemon_token_id
 * @property string $daemon_token
 * @property int $daemonListen
 * @property int $daemonSFTP
 * @property string $daemonBase
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Pterodactyl\Models\Location $location
 * @property \Pterodactyl\Models\Server[]|\Illuminate\Database\Eloquent\Collection $servers
 * @property \Pterodactyl\Models\Allocation[]|\Illuminate\Database\Eloquent\Collection $allocations
 */
class Node extends Model
{
    use Notifiable;
    use Searchable;

    /**
     * The resource name for this model when it is transformed into an
     * API representation using fractal.
     */
    const RESOURCE_NAME = 'node';

    const DAEMON_TOKEN_ID_LENGTH = 16;
    const DAEMON_TOKEN_LENGTH = 64;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nodes';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['daemon_token_id', 'daemon_token'];

    /**
     * Cast values to correct type.
     *
     * @var array
     */
    protected $casts = [
        'location_id' => 'integer',
        'memory' => 'integer',
        'disk' => 'integer',
        'daemonListen' => 'integer',
        'daemonSFTP' => 'integer',
        'behind_proxy' => 'boolean',
        'public' => 'boolean',
        'maintenance_mode' => 'boolean',
    ];

    /**
     * Fields that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'public', 'name', 'location_id',
        'fqdn', 'scheme', 'behind_proxy',
        'memory', 'memory_overallocate', 'disk',
        'disk_overallocate', 'upload_size', 'daemonBase',
        'daemonSFTP', 'daemonListen',
        'description', 'maintenance_mode',
    ];

    /**
     * Fields that are searchable.
     *
     * @var array
     */
    protected $searchableColumns = [
        'name' => 10,
        'fqdn' => 8,
        'location.short' => 4,
        'location.long' => 4,
    ];

    /**
     * @var array
     */
    public static $validationRules = [
        'name' => 'required|regex:/^([\w .-]{1,100})$/',
        'description' => 'string',
        'location_id' => 'required|exists:locations,id',
        'public' => 'boolean',
        'fqdn' => 'required|string',
        'scheme' => 'required',
        'behind_proxy' => 'boolean',
        'memory' => 'required|numeric|min:1',
        'memory_overallocate' => 'required|numeric|min:-1',
        'disk' => 'required|numeric|min:1',
        'disk_overallocate' => 'required|numeric|min:-1',
        'daemonBase' => 'sometimes|required|regex:/^([\/][\d\w.\-\/]+)$/',
        'daemonSFTP' => 'required|numeric|between:1,65535',
        'daemonListen' => 'required|numeric|between:1,65535',
        'maintenance_mode' => 'boolean',
        'upload_size' => 'int|between:1,1024',
    ];

    /**
     * Default values for specific columns that are generally not changed on base installs.
     *
     * @var array
     */
    protected $attributes = [
        'public' => true,
        'behind_proxy' => false,
        'memory_overallocate' => 0,
        'disk_overallocate' => 0,
        'daemonBase' => '/srv/daemon-data/',
        'daemonSFTP' => 2022,
        'daemonListen' => 8080,
        'maintenance_mode' => false,
    ];

    /**
     * Get the connection address to use when making calls to this node.
     *
     * @return string
     */
    public function getConnectionAddress(): string
    {
        return sprintf('%s://%s:%s', $this->scheme, $this->fqdn, $this->daemonListen);
    }

    /**
     * Returns the configuration as an array.
     *
     * @return array
     */
    public function getConfiguration()
    {
        return [
            'debug' => false,
            'uuid' => $this->uuid,
            'token_id' => $this->daemon_token_id,
            'token' => Container::getInstance()->make(Encrypter::class)->decrypt($this->daemon_token),
            'api' => [
                'host' => '0.0.0.0',
                'port' => $this->daemonListen,
                'ssl' => [
                    'enabled' => (! $this->behind_proxy && $this->scheme === 'https'),
                    'cert' => '/etc/letsencrypt/live/' . $this->fqdn . '/fullchain.pem',
                    'key' => '/etc/letsencrypt/live/' . $this->fqdn . '/privkey.pem',
                ],
                'upload_limit' => $this->upload_size,
            ],
            'system' => [
                'data' => $this->daemonBase,
                'archive_directory' => $this->daemonBase . '/.archives',
                'username' => 'pterodactyl',
                'timezone_path' => '/etc/timezone',
                'set_permissions_on_boot' => true,
                'detect_clean_exit_as_crash' => false,
                'sftp' => [
                    'use_internal' => true,
                    'disable_disk_checking' => false,
                    'bind_address' => '0.0.0.0',
                    'bind_port' => $this->daemonSFTP,
                    'read_only' => false,
                ],
            ],
            'docker' => [
                'network' => [
                    'interface' => '172.18.0.1',
                    'name' => 'pterodactyl_nw',
                    'driver' => 'bridge',
                ],
                'update_images' => true,
                'socket' => '/var/run/docker.sock',
                'timezone_path' => '/etc/timezone',
            ],
            'disk_check_timeout' => 30,
            'throttles' => [
                'kill_at_count' => 5,
                'decay' => 10,
                'bytes' => 4096,
                'check_interval' => 100,
            ],
            'remote' => route('index'),
        ];
    }

    /**
     * Returns the configuration in Yaml format.
     *
     * @return string
     */
    public function getYamlConfiguration()
    {
        return Yaml::dump($this->getConfiguration(), 4, 2);
    }

    /**
     * Returns the configuration in JSON format.
     *
     * @param bool $pretty
     * @return string
     */
    public function getJsonConfiguration(bool $pretty = false)
    {
        return json_encode($this->getConfiguration(), $pretty ? JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT : JSON_UNESCAPED_SLASHES);
    }

    /**
     * Helper function to return the decrypted key for a node.
     *
     * @return string
     */
    public function getDecryptedKey(): string
    {
        return (string) Container::getInstance()->make(Encrypter::class)->decrypt(
            $this->daemon_token
        );
    }

    /**
     * Gets the location associated with a node.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Gets the servers associated with a node.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    /**
     * Gets the allocations associated with a node.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    /**
     * Returns a boolean if the node is viable for an additional server to be placed on it.
     *
     * @param int $memory
     * @param int $disk
     * @return bool
     */
    public function isViable(int $memory, int $disk): bool
    {
        $memoryLimit = $this->memory * (1 + ($this->memory_overallocate / 100));
        $diskLimit = $this->disk * (1 + ($this->disk_overallocate / 100));

        return ($this->sum_memory + $memory) <= $memoryLimit && ($this->sum_disk + $disk) <= $diskLimit;
    }
}
