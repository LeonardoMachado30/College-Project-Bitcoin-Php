<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="Formatacao/cadastro.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<meta charset="UTF-8">
</head>
<body>
	<DIV class="Cadastrar">
		<h1>Cadastro</h1>

		<FORM method="POST" action="../Control/db_Cadastro.php">
			<p>Nome<input type="text" name="Usuario" placeholder="Informe seu Nome" maxlength="15"></p>
			<p>Email<input type="email" name="Email" placeholder="Exemplo@gmail.com" maxlength="30"></p>
			<p>Senha<input type="password" name="Pass" placeholder="Informe sua senha" maxlength="30"></p>
			<p>Confirmar Senha<input type="password" name="ConfirmPass" placeholder="Confirme sua senha" maxlength="30"></p>
			<input type="submit" name="Enviar" value="Cadastrar">
			<input type="reset" name="Limpar" value="Limpar">
			<a href="login.php">Ja possui conta?</a>
			<!--Caso o usuario nao esteja no banco de dados-->
		</FORM>
		<?php
				//Mensagens de aviso na tela
		        if(isset($_SESSION['ja_cadastrado'])):
			        ?>
				        <div class="Msg_estrutura" id="corVermelho">
				            <p>Usuario ou email em uso.</p>	
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['ja_cadastrado']);
	        ?>
	        <?php
				//Mensagens de aviso na tela
		        if(isset($_SESSION['ConfirmPass'])):
			        ?>
				        <div class="Msg_estrutura" id="corAmarelo">
				            <p>Senha não estão iguais ou não são grandes.</p>	
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['ConfirmPass']);
	        ?>
	        <!--Caso o usuario nao preencheu nem um campo-->
	        <?php
		        if(isset($_SESSION['Preencha_os_campos'])):
			        ?>
				        <div class="Msg_estrutura" id="corAmarelo">
				            <p>Preencha todos os campos.</p>	
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['Preencha_os_campos']);
	        ?>
	        <?php
	        //Caso todas as condições sejam atendidas
		        if(isset($_SESSION['cadastrado_com_sucesso'])):
			        ?>
				        <div class="Msg_estrutura" id="corVerde">
				            <p>Cadastrado com sucesso.</p>	
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['cadastrado_com_sucesso']);
	        ?>
	</DIV>
</body>
</html>