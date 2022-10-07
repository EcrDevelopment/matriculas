<?php
    session_start();
    require_once('db/conexion.php'); 
    mysql_query("SET NAMES 'utf8'");

    if(isset($_POST["user"]) && isset($_POST["password"])){
        
        $re=mysql_query("select id_usuario,tipo from usuario WHERE usuario='".$_POST["user"]."' and password='".$_POST["password"]."'");
        $nro_reg=mysql_num_rows($re);

        if ($nro_reg==0){
            //echo ' no se han encontrado productos para mostrar';
        }else{
            $respuesta = mysql_fetch_row($re);
          
            if($respuesta[1]=="1"){
                
                $_SESSION['id_a']=$respuesta[0];
                $_SESSION['tipo_a']=$respuesta[1];
                $_SESSION['usuario_a']=$_POST["user"];
                header('Location: admin/');
                
            }
            
            if($respuesta[1]=="2"){
                
                $_SESSION['id']=$respuesta[0];
                //$_SESSION['tipo']=$respuesta[1];
                $_SESSION['usuario']=$_POST["user"];
                header('Location: padre/padres.php');
                
            }
            
            if($respuesta[1]=="3"){
                
                $_SESSION['id_p']=$respuesta[0];
                //$_SESSION['tipo']=$respuesta[1];
                $_SESSION['usuario_p']=$_POST["user"];
                header('Location: Profe/profe.php');
                
            }
            
        }
        
    }

?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="js/prefixfree.min.js"></script>
    <link rel="stylesheet" href="css/index.css?v3">
  </head>
  <body>
    <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Login<span>Colegio</span></div>
		</div>
		<br>
		<div class="login">
            <form name="user" action="index.php" method="post">
				<input type="text" placeholder="Usuario" name="user" required><br>
				<input type="password" placeholder="Password" name="password" required><br>
				<input type="submit" value="Ingresar">
            </form>
		</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </body>
</html>
