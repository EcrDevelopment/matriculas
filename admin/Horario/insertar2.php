<?php

    
include ('../include/session2.php');


    $id=$_POST['id'];
    $inicio=$_POST['inicio'];
    $fin=$_POST['fin'];
    $dia=$_POST['select'];
    $curso=$_POST['curso'];
    $profesor=$_POST['profesor'];
    //$tipo=$_POST['select'];

    $porciones = explode("-", $dia);
    //echo $porciones[0]; // porción1
    //echo $porciones[1]; // porción2

    $sSQL="insert into horario_d (id_horario,dia,dia_nombre,id_curso,hora_i,hora_f,id_profesor) values('".$id."','".$porciones[0]."','".$porciones[1]."','".$curso."','".$inicio."','".$fin."','".$profesor."')";
    mysql_query($sSQL);
                
    

if(!$sSQL)
{
  echo "<H1>Error</H1>";
 
}
else
{
	 header ("Location: nuevo.php?id=".$id."");
	
}

?>
