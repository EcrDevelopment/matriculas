<?php
    
    require_once('../db/conexion.php'); 

    session_start();



    $idc=$_GET['idc'];
    $idg=$_GET['idg'];
    $idp=$_GET['idp'];

    $re2=mysql_query("SELECT alumno.id_alumno, alumno.paterno, alumno.materno, alumno.nombre FROM alumno,inscripcion WHERE alumno.id_alumno=inscripcion.alumno_id and inscripcion.grupo_id='".$idg."' ORDER BY alumno.paterno DESC ");

    $re2aa=mysql_query("SELECT COUNT(id_asistencia) as total,id_asistencia FROM asistencia WHERE fecha='".date("Y-m-d")."' and id_grupo='".$idg."' and id_curso='".$idc."' and id_profesor='".$idp."' ");
    $respuesta = mysql_fetch_row($re2aa);

    if($respuesta[0]>0){
        $last_id=$respuesta[1];
    }else{
        $inser=mysql_query("INSERT INTO asistencia (fecha,id_grupo,id_curso,id_profesor) VALUES ('".date("Y-m-d")."','".$idg."','".$idc."','".$idp."')");
        $last_id = mysql_insert_id();
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>MATRICULA</title>
        <link rel="stylesheet" href="../css/padres.css?v=1">
        <style>
        
            table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 18px;         width: 100%; text-align: left;    border-collapse: collapse; margin-top: 10px; }

th {     font-size: 19px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
        </style>
    </head>
    <body>
        <div class="main-container">
             <header class="block">
                <ul class="header-menu horizontal-list">
                    <li>
                        <a class="header-menu-tab" href="#1"><span class="icon entypo-cog scnd-font-color"></span>Configuracion</a>
                    </li>
                    <li>
                        <a class="header-menu-tab" href="#3"><span class="icon fontawesome-envelope scnd-font-color"></span>Notificaciones</a>
                        <a class="header-menu-number" href="#4">5</a>
                    </li>
                    <li>
                        <a class="header-menu-tab" href="profe.php"><span class="icon fontawesome-user scnd-font-color"></span>Cuenta</a>
                    </li>
                    <!--<li>
                        <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Favorites</a>
                    </li>-->
                </ul>
                <div class="profile-menu">
                    <p><?php echo $_SESSION['usuario_p']; ?><a href="#26"><span class="entypo-down-open scnd-font-color"></span></a></p>
                    <div class="profile-picture small-profile-picture">
                        <img width="40px" alt="Anne Hathaway picture" src="https://www.oblatos.com/wp-content/uploads/2013/03/estudiante.jpg">
                    </div>
                    
                </div>
            </header>
            
            <div class="left-container container">
                <div class="menu-box block"> <!-- MENU BOX (LEFT-CONTAINER) -->
                    <h2 class="titular">MENU</h2>
                    <ul class="menu-box-menu">
                        <li>
                            <a class="menu-box-tab" href="profe.php"><span class="icon entypo-paper-plane scnd-font-color"></span>Matricula</a>                            
                        </li>
                        <li>
                            <a class="menu-box-tab" href="horario.php"><span class="icon entypo-calendar scnd-font-color"></span>Horario</a>                            
                        </li>
                        <li>
                            <a class="menu-box-tab" href="asistencia.php"><sapn class="icon entypo-chart-line scnd-font-color"></sapn>Asistencia<div class="menu-box-number"></div></a>
                        </li>    
                        <li>
                            <a class="menu-box-tab" href="#12"><span class="icon entypo-cog scnd-font-color"></span>Configuraciones</a>
                        </li>                    
                    </ul>
                </div>
            
        </div>
        
        <div class="middle-container container2">
                <div class="profile block"> <!-- PROFILE (MIDDLE-CONTAINER) -->
                    <h2 class="titular">ASISTENCIA</h2>
                    <table class="egt">
                      <tr>
                        <th>Alumno</th>
                        <th>A</th>
                        <th>T</th>
                        <th>F</th>
                      </tr>
                       <form method="post" action="in_asistencia.php" >
                       <input id="prodId" name="prodId" type="hidden" value="<?php echo $last_id; ?>">
                       <?php 
                            $i=1;
                            while($row =mysql_fetch_array($re2)){  
                        ?>
                       <tr>
                            <td><?php echo $row['paterno']." ".$row['materno']." ".$row['nombre']; ?></td>
                            <td><input type="radio" name="optradio[<?php echo $i; ?>]" value="<?php echo $row['id_alumno']."-A-".$last_id; ?>" required ></td>
                            <td><input type="radio" name="optradio[<?php echo $i; ?>]" value="<?php echo $row['id_alumno']."-T-".$last_id; ?>" required ></td>
                            <td><input type="radio" name="optradio[<?php echo $i; ?>]" value="<?php echo $row['id_alumno']."-F-".$last_id; ?>" required ></td>
                       </tr>
                         
                       <?php 
                            $i++;
                            } 
                        ?>
                      </table>
                      <br>
                       &nbsp;&nbsp;<button type="submit" class="btn btn-success" name="submit">Guardar</button>
                        </form>
                </div>
        </div> 
    </body>
</html>