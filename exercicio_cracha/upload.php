<?php
$uploadDir = 'imagens/';


if (isset($_FILES['imgRecorte'])) {
    //captura das variaveis
    $file = $_FILES['imgRecorte'];
    $strName = $_POST['txtName'];
    $strEmail = $_POST['txtEmail'];
    $strCPF = $_POST['txtCPF'];
    $dataNasc = $_POST['txtDataNasc'];

    //gerando um id unico pra cada foto que entra
    $fileName = uniqid('img_', true) . '.png';
    $filePath = $uploadDir . $fileName;
    
    //criando o diretorio se nao existir
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    //movendo a pasta e mandando para gera_carteirinha pela URL
    move_uploaded_file($file['tmp_name'], $filePath);
    echo json_encode(['redirectUrl' => 'gera_carteirinha.php?txtNomeImagem=' . $fileName .
                    '&txtName=' . $strName . '&txtEmail=' . $strEmail . '&txtCPF=' . $strCPF . 
                    '&txtDataNasc=' . $dataNasc]);

} else {
    echo 'Nenhuma imagem recebida.';
}

?>
