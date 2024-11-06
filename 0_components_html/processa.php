<?php

    //captura de variaveis
    $hddCodigo = $_POST['hddCodigo'];
    $strCodigo = $_POST['txtCodigo'];
    $strNome = trim($_POST['txtNome']); //trim = tira os espaços vazios
    $dataNasc = 'Data de nascimento n&atilde;o informada';
    $arquivo = $_FILES['txtArquivo'];
    $dog = 'Cachorro n&atilde;o informado';
    $strMensagem = $_POST['txaMensagem'];
    $imgImagem = $_POST['imgImagem'];
    

    if(isset($_POST['rdbDog'])){
        $dog = $_POST['rdbDog'];
    }

    if(!empty($_POST['txtDataNasc'])){
        $dataNasc = date('d/m/Y', strtotime($_POST['txtDataNasc']));
    }
     //strtotime() = converte string em tempo
    //y = 24, 23, 22 e Y = 2024, 2023, 2022 
    //d = 01, 02, 03... e D = 1, 2, 3... 
    //m = 01, 02, 03... e M = 1, 2, 3...

    $strEmail = 'Email n&atilde;o informado';
    if(isset($_POST['txtEmail'])){//isset checa se a variavel existe na url
        $strEmail = trim($_POST['txtEmail']);
    }

    $strSenha = 'Senha n&atilde;o informada';
    if (isset($_POST['txtSenha'])){ 
        $strSenha = $_POST['txtSenha'];
    }
    

    //exibicao de variaveis
    echo 'C&oacute;digo escondido: ' . $hddCodigo . '<br />';
    echo 'C&oacute;digo: ' . $strCodigo . '<br />';

    if (empty($strNome)){
        echo 'Nome n&atilde;o informado <br />';
    } else {
        echo 'Nome: ' . $strNome . '<br />';
    }
    
    // if (empty($strEmail)){
    //     echo 'Email n&atilde;o informado <br />';
    // } else {
    //     echo 'Email: ' . $strEmail . '<br />';
    // }

    // if (empty($strSenha)){
    //     echo 'Senha n&atilde;o informada <br />';
    // } else {
    //     echo 'Senha: ' . $strSenha . '<br />';
    // }
    echo 'Email: ' . $strEmail . '<br />';
    echo 'Senha: ' . $strSenha . '<br />';
    echo 'Data de nascimento: ' . $dataNasc . '<br />';
    echo 'Nome do arquivo: ' . $arquivo['name'] . ' - Tamanho: ' . $arquivo['size'] . ' KB<br />';

    //radio
    if($dog == '1'){
        echo 'Cachorro favorito: Laila <br />';
    } if($dog == '2'){
        echo 'Cachorro favorito: Princesa <br />';
    } if ($dog == '3'){
        echo 'Cachorro favorito: Sadan <br />';
    }

    //checkbox
    $naoSei = '';
    if(isset($_POST['chkNS1'])){
        $naoSei .= ' N&atilde;o sei 1 <br />';
    }
    if(isset($_POST['chkNS2'])){
        $naoSei .= ' N&atilde;o sei 2 <br />';
    }
    if(isset($_POST['chkNS3'])){
        $naoSei .= ' N&atilde;o sei 3 <br />';
    }
    if(isset($_POST['chkNS4'])){
        $naoSei .= ' N&atilde;o sei 4 <br />';
    }
    if(empty($naoSei)){
        echo 'Nenhum n&atilde;o sei informado <br />';
    } else {
        $naoSei = 'N&atilde;o sei selecionados: <br/ >' . $naoSei . '<br />';
    }
    echo $naoSei;

    echo 'Mensagem: ' . $strMensagem . '<br />';

        //species
    $strEspecie = '';
    if(!isset($_POST['slcEspecie'])){
        echo 'Escolha uma das esp&eacute;cies';
    } if ($_POST['slcEspecie'] == 'axolote') {
        $strEspecie = 'Ambystoma mexicanum';
    } if ($_POST['slcEspecie'] == 'ocapi') {
        $strEspecie = 'Okapia johnstoni';
    } if ($_POST['slcEspecie'] == 'narval') {
        $strEspecie = 'Monodon monoceros';
    }
    echo 'Esp&eacute;cie escolhida: ' . $strEspecie . '<br />';

        //movies
    $strFilme = '';
    if(!isset($_POST['slcFilme'])){
        echo 'Escolha um filme';
    } if ($_POST['slcFilme'] == 'blade') {
        $strFilme = 'Blade Runner 2049';
    } if ($_POST['slcFilme'] == 'inception') {
        $strFilme = 'Inception';
    } if ($_POST['slcFilme'] == 'sonho') {
        $strFilme = 'Um sonho de liberdade';
    } if ($_POST['slcFilme'] == 'borboleta') {
        $strFilme = 'Efeito borboleta';
    }
    echo 'Filme favorito: ' . $strFilme . '<br />';

        //list house
    $listHouse = $_POST['slcList'];
    echo 'Elementos da casa escolhidos:';
    echo '<ul>';

    foreach($listHouse as $item){
        echo '<li>' . $item . '</li>';
    }
    echo '</ul>';

    echo 'Nome do value da imagem: ' . $imgImagem . '<br />';


?>