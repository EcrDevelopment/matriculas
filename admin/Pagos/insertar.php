<?php

    
include ('../include/session2.php');


    $concepto=$_POST['concepto'];
    $monto=$_POST['monto'];
    $fecha=$_POST['fecha'];
    
    //echo $porciones[0]; // porción1
    //echo $porciones[1]; // porción2

    $Sql="insert into pagos (concepto,monto,fecha_limite) values('".$concepto."','".$monto."','".$fecha."')";
		   
    mysql_query($Sql);
                
    

if(!$Sql)
{
  echo "<H1>Error</H1>";
 
}
else
{
	 header ("Location: pagos.php");
	
}

?>


?>