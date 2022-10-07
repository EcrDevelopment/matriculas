<?php

include "../../db/conexion.php";

    //Recibir los datos 
    $id=$_GET['id'];
    $Sql="DELETE FROM alumno WHERE id_alumno='$id'";
		   
    mysql_query($Sql);


if(!$Sql)
{
  echo "<h1>ERROR</h1>";
 
}
else
{
	 header ("Location: usuario.php");
	
}

?>