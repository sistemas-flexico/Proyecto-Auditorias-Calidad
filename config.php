 <!-- Script que realiza la conexión con la base de datos -->

 <?php
    //header("Content-Type: text/html;charset=utf-8");
    date_default_timezone_set('America/Mexico_city');
    $usuario  = "mi usuario";
    $password = "secretpassword";
    $servidor = "IP-Servidor";
    $basededatos = "mi base de datos";

    $con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al servidor.");
    mysqli_query($con, "SET SESSION collation_connection ='utf8_unicode_ci'");
    $db = mysqli_select_db($con, $basededatos) or die("Ups! Error en conectar a la Base de Datos.");

    ?>
