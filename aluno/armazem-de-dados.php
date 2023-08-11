<?php include '../sessao.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>Criar conta</title>
</head>
<body>

<?php
require_once '../conexao-banco-de-dados.php';

##cadastrar
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $dataNascimento = $_POST['dataNascimento'];
    $numeroTelefone = $_POST['numeroTelefone'];
    $turma = $_POST['turma'];
    $emailInstitucional = $_POST['emailInstitucional'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

    // Verificar se o email já existe no banco de dados
    $sql_check_email = "SELECT * FROM Aluno WHERE emailInstitucional = :emailInstitucional";
    $stmt_check_email = $conexao->prepare($sql_check_email);
    $stmt_check_email->bindParam(':emailInstitucional', $emailInstitucional);
    $stmt_check_email->execute();


    // Se o email já existe, exiba uma mensagem de erro
    if ($stmt_check_email->rowCount() > 0) {

      echo "<script> alert('Este email já está cadastrado! Faça seu login ou tente o cadastro com outro email.')
      window.location.href = 'cadastro-aluno.php';
      </script>";
      sleep(2);

    } 
    else {
        // Caso contrário, insira os dados no banco de dados
        $sql_insert = "INSERT INTO Aluno (nome, genero, dataNascimento, numeroTelefone, turma, emailInstitucional, senha, cpf) 
                       VALUES (:nome, :genero, :dataNascimento, :numeroTelefone, :turma, :emailInstitucional, :senha, :cpf)";

        $stmt_insert = $conexao->prepare($sql_insert);
        $stmt_insert->bindParam(':nome', $nome);
        $stmt_insert->bindParam(':genero', $genero);
        $stmt_insert->bindParam(':dataNascimento', $dataNascimento);
        $stmt_insert->bindParam(':numeroTelefone', $numeroTelefone);
        $stmt_insert->bindParam(':turma', $turma);
        $stmt_insert->bindParam(':emailInstitucional', $emailInstitucional);
        $stmt_insert->bindParam(':senha', $senha);
        $stmt_insert->bindParam(':cpf', $cpf);

        if ($stmt_insert->execute()) {

            echo "<script> alert('Cadastrado com sucesso!') 
            window.location.href = 'login-aluno.php';
            </script>";
            sleep(2);

        } 

   
}
}

        #######alterar
        if(isset($_POST['edicao'])){

            $user_id = getUserId();

            ##dados recebidos pelo metodo $_POST
            $nome = $_POST ['nome'];
            $genero = $_POST ['genero'];
            $dataNascimento = $_POST ['dataNascimento'];
            $numeroTelefone = $_POST ['numeroTelefone'];
            $turma = $_POST ['turma'];
            $emailInstitucional = $_POST ['emailInstitucional'];
            $senha = $_POST ['senha'];
            $cpf = $_POST ['cpf'];
            $id = $user_id;
       
          ##codigo sql
        $sql = "UPDATE  Aluno SET nome= :nome, genero= :genero, dataNascimento= :dataNascimento, numeroTelefone= :numeroTelefone, turma= :turma, emailInstitucional= :emailInstitucional, senha= :senha, cpf= :cpf WHERE id= :id";
       
        ##junta o codigo sql a conexao do banco
        $stmt = $conexao->prepare($sql);
    
        ##diz o paramentro e o tipo  do paramentros7
        $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
        $stmt->bindParam(':genero',$genero, PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimento',$dataNascimento, PDO::PARAM_STR);
        $stmt->bindParam(':numeroTelefone',$numeroTelefone, PDO::PARAM_STR);
        $stmt->bindParam(':turma',$turma, PDO::PARAM_STR);
        $stmt->bindParam(':emailInstitucional',$emailInstitucional, PDO::PARAM_STR);
        $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
        $stmt->bindParam(':cpf',$cpf, PDO::PARAM_STR);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    
        if($stmt->execute())
            {
                 echo " <script>alert('$nome, seus dados foram alterados com sucesso!!')
                         window.location.href = '../index.php'</script>;";
            }
    }   
    
 #######alterarsenha
if(isset($_POST['redefinicaoSenha'])){

    ##dados recebidos pelo metodo $_POST
    $nome = $_POST ['nome'];
    $cpf = $_POST ['cpf'];
    $emailInstitucional = $_POST ['emailInstitucional'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirmaSenha'];

    // Verifica se a senha digitada é igual à confirmação de senha
    if ($senha === $confirmaSenha) {

        // Verificar se os dados existem no banco de dados
        $sql_check_dados = "SELECT * FROM Aluno WHERE nome = :nome AND cpf = :cpf AND emailInstitucional = :emailInstitucional";
        $stmt_check_dados = $conexao->prepare($sql_check_dados);
        $stmt_check_dados->bindParam(':emailInstitucional', $emailInstitucional);
        $stmt_check_dados->bindParam(':nome', $nome);
        $stmt_check_dados->bindParam(':cpf', $cpf);
        $stmt_check_dados->execute();

        if ($stmt_check_dados->rowCount() > 0) {

            // Existem registros com o mesmo nome e CPF, então faça o UPDATE no banco de dados
            $sql_update = "UPDATE Aluno SET senha = :senha WHERE nome = :nome AND cpf = :cpf AND emailInstitucional = :emailInstitucional";
            $stmt_update = $conexao->prepare($sql_update);
            $stmt_update->bindParam(':senha', $senha);
            $stmt_update->bindParam(':nome', $nome);
            $stmt_update->bindParam(':cpf', $cpf);
            $stmt_update->bindParam(':emailInstitucional', $emailInstitucional);

            if ($stmt_update->execute()) {
                echo "<script>alert('$nome, sua senha foi redefinida com sucesso!!')
                window.location.href = 'login-aluno.php'</script>;";
                sleep(2);
            } else {
                echo "<script>alert('Erro ao atualizar a senha.')
                      window.location.href = 'redefinicao-senha.php'</script>;";
            }

        } else {
            echo "<script>alert('Não foram encontrados registros com o mesmo nome, cpf e email.')
            window.location.href = 'login-aluno.php'</script>;";
        }
    } else {
        echo "<script>alert('Senha e confirmação de senha apresentam diferentes caracteres.')
            window.location.href = 'redefinicao-senha.php'</script>;";
    }
}

?>

</body>
</html>
