<?php

    
include ('../include/session2.php');


    $nombre=$_POST['nombre'];
    $grupo=$_POST['grupo'];

    $sSQL="insert into horario (nombre,id_grupo) values('".$nombre."','".$grupo."')";
    mysql_query($sSQL);

    $re=mysql_query("select id_horario,nombre from horario WHERE nombre='".$nombre."' and id_grupo='".$grupo."' ");
    $respuesta = mysql_fetch_row($re);
                
    

if(!$sSQL)
{
  echo "<H1>Error</H1>";
 
}
else
{
	 header ("Location: nuevo.php?id=".$respuesta[0]."");
	
}

?>
