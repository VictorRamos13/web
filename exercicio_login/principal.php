<?php
session_start();

    if(isset($_SESSION['login'])){
        
        $mensagem = '

        
        <table width="100%" height="100%" border="1px">
            <tr>
                <td>
                    <table border="1px width="800px" height="100%" align="center">
                        <tr>
                            <td colspan="2" height="15%">
                                <img src="../dawgs_img/p_medo.jpeg" height="200px" width="100%"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%" align="center">
                                THIS IS PRINCESA
                            </td>
                            <td align="center">
                                BIXINHA MAIS MANSA E FODA QUE CONHECI
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" height="10%" align="center">
                                DIAGNOSTICADA COM: MANSID&Atilde;O ETERNA
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <a href="logout.php"> Sair do sistema </a>
    
        ';

    } else {
        $mensagem = 'Essa p&aacute;gina &eacute; de acesso restrito! </br> <a href="index_exercicio.php">VOLTAR</a></br>';
    }

?>
<!DOCTYPE html height="100%">
<html lang="en">
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Princesa</title>
    </head>

    <body height="100%">

        <?php echo $mensagem ?>

    </body>
</html>