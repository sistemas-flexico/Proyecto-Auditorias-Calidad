<!-- Script que define los parámetros de la variable $con para la conexión a la base de datos. -->

<?php
date_default_timezone_set('America/Mexico_city');
$con = new mysqli("10.1.8.56", "root", "P@ssw0rd", "contadorv2");

if (!$con) {
    // echo "No se ha podido conectar con el servidor FLEX ******...";
    echo "<script>
            alert('ERROR: no se pudo establecer conexión con el servidor.');
        </script>";
}
?>