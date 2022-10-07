<?php
    include ('../include/session2.php');
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>MATRICULA</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabla.css?v3">
    <script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
  </head>
  <body>
    <?php
        include ('../include/menu.php');
    ?>
    <center><h1>Aula</h1></center>
        <form action="insertar.php" method="post">
          
            <div class="modificar">
                <h3>NUEVA AULA</h3>
                <h4>Edificio : </h4>
                <input type="text" name="edificio" value="" required autocomplete="off" autofocus>
                <h4>Salon : </h4>
                <input type="text" name="salon" value="" required autocomplete="off">
                <h4>Turno : </h4>
                <input type="text" name="turno" value="" required autocomplete="off">
                <h4>Grupo : </h4>
                <input type="text" name="grupo" value="" required autocomplete="off">
                <h4>Capacidad :</h4>
                <input type="text" name="capacidad" value="" required autocomplete="off">
                <button>INSERTAR</button>
            </div>
        </form>
    
  </body>
</html>
