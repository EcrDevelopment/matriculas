<?php
    
    require_once('../db/conexion.php'); 

    session_start();

    $re2=mysql_query("SELECT profesor.* FROM profesor,usuario WHERE profesor.id_usuario=usuario.id_usuario and usuario.id_usuario='".$_SESSION['id_p']."'");
    $cooo2 = mysql_fetch_assoc($re2);

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>MATRICULA</title>
        <link rel="stylesheet" href="../css/padres.css">
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
                        <a class="header-menu-tab" href="#2"><span class="icon fontawesome-user scnd-font-color"></span>Cuenta</a>
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
                            <a class="menu-box-tab" href="#8"><span class="icon entypo-paper-plane scnd-font-color"></span>Profesor</a>                            
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
                    <h2 class="titular">DETALLES</h2>
                    <ul class="menu-box-menu">
                        <li>
                            <a class="menu-box-tab" href="#8"><span class="icon scnd-font-color"> </span>Nombre : <?php echo $cooo2['paterno']." ".$cooo2['materno']." ".$cooo2['nombre']; ?></a>                            
                        </li>    
                        <li>
                            <a class="menu-box-tab" href="#8"><span class="icon scnd-font-color"> </span>Direccion : <?php echo $cooo2['direccion']; ?></a>                            
                        </li>  
                        <li>
                            <a class="menu-box-tab" href="#8"><span class="icon scnd-font-color"> </span>Telefono : <?php echo $cooo2['telefono']; ?></a>                            
                        </li>      
                        <li>
                            <a class="menu-box-tab" href="#8"><span class="icon scnd-font-color"> </span>Correo : <?php echo $cooo2['correo']; ?></a>                            
                        </li>                   
                    </ul>
                </div>
        </div> 
    </body>
</html>