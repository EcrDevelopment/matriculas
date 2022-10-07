<?php

require_once('../db/conexion.php'); 

$tutor=$_POST['tutor'];
    $alumno=$_POST['alumno'];
    $grupo=$_POST['grupo'];

$sSQL="insert into inscripcion (fecha,tutor_id,alumno_id,grupo_id) values('".date('Y-m-d')."','".$tutor."','".$alumno."','".$grupo."')";
        mysql_query($sSQL);
        
        if(!$sSQL)
        {
          echo "<H1>Error</H1>";

        }
        else
        {
             header ("Location: padres.php");

        }

?>