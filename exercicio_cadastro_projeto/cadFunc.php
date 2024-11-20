<?php
require_once('clsFunc.php');
require_once('clsEquipe.php');
$funcionario = new clsFuncionario();
$equipe = new clsEquipe();

$selectALL = $equipe->selectALL();



echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="img/icn_usuario.png" />
    <title>Cadastro de funcion&aacute;rios</title>
</head>
<body><center>';

    echo '
    <form action="cadastraALL.php" method="POST">
        Nome do funcion&aacute;rio: <input type="text" name="txtNameFuncionario" /><br />
        E-mail do funcion&aacute;rio <input type="text" name="txtEmailFuncionario" /><br />';

    echo 'Equipe:';
    echo '<select name="slcEquipe" size="1">';
    foreach($selectALL as $lista){

        echo '<option value=' . $lista['id_equipe'] . '>' . $lista['nome_equipe'] . '</option>';
    }
    echo '</select>';

    echo '<input type="submit" name="txtSalvar" value="Salvar" />
    </form>';

echo '</center></body>
</html>';
?>