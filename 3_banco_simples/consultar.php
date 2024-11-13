<?php
ini_set('dislplay_erros', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

//criar conexao
$conexao = mysqli_connect('localhost', 'root', '' , 'bd_teste');

if(!$conexao){
    die('Erro na conex&atilde;o' . mysqli_connect_error());
}

//fazer a consulta
$consulta = 'SELECT * FROM tb_pessoa';

//fazer a ligacao da consulta com o banco
$tabela = mysqli_query($conexao, $consulta) or die('Erro na consulta: ' . mysqli_error($conexao));

if(mysqli_num_rows($tabela) > 0){

    echo '<ul>';
    while($linhas = mysqli_fetch_row($tabela)){
        
        echo '<li>Id: ' . $linhas[0] . '</li>';
        echo '<li>Nome: ' . $linhas[1] . '</li>';
        echo '<li>Idade: ' . $linhas[2] . '</li> <br />';
    }
    echo '<ul>';
}

//fecha a conexao
mysqli_close($conexao);



?>