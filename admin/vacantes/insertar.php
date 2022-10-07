<?php

    
include ('../include/session2.php');


    $nombre=$_POST['grupo'];
    $edificio=$_POST['edificio'];
    $salon=$_POST['salon'];
    $turno=$_POST['turno'];
    $capacidad=$_POST['capacidad'];
    

    //echo $porciones[0]; // porción1
    //echo $porciones[1]; // porción2


    $Sql="insert into grupo (nombre,capacidad,turno) values('".$nombre."','".$capacidad."','".$turno."')";
		   
    mysql_query($Sql);
    $re=mysql_query("select idgrupo from grupo WHERE nombre='".$nombre."' and capacidad='".$capacidad."' and turno='".$turno."'");
    $respuesta = mysql_fetch_row($re);
    
    $sSQL="insert into aula (nombre,edificio,salon,grupo_id) values('".$nombre."','".$edificio."','".$salon."','".$respuesta[0]."')";
    mysql_query($sSQL);
                
    

if(!$Sql)
{
  echo "<H1>Error</H1>";
 
}
else
{
	 header ("Location: vacantes.php");
	
}

?>


?>