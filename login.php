<?php
$usuario_correcto = "audit01";
$palabra_secreta_correcta = "edward";
$usuario = $_POST["usuario"];
$palabra_secreta = $_POST["palabra_secreta"];

if (
    $usuario === $usuario_correcto &&
    $palabra_secreta === $palabra_secreta_correcta
) {
    session_start();
    $_SESSION["usuario"] = $usuario;
    header("Location: menu.html");
} else {
    $mensaje = "error";
    $texto = "Usuario o contraseña incorrectos";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LOGIN ERROR</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
        Swal.fire({
            body: true,
            icon: '<?php echo $mensaje; ?>',
            title: '<?php echo ucfirst($mensaje); ?>',
            text: '<?php echo $texto; ?>',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.html';
            }
        });
    </script>

    <style>
        .swal2-title {
            font-family: Arial, sans-serif;
            font-size: 40px !important;
            color: black !important;
        }

        .swal2-html-container {
            font-family: sans-serif;
            font-size: 20px !important;
            color: black !important;
        }

        .swal2-confirm {
            background-color: #18397a !important;
        }
    </style>

</body>

</html>