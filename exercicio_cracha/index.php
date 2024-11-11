<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazedor de crach&aacute;s</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <style>
        #previsaoImagem {
            max-width: 100%;
            display: block;
            margin: 10px auto;
        }
    </style>
</head>
<body>

    <h2>Bem vindo Crach&aacute; M&oacute;vel, faça seu crach&aacute; por aqui!</h2>
  
        <table border="1px" width="15%" cellspacing="4px" cellpadding="5px">
                
            <tr>
                <td width="15%">Nome:</td>
                <td>
                    <input type="text" id="txtName" placeholder="Insira seu nome aqui" size="70" />
                </td>
            </tr>
                
            <tr>
                <td width="15%"> E-mail:</td>
                <td>
                    <input type="text" id="txtEmail" placeholder="Insira seu email aqui" size="70" />
                </td>
            </tr>
                
            <tr>
                <td width="15%">CPF:</td>
                <td>
                    <input type="text" id="txtCPF" 
                    placeholder="Insira seu CPF aqui sem espaços ou caracteres especiais" maxlength="11" size="70">
                </td>
            </tr>

            <tr>
                <td width="15%">Data de Nascimento:</td>
                <td>
                    <input type="date" id="txtDataNasc" />
                </td>
            </tr>

            <tr>
                <td width="15%">Foto:</td>
                <td>

                <input type="file" id="txtCaminhoImagem" accept="image/*">
                    <br><br>
                    <div>
                        <img id="previsaoImagem" style="display:none;" />
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <button id="btnUpload">Salvar</button>
                </td>
            </tr>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
                    <script>
                        let cropper;
                        const txtCaminhoImagem = document.getElementById('txtCaminhoImagem');
                        const previsaoImagem = document.getElementById('previsaoImagem');
                        const btnUpload = document.getElementById('btnUpload');
                        const idName = document.getElementById('txtName');
                        const idEmail = document.getElementById('txtEmail');
                        const idCPF = document.getElementById('txtCPF');
                        const idDataNasc = document.getElementById('txtDataNasc');


                        txtCaminhoImagem.addEventListener('change', (event) => {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = () => {
                                    previsaoImagem.src = reader.result;
                                    if (cropper) {
                                        cropper.destroy();
                                    }
                                    cropper = new Cropper(previsaoImagem, {
                                        aspectRatio: 1,
                                        viewMode: 2
                                    });
                                    btnUpload.style.display = 'inline';
                                };
                                reader.readAsDataURL(file);
                            }
                        });

                        btnUpload.addEventListener('click', () => {
                            if (cropper) {
                                cropper.getCroppedCanvas().toBlob((blob) => {
                                    const formData = new FormData();
                                    formData.append('imgRecorte', blob, 'imgRecorte.png');
                                    formData.append('txtName', txtName.value);
                                    formData.append('txtEmail', txtEmail.value);
                                    formData.append('txtCPF', txtCPF.value);
                                    formData.append('txtDataNasc', txtDataNasc.value);
                                    fetch('upload.php', {
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.redirectUrl) {
                                            window.location.href = data.redirectUrl;
                                        } else {
                                            alert('Erro: ' + data.error || 'Erro desconhecido.');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Erro:', error);
                                    });
                                });
                            }
                        });
                    </script>
                
        </table>
    
    

</body>
</html>
