<?php

include ('../include/session2.php');

$id2=$_POST['id'];
$nombre=$_POST['nombre'];
$grupo=$_POST['grupo'];

    $sSQL="Update horario Set nombre='$nombre', id_grupo='$grupo' Where id_horario='$id2'";
    mysql_query($sSQL);
                
                
    header('Location: modificar.php?id='.$id2.'');

        
?>