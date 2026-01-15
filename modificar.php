<!-- Script de la página que edita el catálogo de los tipos de empaque. -->

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/modificar.css">
  <title>Actualización del Catálogo de Tipos de Empaque</title>
</head>

<body>
  <header>
    <div class="container-fluid">
      <div class="row">
        <div>
          <img src="img/logo-flexico.png" alt="Descripción" class="img-logo" />
          <span>ACT. CAT. TIPOS EMPAQUE</span>
          <a href="menu.html">Volver al menú de inicio</a>
          <a href="index.html">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </header>

  <main>
    <?php
    include("conex.php");
    $tempa = $_REQUEST['idm'];
    $query = "SELECT * FROM tipo_empaque WHERE tempaque = '$tempa' ";
    $resultado = $con->query($query);
    $row = $resultado->fetch_assoc();
    echo $row;
    echo $tempa;
    ?>
      <form action="act_tipe.php?id2=<?php echo $row['tempaque']; ?>" method="POST" enctype="multipart/form-data">
        <input type="text" REQUIRED name="empaque" placeholder="Empaque" value="<?php echo $row['empaque']; ?>" />
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['img1']); ?>" />
        <input type="file" REQUIRED name="img1" />
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['img2']); ?>" />
        <input type="file" name="img2" />
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['img3']); ?>" />
        <input type="file" name="img3" />
        <input type="submit" value="Aceptar">
      </form>
  </main>
</body>

</html>