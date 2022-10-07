<?php
    
    require_once('../db/conexion.php'); 

    session_start();

    $re2=mysql_query("SELECT cursos.curso,notas.* FROM cursos,notas WHERE cursos.id_curso=notas.id_curso AND notas.id_alumno='".$_SESSION['id_alumno']."' ");

    //$enlace_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>MATRICULA</title>
        <link rel="stylesheet" href="../css/padres.css?v=2">
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
                        <a class="header-menu-tab" href="padres.php"><span class="icon fontawesome-user scnd-font-color"></span>Cuenta</a>
                    </li>
                    <!--<li>
                        <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Favorites</a>
                    </li>-->
                </ul>
                <div class="profile-menu">
                    <p><?php echo $_SESSION['usuario']; ?><a href="#26"><span class="entypo-down-open scnd-font-color"></span></a></p>
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
                            <a class="menu-box-tab" href="matricula.php"><span class="icon entypo-paper-plane scnd-font-color"></span>Matricula</a>                            
                        </li>
                        <li>
                            <a class="menu-box-tab" href="horario.php"><span class="icon entypo-calendar scnd-font-color"></span>Horario</a>                            
                        </li>
                        <li>
                            <a class="menu-box-tab" href="pagos.php"><sapn class="icon entypo-chart-line scnd-font-color"></sapn>Pagos<div class="menu-box-number"><?php echo $_SESSION['pago_alumno']; ?></div></a>
                        </li>  
                        <li>
                            <a class="menu-box-tab" href="notas.php"><sapn class="icon entypo-chart-line scnd-font-color"></sapn>Notas</a>
                        </li>    
                        <li>
                            <a class="menu-box-tab" href="#12"><span class="icon entypo-cog scnd-font-color"></span>Configuraciones</a>
                        </li>                    
                    </ul>
                </div>
            
        </div>
        
        <div class="middle-container container2">
                <div class="profile block"> <!-- PROFILE (MIDDLE-CONTAINER) -->
                    <h2 class="titular">NOTAS</h2>
                    <table class="egt">
                      <tr>
                        <th>Curso</th>
                        <th>N1</th>
                        <th>N2</th>
                        <th>N3</th>
                        <th>N4</th>
                        <th>N5</th>
                        <th>P</th>
                      </tr>
                       <?php 
                            while($row =mysql_fetch_array($re2)){  
                        ?>
                       <tr>
                           
                            <td><?php echo $row['curso']; ?></td>
                            <td><input name="n1" type="number" max="20" min="0" value="<?php echo $row['n1']; ?>" disabled></td>
                            <td><input name="n2" type="number" value="<?php echo $row['n2']; ?>" disabled></td>
                            <td><input name="n3" type="number" value="<?php echo $row['n3']; ?>" disabled></td>
                            <td><input name="n4" type="number" value="<?php echo $row['n4']; ?>" disabled></td><td><input name="n5" type="number" value="<?php echo $row['n5']; ?>" disabled></td>
                            <input type="submit" value="sdd" class="ocu">
                
                            <td><?php echo  ($row['n1']+$row['n2']+$row['n3']+$row['n4']+$row['n5'])/5; ?></td>
                       </tr>
                         
                       <?php 
                            } 
                        ?>
                      </table>
                </div>
        </div> 
    </body>
</html>