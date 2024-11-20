<?php
require_once('clsProjeto.php');
require_once('clsEquipe.php');
$projeto = new clsProjeto();
$equipe = new clsEquipe();

$selectALL = $equipe->selectALL();



echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="img/icn_usuario.png" />
    <title>Cadastro de funcion&aacute;rios</title>

    <script>
        function aplicarMascaraDinheiro(event) {
            let valor = event.target.value;

            // Remove tudo que não for número
            valor = valor.replace(/\D/g, "");

            // Adiciona o ponto de milhar
            valor = valor.replace(/(\d)(\d{3})(\d{1,2}$)/, "$1.$2,$3");

            // Adiciona as casas decimais
            if (valor.length > 6) {
                valor = valor.replace(/(\d+)(\d{2}$)/, "$1,$2");
            }

            // Atualiza o valor no input
            event.target.value = valor;
        }
    </script>

</head>
<body><center>';

    echo '
    <form action="cadastraALL.php" method="POST">
        Nome do projeto: <input type="text" name="txtNameProjeto" /><br />
        <label for="dinheiro">Valor:</label>
        <input type="text" id="dinheiro" name="txtSalarioProjeto" 
                     oninput="aplicarMascaraDinheiro(event)" placeholder="R$ 0,00"><br />';
        

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