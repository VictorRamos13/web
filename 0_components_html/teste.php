<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
    <style>
        /* Define que o HTML e o body ocupem 100% da altura da tela */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* A tabela principal ocupa 100% da altura e largura */
        table {
            border-collapse: collapse; /* Remove espaçamento entre as células */
            width: 100%;
            height: 100%;
        }

        /* Estilos para a tabela interna */
        .inner-table {
            width: 800px;
            height: 100%;
            margin: 0 auto;
            border: 1px solid black;
        }

        /* A altura da célula do banner será de 15% */
        .banner {
            height: 15%;
            background-image: url('sadan_img/lingudo.jpeg'); /* Define a imagem de fundo */
            background-size: contain; /* Faz a imagem se ajustar dentro da célula */
            background-repeat: no-repeat; /* Não repete a imagem */
            background-position: center; /* Centraliza a imagem */
        }

        /* A altura do conteúdo será o restante (70%) */
        .content {
            height: 70%;
        }

        /* O rodapé ocupará 15% */
        .footer {
            height: 15%;
            background-color: lightgray;
            text-align: center;
        }

        /* Estilo básico para o menu */
        .menu {
            width: 20%;
            background-color: lightgreen;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <table border="1px">
        <tr>
            <td>
                <table class="inner-table" border="1px">
                    <tr>
                        <td colspan="2" class="banner">
                            <!-- A imagem é agora um fundo da célula -->
                        </td>
                    </tr>
                    <tr class="content">
                        <td class="menu">
                            MENU
                        </td>
                        <td>
                            CONTEÚDO
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="footer">
                            RODAPÉ
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
