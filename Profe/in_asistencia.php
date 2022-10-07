<?php 

require_once('../db/conexion.php'); 

 $Sql2="DELETE FROM asistencia_d WHERE id_asistencia='".$_POST['prodId']."'";
 mysql_query($Sql2);

 foreach($_POST['optradio'] as $option_num => $option_val){
    echo $option_num." ".$option_val."<br>";
     
     $porciones = explode("-", $option_val);
    
    $sSQL="insert into asistencia_d (id_alumno,estado,id_asistencia) values('".$porciones[0]."','".$porciones[1]."','".$porciones[2]."')";
    mysql_query($sSQL);   
 }

 if(!$sSQL)
{
  echo "<H1>Error</H1>";
 
}
else
{
	 header ("Location: asistencia.php");
	
}

?>