<?php

include ('../include/session2.php');

$id2=$_POST['id'];
$nombre=$_POST['nombre'];

    $sSQL="Update cursos Set curso='$nombre'Where id_curso='$id2'";
    mysql_query($sSQL);
                
                
    header('Location: curso.php');

        
?>