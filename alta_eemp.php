<!-- Script que guarda especificaciones de un cliente con respecto a un modelo específico. -->
<?php
$alta = 0;
$cliente = 0;
$id_cli = "";
$idcli = "";
$mod = "";
$nom = "";
$temp = 0;
$pres = "";
$ep1 = "";
$ep2 = "";
$ep3 = "";
$ep4 = "";
$can = 0;
$ume = "";
$canp = 0;
$memp = "";
$memp2 = "";
$eml = "";
$empbol = "";
$eempla = "";
$matun = "";
$cortes = 0;
$defec = "";
$efinal = "";
$pfinal = "";
$uso = "";
$obs_aca1 = "";
$obs_emp1 = "";
?>

<!DOCTYPE html>
<html lang="es">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="./css/alta_eemp.css">
      <title>SISTEMA DE AUDITORÍAS</title>
</head>

<body>
      <header>
            <div class="container-fluid">
                  <div class="row">
                        <div>
                              <img src="img/logo-flexico.png" alt="Descripción" class="img-logo" />
                              <span>ALTA ESPECIFICACIONES</span>
                              <a href="menu.html">Volver al menú de inicio</a>
                              <a href="index.html">Cerrar sesión</a>
                        </div>
                  </div>
            </div>
      </header>

      <main>
            <fieldset class="fieldset1 fieldset-angosto">
                  <legend>CONSULTAR</legend>
                  <form action=" " method="POST">
                        Cliente:
                        <input type="text" name="id-cliente" />
                        <br><br>
                        Modelo:
                        <input type="text" name="modelo" />
                        <br><br>
                        <input type="submit" value="Consultar">
                  </form>
            </fieldset>

            <?php
            // $idcli="";
            $t_clientes = 0;
            if ($_POST) {
                  $idcli = (isset($_POST["id-cliente"])) ? $_POST["id-cliente"] : "";
                  $mod   = (isset($_POST["modelo"])) ? $_POST["modelo"] : "";
                  header("Content-Type: text/html;charset=utf-8");
                  include('config.php');
                  $sqlClientes = ("SELECT * FROM cm_mstr WHERE cm_addr ='" . ($idcli) . "' ");
                  $queryData   = mysqli_query($con, $sqlClientes);
                  $t_clientes = mysqli_num_rows($queryData);
                  if ($t_clientes > 0) {

                        while ($data = mysqli_fetch_array($queryData)) {
                              $idcli = $data['cm_addr'];
                              $nom   = $data['cm_sort'];
                        }

                        $sqlempaque = ("SELECT * FROM eempaque WHERE cm_addr ='" . ($idcli) . "'  AND  modelo = '" . $mod . "' ");
                        $queryDataemp = mysqli_query($con, $sqlempaque);
                        $t_emp = mysqli_num_rows($queryDataemp);
                        // echo $t_emp;

                        if ($t_emp > 0) {
                              echo '<script type="text/javascript">
                                                alert("Ya existen las especificaciones para este cliente.");
                                                window.location.href="alta_eemp.php";
                                          </script>';
                              // echo "<p style='color: white; font-weight: bold; font-size: 50px;'>Ya existen las especificaciones para este cliente.</p>";
                        } else {
                              $alta = 1;
                              // include ('aemp.php');
                              //mysqli_close($con);
                        }
                  } else {
                        echo '<script type="text/javascript">
                                          alert("El cliente ingresado no existe. Verifique el dato nuevamente.");
                                          window.location.href="alta_eemp.php";
                                    </script>';
                        // echo "El cliente no existe";
                  }
            }
            ?>

            <?php
            if ($alta = 1) {
            ?>
                  <fieldset>
                        <legend>ACTUALIZAR</legend>
                        <form action=" " method="POST">
                              Cliente
                              <input type="hidden" name="cliente" value="<?php echo $idcli; ?>" />
                              <input type="hidden" name="model" value="<?php echo $mod; ?>" />
                              <input type="text" maxlength="28" size="28" name="nombre" value="<?php echo $nom; ?>" /> <?php echo $idcli . "-" . $mod; ?> <br />
                              <!--  <input type="hidden" name="modelo" value = "<?php // echo $mod; 
                                                                                    ?>" />   -->
                              Códigos de los defectos que audita:
                              <input type="text" maxlength="60" size="60" name="def" value="<?php echo $defec; ?>" /> <br />
                              Número de cortes que tolera:
                              <input type="number" name="corte" value="<?php echo $cortes; ?>" /> <br />
                              Material con el que se une el corte:
                              <select name="matu" id="">
                                    <option value="N/A" <?php echo ($matun == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="Masking" <?php echo ($matun == "Masking") ? "selected" : ""; ?>>Masking</option>
                                    <option value="Cinta roja" <?php echo ($matun == "Cinta roja") ? "selected" : ""; ?>>Cinta roja</option>
                                    <option value="Costura" <?php echo ($matun == "Costura") ? "selected" : ""; ?>>Costura</option>
                                    <option value="Sin unión" <?php echo ($matun == "Sin unión") ? "selected" : ""; ?>>Sin unión</option>
                                    <option value="Unión con silicón" <?php echo ($matun == "Unión con silicón") ? "selected" : ""; ?>>Unión con silicón</option>
                                    <option value="Empalmado" <?php echo ($matun == "Empalmado") ? "selected" : ""; ?>>Empalmado</option>
                                    <option value="Masking y cinta roja" <?php echo ($matun == "Masking y cinta roja") ? "selected" : ""; ?>>Masking y cinta roja</option>
                              </select>
                              <br>
                              Tipo de empaque: <input type="number" maxlength="3" size="3" name="tempa" value="<?php echo $temp; ?>" />
                              <br>
                              Presentación
                              <select name="prese" id="">
                                    <option value="<?php echo $pres; ?>"> [Ninguna Serie] </option>
                                    <option value="CARRETE" <?php echo ($pres == "CARRETE") ? "selected" : ""; ?>>CARRETE </option>
                                    <option value="ROLLO" <?php echo ($pres == "ROLLO") ? "selected" : ""; ?>>ROLLO </option>
                                    <option value="CAJA" <?php echo ($pres == "CAJA") ? "selected" : ""; ?>>CAJA </option>
                                    <option value="BOLSA" <?php echo ($pres == "BOLSA") ? "selected" : ""; ?>>BOLSA </option>
                                    <option value="QUESO" <?php echo ($pres == "QUESO") ? "selected" : ""; ?>>QUESO </option>
                              </select>
                              <br>
                              Cantidad por carrete, rollo o caja: <input type="number" name="cant" value="<?php echo $can; ?>" />
                              <select name="umed" id="">
                                    <option value="N/A" <?php echo ($ume == "N/A") ? "selected" : ""; ?>>N/A </option>
                                    <option value="MTS" <?php echo ($ume == "MTS") ? "selected" : ""; ?>>MTS </option>
                                    <option value="YDAS" <?php echo ($ume == "YDAS") ? "selected" : ""; ?>>YDAS </option>
                              </select>
                              <br>
                              Especificaciones de la presentación
                              <br>
                              <select name="epres1" id="">
                                    <option value="N/A" <?php echo ($ep1 == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="ARANDELA 19 X 25 MM" <?php echo ($ep1 == "ARANDELA 19 X 25 MM") ? "selected" : ""; ?>>ARANDELA 19 X 25 MM </option>
                                    <option value="ARANDELA 19 X 29 MM" <?php echo ($ep1 == "ARANDELA 19 X 29 MM") ? "selected" : ""; ?>>ARANDELA 19 X 29 MM </option>
                                    <option value="ARANDELA 23 X 29 MM" <?php echo ($ep1 == "ARANDELA 23 X 29 MM") ? "selected" : ""; ?>>ARANDELA 23 X 29 MM </option>
                                    <option value="ARANDELA 24 X 25 MM" <?php echo ($ep1 == "ARANDELA 24 X 25 MM") ? "selected" : ""; ?>>ARANDELA 24 X 25 MM </option>
                                    <option value="ARANDELA 24 X 42 MM" <?php echo ($ep1 == "ARANDELA 24 X 42 MM") ? "selected" : ""; ?>>ARANDELA 24 X 42 MM </option>
                                    <option value="ARANDELA 30 X 29 MM" <?php echo ($ep1 == "ARANDELA 30 X 29 MM") ? "selected" : ""; ?>>ARANDELA 30 X 29 MM </option>
                                    <option value="ARANDELA 32 X 25 MM" <?php echo ($ep1 == "ARANDELA 32 X 25 MM") ? "selected" : ""; ?>>ARANDELA 32 X 25 MM </option>
                                    <option value="ARANDELA 32 X 42 MM" <?php echo ($ep1 == "ARANDELA 32 X 42 MM") ? "selected" : ""; ?>>ARANDELA 32 X 42 MM </option>
                                    <option value="ARANDELA 34 X 25 MM" <?php echo ($ep1 == "ARANDELA 34 X 25 MM") ? "selected" : ""; ?>>ARANDELA 34 X 25 MM </option>
                                    <option value="ARANDELA 36 X 29 MM" <?php echo ($ep1 == "ARANDELA 36 X 29 MM") ? "selected" : ""; ?>>ARANDELA 36 X 29 MM </option>
                                    <option value="ARANDELA 38 X 25 MM" <?php echo ($ep1 == "ARANDELA 38 X 25 MM") ? "selected" : ""; ?>>ARANDELA 38 X 25 MM </option>
                                    <option value="ARANDELA 38 X 42 MM" <?php echo ($ep1 == "ARANDELA 38 X 42 MM") ? "selected" : ""; ?>>ARANDELA 38 X 42 MM </option>
                                    <option value="ARANDELA 40 X 29 MM" <?php echo ($ep1 == "ARANDELA 40 X 29 MM") ? "selected" : ""; ?>>ARANDELA 40 X 29 MM </option>
                                    <option value="ARANDELA 42 X 29 MM" <?php echo ($ep1 == "ARANDELA 42 X 29 MM") ? "selected" : ""; ?>>ARANDELA 42 X 29 MM </option>
                                    <option value="ARANDELA 45 X 29 MM" <?php echo ($ep1 == "ARANDELA 45 X 29 MM") ? "selected" : ""; ?>>ARANDELA 45 X 29 MM </option>
                                    <option value="ARANDELA 49 X 29 MM" <?php echo ($ep1 == "ARANDELA 49 X 29 MM") ? "selected" : ""; ?>>ARANDELA 49 X 29 MM </option>
                                    <option value="ARANDELA 50 X 25 MM" <?php echo ($ep1 == "ARANDELA 50 X 25 MM") ? "selected" : ""; ?>>ARANDELA 50 X 25 MM </option>
                                    <option value="ARANDELA 50 X 42 MM" <?php echo ($ep1 == "ARANDELA 50 X 42 MM") ? "selected" : ""; ?>>ARANDELA 50 X 42 MM </option>
                                    <option value="ARANDELA 55 X 29 MM" <?php echo ($ep1 == "ARANDELA 55 X 29 MM") ? "selected" : ""; ?>>ARANDELA 55 X 29 MM </option>
                                    <option value="ARANDELA  6 X 25 MM" <?php echo ($ep1 == "ARANDELA  6 X 25 MM") ? "selected" : ""; ?>>ARANDELA 6 X 25 MM </option>
                                    <option value="ARANDELA  6 X 42 MM" <?php echo ($ep1 == "ARANDELA  6 X 42 MM") ? "selected" : ""; ?>>ARANDELA 6 X 42 MM </option>
                                    <option value="ARANDELA 63 X 25 MM" <?php echo ($ep1 == "ARANDELA 63 X 25 MM") ? "selected" : ""; ?>>ARANDELA 63 X 25 MM </option>
                              </select>
                              <br>
                              <select name="epres2" id="">
                                    <option value="N/A" <?php echo ($ep2 == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="BALONA No 10 AZUL 10 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 10 AZUL 10 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 10 AZUL 10 CM DIAMETRO </option>
                                    <option value="BALONA No 10 BLANCA 10 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 10 BLANCA 10 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 10 BLANCA 10 CM DIAMETRO </option>
                                    <option value="BALONA No 10 ROSA 10 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 10 ROSA 10 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 10 ROSA 10 CM DIAMETRO </option>
                                    <option value="BALONA No 11  11 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 11  11 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 11 11 CM DIAMETRO </option>
                                    <option value="BALONA No 11  AZUL  11 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 11   AZUL 11 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 11 AZUL 11 CM DIAMETRO </option>
                                    <option value="BALONA No 11 BLANCA 11 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 11 BLANCA 11 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 11 BLANCA 11 CM DIAMETRO </option>
                                    <option value="BALONA No 11 ROSA   11 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 11 ROSA   11 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 11 ROSA 11 CM DIAMETRO </option>
                                    <option value="BALONA No 12.5  12.5 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 12.5  12.5 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 12.5 12.5 CM DIAMETRO </option>
                                    <option value="BALONA No 12.5  AZUL  12.5 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 12.5  AZUL 12.5 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 12.5 AZUL 12.5 CM DIAMETRO</option>
                                    <option value="BALONA No 12.5 BLANCA 12.5 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 12.5 BLANCA 12.5 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 12.5 BLANCA 12.5 CM DIAMETRO </option>
                                    <option value="BALONA No 12.5 ROSA   12.5 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 12.5 ROSA   12.5 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 12.5 ROSA 12.5 CM DIAMETRO </option>
                                    <option value="BALONA No 15 15 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 15 15 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 15 15 CM DIAMETRO </option>
                                    <option value="BALONA No 15 BLANCA 15 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 15 BLANCA 15 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 15 BLANCA 15 CM DIAMETRO </option>
                                    <option value="BALONA No 15 ROSA   15 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 15 ROSA   15 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 15 ROSA 15 CM DIAMETRO </option>
                                    <option value="BALONA No 20 20 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 20 20 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 20 20 CM DIAMETRO </option>
                                    <option value="BALONA No 21.5 21.5 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 21.5 21.5 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 21.5 21.5 CM DIAMETRO </option>
                                    <option value="BALONA No 26 26 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 26 26 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 26 26 CM DIAMETRO </option>
                                    <option value="BALONA No 31 31 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 31 31 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 31 31 CM DIAMETRO </option>
                                    <option value="BALONA No 7 7 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 7 7 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 7 7 CM DIAMETRO </option>
                                    <option value="BALONA No 8 8 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 8 8 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 8 8 CM DIAMETRO </option>
                                    <option value="BALONA No 9 AZUL 9 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 9 AZUL 9 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 9 AZUL 9 CM DIAMETRO </option>
                                    <option value="BALONA No 9 ROSA 9 CM DIAMETRO" <?php echo ($ep2 == "BALONA No 9 ROSA 9 CM DIAMETRO") ? "selected" : ""; ?>>BALONA No 9 ROSA 9 CM DIAMETRO</option>
                              </select>
                              <br>
                              <select name="epres3" id="">
                                    <option value="N/A" <?php echo ($ep3 == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="FICHA BCA PARISINA" <?php echo ($ep3 == "FICHA BCA PARISINA") ? "selected" : ""; ?>>FICHA BCA PARISINA </option>
                                    <option value="FICHA METALICA 4.8CM DIAMETRO" <?php echo ($ep3 == "FICHA METALICA 4.8CM DIAMETRO") ? "selected" : ""; ?>>FICHA METALICA 4.8CM DIAMETRO </option>
                                    <option value="FICHA PLASTIC BCA 4.1 CM DIAMETRO" <?php echo ($ep3 == "FICHA PLASTIC BCA 4.1 CM DIAMETRO") ? "selected" : ""; ?>>FICHA PLASTIC BCA 4.1 CM DIAMETRO </option>
                                    <option value="FICHA PLASTIC NGA 4.1 CM DIAMETRO" <?php echo ($ep3 == "FICHA PLASTIC NGA 4.1 CM DIAMETRO") ? "selected" : ""; ?>>FICHA PLASTIC NGA 4.1 CM DIAMETRO </option>
                                    <option value="FICHA TUBO FAJA 89 MM DE 75 MM" <?php echo ($ep3 == "FICHA TUBO FAJA 89 MM DE 75 MM") ? "selected" : ""; ?>>FICHA TUBO FAJA 89 MM DE 75 MM </option>
                              </select>
                              <br>
                              <select name="epres4" id="">
                                    <option value="N/A" <?php echo ($ep4 == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="TUBO FAJA 19.5 X 7.5 CM" <?php echo ($ep4 == "TUBO FAJA 19.5 X 7.5 CM") ? "selected" : ""; ?>>TUBO FAJA 19.5 X 7.5 CM </option>
                                    <option value="TUBO No 9" <?php echo ($ep4 == "TUBO No 9") ? "selected" : ""; ?>>TUBO No 9 </option>
                                    <option value="TUBO No 10" <?php echo ($ep4 == "TUBO No 10") ? "selected" : ""; ?>>TUBO No 10 </option>
                                    <option value="TUBO No 14" <?php echo ($ep4 == "TUBO No 14") ? "selected" : ""; ?>>TUBO No 14 </option>
                                    <option value="TUBO No 16" <?php echo ($ep4 == "TUBO No 16") ? "selected" : ""; ?>>TUBO No 16 </option>
                                    <option value="TUBO No 18" <?php echo ($ep4 == "TUBO No 18") ? "selected" : ""; ?>>TUBO No 18 </option>
                                    <option value="TUBO No 20" <?php echo ($ep4 == "TUBO No 20") ? "selected" : ""; ?>>TUBO No 20 </option>
                                    <option value="TUBO No 25" <?php echo ($ep4 == "TUBO No 25") ? "selected" : ""; ?>>TUBO No 25 </option>
                              </select>
                              <br>
                              Sujeción de la punta final:
                              <select name="pfinal" id="">
                                    <option value="N/A" <?php echo ($pfinal == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="Alfiler" <?php echo ($pfinal == "Alfiler") ? "selected" : ""; ?>>Alfiler </option>
                                    <option value="2 Alfileres" <?php echo ($pfinal == "2 Alfileres") ? "selected" : ""; ?>>2 Alfileres </option>
                                    <option value="Broche transparente" <?php echo ($pfinal == "Broche transparente") ? "selected" : ""; ?>>Broche transparente </option>
                                    <option value="Entrelazado" <?php echo ($pfinal == "Entrelazado") ? "selected" : ""; ?>>Entrelazado </option>
                                    <option value="Masking" <?php echo ($pfinal == "Masking") ? "selected" : ""; ?>>Masking </option>
                                    <option value="Plastiflecha" <?php echo ($pfinal == "Plastiflecha") ? "selected" : ""; ?>>Plastiflecha </option>
                                    <option value="Cinta roja" <?php echo ($pfinal == "Cinta roja") ? "selected" : ""; ?>>Cinta roja </option>
                              </select>
                              <br>
                              Tipo de etiqueta individual:
                              <select name="emluna" id="">
                                    <option value="N/A" <?php echo ($eml == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="Media luna blanca/amarilla" <?php echo ($eml == "Media luna blanca/amarilla") ? "selected" : ""; ?>>Media luna blanca/amarailla </option>
                                    <option value="Cuadrada doble paso" <?php echo ($eml == "Cuadrada doble paso") ? "selected" : ""; ?>>Cuadrada doble paso </option>
                                    <option value="Media luna con logo/amarilla" <?php echo ($eml == "Media luna con logo/amarilla") ? "selected" : ""; ?>>Media luna con logo/amarilla </option>
                                    <option value="Media luna amarilla" <?php echo ($eml == "Media luna amarilla") ? "selected" : ""; ?>>Media luna amarilla </option>
                                    <option value="Etiqueta blanca/logo" <?php echo ($eml == "Etiqueta blanca/logo") ? "selected" : ""; ?>>Etiqueta blanca/logo </option>
                              </select>
                              <br>
                              Requiere emplayado o bolsa individual:
                              <select name="empbolsa" id="">
                                    <option value="N/A" <?php echo ($empbol == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="BOLSA INDIVIDUAL" <?php echo ($empbol == "BOLSA INDIVIDUAL") ? "selected" : ""; ?>>BOLSA INDIVIDUAL </option>
                                    <option value="EMPLAYADO" <?php echo ($empbol == "EMPLAYADO") ? "selected" : ""; ?>>EMPLAYADO </option>
                                    <option value="BOLSA PERFORADA" <?php echo ($empbol == "BOLSA PERFORADA") ? "selected" : ""; ?>>BOLSA PERFORADA </option>
                                    <option value="PLASTICO EN CAJA" <?php echo ($empbol == "PLASTICO EN CAJA") ? "selected" : ""; ?>>PLASTICO EN CAJA </option>
                                    <option value="PAPEL EN CAJA" <?php echo ($empbol == "PAPEL EN CAJA") ? "selected" : ""; ?>>PAPEL EN CAJA </option>
                              </select>
                              <br>
                              Etiquetas si va emplayado:
                              <input type="text" maxlength="40" size="40" name="eemplay" value="<?php echo $eempla; ?>" />
                              <br>
                              Cantidad final de la presentación: <input type="number" name="cpres" value="<?php echo $canp; ?>" />
                              <br>
                              Medida del empaque:
                              <select name="mempa" id="">
                                    <option value="N/A" <?php echo ($memp == "N/A") ? "selected" : ""; ?>>N/A </option>
                                    <option value="CAJA CYTESA 48 X 48 X 21.CM" <?php echo ($memp == "CAJA CYTESA 48 X 48 X 21.CM") ? "selected" : ""; ?>>CAJA CYTESA 48 X 48 X 21.CM </option>
                                    <option value="CAJA No 1 80 X 40 X 37 CM" <?php echo ($memp == "CAJA No 1 80 X 40 X 37 CM") ? "selected" : ""; ?>>CAJA No 1 80 X 40 X 37 CM </option>
                                    <option value="CAJA No 2 39 X33 X24 CM" <?php echo ($memp == "CAJA No 2 39 X33 X24 CM") ? "selected" : ""; ?>>CAJA No 2 39 X33 X24 CM </option>
                                    <option value="CAJA No 3 85 X 38 X 28 CM" <?php echo ($memp == "CAJA No 3 85 X 38 X 28 CM") ? "selected" : ""; ?>>CAJA No 3 85 X 38 X 28 CM </option>
                                    <option value="CAJA No 4 35 X 35 X 50 CM" <?php echo ($memp == "CAJA No 4 35 X 35 X 50 CM") ? "selected" : ""; ?>>CAJA No 4 35 X 35 X 50 CM </option>
                                    <option value="CAJA No 5 26.5 X 26.5 X 84CM" <?php echo ($memp == "CAJA No 5 26.5 X 26.5 X 84CM") ? "selected" : ""; ?>>CAJA No 5 26.5 X 26.5 X 84CM </option>
                                    <option value="CAJA No 6 54 X 39 X 39 CM" <?php echo ($memp == "CAJA No 6 54 X 39 X 39 CM") ? "selected" : ""; ?>>CAJA No 6 54 X 39 X 39 CM </option>
                                    <option value="CAJA No 7 61 X 39.4 X 30.5CM" <?php echo ($memp == "CAJA No 7 61 X 39.4 X 30.5CM") ? "selected" : ""; ?>>CAJA No 7 61 X 39.4 X 30.5CM </option>
                                    <option value="CAJA No 7 Char	61 X40.5 X 27.5" <?php echo ($memp == "CAJA No 7 Char 61 X40.5 X 27.5") ? "selected" : ""; ?>>CAJA No 7 Char 61 X40.5 X 27.5 </option>
                                    <option value="CAJA PONAN	39 X 33 X 15 CM" <?php echo ($memp == "CAJA PONAN 39 X 33 X 15 CM") ? "selected" : ""; ?>>CAJA PONAN 39 X 33 X 15 CM </option>
                                    <option value="BOLSA 25 X 60CM CAL60" <?php echo ($memp == "BOLSA 25 X 60CM CAL60") ? "selected" : ""; ?>>BOLSA 25 X 60CM CAL60 </option>
                                    <option value="BOLSA 25 X 61CM CAL60" <?php echo ($memp == "BOLSA 25 X 61CM CAL60") ? "selected" : ""; ?>>BOLSA 25 X 61CM CAL60 </option>
                                    <option value="BOLSA 30 X 62CM CAL60" <?php echo ($memp == "BOLSA 30 X 62CM CAL60") ? "selected" : ""; ?>>BOLSA 30 X 62CM CAL60 </option>
                                    <option value="BOLSA 33 X 130CM CAL300" <?php echo ($memp == "BOLSA 33 X 130CM CAL300") ? "selected" : ""; ?>>BOLSA 33 X 130CM CAL300 </option>
                                    <option value="BOLSA 39 X 110CM CAL100" <?php echo ($memp == "BOLSA 39 X 110CM CAL100") ? "selected" : ""; ?>>BOLSA 39 X 110CM CAL100 </option>
                                    <option value="BOLSA 39 X 110CM CAL300" <?php echo ($memp == "BOLSA 39 X 110CM CAL300") ? "selected" : ""; ?>>BOLSA 39 X 110CM CAL300 </option>
                                    <option value="BOLSA 39 X 70CM CAL 300" <?php echo ($memp == "BOLSA 39 X 70CM CAL 300") ? "selected" : ""; ?>>BOLSA 39 X 70CM CAL 300 </option>
                                    <option value="BOLSA 39 X 90CM CAL400" <?php echo ($memp == "BOLSA 39 X 90CM CAL400") ? "selected" : ""; ?>>BOLSA 39 X 90CM CAL400 </option>
                                    <option value="BOLSA 42 X 55CM CAL400" <?php echo ($memp == "BOLSA 42 X 55CM CAL400") ? "selected" : ""; ?>>BOLSA 42 X 55CM CAL400 </option>
                                    <option value="BOLSA 43 X 90CM CAL 400" <?php echo ($memp == "BOLSA 43 X 90CM CAL 400") ? "selected" : ""; ?>>BOLSA 43 X 90CM CAL 400 </option>
                                    <option value="BOLSA 44 X 110CM CAL400" <?php echo ($memp == "BOLSA 44 X 110CM CAL400") ? "selected" : ""; ?>>BOLSA 44 X 110CM CAL400 </option>
                                    <option value="BOLSA 46 X 70CM CAL300" <?php echo ($memp == "BOLSA 46 X 70CM CAL300") ? "selected" : ""; ?>>BOLSA 46 X 70CM CAL300 </option>
                                    <option value="BOLSA 47 X 110CM CAL 400" <?php echo ($memp == "BOLSA 47 X 110CM CAL 400") ? "selected" : ""; ?>>BOLSA 47 X 110CM CAL 400 </option>
                                    <option value="BOLSA 47 X 120CM CAL 500" <?php echo ($memp == "BOLSA 47 X 120CM CAL 500") ? "selected" : ""; ?>>BOLSA 47 X 120CM CAL 500 </option>
                                    <option value="BOLSA 55 X 120CM CAL400" <?php echo ($memp == "BOLSA 55 X 120CM CAL400") ? "selected" : ""; ?>>BOLSA 55 X 120CM CAL400 </option>
                                    <option value="BOLSA 60 X 110CM CAL400" <?php echo ($memp == "BOLSA 60 X 110CM CAL400") ? "selected" : ""; ?>>BOLSA 60 X 110CM CAL400 </option>
                                    <option value="BOLSA 67 X 100CM CAL400" <?php echo ($memp == "BOLSA 67 X 100CM CAL400") ? "selected" : ""; ?>>BOLSA 67 X 100CM CAL400 </option>
                                    <option value="BOLSA 67 X 70CM CAL400" <?php echo ($memp == "BOLSA 67 X 70CM CAL400") ? "selected" : ""; ?>>BOLSA 67 X 70CM CAL400 </option>
                                    <option value="BOLSA 70 X 110CM CAL400" <?php echo ($memp == "BOLSA 70 X 110CM CAL400") ? "selected" : ""; ?>>BOLSA 70 X 110CM CAL400 </option>
                                    <option value="CAJA TENECO 26.5 X 26.5 X 84 CM" <?php echo ($memp == "CAJA TENECO 26.5 X 26.5 X 84 CM") ? "selected" : ""; ?>>CAJA TENECO 26.5 X 26.5 X 84 CM </option>
                              </select>
                              <br>
                              Medida del empaque2:
                              <select name="mempa2" id="">
                                    <option value="N/A" <?php echo ($memp2 == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="CAJA CYTESA 48 X 48 X 21.CM" <?php echo ($memp2 == "CAJA CYTESA 48 X 48 X 21.CM") ? "selected" : ""; ?>>CAJA CYTESA 48 X 48 X 21.CM </option>
                                    <option value="CAJA No 1 80 X 40 X 37 CM" <?php echo ($memp2 == "CAJA No 1 80 X 40 X 37 CM") ? "selected" : ""; ?>>CAJA No 1 80 X 40 X 37 CM </option>
                                    <option value="CAJA No 2 39 X33 X24 CM" <?php echo ($memp2 == "CAJA No 2 39 X33 X24 CM") ? "selected" : ""; ?>>CAJA No 2 39 X33 X24 CM </option>
                                    <option value="CAJA No 3 85 X 38 X 28 CM" <?php echo ($memp2 == "CAJA No 3 85 X 38 X 28 CM") ? "selected" : ""; ?>>CAJA No 3 85 X 38 X 28 CM </option>
                                    <option value="CAJA No 4 35 X 35 X 50 CM" <?php echo ($memp2 == "CAJA No 4 35 X 35 X 50 CM") ? "selected" : ""; ?>>CAJA No 4 35 X 35 X 50 CM </option>
                                    <option value="CAJA No 5 26.5 X 26.5 X 84CM" <?php echo ($memp2 == "CAJA No 5 26.5 X 26.5 X 84CM") ? "selected" : ""; ?>>CAJA No 5 26.5 X 26.5 X 84CM </option>
                                    <option value="CAJA No 6 54 X 39 X 39 CM" <?php echo ($memp2 == "CAJA No 6 54 X 39 X 39 CM") ? "selected" : ""; ?>>CAJA No 6 54 X 39 X 39 CM </option>
                                    <option value="CAJA No 7 61 X 39.4 X 30.5CM" <?php echo ($memp2 == "CAJA No 7 61 X 39.4 X 30.5CM") ? "selected" : ""; ?>>CAJA No 7 61 X 39.4 X 30.5CM </option>
                                    <option value="CAJA No 7 Char	61 X40.5 X 27.5" <?php echo ($memp2 == "CAJA No 7 Char 61 X40.5 X 27.5") ? "selected" : ""; ?>>CAJA No 7 Char 61 X40.5 X 27.5 </option>
                                    <option value="CAJA PONAN	39 X 33 X 15 CM" <?php echo ($memp2 == "CAJA PONAN 39 X 33 X 15 CM") ? "selected" : ""; ?>>CAJA PONAN 39 X 33 X 15 CM </option>
                                    <option value="BOLSA 25 X 60CM CAL60" <?php echo ($memp2 == "BOLSA 25 X 60CM CAL60") ? "selected" : ""; ?>>BOLSA 25 X 60CM CAL60 </option>
                                    <option value="BOLSA 25 X 61CM CAL60" <?php echo ($memp2 == "BOLSA 25 X 61CM CAL60") ? "selected" : ""; ?>>BOLSA 25 X 61CM CAL60 </option>
                                    <option value="BOLSA 30 X 62CM CAL60" <?php echo ($memp2 == "BOLSA 30 X 62CM CAL60") ? "selected" : ""; ?>>BOLSA 30 X 62CM CAL60 </option>
                                    <option value="BOLSA 33 X 130CM CAL300" <?php echo ($memp2 == "BOLSA 33 X 130CM CAL300") ? "selected" : ""; ?>>BOLSA 33 X 130CM CAL300 </option>
                                    <option value="BOLSA 39 X 110CM CAL100" <?php echo ($memp2 == "BOLSA 39 X 110CM CAL100") ? "selected" : ""; ?>>BOLSA 39 X 110CM CAL100 </option>
                                    <option value="BOLSA 39 X 110CM CAL300" <?php echo ($memp2 == "BOLSA 39 X 110CM CAL300") ? "selected" : ""; ?>>BOLSA 39 X 110CM CAL300 </option>
                                    <option value="BOLSA 39 X 70CM CAL 300" <?php echo ($memp2 == "BOLSA 39 X 70CM CAL 300") ? "selected" : ""; ?>>BOLSA 39 X 70CM CAL 300 </option>
                                    <option value="BOLSA 39 X 90CM CAL400" <?php echo ($memp2 == "BOLSA 39 X 90CM CAL400") ? "selected" : ""; ?>>BOLSA 39 X 90CM CAL400 </option>
                                    <option value="BOLSA 42 X 55CM CAL400" <?php echo ($memp2 == "BOLSA 42 X 55CM CAL400") ? "selected" : ""; ?>>BOLSA 42 X 55CM CAL400 </option>
                                    <option value="BOLSA 43 X 90CM CAL 400" <?php echo ($memp2 == "BOLSA 43 X 90CM CAL 400") ? "selected" : ""; ?>>BOLSA 43 X 90CM CAL 400 </option>
                                    <option value="BOLSA 44 X 110CM CAL400" <?php echo ($memp2 == "BOLSA 44 X 110CM CAL400") ? "selected" : ""; ?>>BOLSA 44 X 110CM CAL400 </option>
                                    <option value="BOLSA 46 X 70CM CAL300" <?php echo ($memp2 == "BOLSA 46 X 70CM CAL300") ? "selected" : ""; ?>>BOLSA 46 X 70CM CAL300 </option>
                                    <option value="BOLSA 47 X 110CM CAL 400" <?php echo ($memp2 == "BOLSA 47 X 110CM CAL 400") ? "selected" : ""; ?>>BOLSA 47 X 110CM CAL 400 </option>
                                    <option value="BOLSA 47 X 120CM CAL 500" <?php echo ($memp2 == "BOLSA 47 X 120CM CAL 500") ? "selected" : ""; ?>>BOLSA 47 X 120CM CAL 500 </option>
                                    <option value="BOLSA 55 X 120CM CAL400" <?php echo ($memp2 == "BOLSA 55 X 120CM CAL400") ? "selected" : ""; ?>>BOLSA 55 X 120CM CAL400 </option>
                                    <option value="BOLSA 60 X 110CM CAL400" <?php echo ($memp2 == "BOLSA 60 X 110CM CAL400") ? "selected" : ""; ?>>BOLSA 60 X 110CM CAL400 </option>
                                    <option value="BOLSA 67 X 100CM CAL400" <?php echo ($memp2 == "BOLSA 67 X 100CM CAL400") ? "selected" : ""; ?>>BOLSA 67 X 100CM CAL400 </option>
                                    <option value="BOLSA 67 X 70CM CAL400" <?php echo ($memp2 == "BOLSA 67 X 70CM CAL400") ? "selected" : ""; ?>>BOLSA 67 X 70CM CAL400 </option>
                                    <option value="BOLSA 70 X 110CM CAL400" <?php echo ($memp2 == "BOLSA 70 X 110CM CAL400") ? "selected" : ""; ?>>BOLSA 70 X 110CM CAL400 </option>
                              </select>
                              <br>
                              Tipo de etiqueta final:
                              <select name="efin" id="">
                                    <option value="N/A" <?php echo ($efinal == "N/A") ? "selected" : ""; ?>>N/A</option>
                                    <option value="Cuadrada blanca" <?php echo ($efinal == "Cuadrada blanca") ? "selected" : ""; ?>>Cuadrada blanca </option>
                                    <option value="Cuadrada verde" <?php echo ($efinal == "Cuadrada verde") ? "selected" : ""; ?>>Cuadrada verde </option>
                                    <option value="verde y verde con lote" <?php echo ($efinal == "verde y verde con lote") ? "selected" : ""; ?>>verde y verde con lote </option>
                              </select>
                              <br>
                              Uso:
                              <input type="text" maxlength="50" size="50" name="uso" value="<?php echo $uso; ?>" />
                              <br>
                              Observaciones para el proceso de acabado: <br />
                              <textarea name="obs_aca1" rows="10" cols="100"><?php echo $obs_aca1; ?></textarea>
                              <br>
                              Observaciones para el proceso de empaque: <br />
                              <textarea name="obs_emp1" rows="10" cols="100"><?php echo $obs_emp1; ?></textarea>
                              <br>
                              <input type="submit" value="Guardar">

                              <?php
                              if ($_POST) {
                                    // $idcli = (isset($_POST["id-cliente"]))?$_POST["id-cliente"]:"";
                                    $idcli = (isset($_POST["cliente"])) ? $_POST["cliente"] : "";
                                    $mod  = (isset($_POST["model"])) ? $_POST["model"] : "";
                                    $temp = (isset($_POST["tempa"])) ? $_POST["tempa"] : "";
                                    $pres = (isset($_POST["prese"])) ? $_POST["prese"] : "";
                                    $ep1  = (isset($_POST["epres1"])) ? $_POST["epres1"] : "";
                                    $ep2  = (isset($_POST["epres2"])) ? $_POST["epres2"] : "";
                                    $ep3  = (isset($_POST["epres3"])) ? $_POST["epres3"] : "";
                                    $ep4  = (isset($_POST["epres4"])) ? $_POST["epres4"] : "";
                                    $can  = (isset($_POST["cant"])) ? $_POST["cant"] : "";
                                    $ume  = (isset($_POST["umed"])) ? $_POST["umed"] : "";
                                    $canp = (isset($_POST["cpres"])) ? $_POST["cpres"] : "";
                                    $memp = (isset($_POST["mempa"])) ? $_POST["mempa"] : "";
                                    $memp2 = (isset($_POST["mempa2"])) ? $_POST["mempa2"] : "";
                                    $eml  = (isset($_POST["emluna"])) ? $_POST["emluna"] : "";
                                    $empbol = (isset($_POST["empbolsa"])) ? $_POST["empbolsa"] : "";
                                    $eempla = (isset($_POST["eemplay"])) ? $_POST["eemplay"] : "";
                                    $matun = (isset($_POST["matu"])) ? $_POST["matu"] : "";
                                    $cortes  = (isset($_POST["corte"])) ? $_POST["corte"] : "";
                                    $defec = (isset($_POST["def"])) ? $_POST["def"] : "";
                                    $efinal = (isset($_POST["efin"])) ? $_POST["efin"] : "";
                                    $pfinal = (isset($_POST["pfinal"])) ? $_POST["pfinal"] : "";
                                    $uso = (isset($_POST["uso"])) ? $_POST["uso"] : "";
                                    $obs_aca1 = (isset($_POST["obs_aca1"])) ? $_POST["obs_aca1"] : "";
                                    $obs_emp1 = (isset($_POST["obs_emp1"])) ? $_POST["obs_emp1"] : "";
                                    $insertarData = "INSERT INTO eempaque(
                                                                                    cm_addr,
                                                                                    modelo,
                                                                                    tempaque,
                                                                                    present,
                                                                                    esp_pres1,
                                                                                    esp_pres2,
                                                                                    esp_pres3,
                                                                                    esp_pres4,
                                                                                    cantidad,
                                                                                    um,
                                                                                    canpres,
                                                                                    medempaque,
                                                                                    medempaque2,
                                                                                    etiluna,
                                                                                    emplaobol,
                                                                                    etiempla,
                                                                                    matune,
                                                                                    ncortes,
                                                                                    coddef,
                                                                                    etifinal,
                                                                                    puntafinal,
                                                                                    uso,
                                                                                    obs_aca1,
                                                                                    obs_emp1
                                                                                    ) 
                                                                                    VALUES (
                                                                                          '$idcli',
                                                                                          '$mod',
                                                                                          '$temp',
                                                                                          '$pres',
                                                                                          '$ep1',
                                                                                          '$ep2',
                                                                                          '$ep3',
                                                                                          '$ep4',
                                                                                          '$can',
                                                                                          '$ume',
                                                                                          '$canp',
                                                                                          '$memp',
                                                                                          '$memp2',
                                                                                          '$eml',
                                                                                          '$empbol',
                                                                                          '$eempla',
                                                                                          '$matun',
                                                                                          '$cortes', 
                                                                                          '$defec',
                                                                                          '$efinal',
                                                                                          '$pfinal',
                                                                                          '$uso',
                                                                                          '$obs_aca1',
                                                                                          '$obs_emp1'
                                                                                    )";
                                    mysqli_query($con, $insertarData);
                                    echo 'registro dado de alta';
                                    mysqli_close($con);
                                    $alta = 0;
                              }
                              ?>
                        </form>
                  </fieldset>
            <?php
            }
            ?>
      </main>
</body>

</html>