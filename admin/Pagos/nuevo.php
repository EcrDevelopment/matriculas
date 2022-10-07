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
    <center><h1>Pago</h1></center>
        <form action="insertar.php" method="post">
          
            <div class="modificar">
                <h3>NUEVO PAGO</h3>
                <h4>Concepto : </h4>
                <input type="text" name="concepto" value="" required autocomplete="off" autofocus>
                <h4>Monto : </h4>
                <input type="text" name="monto" value="" required autocomplete="off">
                <h4>Fecha : </h4>
                <input  type="date" name="fecha" value="" required autocomplete="off">
                <button>INSERTAR</button>
            </div>
        </form>
    
  </body>
</html>
