<?php
    include ('../include/session2.php');
    $re=mysql_query("SELECT * FROM trabajador,usuario WHERE trabajador.id_usuario=usuario.id_usuario");
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>MATRICULA</title>
    <link rel="stylesheet" href="../css/menu.css">
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
  </head>
  <body>
    <?php
        include ('../include/menu.php');
    ?>
    <center><h1>Usuarios</h1></center>
    <br>
    <div class="tablas">
        <a href="nuevo.php" class="NuevoU" >Nuevo Usuario</a>
        <table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Usuario</th>
					<th>Correo Electronico</th>
					<th>Opciones</th>
				</tr>
			</thead>
			
			<tbody>
				<?php while($row =mysql_fetch_array($re)){  ?>
					<tr>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['paterno']." ".$row['materno']; ?></td>
						<td><?php echo $row['usuario']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><center><a class="eli" href="eliminar.php?id=<?php echo $row['id_usuario']; ?>&id2=<?php echo $row['idoperario']; ?>" onclick="javascript:return confirmacion();">Eliminar</a>
                            <a class="edi" href="modificar.php?id=<?php echo $row['id_usuario']; ?>&id2=<?php echo $row['idoperario']; ?>" >Modificar</a><!--<a class="mas" href="">+</a>--></center></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
  </body>
</html>
