<?php
    include ('../include/session2.php');
    $id=$_GET['id'];
    
    $re=mysql_query("SELECT * FROM pagos WHERE id_pago='".$id."'");
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>MATRICULA</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabla.css?v3">
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
    <center><h1>Pagos</h1></center>
        <form action="modificar2.php" method="post">
           <?php while($row =mysql_fetch_array($re)){  ?>
            <div class="modificar">
                <h3>MODIFICAR PAGOS</h3>
                <input type="text" name="id" value="<?php echo $row['id_pago']; ?>" class="id">
                <h4>Concepto : </h4>
                <input type="text" name="concepto" value="<?php echo $row['concepto']; ?>" required autocomplete="off" autofocus>
                <h4>Monto : </h4>
                <input type="text" name="monto" value="<?php echo $row['monto']; ?>" required autocomplete="off">
                <h4>Fecha : </h4>
                <input type="date" name="fecha" value="<?php echo $row['fecha_limite']; ?>" required autocomplete="off">
                <button>MODIFICAR</button>
            </div>
            <?php } ?>
        </form>
    
  </body>
</html>
