<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="./css/cat_empaque.css">
   <title>Carga de Imágenes de Empaque</title>
</head>

<body>
   <header>
      <div class="container-fluid">
         <div class="row">
            <div>
               <img src="img/logo-flexico.png" alt="Descripción" class="img-logo" />
               <span>CARGA DE IMÁGENES</span>
               <a href="menu.html">Volver al menú de inicio</a>
               <a href="index.html">Cerrar sesión</a>
            </div>
         </div>
      </div>
   </header>

   <main>
      <form action="guarda-ima.php" method="POST" enctype="multipart/form-data">
         <input type="text" REQUIRED name="tempa" placeholder="Código del tipo de empaque" value="">
         <input type="text" REQUIRED name="empaque" placeholder="Tipo de empaque" value="">
         <input type="file" REQUIRED name="imagen1">
         <input type="file" name="imagen2">
         <input type="file" name="imagen3">
         <input type="submit" value="Aceptar" class="btn">
      </form>
   </main>
</body>

</html>