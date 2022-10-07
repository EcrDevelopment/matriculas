<?php
    include ('../include/session2.php');
    $id=$_GET['id'];
    $id2=$_GET['id2'];
    
    $re=mysql_query("SELECT * FROM tutor,usuario WHERE tutor.id_usuario=usuario.id_usuario AND tutor.id_usuario='".$id."'");
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
    <center><h1>Padre</h1></center>
        <form action="modificar2.php" method="post">
           <?php while($row =mysql_fetch_array($re)){  ?>
            <div class="modificar">
                <h3>MODIFICAR PADRE</h3>
                <input type="text" name="id" value="<?php echo $row['idtutor']; ?>" class="id">
                <input type="text" name="id2" value="<?php echo $row['idoperario']; ?>" class="id">
                <h4>Nombre : </h4>
                <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required autocomplete="off" autofocus>
                <h4>Apellido : </h4>
                <input type="text" name="apellido" value="<?php echo $row['paterno']." ".$row['materno']; ?>" required autocomplete="off">
                <h4>Correo : </h4>
                <input type="email" name="correo" value="<?php echo $row['email']; ?>" required autocomplete="off">
                <h4>Telefono :</h4>
                <input type="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" required autocomplete="off">
                <h4>Usuario : </h4>
                <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>" required autocomplete="off">
                <h4>Password : </h4>
                <input class="<?php echo $error; ?>" type="password" name="nuevo" value="<?php echo $row['password']; ?>" required autocomplete="off">
                <button>MODIFICAR</button>
            </div>
            <?php } ?>
        </form>
    
  </body>
</html>
