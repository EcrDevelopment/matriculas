<?php
    include ('../include/session2.php');
    
    $id=$_GET['id'];

    $re=mysql_query("select * from pagos");
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
    <center><h1>Deudas Pendientes</h1></center>
    <br>
    <div class="tablas">
        <a href="alumno.php" class="NuevoU" >Atras</a>
        <table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Pago</th>
					<th>Cantidad a Pagar</th>
					<th>Fecha Limite</th>
				</tr>
			</thead>
			
			<tbody>
				<?php while($row =mysql_fetch_array($re)){ 
                     $re4=mysql_query("select pagos.id_pago from alumno,pagos,factura WHERE pagos.id_pago=factura.id_pago and  factura.id_alumno=alumno.id_alumno and alumno.id_alumno='".$id."' and pagos.id_pago='".$row['id_pago']."'");
                            $numero2 = mysql_num_rows($re4);                   
    
                    if($numero2<=0){
                ?>
					<tr>
						<td><?php echo $row['concepto']; ?></td>
						<td><?php echo $row['monto']; ?></td>
						<td><?php echo $row['fecha_limite']; ?></td>
					</tr>
				<?php }} ?>
			</tbody>
		</table>
    </div>
  </body>
</html>
