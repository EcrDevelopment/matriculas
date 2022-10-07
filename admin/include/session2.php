<?php
    session_start();
    require_once('../../db/conexion.php'); 
    mysql_query("SET NAMES 'utf8'");

    if(!isset($_SESSION['id_a']) && !isset($_SESSION['tipo_a'])){
        header('Location: ../../');
    }
?>