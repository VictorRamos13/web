<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//fazer conexao e tratar se der erro
$conexao = mysqli_connect('localhost', 'root', '', 'bd_teste');
if(!$conexao){
    die('Erro na conex&atilde;: ' . mysqli_connect_error());
}

//fazer o insert
$insert = 'INSERT INTO tb_pessoa(nome_pessoa, idade_pessoa)
           VALUES ("José da Padoca do Euriko Com K", 78);';

//ligar a conexao com a consulta e verificar erros
$resultado = mysqli_query($conexao, $insert);

if($resultado){
    echo 'Registro inserido com sucesso.';
} else {
    echo 'Erro ao inserir o registro: ' . mysqli_error($conexao);
}

mysqli_close($conexao);

?>
