<?php

    
include ('../include/session2.php');


    $tutor=$_POST['tutor'];
    $alumno=$_POST['alumno'];
    $grupo=$_POST['grupo'];

    $re=mysql_query("select COUNT(grupo_id) as total from inscripcion WHERE grupo_id='".$grupo."' ");
    $respuesta = mysql_fetch_row($re);

    $re2=mysql_query("select COUNT(idgrupo) as total,capacidad from grupo WHERE idgrupo='".$grupo."' ");
    $respuesta2 = mysql_fetch_row($re2);
        
    if($respuesta2[1]>$respuesta[0]){
        $sSQL="insert into inscripcion (fecha,tutor_id,alumno_id,grupo_id) values('".date('Y-m-d')."','".$tutor."','".$alumno."','".$grupo."')";
        mysql_query($sSQL);
        
        if(!$sSQL)
        {
          echo "<H1>Error</H1>";

        }
        else
        {
             header ("Location: inscripcion.php");

        }
        
    }else{
        echo "<H1>Error</H1>";
        header ("Location: inscripcion.php");
    }

?>
