<?php
    
    require_once('../db/conexion.php'); 

    session_start();

    $re=mysql_query("SELECT COUNT(*) total FROM pagos");
    $cooo = mysql_fetch_assoc($re);

    $re3=mysql_query("select pagos.id_pago from alumno,pagos,factura WHERE pagos.id_pago=factura.id_pago and  factura.id_alumno=alumno.id_alumno and alumno.id_alumno='".$_SESSION['id_alumno']."'");
    $numero = mysql_num_rows($re3);

    $_SESSION['pago_alumno']=$cooo['total']-$numero;

    $re2=mysql_query("SELECT * FROM pagos");

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
                            <a class="menu-box-tab" href="#13"><sapn class="icon entypo-chart-line scnd-font-color"></sapn>Pagos<div class="menu-box-number"><?php echo $_SESSION['pago_alumno']; ?></div></a>
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
                    <table class="egt">
                      <tr>
                        <th>Pago</th>
                        <th>Monto</th>
                        <th>Fecha Limite</th>
                        <th></th>
                      </tr>
                       <?php 
                            while($row =mysql_fetch_array($re2)){
                                
                            $re4=mysql_query("select pagos.id_pago from alumno,pagos,factura WHERE pagos.id_pago=factura.id_pago and  factura.id_alumno=alumno.id_alumno and alumno.id_alumno='".$_SESSION['id_alumno']."' and pagos.id_pago='".$row['id_pago']."'");
                            $numero2 = mysql_num_rows($re4);                   
    
                            if($numero2<=0){
                        ?>
                       <tr>
                        <form  action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario" target="_blank">
                           <input type="hidden" name="cmd" value="_cart">
					       <input type="hidden" name="upload" value="1">
					       <input type="hidden" name="business" value="tu_correo_paypal@gmail.com">
					       <input type="hidden" name="currency_code" value="USD">
                           
                           <input type="hidden" name="item_name_1" value="<?php echo $row['concepto'];?>">
						   <input type="hidden" name="amount_1" value="<?php echo $row['monto'];?>">
						   <input	type="hidden" name="quantity_1" value="1">	
                           
                            <td><?php echo $row['concepto']; ?></td>
                            <td><?php echo $row['monto']; ?></td>
                            <td><?php echo $row['fecha_limite']; ?></td>
                            <td><input type="submit" value="PAGAR" class="aceptar" ></td>
                          </form>
                       </tr>
                         
                       <?php 
                            } }
                        ?>
                      </table>
                </div>
        </div> 
    </body>
</html>