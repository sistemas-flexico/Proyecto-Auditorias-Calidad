# Configuración del Sistema

## Estructura de Archivos
CALIDAD/ # Carpeta raíz
├── index.php # Página principal
├── login.php # Autenticación
├── menu.html # Panel de administración
├── config.php # Configuración BD
├── clientes.php # Módulo clientes
├── alta_eemp.php # Módulo especificaciones empaque
├── eempaque.php # Módulo actualización especificaciones
├── mostrar_ima.php # Módulo tipos empaque
├── audit.php # Módulo auditorías
├── css/ # Hojas de estilo
│ └── estilos.css
├── img/ # Imágenes
│ ├── logo.png
│ └── icons/
└── DOCS/ # Documentación
├── README.md # Información general
├── INSTALL.md # Guía instalación
└── CONFIGURACION.md # Este archivo

## Problemas Comunes
1. Error: "Cannot connect to database"
- Servidor apagado o en mantenimiento
- IP incorrecta en config.php
- Sin conexión de red al servidor
- Usuario/contraseña incorrectos
2. Error: "Access denied for user"
- El usuario no tiene permisos

## Soluciones
- Verificar red: ping 10.1.8.56
- Contactar al administrador para:
* Ver si el servidor de la BD está activo
* Revisar si se tienen permisos de acceso
- Revisar config.php
- Reiniciar XAMPP/WAMP

## En caso de emergencia
1. Si se pierde conexión BD: Contactar admin servidor.
2. Si se corrompe dato: Restaurar desde respaldo BD.
3. Si se daña archivo PHP: Usar tu respaldo local.