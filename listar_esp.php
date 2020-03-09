<?php
    include('verifica_login.php');
    header('Content-Type: application/json', true); 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET");
    include_once "conexao.php";
    $conexao = getConexao();

    $id = $_GET['id'];

    $consulta = "select * from evento where id = ".$id;

    $evento = NULL;

    if($result = mysqli_query($conexao, $consulta)){
        if($l = mysqli_fetch_assoc($result)){
              $evento = array("id"=>$l['id'], "nome"=>$l['descricao'], "i_date"=>$l['i_date'], "f_date"=>$l['f_date']);
        }
    }

    mysqli_close($conexao);
     echo json_encode ($evento);
?>