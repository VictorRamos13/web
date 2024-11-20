<?php
require_once('clsEquipe.php');
require_once('clsFunc.php');
require_once('clsEquipeFuncionario.php');
require_once('clsProjeto.php');

//criacao dos objetos
$funcionario = new clsFuncionario;
$equipe = new clsEquipe();
$equipeFuncionario = new clsEquipeFuncionario();
$projeto = new clsProjeto();

//pegar variaveis 
$txtNameEquipe = $_POST['txtNameEquipe'];
$txtNameFuncionario = $_POST['txtNameFuncionario'];
$txtEmailFuncionario = $_POST['txtEmailFuncionario'];
$slcEquipe = $_POST['slcEquipe'];
$strNameProjeto = $_POST['txtNameProjeto'];
$salarioProjeto = $_POST['txtSalarioProjeto'];

//cadastra equipes
if(!empty($txtNameEquipe)){

    $equipe->insert($txtNameEquipe);
    header('location:equipe.php');
}

//cadastra funcionario e sua equipe
if(!(empty($txtNameFuncionario) && empty($txtEmailFuncionario))){

    $funcionario->insert($txtNameFuncionario, $txtEmailFuncionario, $slcEquipe);
    $arrayFuncionario = $funcionario->selectID($txtNameFuncionario);//retorna um array quando pego id
    $id_funcionario = $arrayFuncionario[0]['id_funcionario'];//pegando somente o id
    $equipeFuncionario->insert($slcEquipe, $id_funcionario);
    header('location:funcionario.php');
}

//cadastra projeto e equipes
if(!(empty($strNameProjeto) && empty($salarioProjeto))){

    $projeto->insert($strNameProjeto, $salarioProjeto, $slcEquipe);
    //$arrayProjeto = $projeto->selectID($strNameProjeto);
    //$id_projeto = $arrayProjeto[0]['id_projeto'];
    header('location:projeto.php');

}


?>