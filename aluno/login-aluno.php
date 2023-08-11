<?php
include '../sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

</head>
<body>
<style>
    :root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria:#3E95F7;
}
body{
    display: flex;
    font-family: Arial, Helvetica, sans-serif;
    color: #161F30;
}


.tituloheaderesquerda{
    font-size: 30px;
    text-align: center;
    border-bottom: 1px white solid;
    color: white;
    padding: 20px;
}
.imgtitulo{
    height: 50px;
    height: 80px;
}
.colunaesquerda{
    display: flex;
    width: 500px;
    height: 637px;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    background-image: url("../aluno/imagens/IF-imagem.jpg");
    color: white;
}

.colunadireita{
    display: flex;
    width: 850px;
    height: 637px;
    justify-content: center;
    align-items: center;
    margin: auto;
}

input{
    border: 1px solid var(--corsecundaria);
    border-radius: 5px;
    height: 30px;
}

h2{
    font-size: 40px;
    text-align: center;
}

form{
    font-weight: bold;
}

#botao{
    background-color: var(--corsecundaria);
    color: white;
    border-radius: 5px;
    width: 300px;
    height: 40px;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
    font-weight: bold;
} 

#botao:hover{
color: white;
background-color:#3E95F7;
font-weight: bold;
}

#botaolayout{
    padding-top: 20px;
    height: 40px;
    width: 450px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.link{
    width: 450px;
    height: 30px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.subtitulo{
    font-size: 20px;
    text-align: center;
}

label{
    margin-top: 10px;
}

input{
    margin-bottom: 20px;
}

.configemail{
    width: 450px;
}

.configsenha{
    width:450px;
    margin-bottom: 20px;
    border: 1px solid var(--corsecundaria);
    border-radius: 5px;
    height: 30px;
}

.criarconta{
    color:#3B60ED;
}

.criarconta:hover{
    color: #3E95F7;
}

.esqueceusenha{
    color:#3B60ED;
    font-size: 12px;
}

.esqueceusenha:hover{
    color: #3E95F7;
}

.senhaEsqueceu{
    display: flex;
    justify-content: space-between;
    width: 450px;
}

.links{
    height:80px;
    width: 450px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 25px;
}

.linktitulo{
    color: var(--corprincipal);
    border-radius: 5px;
    font-size: 15px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-weight: bold;
    text-decoration: none;
}

.botao1{
    background-color: var(--corsecundaria);
    height: 40px;
    width: 100px;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    cursor: pointer;

}

.botao1:hover{
    background-color: var(--corterciaria);
    transition:  0.3s;
    color: white;
}

.lnr-eye {
    position: relative;
    top: 5px;
    right: 35px;
    cursor: pointer;
    height: 20px;
    width: 20px;
}

.dadossenha{
    position: relative;
}

.tituloheaderesquerda{
    background-image: url(../aluno/imagens/logo-sistema-removebg-preview.png);
    height: 90px;
    width: 430px;
    background-repeat: no-repeat;
}

</style>

<body>
  
    <div class="container">

    <div class="colunaesquerda">
    <div class="tituloheaderesquerda">
        
    </div>
    <h1>Sistema de Agendamento <br> de Consultas do <br> Instituto Federal Baiano</h1>
    <label>Campus Guanambi</label>

    </div>
    </div>

<div class="colunadireita">


<form action="login-aluno.php" method="post">
    
    <h2>Faça seu login
        <p class="subtitulo">Informe seus dados para continuar</p>

    </h2>
            <div class="links">
            <div class="botao1">
                  <a class="linktitulo" href="../funcionario/login-funcionario.php">Funcionário</a>
            </div>

            <div class="botao1">
                  <a class="linktitulo" href="login-aluno.php">Aluno</a>
            </div>
           
        </div> 


    
<form action="login-aluno.php" method="post">

        <label for="emailInstitucional">Email Institucional:</label>
        <div class="dados">
            <input type="email" id="emailInstitucional"  placeholder="Informe seu Email Institucional" name="emailInstitucional" class="configemail" required></div>
    
        <label class="senhaEsqueceu" for="senha">Senha: <a href="redefinicao-senha.php" class="esqueceusenha">Esqueceu a senha</a></label>

        <div class="dadossenha">
            <input type="password"  maxlength="8" id="senha" placeholder="Informe sua senha" name="senha" class="configsenha" required>
            <img class="lnr-eye" onclick="mostrarsenha()" src="../aluno/imagens/eye.svg" alt="">
        </div>

            
     <div id="botaolayout">
     <input type="submit" name="entrar" value="Entrar" id="botao"> <br> 
    </div>
    <div class="link">
    <label>Ainda não possui cadastro? <a class="criarconta" href="cadastro-aluno.php">Criar conta</a></label>
    
    </div>
    </div>
</form>

<script>
    function mostrarsenha(){
        var tipo = document.getElementById('senha');
        let icon = document.querySelector('img');
        if(tipo.type == 'password'){
            tipo.type = 'text';
            icon.src = '../aluno/imagens/eye-off.svg';
        }
        else{
            icon.src = '../aluno/imagens/eye.svg';
            tipo.type = 'password';
        }
    }
</script>

<?php


require_once '../conexao-banco-de-dados.php';

if (isset($_POST['entrar'])) {

    $emailInstitucional = $_POST['emailInstitucional'];
    $senha = $_POST['senha'];

    // Verificar se o email já existe no banco de dados
    $sql_check_email = "SELECT * FROM Aluno WHERE emailInstitucional = :emailInstitucional AND senha = :senha";
    $stmt_check_email = $conexao->prepare($sql_check_email);
    $stmt_check_email->bindParam(':emailInstitucional', $emailInstitucional);
    $stmt_check_email->bindParam(':senha', $senha);
    $stmt_check_email->execute();

    if ($stmt_check_email->rowCount() > 0) {

              // O email e senha são válidos, o usuário está autenticado
              // Obter informações do usuário a partir do resultado da consulta
              $usuario = $stmt_check_email->fetch(PDO::FETCH_ASSOC);
              $user_id = $usuario['id'];
              $user_name = $usuario['nome'];

              
            echo "<script> 
            window.location.href = '../index.php';
            </script>";
            sleep(2);
            
             // Iniciar a sessão e armazenar informações do usuário na sessão
             $_SESSION['user_id'] = $user_id;
             $_SESSION['user_name'] = $user_name;

    } 
    else {

        if ($stmt_check_email->execute()) {

            echo "<script> alert('Usuário ou senha inválidos! Talvez você não tenha cadastro, verifique.')
            window.location.href = 'login-aluno.php';
            </script>";
            sleep(2);

        } 

   
}
}
?>

</body>
</html>