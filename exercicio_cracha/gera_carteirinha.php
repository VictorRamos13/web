<?php
    //captura das variaveis
    $foto = '<img width="200px" src="imagens/' . $_GET['txtNomeImagem'] . '">';
    $strName = $_GET['txtName'];
    $strEmail = trim($_GET['txtEmail']);
    $strCPF = $_GET['txtCPF'];
    $dataNasc = date('d/m/Y', strtotime($_GET['txtDataNasc'])); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crach&aacute; pronto</title>
</head>
<body> 

<?php
    echo '<h2 align="center">Crach&aacute;:</h2>';
        echo '<table border="1px" cellspacing="4px" cellpadding="5px" align="center" width="800px">';
        
            echo '<tr>';
                echo '<td width="25%"> '. $foto . '</td>';
                echo '<td>';
                    echo 'Nome: ' . $strName . '<br /><br />';
                    echo 'Email: ' .  $strEmail .  '<br /><br />';
                    echo 'CPF: ' .  $strCPF .  '<br /><br />';  
                    echo 'Data de nascimento: ' .  $dataNasc .  '<br /><br />';
                echo '</td>';
        echo '</tr>';
        echo '</table>';
?>

<!-- <h2 align="center">Ta na m&atilde;o seu crach&aacute; meu patr&atilde;o</h2>
<table border="1px" cellspacing="4px" cellpadding="5px" align="center" width="800px">

    <tr>
        <td><?php //echo $foto; ?></td>
        <td>
            Nome: Otário demais<br /><br />
            Email: tal tal tal<br /><br />
            CPF: tal tal tal denovo<br /><br />
            data nascimento: tal tal tal novamente<br /><br />
        </td>
    </tr>
</table> -->
</body>
</html>