<?php
    include ('../include/session2.php');
    $re=mysql_query("SELECT * FROM grupo,aula WHERE grupo.idgrupo=aula.grupo_id");
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>MATRICULA</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabla.css?v=2">
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
    <center><h1>Aulas</h1></center>
    <br>
    <div class="tablas">
        <a href="nuevo.php" class="NuevoU" >Nueva Aulas</a>
        <table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Edificio</th>
					<th>Salon</th>
					<th>Turno</th>
					<th>Grupo</th>
					<th>Capacidad</th>
					<th>Matriculados</th>
					<th>Opciones</th>
				</tr>
			</thead>
			
			<tbody>
				<?php while($row =mysql_fetch_array($re)){  
    
                    $re4=mysql_query("SELECT COUNT(*) as total from inscripcion where grupo_id='".$row['idgrupo']."'");
                    $numero2 = mysql_fetch_assoc($re4);                   
                
                ?>
					<tr>
						<td><?php echo $row['edificio']; ?></td>
						<td><?php echo $row['salon']; ?></td>
						<td><?php echo $row['turno']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['capacidad']; ?></td>
						<td><?php echo $numero2['total']; ?></td>
						<td><center><a class="eli" href="eliminar.php?id=<?php echo $row['idgrupo']; ?>&id2=<?php echo $row['idaula']; ?>" onclick="javascript:return confirmacion();">Eliminar</a>
                            <a class="edi" href="modificar.php?id=<?php echo $row['idgrupo']; ?>&id2=<?php echo $row['idaula']; ?>" >Modificar</a><!--<a class="mas" href="">+</a>--> <a class="cro" href="matriculados.php?id=<?php echo $row['idgrupo']; ?>&id2=<?php echo $row['idaula']; ?>&nom=<?php echo $row['nombre']; ?>" >Matriculados</a></center></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
  </body>
</html>
