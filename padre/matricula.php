<?php
    
    require_once('../db/conexion.php'); 

    session_start();

    if(isset($_POST['status'])){
        $_SESSION['id_gg']=$_POST['status'];
    }else{
        $_SESSION['id_gg']=0;
    }

    $re2=mysql_query("SELECT alumno.* FROM alumno,tutor,usuario WHERE alumno.id_tutor=tutor.idtutor and usuario.id_usuario=tutor.id_usuario and usuario.id_usuario='".$_SESSION['id']."'");
    $cooo2 = mysql_fetch_assoc($re2);

    $re4=mysql_query("SELECT tutor.* FROM tutor,usuario WHERE usuario.id_usuario=tutor.id_usuario and usuario.id_usuario='".$_SESSION['id']."'");
    $cooo4 = mysql_fetch_assoc($re4);

    $re=mysql_query("SELECT COUNT(*) total FROM pagos");
    $cooo = mysql_fetch_assoc($re);

    $re3=mysql_query("SELECT idgrupo,nombre FROM grupo");
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>MATRICULA</title>
        <link rel="stylesheet" href="../css/padres.css?v=4">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

        function getTimeAJAX() {

            //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

            var time = $.ajax({

                url: 'consuta.php', //indicamos la ruta donde se genera la hora
                    dataType: 'text',//indicamos que es de tipo texto plano
                    async: false     //ponemos el parámetro asyn a falso
            }).responseText;

            //actualizamos el div que nos mostrará la hora actual
            document.getElementById("myWatch").innerHTML = time;
        }

        //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
        setInterval(getTimeAJAX,1000);

    </script>
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
                    <h2 class="titular">MATRICULA</h2>
                    
                    <div class="conteo" id='myWatch'>
                        
                    </div>
                    <br>
                    <form action="matricula.php" method="post">
                                <p href="#">&nbsp;&nbsp;Grupo :</p>
                
                                 <select class="select-css" id="status" name="status" onchange="this.form.submit()" >
                                 <option value="0">Grupo</option>
                               <?php
                                    while ($ver=mysql_fetch_row($re3)) {
                               ?>
                                    <option <?php if($ver[0]==$_SESSION['id_gg']){ echo 'selected';} ?> value="<?php echo $ver[0]; ?>"><?php echo $ver[1]; ?></option>
                                <?php
                                    }
                                ?>
                    </select>
                    </form>
                   <ul class="menu-box-menu">
                        <li>
                            <a class="menu-box-tab" href="#8"><span class="icon scnd-font-color"> </span>Alumno : <?php echo $cooo2['paterno']." ".$cooo2['materno']." ".$cooo2['nombre']; ?></a>                            
                        </li> 
                        <li>
                            <a class="menu-box-tab" href="#8"><span class="icon scnd-font-color"> </span>Tutor : <?php echo $cooo4['paterno']." ".$cooo4['materno']." ".$cooo4['nombre']; ?></a>                            
                        </li> 
                    </ul>
                     <form action="matricula2.php" method="post">
                     <input type="hidden" name="alumno" value='<?php echo $cooo2['id_alumno']; ?>'>
                     <input type="hidden" name='tutor' value='<?php echo $cooo4['idtutor']; ?>'>
                     <input type="hidden" name='grupo' value='<?php echo $_SESSION['id_gg']; ?>'>
                     <br>
                     <CENTER><input type="submit" value="INSCRIBIR" class="aceptar" <?php if($_SESSION['id_gg']==0){ echo 'disabled="true"';} if($_SESSION['id_ggd']==0){ echo 'disabled="true"';} ?></inpu></CENTER>
                    </form>
                </div>
        </div> 
    </body>
</html>