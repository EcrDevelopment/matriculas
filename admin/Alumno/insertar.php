<?php

    
include ('../include/session2.php');


    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $tipo=$_POST['select'];
    $tutor=$_POST['tutor'];

    $porciones = explode(" ", $apellido);
    //echo $porciones[0]; // porción1
    //echo $porciones[1]; // porción2

    $sSQL="insert into alumno (nombre,paterno,materno,direccion,telefono,genero,correo,id_tutor) values('".$nombre."','".$porciones[1]."','".$porciones[0]."','".$direccion."','".$telefono."','".$tipo."','".$correo."','".$tutor."')";
    mysql_query($sSQL);
                
    

if(!$sSQL)
{
  echo "<H1>Error</H1>";
 
}
else
{
	 header ("Location: alumno.php");
	
}

?>
