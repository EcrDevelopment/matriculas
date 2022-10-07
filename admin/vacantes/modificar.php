<?php
    include ('../include/session2.php');
    $id=$_GET['id'];
    $id2=$_GET['id2'];
    
    $re=mysql_query("SELECT * FROM grupo,aula WHERE grupo.idgrupo=aula.grupo_id AND grupo.idgrupo='".$id."'");
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
    <center><h1>Aula</h1></center>
        <form action="modificar2.php" method="post">
           <?php while($row =mysql_fetch_array($re)){  ?>
            <div class="modificar">
                <h3>NUEVA AULA</h3>
                <input type="text" name="id" value="<?php echo $row['idaula']; ?>" class="id">
                <input type="text" name="id2" value="<?php echo $row['idgrupo']; ?>" class="id">
                <h4>Edificio : </h4>
                <input type="text" name="edificio" value="<?php echo $row['edificio']; ?>" required autocomplete="off" autofocus>
                <h4>Salon : </h4>
                <input type="text" name="salon" value="<?php echo $row['salon']; ?>" required autocomplete="off">
                <h4>Turno : </h4>
                <input type="text" name="turno" value="<?php echo $row['turno']; ?>" required autocomplete="off">
                <h4>Grupo : </h4>
                <input type="text" name="grupo" value="<?php echo $row['nombre']; ?>" required autocomplete="off">
                <h4>Capacidad :</h4>
                <input type="text" name="capacidad" value="<?php echo $row['capacidad']; ?>" required autocomplete="off">
                <button>MODIFICAR</button>
            </div>
            <?php } ?>
        </form>
    
  </body>
</html>
