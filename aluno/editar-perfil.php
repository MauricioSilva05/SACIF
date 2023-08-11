<?php include '../sessao.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>


<?php include '../header/header.php'?>

<style>
:root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria: #3E95F7;
}

body {
    font-family: Arial, sans-serif;
    color: var(--corprincipal);
    background-image: linear-gradient(#3B60ED, #3E95F7 );
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    height: 650px;
}

.titulo{
  border-bottom: 1px solid var(--corsecundaria);
  color: var(--cortextoprincipal);
}

.layout{
    width: 1000px;
    height: 530px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    margin-top: 30px;
}

.container {
    width: 550px;
    height: 480px;
    background-color: var(--corprincipal);
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    margin-top: 6px;
}

.main{
    margin-top: 40px;
    height: 350px;
    display: flex;
    align-items: center;
    justify-content: center;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

label {
    margin-top: 10px;
    font-weight: bolder;
    color: var(--cortextoprincipal);
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
    font-weight: bolder;
}

.botaolayout{
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 0px;
    height: 80px;
    width: 550px;
}

a{
    color:#3B60ED;
}

.nomeeemail{
    width: 500px;
}

a:hover{
    color: #3E95F7;
}

input[type="submit"]:hover {
    background-color: var(--corterciaria);
}

input[type="submit"]:focus {
    outline: none;
}

.inputSenha{
    position: relative;
}

input {
    margin-bottom: 20px;
    border: 1px solid var(--corsecundaria);
    border-radius: 5px;
    width: 450px;
    height: 30px;
}


.organizacao1{
    display: flex;
    flex-direction: column;
}

.nomedados2{
    display: flex;
    gap:0px;
    width: 500px;
}

.dadosnome{
    display: flex;
    padding-left: 0px;
    width: 500px;
    gap: 7px;
}

.senha{
    padding: 0px 80px 0px 0px;
}

.genero{
    padding: 0px 75px 0px 40px;
}

.datanascimento{
    padding: 0px 0px 0px 30px;
}

.nrotelefone{
    padding: 0px 11px 0px 0px;
}

.turma{
    padding: 0px 75px 0px 40px;
}

.cpf{
    padding: 0px 0px 0px 45px;
}

.input1{
    margin-bottom: 20px;
    border: 1px solid var(--corsecundaria);
    border-radius: 5px;
    width: 160px;
    height: 30px;
}

.input2{
    margin-bottom: 20px;
    border: 1px solid var(--corsecundaria);
    border-radius: 5px;
    width: 156px;
    height: 30px;
}

.lnr-eye {
    position: absolute;
    top: 5px;
    right: 5px;
    cursor: pointer;
    height: 20px;
    width: 20px;
}

.decoracao{
padding: 30px;
}

.decoracaoImagem{
   height: 250px;
   width: 350px;
} 

</style>

<?php
    
   require_once('../conexao-banco-de-dados.php');

   $user_id = getUserId();
   $user_name = getUserName();

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM Aluno where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$user_id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno ['nome'];
   $genero = $array_retorno ['genero'];
   $dataNascimento = $array_retorno ['dataNascimento'];
   $numeroTelefone = $array_retorno ['numeroTelefone'];
   $turma = $array_retorno ['turma'];
   $emailInstitucional = $array_retorno ['emailInstitucional'];
   $senha = $array_retorno ['senha'];
   $cpf = $array_retorno ['cpf'];
   
?>

<div class="layout">

    <div class="container">

        <div class="titulo">
    
        <h1><?php echo $user_name;?></h1>
    
        </div>

        <div class="main">
    
        <form action="armazem-de-dados.php" method="post">

                <div class="organizacao1">
                  <label for="nome">Nome:</label>
                  <input type="text" class="nomeeemail" id="nome" name="nome" required 
                  value="<?php echo $nome?>">
                  

                  <label for="email">E-mail Institucional:</label>
                  <input type="email" class="nomeeemail" id="email" name="emailInstitucional" required 
                  value="<?php echo htmlspecialchars($emailInstitucional); ?>">
                  </div>

                <div class="nomedados2">
                     <div class="senha"><label for="senha">Senha:</label></div>
                     <div class="genero"><label for="nome">Gênero:</label></div>
                     <div class="datanascimento"><label for="datanascimento">Data de Nascimento:
                     </label>
                     </div>
                </div>


                <div class="dadosnome">

                  <div class="inputSenha">
                  <input type="password" maxlength="8"  class="input1" id="senha" name="senha" required
                  value="<?php echo htmlspecialchars($senha); ?>"> 
                  <img class="lnr-eye" id="imgolho" onclick="mostrarsenha()" src="../aluno/imagens/eye.svg" alt="">
                  </div>

                  <select name="genero" class="input1" required>
                  <option value="Masculino" <?php if ($genero === 'Masculino') echo 'selected'; ?>>Masculino</option>
                  <option value="Feminino" <?php if ($genero === 'Feminino') echo 'selected'; ?>>Feminino</option>
                  <option value="Outro" <?php if ($genero === 'Outro') echo 'selected'; ?>>Outro</Option>
                  </select>


                  <input type="date" class="input1" name="dataNascimento" required 
                  value="<?php echo $dataNascimento; ?>">

                </div>


                <div class="nomedados2">

                  <div class="nrotelefone"><label for="telefone">N° de Telefone:</label></div>
                  <div class="turma"><label for="turma">Turma:</label></div>
                  <div class="cpf"><label for="cpf">CPF:</label></div>
                  
                </div>

                <div class="dadosnome">

                     <input type="text" pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}" maxlength="14" class="input2"  placeholder="Formato: DD 00000-0000" name="numeroTelefone" required
                     value="<?php echo htmlspecialchars($numeroTelefone); ?>">

                     <input type="text" maxlength="4" class="input2" name="turma" required
                     value="<?php echo htmlspecialchars($turma); ?>">
        
                    <input type="text" maxlength="14" class="input2" name="cpf" required
                     value= "<?php echo htmlspecialchars($cpf); ?>">
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">

                <div class="botaolayout">
                   <input type="submit" onclick="return confirm('Tem certeza que deseja alterar seus dados?')" name="edicao" value="Confirmar edições"> 
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

    </div>

</div>


</body>
</html>