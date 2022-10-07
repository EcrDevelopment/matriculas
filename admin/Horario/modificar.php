<?php
    include ('../include/session2.php'); 
    
    $ida=$_GET['id'];
    //$id2=$_GET['id2'];
    
    $rea=mysql_query("SELECT * FROM horario WHERE id_horario='".$ida."'");

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
       
      <?php while($row1 =mysql_fetch_array($rea)){  ?>
           <form action="modificar2.php" method="post">
                <div class="modificar">
                    <h3>NUEVO HORARIO</h3>
                    <input type="text" name="id" value="<?php echo $row1['id_horario']; ?>" class="id">
                    <h4>Nombre : </h4>
                    <input type="text" name="nombre" value="<?php echo $row1['nombre']; ?>" required autocomplete="off" autofocus>
                    <h4>Grupo : </h4>
                    <select name="grupo">
                               <?php
                                    while ($ver3=mysql_fetch_row($re3)) {
                               ?>
                                    <option <?php if($row1['id_grupo']==$ver3[0]){ echo 'selected'; } ?> value="<?php echo $ver3[0]; ?>"><?php echo $ver3[1]; ?></option>
                                <?php
                                    }
                                ?>
                    </select>
                    <button>MODIFICAR</button>
                </div>
            </form>
        <?php
            }
        ?>
        <br>
        <div class="tablas">
        <a href="nuevo.php?id=<?php echo $ida; ?>" class="NuevoU" >Nuevo +</a>
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
						<td><center><a class="eli" href="eliminar3.php?id=<?php echo $row['id_horario']; ?>" onclick="javascript:return confirmacion();">Eliminar</a>
                            <a class="edi" href="modificar_d.php?id=<?php echo $row['id_deta']; ?>&id2=<?php echo $row['id_horario']; ?>&id3=m" >Modificar</a><!--<a class="mas" href="">+</a>--></center></td>
					</tr>
				<?php }
                    }
                ?>
			</tbody>
		</table>
    </div>
  </body>
</html>
