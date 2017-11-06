<?php

return [
    'index' => [
        'title' => 'Visualización del Servidor :name',
        'header' => 'La Consola Del Servidor',
        'header_sub' => 'Control de su servidor en tiempo real.',
    ],
    'schedule' => [
        'header' => 'Schedule Manager',
        'header_sub' => 'Administre todos los horarios de este servidor en un solo lugar.',
        'current' => 'Horarios Actualizados',
        'new' => [
            'header' => 'Crear Nuevo Horario',
            'header_sub' => 'Crear un nuevo conjunto de tareas programadas para este servidor.',
            'submit' => 'Crear Calendario',
        ],
        'manage' => [
            'header' => 'Administrar Horario',
            'submit' => 'La Programación De Actualización',
            'delete' => 'Eliminar Horario',
        ],
        'task' => [
            'time' => 'Tras',
            'action' => 'Realizar La Acción',
            'payload' => 'Con Una Carga Útil',
            'add_more' => 'Añadir Otra Tarea',
        ],
        'actions' => [
            'command' => 'Enviar Comando',
            'power' => 'El Poder De Acción',
        ],
        'unnamed' => 'Sin Nombre Horario',
        'setup' => 'Configuración De La Programación',
        'day_of_week' => 'El día de la Semana',
        'day_of_month' => 'Día de Mes',
        'hour' => 'La hora del Día',
        'minute' => 'Hora de la Hora',
        'time_help' => 'La programación del sistema es compatible con el uso de Cronjob la sintaxis de la hora de definir cuando las tareas deben comenzar a correr. Utilice los campos de arriba para especificar cuando estas tareas deben empezar a ejecutar o seleccionar opciones de la selección múltiple de los menús.',
        'task_help' => 'Los tiempos para las tareas relativas a la definida anteriormente tarea. Cada programa puede tener más de 5 tareas que se le asignen tareas y no puede ser programado más de 15 minutos de distancia.',
    ],
    'tasks' => [
        'task_created' => 'Creado con éxito una nueva tarea en el Panel de.',
        'task_updated' => 'La tarea ha sido actualizado. Cualquier se encuentra en la cola de tareas acciones serán cancelados y ejecutar de nuevo en el próximo tiempo definido.',
        'header' => 'Tareas Programadas',
        'header_sub' => 'Automatizar el servidor.',
        'current' => 'Actual De Las Tareas Programadas',
        'actions' => [
            'command' => 'Enviar Comando',
            'power' => 'Enviar La Opción De La Energía',
        ],
        'new_task' => 'Agregar Nueva Tarea',
        'toggle' => 'Cambiar Estado',
        'new' => [
            'header' => 'Nueva Tarea',
            'header_sub' => 'Crear una nueva tarea programada para este servidor.',
            'task_name' => 'Nombre De La Tarea',
            'day_of_week' => 'El día de la Semana',
            'custom' => 'Valor Personalizado',
            'day_of_month' => 'Día de Mes',
            'hour' => 'Hora',
            'minute' => 'Minutos',
            'sun' => 'Domingo',
            'mon' => 'Lunes',
            'tues' => 'Martes',
            'wed' => 'Miércoles',
            'thurs' => 'Jueves',
            'fri' => 'Viernes',
            'sat' => 'Sábado',
            'submit' => 'Crear Tarea',
            'type' => 'Tipo De Tarea',
            'chain_then' => 'Luego, Después De',
            'chain_do' => '¿',
            'chain_arguments' => 'Con Argumentos',
            'payload' => 'La Tarea De Carga',
            'payload_help' => 'Por ejemplo, si selecciona <code>Enviar Comando</code> introduzca el comando. Si selecciona <code>Enviar la Opción de la Energía</code> poner el poder de la acción aquí (e.g. <code>restart</code>).',
        ],
        'edit' => [
            'header' => 'Gestionar Tareas',
            'submit' => 'La Tarea De Actualización',
        ],
    ],
    'users' => [
        'header' => 'Administrar Usuarios',
        'header_sub' => 'Controlar quién puede acceder a su servidor de.',
        'configure' => 'Configurar Los Permisos De',
        'list' => 'Cuentas con Acceso',
        'add' => 'Agregar Nuevo Subuser',
        'update' => 'Actualización Subuser',
        'user_assigned' => 'Correctamente asignado un nuevo subuser a este servidor.',
        'user_updated' => 'Actualizado correctamente los permisos de.',
        'edit' => [
            'header' => 'Editar Subuser',
            'header_sub' => 'Modificar el acceso del usuario al servidor.',
        ],
        'new' => [
            'header' => 'Añadir Nuevo Usuario',
            'header_sub' => 'Agregar un nuevo usuario con permisos para este servidor.',
            'email' => 'Dirección De Correo Electrónico',
            'email_help' => 'Introduzca la dirección de correo electrónico para el usuario que quiere invitar a administrar este servidor.',
            'power_header' => 'Administración De Energía',
            'file_header' => 'La Gestión De Archivos',
            'subuser_header' => 'Subuser De Gestión',
            'server_header' => 'Administración Del Servidor',
            'task_header' => 'La Programación De La Administración',
            'sftp_header' => 'SFTP Gestión',
            'database_header' => 'Administración De Base De Datos',
            'power_start' => [
                'title' => 'Inicio Del Servidor',
                'description' => 'Permite al usuario iniciar el servidor.',
            ],
            'power_stop' => [
                'title' => 'Detener El Servidor',
                'description' => 'Permite al usuario detener el servidor.',
            ],
            'power_restart' => [
                'title' => 'Reinicie El Servidor',
                'description' => 'Permite al usuario reiniciar el servidor.',
            ],
            'power_kill' => [
                'title' => 'Matar Servidor',
                'description' => 'Permite que el usuario pueda matar el proceso del servidor.',
            ],
            'send_command' => [
                'title' => 'Enviar Comandos De La Consola',
                'description' => 'Permite el envío de un comando desde la consola. Si el usuario no tiene permiso para detener o reiniciar, no puede enviar el comando de detención de la aplicación.',
            ],
            'list_files' => [
                'title' => 'Lista De Archivos',
                'description' => 'Permite al usuario a la lista de todos los archivos y carpetas en el servidor, pero no ver el contenido del archivo.',
            ],
            'edit_files' => [
                'title' => 'Editar Archivos',
                'description' => 'Permite al usuario abrir un archivo solo para visualización.',
            ],
            'save_files' => [
                'title' => 'Guardar Archivos',
                'description' => 'Permite que el usuario guarde el archivo modificado contenido.',
            ],
            'move_files' => [
                'title' => 'Renombrar Y Mover Archivos',
                'description' => 'Permite al usuario mover y renombrar archivos y carpetas en el sistema de ficheros.',
            ],
            'copy_files' => [
                'title' => 'Copiar Archivos',
                'description' => 'Permite a los usuarios copiar archivos y carpetas en el sistema de ficheros.',
            ],
            'compress_files' => [
                'title' => 'Comprimir Los Archivos',
                'description' => 'Permite que el usuario pueda hacer de los archivos de los archivos y carpetas en el sistema.',
            ],
            'decompress_files' => [
                'title' => 'Descomprimir Los Archivos',
                'description' => 'Permite que el usuario para descomprimir .zip y .alquitrán(.gz) archivos.',
            ],
            'create_files' => [
                'title' => 'Crear Archivos',
                'description' => 'Permite al usuario crear un nuevo archivo en el panel de.',
            ],
            'upload_files' => [
                'title' => 'Subir Archivos',
                'description' => 'Permite a los usuarios cargar archivos a través del administrador de archivos.',
            ],
            'delete_files' => [
                'title' => 'Eliminar Archivos',
                'description' => 'Permite al usuario eliminar archivos del sistema.',
            ],
            'download_files' => [
                'title' => 'Descargar Archivos',
                'description' => 'Permite al usuario descargar archivos. Si un usuario se da este permiso se puede descargar y ver el contenido del archivo, incluso si ese permiso no está asignado en el panel.',
            ],
            'list_subusers' => [
                'title' => 'Lista De Subusers',
                'description' => 'Permite al usuario ver una lista de todos los subusers asignadas al servidor.',
            ],
            'view_subuser' => [
                'title' => 'Ver Subuser',
                'description' => 'Permite al usuario ver los permisos asignados a subusers.',
            ],
            'edit_subuser' => [
                'title' => 'Editar Subuser',
                'description' => 'Permite a un usuario para editar los permisos asignados a otras subusers.',
            ],
            'create_subuser' => [
                'title' => 'Crear Subuser',
                'description' => 'Permite al usuario crear más subusers en el servidor.',
            ],
            'delete_subuser' => [
                'title' => 'Eliminar Subuser',
                'description' => 'Permite a un usuario para eliminar otros subusers en el servidor.',
            ],
            'set_connection' => [
                'title' => 'Conjunto De Conexión Predeterminado',
                'description' => 'Permite al usuario establecer la conexión por defecto que se utiliza para un servidor, así como ver los puertos disponibles.',
            ],
            'view_startup' => [
                'title' => 'Vista De Comandos De Inicio',
                'description' => 'Permite al usuario ver los comandos de inicio y las variables asociadas a un servidor.',
            ],
            'edit_startup' => [
                'title' => 'Edición De Comandos De Inicio',
                'description' => 'Permite que un usuario modifique el inicio variables para un servidor.',
            ],
            'list_schedules' => [
                'title' => 'Lista De Horarios',
                'description' => 'Permite a un usuario a la lista de todos los horarios (activado y desactivado) para este servidor.',
            ],
            'view_schedule' => [
                'title' => 'Ver Programación',
                'description' => 'Permite a un usuario ver los detalles de un programa específico, incluidas todas las tareas asignadas',
            ],
            'toggle_schedule' => [
                'title' => 'Alternar Horario',
                'description' => 'Permite a un usuario para cambiar de un programa a ser activo o inactivo.',
            ],
            'queue_schedule' => [
                'title' => 'Cola De Horario',
                'description' => 'Permite a un usuario poner en cola un horario para ejecutar sus tareas en el siguiente ciclo de proceso.',
            ],
            'edit_schedule' => [
                'title' => 'Modificar La Programación',
                'description' => 'Permite a un usuario editar un horario que incluye todas las tareas del cronograma. Esto permitirá al usuario eliminar tareas individuales, pero no eliminar el calendario en sí.',
            ],
            'create_schedule' => [
                'title' => 'Crear Calendario',
                'description' => 'Permite a un usuario crear una nueva programación.',
            ],
            'delete_schedule' => [
                'title' => 'Eliminar Horario',
                'description' => 'Permite a un usuario para eliminar un programa desde el servidor.',
            ],
            'view_sftp' => [
                'title' => 'Ver SFTP Detalles',
                'description' => 'Permite al usuario ver la información SFTP del servidor pero no la contraseña.',
            ],
            'view_sftp_password' => [
                'title' => 'Ver SFTP Contraseña',
                'description' => 'Permite al usuario ver el SFTP contraseña para el servidor.',
            ],
            'reset_sftp' => [
                'title' => 'Restablecer Contraseña SFTP',
                'description' => 'Le permite al usuario cambiar el SFTP contraseña para el servidor.',
            ],
            'view_databases' => [
                'title' => 'Ver Detalles De Base De Datos',
                'description' => 'Permite al usuario ver todas las bases de datos asociadas con este servidor, incluidos los nombres de usuario y contraseñas de las bases de datos de.',
            ],
            'reset_db_password' => [
                'title' => 'Restablecer Contraseña De Base De Datos',
                'description' => 'Permite a un usuario para restablecer las contraseñas de las bases de datos de.',
            ],
        ],
    ],
    'files' => [
        'exceptions' => [
            'invalid_mime' => 'Este tipo de archivo no se puede editar a través del editor incorporado del Panel.',
            'max_size' => 'Este archivo es demasiado grande para editarlo a través del editor incorporado del Panel.',
        ],
        'header' => 'El Administrador De Archivos',
        'header_sub' => 'Administrar todos tus archivos directamente desde la web.',
        'loading' => 'La carga inicial de la estructura del archivo, esto puede tardar unos segundos.',
        'path' => 'Cuando la configuración de rutas de archivo en su servidor de plugins o configuración que debe utilizar :path de acceso como base de la ruta. El tamaño máximo para la web basado en la carga de archivos a este nodo es :tamaño de la.',
        'seconds_ago' => 'hace segundos',
        'file_name' => 'Nombre De Archivo',
        'size' => 'Tamaño',
        'last_modified' => 'Última Modificación',
        'add_new' => 'Agregar Nuevo Archivo',
        'add_folder' => 'Agregar Nueva Carpeta',
        'mass_actions' => 'Acciones masivas',
        'delete' => 'Eliminar',
        'edit' => [
            'header' => 'Editar El Archivo',
            'header_sub' => 'Hacer modificaciones a un archivo de la web.',
            'save' => 'Guardar Archivo',
            'return' => 'Volver al Administrador de Archivos',
        ],
        'add' => [
            'header' => 'Nuevo Archivo',
            'header_sub' => 'Crear un nuevo archivo en su servidor.',
            'name' => 'Nombre De Archivo',
            'create' => 'Crear Archivo',
        ],
    ],
    'config' => [
        'startup' => [
            'header' => 'Iniciar La Configuración',
            'header_sub' => 'El servidor de Control de inicio de argumentos.',
            'command' => 'De Comandos De Inicio',
            'edit_params' => 'Los Parámetros De Edición',
            'update' => 'Actualización De Parámetros De Inicio',
            'startup_var' => 'De Comandos De Inicio De La Variable',
            'startup_regex' => 'De Entrada Las Reglas De',
        ],
        'sftp' => [
            'header' => 'SFTP Configuración',
            'header_sub' => 'Detalles de la cuenta para SFTP.',
            'change_pass' => 'Cambiar Contraseña SFTP',
            'details' => 'SFTP Detalles',
            'conn_addr' => 'Dirección De Conexión',
            'warning' => 'Asegúrese de que su cliente está configurado para utilizar SFTP y FTP no o FTPS para las conexiones, hay una diferencia entre los protocolos.',
        ],
        'database' => [
            'header' => 'Las bases de datos de',
            'header_sub' => 'Todas las bases de datos disponibles para este servidor.',
            'your_dbs' => 'Las Bases De Datos',
            'host' => 'Host MySQL',
            'reset_password' => 'Para Restablecer La Contraseña',
            'no_dbs' => 'No existen bases de datos mencionadas en este servidor.',
            'add_db' => 'Agregar una nueva base de datos.',
        ],
        'allocation' => [
            'header' => 'Servidor De Asignaciones',
            'header_sub' => 'Control de la IPs y los puertos disponibles en este servidor.',
            'available' => 'Disponible Asignaciones',
            'help' => 'La Asignación De La Ayuda',
            'help_text' => 'La lista a la izquierda incluye todos los IPs y los puertos que están abiertos para su servidor que se utilizará para las conexiones entrantes.',
        ],
    ],
];
