<?php
    include('verifica_login.php');
    header('Content-Type: application/json', true); 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: POST");
    include_once 'conexao.php';
    if(isset($_POST['nome'], $_POST['i_date'], $_POST['f_date'])){
    $dados = array("nome"=>$_POST['nome'], "i_date"=>$_POST['i_date'], "f_date"=>$_POST['f_date']);

    $conexao = getConexao();
    $sql = "insert into evento(descricao, i_date, f_date) VALUES(?,?,?)";

    $stmt = mysqli_stmt_init($conexao);

    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, 'sss', $dados['nome'], $dados['i_date'], $dados['f_date']);

        mysqli_execute($stmt);
        
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conexao);
    echo json_encode(array("status" => "ok"));
    //$dados['i_date'] = new DateTime("06-03-1999 14:32 America/Sao_Paulo");
    //echo json_encode($dados);
}else{
    echo json_encode(array("status" => "error"));
}

?>