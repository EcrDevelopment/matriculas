<?php
    include ('../include/session2.php');  
    $re=mysql_query("SELECT id_curso,curso FROM cursos");
    $re2=mysql_query("SELECT id_profesor,paterno,materno,nombre FROM profesor");
    $re3=mysql_query("SELECT idgrupo,nombre FROM grupo");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>MATRICULA</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabla.css?v3">
        <link rel="stylesheet" href="../css/tabla.css?v2">
    <script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
     <script>
			$(document).ready(function() {
				$('#example').DataTable({
					"order": [[ 1, "asc" ]],
					"language": {
						"lengthMenu": "Mostar _MENU_ registros por pagina",
						"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No records available",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"search": "Buscar:",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},
					}
				});
			} );
			
		</script>
		
		<script>
	function confirmacion(){
		confirmar = confirm('Seguro deseas eliminar el regístro?');
		return confirmar;
	}
    </script>
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
  </head>
  <body>
    <?php
        include ('../include/menu.php');
    ?>
    <center><h1>Horario</h1></center>
       
       <?php
            if(isset($_GET['id'])){
        ?>
           <form action="insertar2.php" method="post">
                <div class="modificar">
                    <h3>NUEVO CURSO</h3>
                    <input type="text" name="id" value="<?php echo $_GET['id']; ?>" class="id">
                    <h4>Hora Inicio : </h4>
                    <input type="time" name="inicio" value="" required autocomplete="off" autofocus>
                    <h4>Hora Fin : </h4>
                    <input type="time" name="fin" value="" required autocomplete="off" autofocus>
                    <h4>Dia : </h4>
                    <select name="select">
                      <option value="1-Lunes">Lunes</option> 
                      <option value="2-Martes">Martes</option>
                      <option value="3-Miercoles">Miersoles</option>
                      <option value="4-Juves">Juves</option>
                      <option value="5-Viernes">Viernes</option>
                    </select>
                    <h4>Curso : </h4>
                    <select name="curso">
                               <?php
                                    while ($ver=mysql_fetch_row($re)) {
                               ?>
                                    <option value="<?php echo $ver[0]; ?>"><?php echo $ver[1]; ?></option>
                                <?php
                                    }
                                ?>
                    </select>
                    <h4>Profesor : </h4>
                    <select name="profesor">
                               <?php
                                    while ($ver2=mysql_fetch_row($re2)) {
                               ?>
                                    <option value="<?php echo $ver2[0]; ?>"><?php echo $ver2[1]." ".$ver2[2]." ".$ver2[3]; ?></option>
                                <?php
                                    }
                                ?>
                    </select>
                    <button>INSERTAR</button>
                </div>
            </form>
        <?php
            }else{
        ?>
           <form action="insertar.php" method="post">
                <div class="modificar">
                    <h3>NUEVO HORARIO</h3>
                    <h4>Nombre : </h4>
                    <input type="text" name="nombre" value="" required autocomplete="off" autofocus>
                    <h4>Grupo : </h4>
                    <select name="grupo">
                               <?php
                                    while ($ver3=mysql_fetch_row($re3)) {
                               ?>
                                    <option value="<?php echo $ver3[0]; ?>"><?php echo $ver3[1]; ?></option>
                                <?php
                                    }
                                ?>
                    </select>
                    <button>INSERTAR</button>
                </div>
            </form>
        <?php
            }
        ?>
        <br>
        <div class="tablas">
        
        <table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Dia</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Curso</th>
                    <th>Profesor</th>
					<th>Opciones</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
                
                if(isset($_GET['id'])){
                    
                     $id=$_GET['id'];
                    $re=mysql_query("SELECT * FROM horario,horario_d,cursos,profesor WHERE horario.id_horario=horario_d.id_horario AND horario_d.id_curso=cursos.id_curso and horario_d.id_profesor=profesor.id_profesor and horario.id_horario='".$id."'"); 
                    while($row =mysql_fetch_array($re)){  ?>
					<tr>
						<td><?php echo $row['id_deta']; ?></td>
						<td><?php echo $row['dia_nombre']; ?></td>
                        <td><?php echo $row['hora_i']; ?></td>
                        <td><?php echo $row['hora_f']; ?></td>
                        <td><?php echo $row['curso']; ?></td>
                        <td><?php echo $row['paterno']." ".$row['materno']." ".$row['nombre']; ?></td>
						<td><center><a class="eli" href="eliminar2.php?id=<?php echo $row['id_deta']; ?>&id2=<?php echo $row['id_horario']; ?>" onclick="javascript:return confirmacion();">Eliminar</a>
                            <a class="edi" href="modificar_d.php?id=<?php echo $row['id_deta']; ?>&id2=<?php echo $row['id_horario']; ?>&id3=n" >Modificar</a><!--<a class="mas" href="">+</a>--></center></td>
					</tr>
				<?php }
                    }
                ?>
			</tbody>
		</table>
    </div>
  </body>
</html>
