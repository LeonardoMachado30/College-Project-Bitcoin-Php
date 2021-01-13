<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="Formatacao/login.css">
</head>
<body>
	<div class="login">
		<DIV>
			<img SRC="Formatacao/Imagens/pngwing.com.png" id="banner">
			<FORM action="../Control/db_login.php" method="POST">
				<p>Usuario</p>
				<input type="text" name="Usuario" placeholder="Digite seu email" maxlength="40">
				<p>Senha</p>
				<input type="password" name="senha" placeholder="Digite sua senha" maxlength="32">
				<input type="submit" name="" value="Logar">
				<!---<a href="#openRecupera">Esqueceu sua senha?</a>-->
				<br>
				<a href="Cadastro.php">Ainda nao possui conta?</a>
			</FORM>
			<!--MENSAGENS-->
			<div class="Msg_estrutura">
			<?php
			//Mensagens de aviso na tela
			//Se o usuario nao for achado no banco de dados
		        if(isset($_SESSION['nao_autenticado'])):
			        ?>
				        <div id="corVermelho">
				            <p>Usuario ou senha invalidos.</p>	
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['nao_autenticado']);
	        ?>
	        <?php
	        //Caso o usuario nao preencheu nem um campo
		        if(isset($_SESSION['Preencha_os_campos'])):
			        ?>
				        <div id="corAmarelo">
				            <p>Preencha todos os campos.</p>	
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['Preencha_os_campos']);
	        ?>
	    	</div>
	    </DIV>
	</div>
</body>
</html>
