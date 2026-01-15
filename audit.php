<!-- Script que consulta y visualiza información relacionada con criterios de calidad del cliente, 
      especificaciones de empaques para un modelo e imágenes del tipo de empaque. -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/audit.css">
    <title>SISTEMA DE AUDITORÍAS</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div>
                    <img src="img/logo-flexico.png" alt="Descripción" class="img-logo" />
                    <span>AUDITORÍAS DE EMPAQUE</span>
                    <a class="no-print" href="menu.html">Volver al menú de inicio</a>
                    <a class="no-print" href="index.html">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <form action=" " method="POST" enctype="multipart/form-data" class="no-print">
            <!-- <legend>BUSCADOR</legend> -->
            <div>
                <input type="text" REQUIRED name="id-cliente" placeholder="CLIENTE" value="" class="inputCliente" />
            </div>
            <div>
                <input type="text" REQUIRED name="modelo" placeholder="MODELO" value="" class="inputModelo no-print" />
            </div>
            <input type="submit" value="Consultar" class="btnConsultar no-print">
        </form>

        <div class="form-grid">
            <?php
            $idcli = 0;
            $tipempaq = "";
            if ($_POST) {
                $idcli = (isset($_POST["id-cliente"])) ? $_POST["id-cliente"] : "";
                $mod   = (isset($_POST["modelo"])) ? $_POST["modelo"] : "";
            }
            include('config.php');

            // Consulta datos del cliente
            $sqlClientes = ("SELECT * FROM cm_mstr WHERE cm_addr ='" . ($idcli) . "' ");
            $queryData   = mysqli_query($con, $sqlClientes);
            $t_clientes = mysqli_num_rows($queryData);

            if ($t_clientes > 0):
            ?>

                <table class="data-table" id="tabla1">
                    <thead>
                        <tr>
                            <th colspan="2">Información del Cliente y Producto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($queryData)): ?>
                            <tr>
                                <td class="field-name1"><strong>Modelo:</strong></td>
                                <td><?php echo $mod . " " . $data['cm_sort']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nivel de exigencia:</strong></td>
                                <td><?php echo $data['nivel']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Lo que más revisa el cliente:</strong></td>
                                <td>
                                    <?php
                                    echo (!empty($data['rev1']) && $data['rev1'] != "N/A") ? $data['rev1'] . "<br>" : "";
                                    echo (!empty($data['rev2']) && $data['rev2'] != "N/A") ? $data['rev2'] . "<br>" : "";
                                    echo (!empty($data['rev3']) && $data['rev3'] != "N/A") ? $data['rev3'] : "";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Requiere composición:</strong></td>
                                <td><?php echo $data['compo']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tipo de luz para auditar tono:</strong></td>
                                <td>
                                    <?php
                                    $luces = [];
                                    if (!empty($data['atono1']) && $data['atono1'] != "N/A") $luces[] = $data['atono1'];
                                    if (!empty($data['atono2']) && $data['atono2'] != "N/A") $luces[] = $data['atono2'];
                                    if (!empty($data['atono3']) && $data['atono3'] != "N/A") $luces[] = $data['atono3'];
                                    if (!empty($data['atono4']) && $data['atono4'] != "N/A") $luces[] = $data['atono4'];
                                    if (!empty($data['atono5']) && $data['atono5'] != "N/A") $luces[] = $data['atono5'];
                                    if (!empty($data['atono6']) && $data['atono6'] != "N/A") $luces[] = $data['atono6'];
                                    echo implode("<br>", $luces);
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <?php
                // Consulta datos de empaque
                $sqlempaque = ("SELECT * FROM eempaque WHERE cm_addr ='" . ($idcli) . "'  AND  modelo = '" . $mod . "' ");
                $queryDataemp = mysqli_query($con, $sqlempaque);
                $t_emp = mysqli_num_rows($queryDataemp);

                if ($t_emp > 0):
                    while ($data = mysqli_fetch_array($queryDataemp)):
                        $tipempaq = $data['tempaque']; // Guardamos el tipo de empaque para usarlo después
                ?>

                        <table class="data-table" id="tabla2">
                            <thead>
                                <tr>
                                    <th colspan="2">Especificaciones de Empaque</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="field-name2"><strong>Códigos de defecto que audita:</strong></td>
                                    <td><?php echo $data['coddef']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Número de cortes que tolera:</strong></td>
                                    <td><?php echo $data['ncortes']; ?></td>
                                </tr>

                                <?php if ($data['matune'] != "N/A"): ?>
                                    <tr>
                                        <td><strong>Material para unir cortes:</strong></td>
                                        <td><?php echo $data['matune']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <td><strong>Tipo de empaque:</strong></td>
                                    <td><?php echo $data['tempaque']; ?></td>
                                </tr>

                                <tr>
                                    <td><strong>Presentación:</strong></td>
                                    <td><?php echo $data['present']; ?></td>
                                </tr>

                                <?php if ($data['um'] != "N/A"): ?>
                                    <tr>
                                        <td><strong>Cantidad por unidad:</strong></td>
                                        <td><?php echo $data['cantidad'] . " " . $data['um']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php
                                $especificaciones = [];
                                if ($data['esp_pres1'] != "N/A") $especificaciones[] = $data['esp_pres1'];
                                if ($data['esp_pres2'] != "N/A") $especificaciones[] = $data['esp_pres2'];
                                if ($data['esp_pres3'] != "N/A") $especificaciones[] = $data['esp_pres3'];
                                if ($data['esp_pres4'] != "N/A") $especificaciones[] = $data['esp_pres4'];

                                if (!empty($especificaciones)):
                                ?>
                                    <tr>
                                        <td><strong>Especificaciones de presentación:</strong></td>
                                        <td><?php echo implode("<br>", $especificaciones); ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($data['puntafinal'] != "N/A"): ?>
                                    <tr>
                                        <td><strong>Sujeción de punta final:</strong></td>
                                        <td><?php echo $data['puntafinal']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($data['etiluna'] != "N/A"): ?>
                                    <tr>
                                        <td><strong>Etiqueta individual:</strong></td>
                                        <td><?php echo $data['etiluna']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($data['emplaobol'] != "N/A"): ?>
                                    <tr>
                                        <td><strong>Emplayado o bolsa individual:</strong></td>
                                        <td><?php echo $data['emplaobol']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <td><strong>Etiquetas si va emplayado:</strong></td>
                                    <td><?php echo $data['etiempla']; ?></td>
                                </tr>

                                <tr>
                                    <td><strong>Cantidad final de presentación:</strong></td>
                                    <td><?php echo $data['canpres']; ?></td>
                                </tr>

                                <?php if ($data['medempaque'] != "N/A"): ?>
                                    <tr>
                                        <td><strong>Medida del empaque:</strong></td>
                                        <td><?php echo $data['medempaque']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($data['medempaque2'] != "N/A"): ?>
                                    <tr>
                                        <td><strong>Medida del empaque 2:</strong></td>
                                        <td><?php echo $data['medempaque2']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($data['etifinal'] != "N/A"): ?>
                                    <tr>
                                        <td><strong>Tipo de etiqueta final:</strong></td>
                                        <td><?php echo $data['etifinal']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <td><strong>Uso:</strong></td>
                                    <td><?php echo $data['uso']; ?></td>
                                </tr>

                                <?php if (!empty($data['obs_aca1'])): ?>
                                    <tr>
                                        <td><strong>Observaciones acabado:</strong></td>
                                        <td><?php echo $data['obs_aca1']; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if (!empty($data['obs_emp1'])): ?>
                                    <tr>
                                        <td><strong>Observaciones empaque:</strong></td>
                                        <td><?php echo $data['obs_emp1']; ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    <?php
                    endwhile;
                else:
                    $mensaje = "El modelo no corresponde al cliente. Por favor verifica los datos e intenta de nuevo.";
                    echo "<script type='text/javascript'>alert('$mensaje');</script>";
                endif;

                // Mostrar tabla de tipo de empaque si tenemos el valor
                if (!empty($tipempaq)):
                    include("conex.php");
                    $query = "SELECT * FROM tipo_empaque WHERE tempaque = '" . $tipempaq . "'";
                    $resultado = $con->query($query);

                    if ($resultado->num_rows > 0):
                    ?>
                        </table>

                        <table class="empaque-table no-print">
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        <div>Tipo de Empaque: <?php echo $tipempaq; ?></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $resultado->fetch_assoc()): ?>
                                    <tr class="images-row">
                                        <td colspan="3" class="empaque-description">
                                            <?php echo $row['empaque']; ?>
                                        </td>
                                    </tr>
                                    <tr class="images-row">
                                        <?php if (!empty($row['img1'])): ?>
                                            <td class="image-cell">
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['img1']); ?>"
                                                    alt="Imagen 1 de empaque" class="empaque-img" />
                                            </td>
                                        <?php endif; ?>

                                        <?php if (!empty($row['img2'])): ?>
                                            <td class="image-cell">
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['img2']); ?>"
                                                    alt="Imagen 2 de empaque" class="empaque-img" />
                                            </td>
                                        <?php endif; ?>

                                        <?php if (!empty($row['img3'])): ?>
                                            <td class="image-cell">
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['img3']); ?>"
                                                    alt="Imagen 3 de empaque" class="empaque-img" />
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                                    <button class="btnConsultar no-print" onclick="window.print()">Guardar como PDF</button>

                        </table>

                <?php
                    endif;
                endif;
                ?>

            <?php endif; ?>
        </div>

        <!-- <button class="btnConsultar no-print" onclick="window.print()">Guardar como PDF</button> -->

    </main>
</body>

</html>