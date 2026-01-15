# Instalación Local

## Prerrequisitos
- Windows 7/10/11 (64-bit)
- Conexión a red interna de la empresa (red corporativa)
- Acceso al servidor
- Permisos de instalación local

## PASO 1: Instalar XAMPP (solo Apache)
1. Descargar XAMPP: https://www.apachefriends.org
2. Ejecutar instalador
3. En selección de componentes, marcar solo:
- Apache
- PHP
4. Instalar en: `C:\xampp\` (ruta por defecto)
5. Finalizar instalación

## PASO 2: Copiar Archivos del Sistema
Desde la PC existente con el sistema:
1. Ir a \nombre_pc\C:\xampp\htdocs\CALIDAD\
2. Copiar carpeta 'CALIDAD' completa
3. Subir a carpeta compartida de red

## PASO 3: Configurar el Sistema
1. Copiar carpeta 'CALIDAD'
2. Pegar en: `C:\xampp\htdocs\`
3. Abrir archivo: `C:\xampp\htdocs\CALIDAD`

## PASO 4: Verificar Archivo config.php
1. Abrir: C:\xampp\htdocs\CALIDAD\config.php
2. Confirmar que tenga los datos correctos:
- IP/host del servidor de la base de datos
- Usuario y contraseña correctos
- Nombre de la base de datos

## PASO 5: Probar Instalación del Sistema
1. Abrir el Panel de Control de XAMPP 
2. Iniciar Apache (botón Start)
3. Abrir navegador: http://localhost/CALIDAD o http://127.0.0.1/CALIDAD/
4. Intentar login con usuario y contraseña de acceso

## Verificación Final
- Apache muestra "Running" o está en verde
- Página de login se carga sin errores
- Login acepta credenciales
- Se puede ver el menú del sistema
- Se puede acceder a las páginas del sistema
- Se puede gestionar correctamente la información