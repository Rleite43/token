<?php
    include('verifica_login.php');
    header('Content-Type: application/json', true); 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET");
    include_once "conexao.php";
    $conexao = getConexao();

    $consulta = "select * from evento";

    $not = array();

    if($result = mysqli_query($conexao, $consulta)){
        while($l = mysqli_fetch_assoc($result)){
              $agenda = array("id"=>$l['id'], "nome"=>$l['descricao'],"i_date"=>$l['i_date'], "f_date"=>$l['f_date']);
              array_push($not, $agenda);
          }
    }

    mysqli_close($conexao);
    echo json_encode ($not);
?>



