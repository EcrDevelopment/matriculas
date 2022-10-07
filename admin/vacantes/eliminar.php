<?php

include "../../db/conexion.php";

    //Recibir los datos 
    $id=$_GET['id'];
    $id2=$_GET['id2'];
    $Sql="DELETE FROM grupo WHERE idgrupo='$id'";
    $Sql2="DELETE FROM aula WHERE grupo_id='$id2'";
		   
    mysql_query($Sql);
    mysql_query($Sql2);


if(!$Sql)
{
  echo "<h1>ERROR</h1>";
 
}
else
{
	 header ("Location: vacantes.php");
	
}

?>