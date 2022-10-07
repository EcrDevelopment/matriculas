<?php
    require_once('db/conexion.php'); 
    
?>
<!DOCTYPE html>
<html lamg="es">
    <head>
    <meta charset="utf-8">
    <title>MATRICULA</title>
    <link rel="stylesheet" href="css/principal.css?v=3">
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
        <div class="principal">
            <div class="cabeza">
                
                <div class="contador">
                    <h1 id='myWatch' ></h1>
                </div>
            </div>
            <div class="cuerpo">
                <div class="linea"></div>

                <div class="formulario">
                    <div class="img"><img src="img/estudiante.jpg" alt=""></div>

                    <div class="for">
                      <form action="insertar_nuevo.php" method="post">
                       <h2>Nueva Matricula</h2>
                       <hr>
                        <div class="cien">
                          <select>
                           <?php
                                while ($ver=mysql_fetch_row($re)) {
                           ?>
                                <option value="<?php echo $ver[0]; ?>"><?php echo $ver[1]."-".$ver[3]; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                            
                        </div>
                        <div class="mita">
                            <input type="number" autocomplete="off"  name="dni" placeholder="DNI" required>
                            <input type="date" autocomplete="off"  name="fecha" placeholder="Fecha Nacimiento" required>
                            <input type="number" autocomplete="off"  name="telefono" placeholder="Telefono" required >
                        </div>
                        <div class="cien">
                            <input type="text" autocomplete="off"  name="direccion" placeholder="Direccion" required>
                        </div>
                        <div class="mita">
                            <input type="text" autocomplete="off"  name="pais" placeholder="Pais" required>
                            <input type="text" autocomplete="off"  name="provincia" placeholder="Provincia" required>
                            <input type="text" autocomplete="off"  name="ciudad" placeholder="Ciudad" required>
                        </div>
                        <div class="cien">
                            <input type="email" autocomplete="off"  name="email" placeholder="Email" required>
                        </div>
                        <div class="mita">
                            <input type="text" autocomplete="off"  name="usu" placeholder="Usuario" required>
                            <input type="password" autocomplete="off"  name="pass" placeholder="Password" required>
                        </div>
                        <div class="cien">
                            <input type="submit" value="Guardar">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>