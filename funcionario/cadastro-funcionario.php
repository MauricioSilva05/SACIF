<?php
include_once 'armazem-de-dados-funcionario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
</head>
<link rel="stylesheet" href="cadastro-funcionario.css">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

<body>

<div class="layout">
    
    <div class="container">

        <div class="titulo">
        <h1>Criar conta</h1>
        <div class="links">
            <div class="botao1">
                  <a class="linktitulo" href="cadastro-funcionario.php">Funcionário</a>
            </div>

            <div class="botao1">
                  <a class="linktitulo" href="../aluno/cadastro-aluno.php">Aluno</a>
            </div>
           
        </div>
        </div>
    
        <form action="armazem-de-dados-funcionario.php" method="post">

            <div class="organizacao">
                  
                <div class="organizacao1">

                  <label for="nome">Nome:</label>
                  <input type="text" class="input1" id="nome" name="nome" required>

                  <label for="nome">Gênero:</label>
                  <select name="genero" class="input1" id="genero" required>
                    <option value=""></option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</Option>
                  </select>

                  <label for="crocrp">CRO ou CRP:</label>
                  <input type="text" minlength="3" maxlength="3" class="input1" id="crocrp" name="crocrp" required placeholder="CRO para Dentista ou CRP para Psicólogo">

                  <label for="senha">Senha:</label>
                  <div class="inputSenha">
                  <input type="password" maxlength="8"  class="input1" id="senha"  name="senha" required> 
                  <img class="lnr-eye"  id="imgolho" onclick="mostrarsenha()" src="../funcionario/imagens/eye.svg" alt="">
                  </div> 

                </div>
            
                <div class="organizacao2">
                  <label for="idade">Data de Nascimento:</label>
                  <input type="date" class="input2" id="idade" name="dataNascimento" required>
            
                  <label for="telefone">Número de Telefone:</label>
                  <input type="tel" pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}" maxlength="14" class="input2" id="telefone" placeholder="Formato: DD 00000-0000" name="numeroTelefone" required>

                  <label for="curriculo">Curriculo:</label>
                  <input type="url" class="input2" id="curriculo" name="linkCurriculo" placeholder="Link currículo Linkedin" required>

                  <label for="cpf">CPF:</label>
                  <input type="text" maxlength="14" class="input2" id="cpf" name="cpf" required>

                </div>

            </div>
            
            <div class="botaolayout">
            <input type="submit" name="cadastrar" value="Cadastrar"> 
            </div>
            <div class="link">
                <label>Já possui cadastro? <a href="login-funcionario.php" id="fazerlogin">Fazer login</a></label>
            </div>
        </form>
        

        <script>
                function mostrarsenha(){
                    var tipo = document.getElementById('senha');
                    let icon = document.getElementById('imgolho');
                    if(tipo.type == 'password'){
                        tipo.type = 'text';
                        icon.src = '../funcionario/imagens/eye-off.svg';
                    }
                    else{
                        icon.src = '../funcionario/imagens/eye.svg';
                        tipo.type = 'password';
                    }
                }
            </script>

    </div>

    <div class="decoracao">
            <img class="decoracaoImagem" src="../funcionario/imagens/imagem-dentista-removebg-preview.png" alt="">
            <img class="decoracaoImagem" src="../funcionario/imagens/imagem-psicologo.png" alt="">
    </div>
</div>



</body>
</html>