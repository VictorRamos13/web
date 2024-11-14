<?php
require_once('clsAnimal.php');
$animal = new clsAnimal();

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu animal</title>
</head>
<body><center>';
    echo '<h2>O que tu queres fazer?</h2>';
    echo '<a href="?acao=inserir">INSERIR UM DADO NO BANCO DE DADOS</a><br>';
    echo '<a href="?acao=consultar">EXECUTAR UMA CONSULTA NO BANCO DE DADOS</a><br>';
    echo '<a href="?acao=listar">EXIBIR CONSULTA NA FORMA DE TABELA</a><br>';
echo '</center><br>';

$acao = $_GET['acao'] ?? '';

switch($acao){

    case 'inserir':
        $animal->insert('Princesa', 9, 'Cachorro', 4);
        echo 'Registro inserido com sucesso';
        break;
    case 'consultar':
        $registros = $animal->selectALL();
        if($registros){
            
            echo '<ul>';
            foreach($registros as $linha){
                echo '<li>ID: ' . $linha['id_animal'] . '</li>';
                echo '<li>Nome: ' . $linha['nome_animal'] . '</li>'; 
                echo '<li>Idade: ' . $linha['idade_animal'] . '</li>'; 
                echo '<li>Tipo: ' . $linha['tipo_animal'] . '</li>'; 
                echo '<li>Quantidade de patas: ' . $linha['qtd_patas_animal'] . '</li><br/><br />';
            }
            echo '</ul>';
        }else {
            echo 'Nenhum registro encontrado';
        }
        break;

    case 'listar':
        $registros = $animal->selectALL();
        if($registros){

            echo '<table border="1px">';
            echo '<tr><th>ID</th><th>Nome</th><th>Idade</th><th>Tipo</th><th>Quantidade de patas</th></tr>';
            foreach($registros as $linha){
                
               echo '<tr>';
               echo '<td>' . $linha['id_animal'] . '</td>';
               echo '<td>' . $linha['nome_animal'] . '</td>';
               echo '<td>' . $linha['idade_animal'] . '</td>';
               echo '<td>' . $linha['tipo_animal'] . '</td>';
               echo '<td>' . $linha['qtd_patas_animal'] . '</td>';
               echo '<td><a href="?acao=excluir&id_animal=' . $linha['id_animal'] . '">APAGAR</a></td>';
               echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'Nenhum registro encontrado';
        }
        break;

    case 'excluir':
        $id_animal = $_GET['id_animal'] ?? 0;
        if($animal->deleteA($id_animal)){
            echo 'Registro apagado com sucesso.';
        } else {
            echo 'Erro ao apagar o registro';
        }
        break;

    case 'deafult':
        echo '<p>Escolha uma opção do menu acima</p>';
        break;
}

echo'</body>
</html>';



?>