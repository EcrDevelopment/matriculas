<?php

include "../../db/conexion.php";

    //Recibir los datos 
    $id=$_GET['id'];
    $id2=$_GET['id2'];
    $Sql2="DELETE FROM horario_d WHERE id_deta='$id'";
		   
    mysql_query($Sql2);


if(!$Sql2)
{
  echo "<h1>ERROR</h1>";
 
}
else
{
	 header ("Location: nuevo.php?id=".$id2."");
	
}

?>