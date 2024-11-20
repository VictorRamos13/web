<?php
require_once('clsProjeto.php');
$projeto = new clsProjeto();

$selectALL = $projeto->selectALL();
//$txtName = $_POST['txtName'] ?? '';



echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="img/icn_equipe.png" />
    <title>Equipes</title>
</head>
<body><center>';
    
    if($selectALL){

        echo '<table border="1px" align="center" width="500px">';
        echo '<tr><th>ID</th><th>Nome</th><th>Sal&aacute;rio</th><th>A&ccedil;&atilde;o</th></tr>';
        foreach($selectALL as $linha){
            echo '<tr>';
            echo '<td>' . $linha['id_projeto'] . '</td>';
            echo '<td>' . $linha['nome_projeto'] . '</td>';
            echo '<td>' . $linha['salario_projeto'] . '</td>';
            echo '<td align="center">
                <a href="?acao=excluir&id_projeto=' . $linha['id_projeto'] . '">
                    <img src="img/icn_delete.png" width="20px" />                    
                </a>
            </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Nenhum registro encontrado <br />';
    }
echo '
    <a href="cadProjeto.php">
       <button>
           <img src="img/icn_mais.png" width="20px">
           Adicionar
       </button>
    </a> <br/>';
echo '<a href="index.php">Voltar para index</a>';

$acao = $_GET['acao'] ?? '';

switch ($acao){

    case 'excluir':
        $id_projeto = $_GET['id_projeto'] ?? 0;
        $projeto->delete($id_projeto);
        header('location:?');
        break;
}

echo '</center></body>
</html>';
?>