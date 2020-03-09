<?php 
    include('verifica_login.php');
    header('Content-Type: application/json', true); 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: POST");
    include_once "conexao.php";
    $conexao = getConexao();
    if(isset($_POST['nome'], $_POST['i_date'], $_POST['f_date'])){
        $dados = array("nome"=>$_POST['nome'], "i_date"=>$_POST['i_date'], "f_date"=>$_POST['f_date'], "id"=>$_POST['id']);
    

    $sql = "update evento set descricao = ?, i_date = ?, f_date = ? where id = ?";

    $stmt = mysqli_stmt_init($conexao);

    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, 'sssi', $dados['nome'], $dados['i_date'], $dados['f_date'], $dados['id']);

        mysqli_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conexao);
    echo json_encode(array("status" => "ok"));
}else{
    echo json_encode(array("status" => "error"));
}
?>

