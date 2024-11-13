<?php
ini_set('display_erros', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

//pega o codigo passado pela lista_tabela.php
//se nao estiver setado pega o codigo no minimo 0, ou seja, vai estar setado e com 0 caso nao exista, c entendeu
$codigo = $_GET['codigo'] ?? 0;

//fazendo a conexao
$conexao = mysqli_connect('localhost', 'root', '', 'bd_teste');

if(!$conexao){
    die('Erro na conex&atilde;o' . mysqli_connect_error());
}

$delete = 'DELETE FROM tb_pessoa WHERE id_pessoa = ' . $codigo . ';';
$resultado = mysqli_query($conexao, $delete);//DELETE, INSERT e UPDATE retornam só true ou false

if($resultado){
    echo 'Registro apagado com sucesso.';
} else {
    echo 'Problema ao apagar o registro no banco de dados.' . mysqli_error($conexao);
}

//fechando a conexao
mysqli_close($conexao);

?>