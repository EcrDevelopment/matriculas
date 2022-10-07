<?php

    
include ('../include/session2.php');


    $nombre=$_POST['nombre'];

    $sSQL="insert into cursos (curso) values('".$nombre."')";
    mysql_query($sSQL);
                
    

if(!$sSQL)
{
  echo "<H1>Error</H1>";
 
}
else
{
	 header ("Location: curso.php");
	
}

?>
