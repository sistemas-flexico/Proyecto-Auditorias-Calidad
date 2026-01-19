<!-- Script que define los parámetros de la variable $con para la conexión a la base de datos. -->

<?php
date_default_timezone_set('America/Mexico_city');
$con = new mysqli("IP-Servidor", "mi usuario", "secretpassword", "mi base de datos");

if (!$con) {
    // echo "No se ha podido conectar con el servidor FLEX ******...";
    echo "<script>
            alert('ERROR: no se pudo establecer conexión con el servidor.');
        </script>";
}
?>
