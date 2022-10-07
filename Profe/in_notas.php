<?php

    require_once('../db/conexion.php'); 

    $id=$_POST['prodId'];
    $ruta=$_POST['ruta'];
    $n1=$_POST['n1'];
    $n2=$_POST['n2'];
    $n3=$_POST['n3'];
    $n4=$_POST['n4'];
    $n5=$_POST['n5'];

    $sSQL2="Update notas Set n1='$n1', n2='$n2', n3='$n3', n4='$n4', n5='$n5' Where id_nota='$id'";
    mysql_query($sSQL2);

    //echo $sSQL2;
                
    header('Location: '.$ruta.'');

?>