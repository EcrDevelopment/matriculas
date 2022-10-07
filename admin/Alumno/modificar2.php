<?php

include ('../include/session2.php');

    $id=$_POST['id'];

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
                
     $sSQL2="Update alumno Set nombre='$nombre', paterno='$porciones[0]', materno='$porciones[1]', direccion='$direccion', telefono='$telefono', genero='$tipo', correo='$correo', id_tutor='$tutor' Where id_alumno='$id'";
    mysql_query($sSQL2);
                
    header('Location: alumno.php');

        
?>