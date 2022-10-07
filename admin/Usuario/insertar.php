<?php

    
include ('../include/session2.php');


    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
    $pass=$_POST['nuevo'];
    $telefono=$_POST['telefono'];
    $tipo=$_POST['select'];

    $porciones = explode(" ", $apellido);
    //echo $porciones[0]; // porción1
    //echo $porciones[1]; // porción2


    $Sql="insert into usuario (usuario,password,tipo) values('".$usuario."','".$pass."','".$tipo."')";
		   
    mysql_query($Sql);
    $re=mysql_query("select id_usuario,tipo from usuario WHERE usuario='".$usuario."' and password='".$pass."'");
    $respuesta = mysql_fetch_row($re);
    
    $sSQL="insert into trabajador (nombre,materno,paterno,telefono,email,id_usuario) values('".$nombre."','".$porciones[1]."','".$porciones[0]."','".$telefono."','".$correo."','".$respuesta[0]."')";
    mysql_query($sSQL);
                
    

if(!$Sql)
{
  echo "<H1>Error</H1>";
 
}
else
{
	 header ("Location: usuario.php");
	
}

?>


?>