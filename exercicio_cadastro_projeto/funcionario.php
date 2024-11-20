<?php
require_once('clsFunc.php');
$func = new clsFuncionario();

$selectALL = $func->selectALL();



echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="img/icn_usuario.png" />
    <title>Funcion&aacute;rios</title>
</head>
<body><center>';
    
    if($selectALL){

        echo '<table border="1px" align="center" width="500px">';
        echo '<tr><th>ID</th><th>Nome</th><th>Email</th><th>A&ccedil;&atilde;o</th></tr>';
        foreach($selectALL as $linha){
            echo '<tr>';
            echo '<td>' . $linha['id_funcionario'] . '</td>';
            echo '<td>' . $linha['nome_funcionario'] . '</td>';
            echo '<td>' . $linha['email_funcionario'] . '</td>';
            echo '<td align="center">
                <a href="?acao=excluir&id_funcionario=' . $linha['id_funcionario'] . '">
                    <img src="img/icn_delete.png" width="20px" />                    
                </a>
            </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Nenhum registro encontrado<br />';
    }
echo '
    <a href="cadFunc.php">
        <button>
            <img src="img/icn_mais.png" width="20px">
            Adicionar
        </button>
    </a><br />
';
echo '<a href="index.php">Voltar para index</a>';

$acao = $_GET['acao'] ?? '';

switch($acao){

    case 'excluir':
        $id_funcionario = $_GET['id_funcionario'] ?? 0;
        $func->delete($id_funcionario);
        header('location:?');
        break;
}

echo '</center></body>
</html>';
?>