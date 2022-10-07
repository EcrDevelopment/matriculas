<?php

include "../../db/conexion.php";

    //Recibir los datos 
    $id=$_GET['id'];
    $Sql2="DELETE FROM horario WHERE id_horario='$id'";
		   
    mysql_query($Sql2);

    $Sql1="DELETE FROM horario_d WHERE id_horario='$id'";
		   
    mysql_query($Sql1);


if(!$Sql2)
{
  echo "<h1>ERROR</h1>";
 
}
else
{
	 header ("Location: horario.php");
	
}

?>