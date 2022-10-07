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
    <center><h1>Usuarios</h1></center>
        <form action="insertar.php" method="post">
          
            <div class="modificar">
                <h3>NUEVO USUARIO</h3>
                <h4>Nombre : </h4>
                <input type="text" name="nombre" value="" required autocomplete="off" autofocus>
                <h4>Apellido : </h4>
                <input type="text" name="apellido" value="" required autocomplete="off">
                <h4>Correo : </h4>
                <input type="email" name="correo" value="" required autocomplete="off">
                <h4>Telefono :</h4>
                <input type="telefono" name="telefono" value="" required autocomplete="off">
                <h4>Tipo : </h4>
                <select name="select">
                  <option value="1">Operador</option> 
                  <option value="2">Padres</option>
                  <option value="3">Profesor</option>
                </select>
                <h4>Usuario : </h4>
                <input type="text" name="usuario" value="" required autocomplete="off">
                <h4>Password : </h4>
                <input class="<?php echo $error; ?>" type="password" name="nuevo" value="" required autocomplete="off">
                <button>INSERTAR</button>
            </div>
        </form>
    
  </body>
</html>
