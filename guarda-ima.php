<?php
include("conex.php");

$tempaque = $_POST['tempa'];
$empaque = $_POST['empaque'];
$ima1 = addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
$ima2 = addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
$ima3 = addslashes(file_get_contents($_FILES['imagen3']['tmp_name']));
$insert = "INSERT INTO tipo_empaque(tempaque,img1,img2,img3,empaque) 
            VALUES('$tempaque','$ima1','$ima2','$ima3','$empaque')";
$resultado = $con->query($insert);
/* mysqli_query($con, $insert);*/

if ($resultado) {
    header("location: mostrar_ima.php");
//     echo "registro dado de alta ";
    echo "<script>
                alert('La información se ha cargado exitosamente.');
        </script>";
} else {
    // echo "Error al cargar la imagen";
    echo "<script>
                alert('ERROR al cargar la imagen.');
        </script>";
}
?>