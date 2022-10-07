<?php
    
    require_once('../db/conexion.php'); 

    session_start();

    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");

    $re2=mysql_query("SELECT horario_d.dia_nombre,profesor.id_profesor,grupo.idgrupo,cursos.id_curso,cursos.curso,grupo.nombre FROM horario,horario_d,cursos,profesor,usuario,grupo WHERE horario.id_horario=horario_d.id_horario and horario_d.id_curso=cursos.id_curso and horario_d.id_profesor=profesor.id_profesor and grupo.idgrupo=horario.id_grupo and profesor.id_usuario=usuario.id_usuario and usuario.id_usuario='".$_SESSION['id_p']."' ORDER BY horario_d.dia ASC ");

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>MATRICULA</title>
        <link rel="stylesheet" href="../css/padres.css?v=3">
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
                            <a class="menu-box-tab" href="profe.php"><span class="icon entypo-paper-plane scnd-font-color"></span>Profesor</a>                            
                        </li>
                        <li>
                            <a class="menu-box-tab" href="horario.php"><span class="icon entypo-calendar scnd-font-color"></span>Horario</a>                            
                        </li>
                        <li>
                            <a class="menu-box-tab" href="asistencia.php"><sapn class="icon entypo-chart-line scnd-font-color"></sapn>Asistencia - Notas<div class="menu-box-number"></div></a>
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
                        <th>Curso</th>
                        <th>Grupo</th>
                        <th></th>
                      </tr>
                       <?php while($row =mysql_fetch_array($re2)){  ?>
                       <tr>
                            <td><?php echo $row['curso']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><center>
                            <?php
                                if($dias[date("w")]==$row['dia_nombre']){                            
                            ?>
                                <a class="edi" href="asistencia_n.php?idc=<?php echo $row['id_curso']; ?>&idg=<?php echo $row['idgrupo']; ?>&idp=<?php echo $row['id_profesor']; ?>" >Asistencia +</a>
                            <?php
                                }else{
                            ?>
                                <a class="edi2" href="#" >Asistencia +</a>
                            <?php
                                }
                            ?>
                                <a class="edi3" href="notas.php?idc=<?php echo $row['id_curso']; ?>&idg=<?php echo $row['idgrupo']; ?>&idp=<?php echo $row['id_profesor']; ?>" >Notas</a>
                                </center>
                            </td>
                       </tr>
                         
                       <?php } ?>
                    </table>
                    
                </div>
        </div> 
    </body>
</html>