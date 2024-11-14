<?php
require_once 'clsPessoa.php';
$pessoa = new clsPessoa();

echo "<html><body><center>";

echo '<h2>O QUE QUER FAZER?</h2>';
echo '<a href="?acao=inserir">INSERIR UM DADO NO BANCO DE DADOS</a><br>';
echo '<a href="?acao=consultar">EXECUTAR UMA CONSULTA NO BANCO DE DADOS</a><br>';
echo '<a href="?acao=listar">EXIBIR CONSULTA NA FORMA DE TABELA</a><br>';
echo '</center><br>';

$acao = $_GET['acao'] ?? '';

switch ($acao) {
    case 'inserir':
        $pessoa->inserir("Rodrigo Oliveira", 23);
        echo 'Registro inserido com sucesso';
        break;

    case 'consultar':
        $registros = $pessoa->selecionarTodos();
        if ($registros) {
            foreach ($registros as $linha) {
                echo 'Id: ' . htmlspecialchars($linha['id_pessoa']) . '<br>';
                echo 'Nome: ' . htmlspecialchars($linha['nome_pessoa']) . '<br>';
                echo 'Idade: ' . htmlspecialchars($linha['idade_pessoa']) . '<br><br>';
            }
        } else {
            echo 'Nenhum registro encontrado.';
        }
        break;

    case 'listar':
        $registros = $pessoa->selecionarTodos();
        if ($registros) {
            echo '<table border="1px">';
            echo '<tr><th>ID</th><th>Nome</th><th>Idade</th><th>Ação</th></tr>';
            foreach ($registros as $linha) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($linha['id_pessoa']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['nome_pessoa']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['idade_pessoa']) . '</td>';
                echo '<td><a href="?acao=excluir&id_pessoa=' . urlencode($linha['id_pessoa']) . '">APAGAR</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'Nenhum registro encontrado.';
        }
        break;

    case 'excluir':
        $id = $_GET['id_pessoa'] ?? 0;
        if ($pessoa->excluir($id)) {
            echo 'Registro apagado com sucesso';
        } else {
            echo 'Problema ao apagar o registro.';
        }
        break;

    default:
        echo '<p>Escolha uma opção do menu acima.</p>';
        break;
}

echo "</body></html>";
?>