<?php

include ('../include/session2.php');

$id=$_POST['id2'];
$id2=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$usuario=$_POST['usuario'];
$pass=$_POST['nuevo'];
$telefono=$_POST['telefono'];
//$tipo=$_POST['select'];

$porciones = explode(" ", $apellido);
//echo $porciones[0]; // porción1
//echo $porciones[1]; // porción2
    
    $sSQL="Update profesor Set nombre='$nombre', materno='$porciones[1]', paterno='$porciones[0]' ,correo='$correo', telefono='$telefono' Where id_profesor='$id2'";
    mysql_query($sSQL);
                
     $sSQL2="Update usuario Set usuario='$usuario', password='$pass', tipo='$tipo' Where id_usuario='$id'";
    mysql_query($sSQL2);
                
    header('Location: profesor.php');

        
?>