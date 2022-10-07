<?php
    include ('../include/session2.php');

    $id=$_GET['id'];
    $nom=$_GET['nom'];

    $re=mysql_query("SELECT horario_d.id_deta, grupo.nombre as nn, grupo.turno as turno, aula.edificio , aula.salon,  horario.nombre as horio, horario_d.dia_nombre as dian, horario_d.hora_i, horario_d.hora_f, cursos.curso from grupo,aula,horario,horario_d,cursos where grupo.idgrupo=aula.grupo_id and aula.id_horario=horario.id_horario and horario.id_horario=horario_d.id_horario and horario_d.id_curso=cursos.id_curso and horario_d.id_profesor='$id' ORDER BY horario_d.dia ASC");
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
    <center><h1>Cursos de <?php echo $nom; ?></h1></center>
    <br>
    <div class="tablas">
        <a href="profesor.php" class="NuevoU" >Atras</a>&nbsp;
        <table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th>Horario</th>
					<th>Grupo</th>
					<th>Edificio</th>
					<th>Turno</th>
					<th>Salon</th>
					<th>Dia</th>
					<th>Hora</th>
					<th>Curso</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				<?php while($row =mysql_fetch_array($re)){                
                
                ?>
					<tr>
						<td><?php echo $row['horio']; ?></td>
						<td><?php echo $row['nn']; ?></td>
						<td><?php echo $row['edificio']; ?></td>
						<td><?php echo $row['turno']; ?></td>
						<td><?php echo $row['salon']; ?></td>
						<td><?php echo $row['dian']; ?></td>
						<td><?php echo $row['hora_i']."-".$row['hora_f']; ?></td>
						<td><?php echo $row['curso']; ?></td>
						<td><center><a class="eli" href="eliminar2.php?id=<?php echo $row['id_deta']; ?>&id2=<?php echo $id; ?>&nom=<?php echo $nom; ?>" onclick="javascript:return confirmacion();">Eliminar</a>
                          </center></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
  </body>
</html>
