<?php
$con=mysql_connect("localhost","root","")or die("no se ha podido establecer la conexion");
$sdb=mysql_select_db('matricula',$con)or die("la base de datos no existe");
?>