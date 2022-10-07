<?php
    include ('../include/session2.php');

    $re=mysql_query("SELECT idtutor,paterno,materno,nombre FROM tutor");
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
    <center><h1>Alumnos</h1></center>
        <form action="insertar.php" method="post">
          
            <div class="modificar">
                <h3>NUEVO ALUMNOS</h3>
                <h4>Nombre : </h4>
                <input type="text" name="nombre" value="" required autocomplete="off" autofocus>
                <h4>Apellido : </h4>
                <input type="text" name="apellido" value="" required autocomplete="off">
                <h4>Correo : </h4>
                <input type="email" name="correo" value="" required autocomplete="off">
                <h4>Telefono :</h4>
                <input type="telefono" name="telefono" value="" required autocomplete="off">
                <h4>Direccion : </h4>
                <input type="text" name="direccion" value="" required autocomplete="off">
                <h4>Tipo : </h4>
                <select name="select">
                  <option value="M">Masculino</option> 
                  <option value="F">Femenino</option>
                </select>
                <h4>Tutor : </h4>
                <select name="tutor">
                           <?php
                                while ($ver=mysql_fetch_row($re)) {
                           ?>
                                <option value="<?php echo $ver[0]; ?>"><?php echo $ver[1]." ".$ver[2]." ".$ver[3]; ?></option>
                            <?php
                                }
                            ?>
                </select>
                <button>INSERTAR</button>
            </div>
        </form>
    
  </body>
</html>
