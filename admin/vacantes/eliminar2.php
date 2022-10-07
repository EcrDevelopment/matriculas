<?php

include "../../db/conexion.php";

    //Recibir los datos 
    $id=$_GET['id'];
    $id2=$_GET['id2'];
    $nom=$_GET['nom'];
    $Sql="DELETE FROM inscripcion WHERE Idinscripcion='$id'";
		   
    mysql_query($Sql);


if(!$Sql)
{
  echo "<h1>ERROR</h1>";
 
}
else
{
	 header ("Location: matriculados.php?id=".$id2."&nom=".$nom."");
	
}

?>