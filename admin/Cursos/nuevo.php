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
    <center><h1>Curso</h1></center>
        <form action="insertar.php" method="post">
          
            <div class="modificar">
                <h3>NUEVO CURSO</h3>
                <h4>Curso : </h4>
                <input type="text" name="nombre" value="" required autocomplete="off" autofocus>
                <button>INSERTAR</button>
            </div>
        </form>
    
  </body>
</html>
