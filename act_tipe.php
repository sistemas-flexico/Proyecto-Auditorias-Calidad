<!-- Script que actualiza registros en la tabla tipo_empaque junto con 3 imágenes. -->

<?php
include("conex.php"); // Utiliza la configuración del archivo que contiene las variables de conexión a la base de datos
$tempa = $_REQUEST['id2']; // Se obtienen los datos del formulario
$empaque = $_POST['empaque'];
$ima1 = addslashes(file_get_contents($_FILES['img1']['tmp_name'])); // Realiza la lectura de las imágenes,
$ima2 = addslashes(file_get_contents($_FILES['img2']['tmp_name'])); // convierte las imágenes a binario,
$ima3 = addslashes(file_get_contents($_FILES['img3']['tmp_name'])); // almacena la información blob en la base de datos.
$actuali = "UPDATE tipo_empaque SET tempaque='$tempa', empaque='$empaque', img1='$ima1', img2='$ima2', img3='$ima3'   WHERE tempaque = '$tempa'"; // Actualiza los campos en la base de datos
$resultado = $con->query($actuali); // Ejecuta la consulta con la conexión a la base de datos

if ($resultado) { // Verifica si la consulta fue exitosa
    header("location: mostrar_ima.php"); // En caso afirmativo, redirige al archivo mostrar_ima.php.
    // echo "registro dado de alta ";
    echo "<script>
            alert('ÉXITO al cargar las imágenes.');
        </script>";
} 
else {
    // echo "Error al cargar la imagen"; // En caso contrario, notifica el error con un mensaje.
    echo "<script>
            alert('ERROR: no se pudo cargar la imagen.');
    </script>";
}
?>