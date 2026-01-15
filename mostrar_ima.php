<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/mostrar_ima.css">
    <title>Catálogo de Tipos de Empaque</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div>
                    <img src="img/logo-flexico.png" alt="Descripción" class="img-logo" />
                    <span>TIPOS DE EMPAQUE</span>
                    <a href="menu.html">Volver al menú de inicio</a>
                    <a href="index.html">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <a href="cat_empaque.php" class="btn">Agregar Nuevo</a>
        <table>
            <thead>
                <tr>
                    <th>EMPAQUE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>IMAGEN 1</th>
                    <th>IMAGEN 2</th>
                    <th>IMAGEN 3</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include("conex.php");
                $query = "SELECT * FROM tipo_empaque order by tempaque";
                $resultado = $con->query($query);
                while ($row = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $row['tempaque']; ?>
                        </td>
                        <td>
                            <?php echo $row['empaque']; ?>
                        </td>
                        <td>
                            <img height="110px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img1']); ?>" />
                        </td>
                        <td>
                            <img height="110px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img2']); ?>" />
                        </td>
                        <td>
                            <img height="110px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img3']); ?>" />
                        </td>
                        <th>
                            <a href="modificar.php?idm=<?php echo $row['tempaque']; ?>">
                                <img src="./img/icons/edit2.png" class="icono">
                            </a>
                        </th>
                        <th>
                            <a href="eliminar.php?idm=<?php echo $row['tempaque']; ?>">
                                <img src="./img/icons/delete2.png" class="icono">
                            </a>
                        </th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>