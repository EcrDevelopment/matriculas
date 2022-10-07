<?php

include "../../db/conexion.php";

    //Recibir los datos 
    $id=$_GET['id'];
    $Sql2="DELETE FROM inscripcion WHERE Idinscripcion='$id'";
		   
    mysql_query($Sql2);

if(!$Sql2)
{
  echo "<h1>ERROR</h1>";
 
}
else
{
	 header ("Location: inscripcion.php");
	
}

?>