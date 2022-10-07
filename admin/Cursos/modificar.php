<?php
    include ('../include/session2.php');
    $id=$_GET['id'];
    //$id2=$_GET['id2'];
    
    $re=mysql_query("SELECT * FROM cursos WHERE id_curso='".$id."'");
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
    <center><h1>Curso</h1></center>
        <form action="modificar2.php" method="post">
           <?php while($row =mysql_fetch_array($re)){  ?>
            <div class="modificar">
                <h3>MODIFICAR CURSO</h3>
                <input type="text" name="id" value="<?php echo $row['id_curso']; ?>" class="id">
                <h4>Nombre : </h4>
                <input type="text" name="nombre" value="<?php echo $row['curso']; ?>" required autocomplete="off" autofocus>
                <button>MODIFICAR</button>
            </div>
            <?php } ?>
        </form>
    
  </body>
</html>
