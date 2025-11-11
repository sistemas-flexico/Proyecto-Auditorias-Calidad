<!-- Script que muestra un catálogo de imágenes de los tipos de empaque. -->

<!DOCTYPE html>
<html>
    <style>
      .css1{
        font-size:24px;
        font-family:Verdana,  Helvetica;
        font-weight:bold;
        color:black;
        background: lightyellow;
        border: 5px outset;
      }
    body{
        font-size:25px;
        background-attachment: fixed;
        background-size: cover;  
    }
    <a>{
        color: #FF8000;
    }
    
    
  </style>

    <head>
         <title> Muestra tipos de empaque </title>
    </head>
    <body background="fondo1.png">
        <center><h1>CATALOGO tipos de imagen</h1> </center>
        <center>
         <table class="css1" width="1000" height="360" border="1" bgcolor="FFFFF">
            <thead>
                <tr height="60" >
                    <th colspan="7"><a href="cat_empaque.php">Agrega nuevo</a></th>
                </tr>
                <tr height="60">
                    <th width="80" >tip_emp</th>
                    <th width="80" >empaque</th>
                    <th width="120" >imagen1</th>
                    <th width="120" >imagen2</th>
                    <th width="120" >imagen3</th>
                    <th width="100" colspan="2">Operaciones</th>  
                </tr>

            </thead>
             <tbody>
        <?php
            include("conex.php");
            $query = "SELECT * FROM tipo_empaque order by tempaque";
            $resultado = $con->query($query);
            while($row = $resultado->fetch_assoc()){
        ?>   
              <tr>
                  <td width="260"><center><?php echo $row['tempaque']; ?></center></td>
                  <td width="800"><center><?php echo $row['empaque']; ?></center></td>
                  <td><center><img height="110px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img1']);?>"/></center></td>
                  <td><center><img height="110px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img2']);?>"/></center></td>
                  <td><center><img height="110px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img3']);?>"/></center></td>
                  <th width="420" ><a href="modificar.php?idm=<?php echo $row['tempaque'];?>">modificar</a></th>
             <!--     <th width="420" ><a href="eliminar.php?idm=<?php echo $row['tempaque'];?>">eliminar</a></th> -->
                                   
             </tr>
        <?php
            }   
        ?>
         <a href="menu.html">Inicio</a>
        </tbody>
        </table>
        </center>
        <br/>
    <br/>
    
    </body>
    </html>