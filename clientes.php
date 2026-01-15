<?php
$r1 = "";
$r2 = "";
$r3 = "";
$compo = "NO";
$t1 = "";
$t2 = "";
$t3 = "";
$t4 = "";
$t5 = "";
$t6 = "";
if ($_POST) {
      $idcli = (isset($_POST["id"])) ? $_POST["id"] : "";
      $nom = (isset($_POST["nombre"])) ? $_POST["nombre"] : "";
      $niv = (isset($_POST["niv"])) ? $_POST["niv"] : "";
      $r1 = (isset($_POST["rev1"])) ? $_POST["rev1"] : "";
      $r2 = (isset($_POST["rev2"])) ? $_POST["rev2"] : "";
      $r3 = (isset($_POST["rev3"])) ? $_POST["rev3"] : "";
      $t1 = (isset($_POST["tono1"])) ? $_POST["tono1"] : "";
      $t2 = (isset($_POST["tono2"])) ? $_POST["tono2"] : "";
      $t3 = (isset($_POST["tono3"])) ? $_POST["tono3"] : "";
      $t4 = (isset($_POST["tono4"])) ? $_POST["tono4"] : "";
      $t5 = (isset($_POST["tono5"])) ? $_POST["tono5"] : "";
      $t6 = (isset($_POST["tono6"])) ? $_POST["tono6"] : "";

      $compo = (isset($_POST["comp"])) ? $_POST["comp"] : "";
      include('config.php');
      header("Content-Type: text/html;charset=utf-8");
      $updateData =  ("UPDATE cm_mstr SET  nivel='" . $niv . "',
                                                    rev1='" . $r1 . "',
                                                    rev2='" . $r2 . "',
                                                    rev3='" . $r3 . "',
                                                    compo='" . $compo . "',
                                                    atono1 = '" . $t1 . "',
                                                    atono2 = '" . $t2 . "',
                                                    atono3 = '" . $t3 . "',
                                                    atono4 = '" . $t4 . "',
                                                    atono5 = '" . $t5 . "',
                                                    atono6 = '" . $t6 . "'
                                                    WHERE cm_addr='" . $idcli . "'
                             ");
      $result_update = mysqli_query($con, $updateData);
}
// mysqli_close($con);           
?>

<!DOCTYPE html>
<html lang="es">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="./css/clientes.css">
      <title>Catálogo de Clientes</title>
</head>

<body>
      <header>
            <div class="container-fluid">
                  <div class="row">
                        <div>
                              <img src="img/logo-flexico.png" alt="Descripción" class="img-logo" />
                              <span>CATÁLOGO DE CLIENTES</span>
                              <a href="menu.html">Volver al menú de inicio</a>
                              <a href="index.html">Cerrar sesión</a>
                        </div>
                  </div>
            </div>
      </header>

      <main>
            <fieldset class="fieldset1 fieldset-angosto">
                  <legend>VER INFORMACIÓN</legend>
                  <form action=" " method="POST">
                        Cliente:
                        <input type="text" name="id-cliente" class="txt">
                        <br><br>
                        <input type="submit" value="Consultar">
                  </form>
            </fieldset>

            <?php
            $idcli = "";
            $t_clientes = 0;
            if ($_POST) {
                  $idcli = (isset($_POST["id-cliente"])) ? $_POST["id-cliente"] : "";
            }
            header("Content-Type: text/html;charset=utf-8");
            include('config.php');
            $sqlClientes = ("SELECT * FROM cm_mstr WHERE cm_addr ='" . ($idcli) . "' ");
            $queryData   = mysqli_query($con, $sqlClientes);
            $t_clientes = mysqli_num_rows($queryData);
            // echo $t_clientes;
            if ($t_clientes > 0) {
                  while ($data = mysqli_fetch_array($queryData)) {
                        //   echo "          Nombre: ".$data['nombre'] ."<br/>" ; 
                        //  if ($data['tipo_cliente'] = 1){
                        //     echo "Tipo de Cliente: EXIGENTE <br/>";
                        $id_cli = $data['cm_addr'];
                        $nom =  $data['cm_sort'];
                        $niv =  $data['nivel'];
                        $r1 = $data['rev1'];
                        $r2 = $data['rev2'];
                        $r3 = $data['rev3'];
                        $compo = $data['compo'];
                        $t1 = $data['atono1'];
                        $t2 = $data['atono2'];
                        $t3 = $data['atono3'];
                        $t4 = $data['atono4'];
                        $t5 = $data['atono5'];
                        $t6 = $data['atono6'];
                  }
                  mysqli_close($con);
            } else {
                  echo "<script>
                              alert('ERROR: Verifica que el ID del cliente sea correcto.');
                        </script>";
            }
            ?>

            <fieldset>
                  <legend>ACTUALIZAR INFORMACIÓN</legend>
                  <form action=" " method="POST">
                        <input type="hidden" name="id" value="<?php echo $id_cli; ?>" />
                        Nombre:
                        <input type="text" maxlength="50" size="50" name="nombre" value="<?php echo $nom; ?>" class="txt2" />
                        <br><br>
                        Nivel de exigencia:
                        <select name="niv">
                              <option value="<?php echo $niv; ?>"> [Ninguna Serie] </option>
                              <option value="SEVERO" <?php echo ($niv == "SEVERO") ? "selected" : ""; ?>> SEVERO </option>
                              <option value="MEDIO" <?php echo ($niv == "MEDIO") ? "selected" : ""; ?>> MEDIO </option>
                              <option value="BASICO" <?php echo ($niv == "BASICO") ? "selected" : ""; ?>> BASICO </option>
                        </select>
                        <br><br>
                        Características que el cliente requiere en su producto: <br>
                        <input type="text" name="rev1" value="<?php echo $r1; ?>" class="txt3" />
                        <br>
                        <input type="text" name="rev2" value="<?php echo $r2; ?>" class="txt3" />
                        <br>
                        <input type="text" name="rev3" value="<?php echo $r3; ?>" class="txt3" />
                        <br><br>
                        Requiere composición:
                        <select name="comp" id="">
                              <option value="SI" <?php echo ($compo == "SI") ? "selected" : ""; ?>>SI </option>
                              <option value="NO" <?php echo ($compo == "NO") ? "selected" : ""; ?>>NO </option>
                              <br>
                        </select>
                        <br><br>
                        Tipo de luz con la que el cliente audita el tono:
                        <br>
                        <select name="tono1" id="txt4">
                              <option value="<?php echo $t1; ?>"> [Ninguna Serie] </option>
                              <option value="LUZ DE DIA" <?php echo ($t1 == "LUZ DE DIA") ? "selected" : ""; ?>>LUZ DE DIA </option>
                              <option value="COOL WHITE" <?php echo ($t1 == "COOL WHITE") ? "selected" : ""; ?>>COOL WHITE </option>
                              <option value="INCANDECENTE" <?php echo ($t1 == "INCANDECENTE") ? "selected" : ""; ?>>INCANDECENTE </option>
                              <option value="UV" <?php echo ($t1 == "UV") ? "selected" : ""; ?>>UV </option>
                              <option value="ESPECTRO" <?php echo ($t1 == "ESPECTRO") ? "selected" : ""; ?>>ESPECTRO </option>
                              <option value="MESA SUPERVISOR" <?php echo ($t1 == "MESA SUPERVISOR") ? "selected" : ""; ?>>MESA SUPERVISOR </option>
                        </select>
                        <br>
                        <select name="tono2" id="">
                              <option value="<?php echo $t1; ?>"> [Ninguna Serie] </option>
                              <option value="LUZ DE DIA" <?php echo ($t2 == "LUZ DE DIA") ? "selected" : ""; ?>>LUZ DE DIA </option>
                              <option value="COOL WHITE" <?php echo ($t2 == "COOL WHITE") ? "selected" : ""; ?>>COOL WHITE </option>
                              <option value="INCANDECENTE" <?php echo ($t2 == "INCANDECENTE") ? "selected" : ""; ?>>INCANDECENTE </option>
                              <option value="UV" <?php echo ($t2 == "UV") ? "selected" : ""; ?>>UV </option>
                              <option value="ESPECTRO" <?php echo ($t2 == "ESPECTRO") ? "selected" : ""; ?>>ESPECTRO </option>
                              <option value="MESA SUPERVISOR" <?php echo ($t2 == "MESA SUPERVISOR") ? "selected" : ""; ?>>MESA SUPERVISOR </option>
                        </select>
                        <br>
                        <select name="tono3" id="">
                              <option value="<?php echo $t3; ?>"> [Ninguna Serie] </option>
                              <option value="LUZ DE DIA" <?php echo ($t3 == "LUZ DE DIA") ? "selected" : ""; ?>>LUZ DE DIA </option>
                              <option value="COOL WHITE" <?php echo ($t3 == "COOL WHITE") ? "selected" : ""; ?>>COOL WHITE </option>
                              <option value="INCANDECENTE" <?php echo ($t3 == "INCANDECENTE") ? "selected" : ""; ?>>INCANDECENTE </option>
                              <option value="UV" <?php echo ($t3 == "UV") ? "selected" : ""; ?>>UV </option>
                              <option value="ESPECTRO" <?php echo ($t3 == "ESPECTRO") ? "selected" : ""; ?>>ESPECTRO </option>
                              <option value="MESA SUPERVISOR" <?php echo ($t3 == "MESA SUPERVISOR") ? "selected" : ""; ?>>MESA SUPERVISOR </option>
                        </select>
                        <br>
                        <select name="tono4" id="">
                              <option value="<?php echo $t4; ?>"> [Ninguna Serie] </option>
                              <option value="LUZ DE DIA" <?php echo ($t4 == "LUZ DE DIA") ? "selected" : ""; ?>>LUZ DE DIA </option>
                              <option value="COOL WHITE" <?php echo ($t4 == "COOL WHITE") ? "selected" : ""; ?>>COOL WHITE </option>
                              <option value="INCANDECENTE" <?php echo ($t4 == "INCANDECENTE") ? "selected" : ""; ?>>INCANDECENTE </option>
                              <option value="UV" <?php echo ($t4 == "UV") ? "selected" : ""; ?>>UV </option>
                              <option value="ESPECTRO" <?php echo ($t4 == "ESPECTRO") ? "selected" : ""; ?>>ESPECTRO </option>
                              <option value="MESA SUPERVISOR" <?php echo ($t4 == "MESA SUPERVISOR") ? "selected" : ""; ?>>MESA SUPERVISOR </option>
                        </select>
                        <br>
                        <select name="tono5" id="">
                              <option value="<?php echo $t5; ?>"> [Ninguna Serie] </option>
                              <option value="LUZ DE DIA" <?php echo ($t5 == "LUZ DE DIA") ? "selected" : ""; ?>>LUZ DE DIA </option>
                              <option value="COOL WHITE" <?php echo ($t5 == "COOL WHITE") ? "selected" : ""; ?>>COOL WHITE </option>
                              <option value="INCANDECENTE" <?php echo ($t5 == "INCANDECENTE") ? "selected" : ""; ?>>INCANDECENTE </option>
                              <option value="UV" <?php echo ($t5 == "UV") ? "selected" : ""; ?>>UV </option>
                              <option value="ESPECTRO" <?php echo ($t5 == "ESPECTRO") ? "selected" : ""; ?>>ESPECTRO </option>
                              <option value="MESA SUPERVISOR" <?php echo ($t5 == "MESA SUPERVISOR") ? "selected" : ""; ?>>MESA SUPERVISOR </option>
                        </select>
                        <br>
                        <select name="tono6" id="">
                              <option value="<?php echo $t6; ?>"> [Ninguna Serie] </option>
                              <option value="LUZ DE DIA" <?php echo ($t6 == "LUZ DE DIA") ? "selected" : ""; ?>>LUZ DE DIA </option>
                              <option value="COOL WHITE" <?php echo ($t6 == "COOL WHITE") ? "selected" : ""; ?>>COOL WHITE </option>
                              <option value="INCANDECENTE" <?php echo ($t6 == "INCANDECENTE") ? "selected" : ""; ?>>INCANDECENTE </option>
                              <option value="UV" <?php echo ($t6 == "UV") ? "selected" : ""; ?>>UV </option>
                              <option value="ESPECTRO" <?php echo ($t6 == "ESPECTRO") ? "selected" : ""; ?>>ESPECTRO </option>
                              <option value="MESA SUPERVISOR" <?php echo ($t6 == "MESA SUPERVISOR") ? "selected" : ""; ?>>MESA SUPERVISOR </option>
                        </select>

                        <br><br>
                        <input type="submit" value="Guardar">
                  </form>
            </fieldset>
      </main>
</body>

</html>