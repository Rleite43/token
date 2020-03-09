<?php 
    header('Content-Type: application/json', true); 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET");
    include_once 'conexao.php';
    $conexao = getConexao();
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM evento where id = ?";

    $stmt = mysqli_stmt_init($conexao);

    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, 'i', $id);

        mysqli_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conexao);
    echo json_encode(array("status" => "ok"));
}else{
    echo json_encode(array("status" => "error"));
}
?>