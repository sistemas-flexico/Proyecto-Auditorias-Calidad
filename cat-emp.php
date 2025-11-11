<!-- Script de un formulario para registrar especificaciones de empaque por cliente. -->

<?php
$acliente="";
$amodelo="";
$atiptono="";
$aempaque="";
$apresentacion="";
$aesppres="";
$ametros = 0;
$aum = "";
$acantidad = 0;
$medida="";
$etiml="";
$aempla_bolsa="";
$aetiempla="";
$amatune="";
$acortes = 0;
$adefectos="";

if($_POST){
   $rdgLenguaje= (isset($_POST["atiptono"]))?$_POST["atiptono"]:"";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Especificación de empaque por cliente</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
             <div class="col-sm-12 text-center">
                  <h2 style="color:#124578"></h2>
             </div>
        </div>
        <div class="row">
            <div  class="col-md-6 offset-md-3 text-danger hidden">
                <h1 id="divError"> </h1>
            </div>
        </div>
        <div class="row"> 
             <div class="col-sm-12 text-center">
                  <img src="img/fondo.png" class="img-fluid">       
             </div>
        </div>
    </div>
    
    
      <fieldset>
          <legend>Especificaciones de empaque por cliente</legend>
          <form action=" " method = "POST">
                Cliente: <input type="text" name="acliente" />  
                Modelo: <input type="text" style="width: 328px" name="amodelo" /> <br/> 
                <!--   <INPUT id=text1 style="WIDTH: 228px; HEIGHT: 98px"  -->
                Tipo de empaque: <input type="text" name="aempaque" /> <br/>
                Presentación (Carrete, Rollo, Caja o Bolsa): <input type="text" name="apresentacion" /> <br/> 
                Especificación de la presentación: <input type="text" name="aesppres" /> <br/>
                Cantidad:  <input type="text" style="width: 328px" name="ametros" /> <br/> 
                Unidad de medida (mts/yds): <input type="text" style="width: 328px" name="aum" /> <br/> 
                Cantidad de rollos, carretes, bolsas : <input type="text" name="acantidad" /> <br/>
                Medida de carrete bolsa y/o caja: <input type="text" style="width: 328px" name="amedida" /> <br/> 
                Lleva etiq. de media luna?: <input type="text" style="width: 328px" name="aetiml" /> <br/> 
                Requiere emplayado o bolsa individual: <input type="text" style="width: 328px" name="aempla_bolsa" /> <br/> 
                Etiquetas que requiere si va emplayado: <input type="text" style="width: 328px" name="aetiempla" /> <br/> 
                Material con el que se une corte: <input type="text" style="width: 328px" name="amatune" /> <br/> 
                Número de cortes que tolera: <input type="text" style="width: 328px" name="acortes" /> <br/> 
                Código de los defectos que audita: <input type="text" style="width: 328px" name="adefectos" /> <br/> 
                <br/>
                <input type="submit" value="Guardar especificación">
          </form>
      </fieldset>
</body>
</html>