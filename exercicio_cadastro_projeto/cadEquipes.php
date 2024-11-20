<?php
require_once('clsEquipe.php');
$equipe = new clsEquipe();



echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="img/icn_equipe.png" />
    <title>Equipes</title>
</head>
<body><center>';

    echo '
    <form action="cadastraALL.php" method="POST">
        Nome da equipe: <input type="text" name="txtNameEquipe" />
        <input type="submit" name="txtSalvar" value="Salvar" />
    </form>';

echo '</center></body>
</html>';
?>