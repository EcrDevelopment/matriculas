<?php

include ('../include/session2.php');

$id=$_POST['id'];
$id2=$_POST['id2'];
$nombre=$_POST['grupo'];
    $edificio=$_POST['edificio'];
    $salon=$_POST['salon'];
    $turno=$_POST['turno'];
    $capacidad=$_POST['capacidad'];

    
    $sSQL="Update grupo Set nombre='$nombre', capacidad='$capacidad', turno='$turno' Where idgrupo='$id2'";
    mysql_query($sSQL);
                
     $sSQL2="Update aula Set nombre='$nombre', edificio='$edificio', salon='$salon' Where grupo_id='$id2'";
    mysql_query($sSQL2);
                
    header('Location: vacantes.php');

        
?>