<?php
session_start();
    $mensagem = 'Fa&ccedil;a seu login';
    $mensagem .= '
        <form action="login.php" method="post">
        
            Usu&aacute;rio: <input type="text" name="txtLogin" />
            <br />
            Senha: <input type="text" name="txtSenha" />
            <br />
            <input type="submit" name="btnValidar" /> 

        </form>';     

    if (isset($_SESSION['erro'])){
        
        $mensagem = 'Usu&aacute;rio ou senha incorreto <br />
        <form action="login.php" method="post">
        
            Usu&aacute;rio: <input type="text" name="txtLogin" />
            <br />
            Senha: <input type="text" name="txtSenha" />
            <br />
            <input type="submit" name="btnValidar" /> 

        </form>';

    }

    if (isset($_SESSION['login'])){

        header('location:principal.php');

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P&aacute;gina de login</title>
</head>
<body>

<?php echo $mensagem; ?>
    
</body>
</html>