<?php

include ('../include/session2.php');

$id=$_POST['id'];
 $concepto=$_POST['concepto'];
    $monto=$_POST['monto'];
    $fecha=$_POST['fecha'];
                
     $sSQL2="Update pagos Set concepto='$concepto', monto='$monto', fecha_limite='$fecha' Where id_pago='$id'";
    mysql_query($sSQL2);
                
    header('Location: pagos.php');

        
?>