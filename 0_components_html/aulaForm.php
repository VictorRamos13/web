<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FORMUL&Aacute;RIO</title>
        <link rel="icon" href="./sadan_img/bocudo.jpeg" />
        
    </head>
    <body>

    <!--
        &letraCÓDIGO;
        tilde ~
        cedil - cedilha
        circ ^
        acute ´
    -->
            <!-- FORMULARIO DE CLIENTE -->
        <form name="frmCadastro" action="processa.php" method="post" enctype="multipart/form-data">
            <!-- types do inpute: hidden, text, password, date, number, button, file, radio, image -->
            <input type="hidden" name="hddCodigo" value="Vitu Ordoni Ramu" />
            <table border="1px" width="300px" cellspacing="4px" cellpadding="5px">
                <tr>
                    <td colspan="2">Cadastro de Cliente</td>
                </tr>

                    <!-- componente text code -->
                <tr>
                    <td>C&oacute;digo:</td>
                    <td width="15%">
                        <!-- readonly = somente leitura, nao da para alterar o que tem dentro -->
                        <input type="text" name="txtCodigo" value="12346" readonly="true" />
                    </td>
                </tr>
                
                    <!-- component text name -->
                <tr>
                    <td width="15%">Nome:</td>
                    <td>
                        <input type="text" name="txtNome" value="" placeholder="Insira o nome aqui" 
                               size="100" maxlength="80" />
                        <!-- size = tamanho de caracteres que defino / maxlength = maximo de caracteres definido -->
                    </td>
                </tr>

                <tr>
                    <td width="15%">Senha:</td>
                    <td>
                        <input type="password" name="txtSenha" placeholder="Insira a senha"  />
                        <!-- disabled = deixa o campo desabilitado, ate na varredura das variaveis -->
                    </td>
                </tr>

                    <!-- component email -->
                <tr>
                    <td width="15%">Email:</td>
                    <td>
                        <input type="text" name="txtEmail" placeholder="Insira aqui o email" 
                        size="100" maxlength="100" />
                    </td>
                </tr>

                    <!-- component Birth date -->
                <tr>
                    <td width="15%">Data de Nascimento:</td>
                    <td>
                        <input type="date" name="txtDataNasc" />
                    </td>
                </tr>

                    <!-- component File -->
                <tr>
                    <td width="15%">Carregue seu arquivo</td>
                    <td>
                        <input type="file" name="txtArquivo" />
                    </td>
                </tr>

                    <!-- component Radio -->
                <tr>
                    <td width="15%">Cachorro favorito:</td>
                    <td>
                        <input type="radio" name="rdbDog" id="rdbLaila" value="1" checked="true" />
                        <label for="rdbLaila">Laila</label><br>

                        <input type="radio" name="rdbDog" id="rdbPrincesa" value="2" />
                        <label for="rdbPrincesa">Princesa</label><br>

                        <input type="radio" name="rdbDog" id="rdbSadan" value="3">
                        <label for="rdbSadan">Sadan</label>
                    </td>
                </tr>

                    <!-- component Checkbox -->
                <tr>
                    <td width="15%">Escolha seu n&atilde;o sei</td>
                    <td>
                        <input type="checkbox" name="chkNS1" /> N&atilde;o sei 1
                        <br />
                        <input type="checkbox" name="chkNS2" /> N&atilde;o sei 2
                        <br />
                        <input type="checkbox" name="chkNS3" /> N&atilde;o sei 3
                        <br />
                        <input type="checkbox" name="chkNS4" /> N&atilde;o sei 4
                    </td>
                </tr>

                    <!-- component Textarea -->
                <tr>
                    <td width="15%">Digite a sua mensagem</td>
                    <td>
                       <textarea name="txaMensagem" rows="5" cols="60"></textarea>
                    </td>
                </tr>

                    <!-- component select as dropbox -->
                     <tr>
                        <td width="15">Qual espécie te chama atenção?</td>
                        <td>
                            <select name="slcEspecie" size="1">
                                <option value="axolote" selected="true">Ambystoma mexicanum</option>
                                <option value="ocapi">Okapia johnstoni</option>
                                <option value="narval">Monodon monoceros</option>
                            </select>
                        </td>
                     </tr>

                     <!-- component select as listbox -->
                    <tr>
                        <td width="15%">Escolha teu filme favorito</td>
                        <td>
                            <select name="slcFilme" size="4">
                                <option value="blade">Blade Runner 2049</option>
                                <option value="inception">Inception</option>
                                <option value="sonho">Um sonho de liberdade</option>
                                <option value="borboleta" selected="true">Efeito borboleta</option>
                            </select>
                            
                        </td>
                    </tr>

                        <!-- component select as groupbox -->
                    <tr>
                        <td width="15%">Liste as coisas de casas</td>
                        <td>
                            <select name="slcList[]" size="9" multiple="true">
                                <optgroup label="Quarto">
                                    <option value="Interruptor">Interruptor</option>
                                    <option value="Tomada">Tomada</option>
                                </optgroup>
                                <optgroup label="Sala">
                                    <option value="TV">TV</option>
                                    <option value="Couch">Couch</option>
                                </optgroup>
                                <optgroup label="Cozinha">
                                    <option value="Prato">Prato</option>
                                    <option value="Torneira">Torneira</option>
                                </optgroup>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%">Aqui um controle de imagem:</td>
                        <td>
                            <input type="image" name="imgImagem" src="dawgs_img/p_invertida.jpeg"
                                   alt="Cachorra colorida invertida" value="fotoP" />
                            <br />
                            <label for="imgImagem">Uma cachorra pintada de cabeça para baixo</label>
                        </td>
                    </tr>

                    <!-- buttons -->
                <tr>
                    <td align="center" colspan="2">
                        <input type="reset" name="btnLimpar" value="Limpar" />
                        <input type="submit" name="btnSalvar" value="Salvar" />
                    </td>
                </tr>
            </table>
        </form>
        
    </body>
</html>