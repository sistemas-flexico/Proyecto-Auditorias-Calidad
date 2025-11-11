<!-- Script de la página que edita el catálogo de los tipos de empaque. -->

<!DOCTYPE html>
<html>
    <style>
        .css1{
          font-size:24px;
          font-family:Verdana,  Helvetica;
          font-weight:bold;
          color:black;
          background: #339999;
          border: 5px outset;
          width:800px;
          height:600px;
  
        }   
        .css2{
          font-size:24px;
          font-family:Verdana,  Helvetica;
          font-weight:bold;
          color:black;
        }
        body{
            font-size:24px;
            background-attachment: fixed;
        }
        </style>
        <head>
             <title> CAT tipos de empaque</title>
        </head>
        <body background="fondo1.png">
             <center><h1> Catálogo tipos de empaque  </h1></center>
             <?php
                    include("conex.php");
                    $tempa = $_REQUEST['idm'];
                    
                    $query = "SELECT * FROM tipo_empaque WHERE tempaque = '$tempa' ";
                    $resultado = $con->query($query);
                    $row = $resultado->fetch_assoc();
                    echo $row;
                    echo $tempa;
             ?>       
         <center><br/> 
             <form class="css1" action="act_tipe.php?id2=<?php echo $row['tempaque']; ?>" method="POST" enctype="multipart/form-data" ></br></br>  
               <input class="css2" type="text" REQUIRED name="empaque" placeholder="empaque..." value="<?php echo $row['empaque']; ?>"/><br/><br/>
               <img height="100px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img1']); ?>"/><br/>
               <input class="css2" type="file" REQUIRED name="img1"/><br/>
               <img height="100px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img2']); ?>"/><br/>
               <input class="css2" type="file" name="img2"/><br/>
               <img height="100px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img3']); ?>"/><br/>
               <input class="css2" type="file" name="img3"/><br/><br/>
               <input class="css2" type="submit" value="Aceptar">
            </form>
    </center>
    </body>
  </html>