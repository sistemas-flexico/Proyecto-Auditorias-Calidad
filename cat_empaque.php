<!-- Script de una página para registrar o dar de alta nuevos tipos de empaque con la opción de subir 3 imágenes como máximo. -->

<!DOCTYPE html>

<html>

 <style>
 .css1 {
    font-size:14px;
    font-family:verdana,helvetica;
 }
 .css2 {
    font-size:14px;
    font-family:verdana,helvetica;
 }
 body{
    font: size 25px;
    background-attachment: fixed;
 }
    
 </style>

<head>
 <title> CATALOGO DE TIPOS DE EMPAQUE </title>
 </head> 

<center>
    <body background="fondo1.png">
       <center><h1>  CATALOGO Tipos de empaque </h1></center>
       <br/>
       <br/>
       <form action="guarda-ima.php" method="POST" enctype="multipart/form-data" class="css1" >
         <br/>
         <br/>
         <input class="css2" type="text" REQUIRED name="tempa" placeholder="# de Tipo de empaque" value="" />  <br/><br/>
         <input class="css2" type="text" REQUIRED name="empaque" placeholder="Tipo de empaque..." value="" /> <br/><br/>
         <input class="css2" type="file" REQUIRED name="imagen1" /> <br/><br/>
         <input class="css2" type="file" name="imagen2" /> <br/><br/>
         <input class="css2" type="file" name="imagen3" /> <br/><br/>
         <input class="css2" type="submit" value="Aceptar">         
       </form>
    </body>
</center>
</html>