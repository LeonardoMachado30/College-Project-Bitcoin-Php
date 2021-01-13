<?php
/**
 * 
 */


class crud
{
	public function selectDb_Cadastro($usuario, $email){
		include("db_conectar.php");
		$query = "SELECT id_usuario from usuarios where nome = '{$usuario}' or email = '{$email}'";
		$resultado = mysqli_query($conexao, $query);
		$row = mysqli_num_rows($resultado);
		echo $row;
		return $row;
	}
	public function selectDb_login($usuario, $senha){
		$query = "SELECT * FROM usuarios WHERE email = '{$usuario}' and senha = md5('{$senha}')";
		$result = mysqli_query($conexao, $query);
		$row = mysqli_num_rows($result);
		return $row;
	}
	public function selectMenu($usuario){
		$query = "SELECT nome FROM usuarios WHERE email = '{$usuario}'";

		$row = mysqli_query($conexao, $query);

		while($consulta = mysqli_fetch_array($row)){
			$_SESSION['Nome'] = $consulta['nome'];
		}

		$_SESSION['usuario'] = $_SESSION['Nome'];
	}
	public function insert($Usuario, $email, $senha){
		include("db_conectar.php");
		$query = "INSERT INTO usuarios (nome, email, senha) VALUES('$Usuario','$email',md5('$senha'))";
		$insert = mysqli_query($conexao, $query);
		return $insert;
	}
	public function update($EditNome, $EditPass, $id){
		$update = "UPDATE usuarios SET nome = '{$EditNome}', senha = md5('{$EditPass}') WHERE id_usuario = '{$id}'";
		$row = mysqli_query($conexao, $update);
		return $row;
	}
	public function delete($ID){
		$query = "DELETE FROM usuarios WHERE id_usuario = '$ID'";
		$row = mysqli_query($conexao, $query);
		return $row;
	}
}