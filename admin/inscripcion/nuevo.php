<?php
    include ('../include/session2.php');

    $re=mysql_query("SELECT idtutor,paterno,materno,nombre FROM tutor");
    $re2=mysql_query("SELECT id_alumno,paterno,materno,nombre FROM alumno");
    $re3=mysql_query("SELECT idgrupo,nombre,turno FROM grupo");


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
    <center><h1>Inscripcion</h1></center>
        <form action="insertar.php" method="post">
          
            <div class="modificar">
                <h3>NUEVO CURSO</h3>
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
                <h4>Alumno : </h4>
                <select name="alumno">
                           <?php
                                while ($ver=mysql_fetch_row($re2)) {
                           ?>
                                <option value="<?php echo $ver[0]; ?>"><?php echo $ver[1]." ".$ver[2]." ".$ver[3]; ?></option>
                            <?php
                                }
                            ?>
                </select>
                <h4>Grupo : </h4>
                <select name="grupo">
                           <?php
                                while ($ver=mysql_fetch_row($re3)) {
                           ?>
                                <option value="<?php echo $ver[0]; ?>"><?php echo $ver[1]." ".$ver[2]; ?></option>
                            <?php
                                }
                            ?>
                </select>
                <button>INSERTAR</button>
            </div>
        </form>
    
  </body>
</html>
