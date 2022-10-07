<?php

include ('../include/session2.php');

$id1=$_POST['id'];
$id2=$_POST['id2'];
$id3=$_POST['id3'];
$inicio=$_POST['inicio'];
    $fin=$_POST['fin'];
    $dia=$_POST['select'];
    $curso=$_POST['curso'];
    $profesor=$_POST['profesor'];
    //$tipo=$_POST['select'];

    $porciones = explode("-", $dia);
    //echo $porciones[0]; // porción1
    //echo $porciones[1]; // porción2

    $sSQL="Update horario_d Set dia='$porciones[0]', dia_nombre='$porciones[1]', id_curso='$curso', hora_i='$inicio', hora_f='$fin', id_profesor='$profesor'  Where id_deta='$id1'";
    mysql_query($sSQL);
                
    if($id3=='m'){
        header('Location: modificar.php?id='.$id2.'');
    }else{
        header('Location: nuevo.php?id='.$id2.'');
    }            
    

        
?>