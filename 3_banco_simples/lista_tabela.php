<?php
ini_set('display_erros', 1);
ini_set('display_startup_erros', 1); //faz com que todos os erros sejam mostrados
error_reporting(E_ALL);

$conexao = mysqli_connect('localhost', 'root', '', 'bd_teste');
//mysqli = driver do mysql, depende do sgbd que usar
//('host(ip ou qualquer outra coisa)', 'usuario', 'senha', 'banco que quero conectar');

//verifico se essa conexao deu erro
if(!$conexao){
    die('Erro de conex&atilde;o: ' . mysqli_connect_error());
    //se der erro vai matar o código e procurar o erro na pasta log em htdocs
}

//execuntando a consulta
$consulta = 'SELECT * FROM tb_pessoa';//o select retorna uma matriz de valores (por causa da tabela)
$tabela = mysqli_query($conexao, $consulta) or die('Erro na consulta: ' . mysqli_error($conexao));
//mysqli_query = faz uma ligação da consulta com a conexao banco
//vai pegar essa $consulta e fazer ela dentro da $conexao (banco que está definido lá em cima)

//eixibicao dos dados
if(mysqli_num_rows($tabela) > 0){ //ve o numero de linhas 

    echo '<table border"=1px"';
    echo '<tr><th>ID</th><th>NOME</th><th>IDADE</th><th>A&Ccedil;&Atilde;O</th></tr>';

    while($linhas = mysqli_fetch_row($tabela)){
        //e tipo um foreach, vai pegar as linhas da tabela e colocar dentro de $linha
        echo '<tr>';
        //colocar numeros ao inves do nome da coluna
        //por causa de que se for o nome da coluna na hora que mudar no banco tem que mudar aqui
        echo '<td>' . $linhas[0] . '</td>';//$linhas[0] = primeira coluna criada, nesse caso o id
        echo '<td>' . $linhas[1] . '</td>';//$linhas[1] = segunda coluna criada, nesse caso o nome
        echo '<td>' . $linhas[2] . '</td>';//$linhas[2] = terceira coluna criada, nesse caso a idade
        echo '<td><a href="apaga.php?codigo=' . $linhas[0] . '">APAGAR</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

//fechando a conexao
mysqli_close($conexao);

?>