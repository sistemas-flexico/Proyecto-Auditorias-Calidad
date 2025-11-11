<!-- Script que consulta y visualiza información relacionada con criterios de calidad del cliente, especificaciones de empaques para un modelo e imágenes del tipo de empaque. -->

<!DOCTYPE html>
<html>
    <style>
        .css1{
          font-size:18px;
          font-family:Verdana,  Helvetica;
          font-weight:bold;
          color:black;
          background: lightblue;
          border: 5px outset;
          width:800px;
          height:500px;
          text-align: left;
  
        }   
        .css2{
          font-size:14px;
          font-family:Verdana,  Helvetica;
          font-weight:bold;
          color:black;
          background: lightblue;
          border: 5px outset;
          width:1000px;
          height:1350px;
          text-align: left;
        }
        .css3{
          font-size:18px;
          font-family:Verdana,  Helvetica;
          font-weight:bold;
          color:black;
          background: lightblue;
          border: 5px outset;
          width:800px;
          height:500px;
          
        }

        body{
            font-size:24px;
            background-attachment: fixed;
        }
    </style>
        <head>
             <title> Auditoria de calidad Empaque </title>
        </head>
        <body background="img/fondo3.png">
           <center><h1 style="color:red"> Auditoría de calidad empaque  </h1></center>

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
    </div>



                    
         <center>
          <form action=" " method="POST" enctype="multipart/form-data" class="css1" >                          
          
                <input type="text" style="color: black; background-color: aqua ; height:40px; width:200px; font-size: 24px  "  REQUIRED name="id-cliente" placeholder="Id del cliente..." value="" /> <br/>
                <input type="text" style="color: black; background-color: aqua ; height:40px; width:200px; font-size: 24px  " REQUIRED name="modelo" placeholder="Modelo" value=""/> 
                <input type="submit" style=" font-size: 24px  "  value="Consultar">
                <?php
                   $idcli=0;
                   if($_POST){
                      $idcli = (isset($_POST["id-cliente"]))?$_POST["id-cliente"]:"";
                       $mod   = (isset($_POST["modelo"]))?$_POST["modelo"]:"";             
                    }
                    include('config.php');
                    $sqlClientes = ("SELECT * FROM cm_mstr WHERE cm_addr ='".($idcli)."' ");
                    $queryData   = mysqli_query($con, $sqlClientes);
                    $t_clientes = mysqli_num_rows($queryData);
                    while ($data = mysqli_fetch_array($queryData)){      
                          echo "<br/>";
                          echo $mod; 
                          echo " ".$data['cm_sort'] ."<br/><br/>"; 
                          echo "<div style='color: red;'>Nivel de exigencia <br/></div>"; 
                          echo " ".$data['nivel'] ."<br/><br/>"; 
                          echo "<div style='color: red;'>Que es lo que más le revisa a su producto el cliente: <br/></div>"; 
                          echo " ".$data['rev1'] ."<br/>";  
                          echo " ".$data['rev2'] ."<br/>";   
                          echo " ".$data['rev3'] ."<br/>";    
                          
                        /*  if($data['rev1'] != "N/A"){
                            echo " ".$data['rev1'] ."<br/>";   
                          }
                          if($data['rev2'] != "N/A"){
                            echo " ".$data['rev2'] ."<br/>";   
                          }
                          if($data['rev3'] != "N/A"){
                            echo " ".$data['rev3'] ."<br/><br/>";   
                          }*/
                          echo "<br/>";
                          echo "<div style='color: red;'>Requiere composición: </div>".$data['compo'] ."<br/><br/>"; 
                          echo "<div style='color: red;'>Tipo de luz con la que el cliente audita el tono: <br/></div>"; 
                         /* if ($data['atono1'] != "N/A") {
                             echo " ".$data['atono1'] ."<br/>"; 
                          }
                          if ($data['atono2'] != "N/A") {
                            echo " ".$data['atono2'] ."<br/>"; 
                          }
                          if ($data['atono3'] != "N/A") {
                            echo " ".$data['atono3'] ."<br/>"; 
                          }
                          if ($data['atono4'] != "N/A") {
                            echo " ".$data['atono4'] ."<br/>"; 
                          }
                          if ($data['atono5'] != "N/A") {
                            echo " ".$data['atono5'] ."<br/>"; 
                          }
                          if ($data['atono6'] != "N/A") {
                            echo " ".$data['atono6'] ."<br/>"; 
                          } */
                          echo " ".$data['atono1'] ."<br/>"; 
                          echo " ".$data['atono2'] ."<br/>";
                          echo " ".$data['atono3'] ."<br/>"; 
                          echo " ".$data['atono4'] ."<br/>"; 
                          echo " ".$data['atono5'] ."<br/>"; 
                          echo " ".$data['atono6'] ."<br/>";                      
                
                    }              
                ?>


          </form>
         </center>
        
         <center>
          <form action=" " method="POST" enctype="multipart/form-data" class="css2" >                                         
                 <?php
                     $sqlempaque = ("SELECT * FROM eempaque WHERE cm_addr ='".($idcli)."'  AND  modelo = '".$mod."' ");
                     $queryDataemp   = mysqli_query($con, $sqlempaque);
                     $t_emp = mysqli_num_rows($queryDataemp);
                     if ($t_emp > 0){
                        while ($data = mysqli_fetch_array($queryDataemp)) { 
                            echo "<br/>" ;
                            echo "<div style='color: red;'>Códigos de defecto que audita: <br/></div>" ;
                            echo " ".$defec=$data['coddef']."<br/><br/>" ;
                            echo "<div style='color: red;'>Número de cortes que tolera: </div>".$cortes=$data['ncortes']."<br/><br/>" ;
                            if($data['matune'] != "N/A"){
                              echo "<div style='color: red;'>Material con el que se une el corte: </div>".$matun=$data['matune']."<br/><br/>" ;
                            }

                            $tipempaq = $data['tempaque'];
                            
                           /* echo "    tipo empaque: ".$data['tempaque'] ."<br/><br/>" ; */
                           
                            echo "<div style='color: red;'>    Presentación: </div>".$data['present']."<br/><br/>" ;

                            if ($data['um'] != "N/A"){

                                echo "<div style='color: red;'>Cantidad por carrete, rollo o caja: </div>".$can = $data['cantidad']."  ".$ume = $data['um']."<br/><br/>";
                             }
                             
                       /*     echo " ".$ep1 = $data['esp_pres1']."<br/>" ;
                            echo " ".$ep2 = $data['esp_pres2']."<br/>" ;
                            echo " ".$ep3 = $data['esp_pres3']."<br/>" ;
                            echo " ".$ep4 = $data['esp_pres4']."<br/><br/>" ;*/
                            $ep1 = $data['esp_pres1'];
                            $ep2 = $data['esp_pres2'];
                            $ep3 = $data['esp_pres3'];
                            $ep4 = $data['esp_pres4'];
                            if (($ep1 != "N/A") AND ($ep2 != "N/A") AND ($ep3 != "N/A") AND ($ep4 != "N/A") ){
                                
                              }
                              ELSE{
                                echo "<div style='color: red;'>Especificaciones de la presentación: <br/></div>";
                              }
                                          
                            if ($ep1 != "N/A" ){
                                echo $ep1;
                                echo "<br/>";
                            }
                            
                            if ( $ep2 != "N/A") {
                                echo $ep2;
                                echo "<br/>";
                            }
                            
                            if ( $ep3 != "N/A"){
                                echo $ep3;
                                echo "<br/>";

                            }
                            if ( $ep4 != "N/A") {
                                echo $ep4;
                                echo "<br/>";
                            } 
                            echo "<br/>";
                            
                            if($data['puntafinal'] != "N/A"){
                              echo "<div style='color: red;'>Sujeción de la punta final: </div>".$pfinal=$data['puntafinal']."<br/><br/>";                           
                            }

                            if($data['etiluna'] != "N/A"){
                              echo "<div style='color: red;'>Tipo de etiqueta individual: </div>".$eml= $data['etiluna']."<br/><br/>" ;
                           }
                           if($data['emplaobol'] != "N/A" ){
                            echo "<div style='color: red;'>Requiere emplayado o bolsa individual: </div>".$empbol=$data['emplaobol']."<br/><br/>" ;
                           } 
                           echo "<div style='color: red;'>Etiquetas si va emplayado: </div>".$eempla=$data['etiempla']."<br/><br/>" ;
                            
                            echo "<div style='color: red;'>Cantidad final de la presentación: </div>".$canp = $data['canpres']."<br/><br/>";
                            if($data['medempaque'] != "N/A"){                           
                               echo "<div style='color: red;'>Medida del empaque: </div>".$memp = $data['medempaque']."<br/><br/>" ;                            
                            }
                            if($data['medempaque2'] != "N/A"){                           
                               echo "<div style='color: red;'>Medida del empaque2: </div>".$memp2 = $data['medempaque2']."<br/><br/>" ;                            
                            }
                            
                            
                            if($data['etifinal'] != "N/A"){
                               echo "<div style='color: red;'>Tipo de etiqueta final: </div>".$efinal=$data['etifinal']."<br/><br/>";                           
                            }
                            echo "<div style='color: red;'>Uso: </div>".$efinal=$data['uso']."<br/><br/>" ;                           

                            echo "<div style='color: red;'>Observaciones para el proceso de acabado: <br/> </div>";
                            echo " ".$obs_aca1=$data['obs_aca1']."<br/><br/>";
                            
                            echo "<div style='color: red;'>Observaciones para el proceso de empaque: <br/> </div>";
                            echo " ".$obs_emp1=$data['obs_emp1']."<br/><br/>";
                            
                       }
                    }
                    else{
                    //  $mensaje = "El modelo no corresponde al cliente ... ";
                    //  echo "<script type='text/javascript'>alert('$mensaje');</script>";
                      echo "El modelo no corresponde al cliente ... ";
                    }                               
                ?>
          </form>
         </center>

         <center><h1> </h1> </center>
        <center>
         <table class="css3" width="1000" height="360" border="1" bgcolor="FFFFF">
            <thead>
                
         
        <?php
            include("conex.php");
            $query = "SELECT * FROM tipo_empaque WHERE tempaque = '".$tipempaq."'";
            $resultado = $con->query($query);
            while($row = $resultado->fetch_assoc()){
        ?>   
              <tr height="60" >                      
                    <th colspan="7"> <center><?php echo "<div style='color: red;'>Tipo de empaque: </div>".$tipempaq." - ".$row['empaque']." "; ?></center> </th>
              </tr>

              <tr>
                  <td><center><img height="400px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img1']);?>"/></center></td>
                  <td><center><img height="400px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img2']);?>"/></center></td>
                  <td><center><img height="400px" src="data:image/jpeg;base64,<?php echo base64_encode($row['img3']);?>"/></center></td>
                                                     
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