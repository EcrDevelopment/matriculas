<?php
    
    require_once('../db/conexion.php'); 

    session_start();

    $re=mysql_query("SELECT COUNT(*) total FROM pagos");
    $cooo = mysql_fetch_assoc($re);

    $re2=mysql_query("SELECT alumno.* FROM alumno,tutor,usuario WHERE alumno.id_tutor=tutor.idtutor and usuario.id_usuario=tutor.id_usuario and usuario.id_usuario='".$_SESSION['id']."'");
    $cooo2 = mysql_fetch_assoc($re2);
    $_SESSION['id_alumno']=$cooo2['id_alumno'];

    $re3=mysql_query("select COUNT(*) total from alumno,pagos,factura WHERE pagos.id_pago=factura.id_pago and  factura.id_alumno=alumno.id_alumno and alumno.id_alumno='".$_SESSION['id_alumno']."'");
    $pago = mysql_fetch_assoc($re3);

    $_SESSION['pago_alumno']=$cooo['total']-$pago['total'];

    $re4=mysql_query("SELECT grupo.* from grupo,inscripcion WHERE grupo.idgrupo=inscripcion.grupo_id and inscripcion.alumno_id='".$_SESSION['id_alumno']."'");
    $grupo = mysql_fetch_assoc($re4);

    $_SESSION['grupo']=$grupo['idgrupo'];
    
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
                    <h2 class="titular">DETALLES</h2>
                    <ul class="menu-box-menu">
                        <li>
                            <a class="menu-box-tab" href="#8"><span class="icon scnd-font-color"> </span>Alumno : <?php echo $cooo2['paterno']." ".$cooo2['materno']." ".$cooo2['nombre']; ?></a>                            
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
                        <?php
                            if(!is_null($grupo['idgrupo'])){
                        ?>
                        <li>
                            <a class="menu-box-tab" href="#8"><span class="icon scnd-font-color"> </span>Grupo : <?php echo $grupo['nombre']; ?></a>                            
                        </li>      
                        <?php
                            }
                        ?>
                    </ul>
                </div>
        </div> 
    </body>
</html>