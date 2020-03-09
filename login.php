<?php
   session_start();
   header('Content-Type: application/json', true); 
   header('Access-Control-Allow-Origin: *');
   header("Access-Control-Allow-Methods: POST");
   include_once "conexao.php";
   $conexao = getConexao();

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from login where usuario = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);


if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: home.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

?>