<?php
session_start();
include('Autenticar_login.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Atualizar</title>
	<link rel="stylesheet" type="text/css" href="Formatacao/editar.css">
	<meta charset="UTF-8">
</head>
<body>
	<DIV class="Cadastrar">
		<h1>Atualizar</h1>
		<FORM action="db_editar.php" method="POST">
			<p>Usuario<input type="text" name="EditNome" placeholder="Informe seu novo usuario" maxlength="15"></p>
			<p>Senha<input type="password" name="EditPass" placeholder="Informe sua nova senha" maxlength="30"></p>
			<p>Confirmar Senha<input type="password" name="EditConfirmPass" placeholder="Informe sua nova senha" maxlength="30"></p>
			<input type="submit" name="Enviar" value="Atualizar">
			<input type="reset" name="Limpar" value="Limpar">
			<?php
				//Mensagens de aviso na tela
				//Caso seja validado a atulização de registros
		        if(isset($_SESSION['campo_vazio'])):
			        ?>
				        <div class="Msg_estrutura" id="corAmarelo">
				            <p>Preencha todos os campos.</p>
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['campo_vazio']);
        	?>
        	<?php
				//Mensagens de aviso na tela
				//Caso seja validado a atulização de registros
		        if(isset($_SESSION['nao_autorizado'])):
			        ?>
				        <div class="Msg_estrutura" id="corVermelho">
				            <p>Nome ou Email ja cadastrados.</p>
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['nao_autorizado']);
        	?>
        	<?php
				//Mensagens de aviso na tela
				//Caso seja validado a atulização de registros
		        if(isset($_SESSION['senha_invalida'])):
			        ?>
				        <div class="Msg_estrutura" id="corAmarelo">
				            <p>Senha não estão iguais.</p>
				        </div>
		 	       <?php
		        endif;
			    unset($_SESSION['senha_invalida']);
        	?>
		</FORM>
	</DIV>
</body>
</html>