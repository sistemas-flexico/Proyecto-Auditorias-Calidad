<?php
include("conex.php");
$tempa = $_REQUEST['idm'];
$query = "DELETE FROM tipo_empaque WHERE tempaque = '$tempa' ";
$resultado = $con->query($query);
// echo "<script>alert('¡Eliminación completada con éxito!');</script>";
header('Location: mostrar_ima.php');
// if ($resultado) {
//     header("location: mostrar_ima.php");
// //     echo "registro dado de alta ";
//     echo "<script>
//                 alert('El registro se ha eliminado exitosamente.');
//         </script>";
// } else {
//     // echo "Error al eliminar el registro.";
//     echo "<script>
//                 alert('ERROR al eliminar el registro.');
//         </script>";
// }
exit();
?>
