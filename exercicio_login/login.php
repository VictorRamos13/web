<?php
session_start();

$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

    if($login == 'Vitu' && $senha == '1234'){

        $_SESSION['login'] = $login;
        header('location:principal.php');

    }else {

        $_SESSION['erro'] = 'Usu&aacute;rio ou senha incorretos';
        header('location:index_exercicio.php');

    }



?>