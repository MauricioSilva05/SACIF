<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  <title>Redefinir senha</title>
  <link rel="stylesheet" href="styles.css">
</head>

<style>

:root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria:#3E95F7;
}

body {
  font-family: Arial, sans-serif;
  color: var(--cortextoprincipal);
  height: 600px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  font-weight: bold;
  background-color: var(--corsecundaria);
}

.container {
  max-width: 500px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: white;
  margin-top: 30px;
  box-shadow: 0px 0px 25px 10px var(--corterciaria);
}

.main{
    max-width: 480px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

h1 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input {
  width: 450px;
  font-size: 16px;
  border: 1px solid var(--corsecundaria);
  border-radius: 5px;
  height: 30px;
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  font-size: 16px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #45a049;
}

.lnr-eye {
    position: absolute;
    top: 30px;
    right: 5px;
    cursor: pointer;
    height: 20px;
    width: 20px;
}


.inputSenha{
    position: relative;
}

input[type="submit"]:hover {
    background-color: var(--corterciaria);
}

input[type="submit"]:focus {
    outline: none;
}

input[type="submit"] {
    background-color: var(--corsecundaria);
    color: var(--corprincipal);
    border-radius: 5px;
    width: 300px;
    height: 40px;
    font-size: 15px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-weight: bold;
}

.botaolayout{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding-top: 0px;
    height: 80px;
    width: 455px;
    margin-top: 30px;
    margin-bottom: 10px;
    gap: 15px;
}

#fazerlogin{
    color: var(--corsecundaria);
}

#fazerlogin:hover{
    color: var(--corterciaria);
}

</style>


<body>
  <div class="container">
  <div class="main">
    <h1>Redefinir senha</h1>

    <form action="armazem-de-dados.php" method="post">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" placeholder="Digite o nome cadastrado anteriormente" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input maxlength="14" placeholder="Digite o CPF cadastrado anteriormente" minlength="14" type="text"  id="cpf" name="cpf" required>
      </div>

      <div class="form-group">
        <label for="email">Email Institucional:</label>
        <input type="email" placeholder="Digite o email cadastrado anteriormente" id="email" name="emailInstitucional" required>
      </div>

      <div class="form-group">
      <div class="inputSenha">
        <label for="senha">Senha:</label>
        <input type="password" maxlength="8" id="senha" name="senha" required>
        <img class="lnr-eye"  id="imgolho" onclick="mostrarsenha()" src="../aluno/imagens/eye.svg" alt="">
      </div>
      </div>

      <div class="form-group">
      <div class="inputSenha">
        <label for="confirma-senha">Confirme a Senha:</label>
        <input type="password" maxlength="8" required id="confirmaSenha" name="confirmaSenha" required>
        <img class="lnr-eye"  id="imgolho2" onclick="mostrarsenha2()" src="../aluno/imagens/eye.svg" alt="">
      </div>
      </div>

      <div class="botaolayout">
      <input type="submit" value="Confirmar" name="redefinicaoSenha">
      <a href="../aluno/login-aluno.php" id="fazerlogin">Voltar</a>
      </div>

    </form>
    </div>

    <script>
                function mostrarsenha(){
                    var tipo = document.getElementById('senha');
                    let icon = document.getElementById('imgolho');
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

    <script>
                function mostrarsenha2(){
                    var tipo = document.getElementById('confirmaSenha');
                    let icon = document.getElementById('imgolho2');
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

  </div>


</body>
</html>