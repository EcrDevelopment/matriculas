<?php
   
 session_start();
    require_once('../db/conexion.php');

    if(isset($_SESSION['id_gg'])){
        
        $re=mysql_query("select COUNT(grupo_id) as total from inscripcion WHERE grupo_id='".$_SESSION['id_gg']."' ");
        $respuesta = mysql_fetch_row($re);

        $re2=mysql_query("select COUNT(idgrupo) as total,capacidad from grupo WHERE idgrupo='".$_SESSION['id_gg']."' ");
        $respuesta2 = mysql_fetch_row($re2);

        $_SESSION['id_ggd']=$respuesta2[1]-$respuesta[0];
        
        echo $respuesta2[1]-$respuesta[0];
    }else{
        //echo $_SESSION['id_gg']."dd";
    }

    
?>