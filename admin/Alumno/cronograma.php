<?php
    include ('../include/session2.php');
    
    $id=$_GET['id'];

    $re=mysql_query("select * from alumno,pagos,factura WHERE pagos.id_pago=factura.id_pago and  factura.id_alumno=alumno.id_alumno and alumno.id_alumno='$id'");
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
    <center><h1>Pagos Realizados</h1></center>
    <br>
    <div class="tablas">
        <a href="alumno.php" class="NuevoU" >Atras</a>
        <table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>N° Factura</th>
					<th>Pago</th>
					<th>Cantidad a Pagar</th>
					<th>Monto Pagado</th>
					<th>Fecha Pagado</th>
				</tr>
			</thead>
			
			<tbody>
				<?php while($row =mysql_fetch_array($re)){  ?>
					<tr>
						<td><?php echo $row['numero_factura']; ?></td>
						<td><?php echo $row['concepto']; ?></td>
						<td><?php echo $row['monto']; ?></td>
						<td><?php echo $row['monto_f']; ?></td>
						<td><?php echo $row['fecha']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
  </body>
</html>
