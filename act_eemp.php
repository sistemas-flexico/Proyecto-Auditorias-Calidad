# Script que actualiza datos en una base de datos

<?php

  if($_POST){
    $idcli = (isset($_POST["id-cliente"]))?$_POST["id-cliente"]:"";
    $mod  = (isset($_POST["modelo"]))?$_POST["modelo"]:"";
    $temp = (isset($_POST["tempa"]))?$_POST["tempa"]:"";
    $pres = (isset($_POST["prese"]))?$_POST["prese"]:"";
    $ep1  = (isset($_POST["epres1"]))?$_POST["epres1"]:"";
    $ep2  = (isset($_POST["epres2"]))?$_POST["epres2"]:"";
    $ep3  = (isset($_POST["epres3"]))?$_POST["epres3"]:"";
    $ep4  = (isset($_POST["epres4"]))?$_POST["epres4"]:"";
    $can  = (isset($_POST["cant"]))?$_POST["cant"]:"";
    $ume  = (isset($_POST["umed"]))?$_POST["umed"]:"";
    $canp = (isset($_POST["cpres"]))?$_POST["cpres"]:"";
    $memp = (isset($_POST["mempa"]))?$_POST["mempa"]:"";
    $memp2 = (isset($_POST["mempa2"]))?$_POST["mempa2"]:"";
    $eml  = (isset($_POST["emluna"]))?$_POST["emluna"]:"";
    $empbol = (isset($_POST["empbolsa"]))?$_POST["empbolsa"]:"";
    $eempla = (isset($_POST["eemplay"]))?$_POST["eemplay"]:"";
    $matun = (isset($_POST["matu"]))?$_POST["matu"]:"";
    $cortes  = (isset($_POST["corte"]))?$_POST["corte"]:"";
    $defec = (isset($_POST["def"]))?$_POST["def"]:"";
    $efinal = (isset($_POST["efin"]))?$_POST["efin"]:"";
    $pfinal = (isset($_POST["pfinal"]))?$_POST["pfinal"]:"";
    $uso = (isset($_POST["uso"]))?$_POST["uso"]:"";
    $obs_aca1 = (isset($_POST["obs_aca1"]))?$_POST["obs_aca1"]:"";
    
    $obs_emp1 = (isset($_POST["obs_emp1"]))?$_POST["obs_emp1"]:"";

    include('config.php');    

               $updateData =  ("UPDATE eempaque SET tempaque='" .$temp. "',
                                                    present='" .$pres. "',
                                                    esp_pres1='" .$ep1. "',
                                                    esp_pres2='" .$ep2. "',
                                                    esp_pres3='" .$ep3. "',
                                                    esp_pres4='" .$ep4. "',
                                                    cantidad='" .$can. "',
                                                    um='" .$ume. "',
                                                    canpres = '" .$canp. "',
                                                    medempaque = '" .$memp. "',
                                                    medempaque2 = '" .$memp2. "',
                                                    etiluna    = '" .$eml. "',
                                                    emplaobol  = '" .$empbol. "',
                                                    etiempla   = '" .$eempla. "',
                                                    matune = '" .$matun. "',
                                                    ncortes = '" .$cortes. "',
                                                    coddef = '" .$defec. "',
                                                    etifinal  = '" .$efinal. "',
                                                    puntafinal  = '" .$pfinal. "',
                                                    uso  = '" .$uso. "',
                                                    obs_aca1 = '" .$obs_aca1. "',
                                                    obs_emp1 = '" .$obs_emp1. "'
                                                    
                                                                                             
                                WHERE cm_addr='".$idcli."' and  modelo='".$mod."'
                             ");
                             
               $result_update = mysqli_query($con, $updateData);

    }      

  mysqli_close($con);           
  header("Location: eempaque.php");    
?>

 
