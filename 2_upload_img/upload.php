<?php
$uploadDir = 'imagens/';

if (isset($_FILES['imgRecorte'])) {
    $file = $_FILES['imgRecorte'];

    $fileName = uniqid('img_', true) . '.png';
    $filePath = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    move_uploaded_file($file['tmp_name'], $filePath);
    echo json_encode(['redirectUrl' => 'exibe_imagem.php?txtNomeImagem=' . $fileName]);

} else {
    echo 'Nenhuma imagem recebida.';
}
?>
