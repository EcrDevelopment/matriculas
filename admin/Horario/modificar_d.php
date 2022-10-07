<?php
    include ('../include/session2.php');  
    
    $ida=$_GET['id'];
    $id2=$_GET['id2'];
    $id3=$_GET['id3'];
    
    $rea=mysql_query("SELECT * FROM horario_d WHERE id_deta='".$ida."'");

    $re=mysql_query("SELECT id_curso,curso FROM cursos");
    $re2=mysql_query("SELECT id_profesor,paterno,materno,nombre FROM profesor");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>MATRICULA</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabla.css?v3">
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
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
  </head>
  <body>
    <?php
        include ('../include/menu.php');
    ?>
    <center><h1>Horario</h1></center>
    <?php while($row1 =mysql_fetch_array($rea)){  ?>
           <form action="modificar3.php" method="post">
                <div class="modificar">
                    <h3>MODIFICAR CURSO</h3>
                    <input type="text" name="id" value="<?php echo $_GET['id']; ?>" class="id">
                    <input type="text" name="id2" value="<?php echo $_GET['id2']; ?>" class="id">
                    <input type="text" name="id3" value="<?php echo $_GET['id3']; ?>" class="id">
                    <h4>Hora Inicio : </h4>
                    <input type="time" name="inicio" value="<?php echo $row1['hora_i']; ?>" required autocomplete="off" autofocus>
                    <h4>Hora Fin : </h4>
                    <input type="time" name="fin" value="<?php echo $row1['hora_f']; ?>" required autocomplete="off" autofocus>
                    <h4>Dia : </h4>
                    <select name="select">
                      <option <?php if($row1['dia']==1){ echo 'selected'; } ?> value="1-Lunes">Lunes</option> 
                      <option <?php if($row1['dia']==2){ echo 'selected'; } ?> value="2-Martes">Martes</option>
                      <option <?php if($row1['dia']==3){ echo 'selected'; } ?> value="3-Miercoles">Miersoles</option>
                      <option <?php if($row1['dia']==4){ echo 'selected'; } ?> value="4-Juves">Juves</option>
                      <option <?php if($row1['dia']==5){ echo 'selected'; } ?> value="5-Viernes">Viernes</option>
                    </select>
                    <h4>Curso : </h4>
                    <select name="curso">
                               <?php
                                    while ($ver=mysql_fetch_row($re)) {
                               ?>
                                    <option <?php if($row1['id_curso']==$ver[0]){ echo 'selected'; } ?> value="<?php echo $ver[0]; ?>"><?php echo $ver[1]; ?></option>
                                <?php
                                    }
                                ?>
                    </select>
                    <h4>Profesor : </h4>
                    <select name="profesor">
                               <?php
                                    while ($ver2=mysql_fetch_row($re2)) {
                               ?>
                                    <option <?php if($row1['id_profesor']==$ver2[0]){ echo 'selected'; } ?> value="<?php echo $ver2[0]; ?>"><?php echo $ver2[1]." ".$ver2[2]." ".$ver2[3]; ?></option>
                                <?php
                                    }
                                ?>
                    </select>
                    <button>MODIFICAR</button>
                </div>
            </form>
     <?php } ?>
        
  </body>
</html>
