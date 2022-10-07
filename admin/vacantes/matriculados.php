<?php
    include ('../include/session2.php');

    $id=$_GET['id'];
    $nom=$_GET['nom'];

    $re=mysql_query("SELECT inscripcion.Idinscripcion,alumno.* from alumno,inscripcion,grupo WHERE alumno.id_alumno=inscripcion.alumno_id and inscripcion.grupo_id=grupo.idgrupo and grupo.idgrupo='$id'");
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>MATRICULA</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabla.css?v=3">
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
  </head>
  <body>
    <?php
        include ('../include/menu.php');
    ?>
    <center><h1>Matriculados en <?php echo $nom; ?></h1></center>
    <br>
    <div class="tablas">
        &nbsp;<a href="nuevo.php" class="NuevoU2" >Agregar</a>&nbsp;<a href="vacantes.php" class="NuevoU" >Atras</a>&nbsp;
        <table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
					<th>Opciones</th>
				</tr>
			</thead>
			
			<tbody>
				<?php while($row =mysql_fetch_array($re)){                
                
                ?>
					<tr>
						<td><?php echo $row['id_alumno']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['paterno']." ".$row['materno']; ?></td>
						<td><?php echo $row['correo']; ?></td>
						<td><center><a class="eli" href="eliminar2.php?id=<?php echo $row['Idinscripcion']; ?>&id2=<?php echo $id; ?>&nom=<?php echo $nom; ?>" onclick="javascript:return confirmacion();">Eliminar</a>
                          </center></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
  </body>
</html>
