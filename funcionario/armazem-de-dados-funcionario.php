<?php include '../sessao.php'; ?>

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
    $linkCurriculo = $_POST['linkCurriculo'];
    $crocrp = $_POST['crocrp'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

    if (strtolower($crocrp) !== "cro" && strtolower($crocrp) !== "crp") {
        echo "<script> 
            alert('Digite somente CRO ou CRP para o campo CRO ou CRP.');
            window.location.href = 'cadastro-funcionario.php';
        </script>";
    }

    // Verificar se o crocrp já existe no banco de dados
    $sql_check_crocrp = "SELECT * FROM funcionario WHERE crocrp = :crocrp";
    $stmt_check_crocrp = $conexao->prepare($sql_check_crocrp);
    $stmt_check_crocrp->bindParam(':crocrp', $crocrp);
    $stmt_check_crocrp->execute();


    // Se o crocrp já existe, exiba uma mensagem de erro
    if ($stmt_check_crocrp->rowCount() > 0) {

      echo "<script> alert('Este CRO ou CRP já está cadastrado! Faça seu login ou tente o cadastro com outro CRO ou CRP.')
      window.location.href = 'cadastro-funcionario.php';
      </script>";
      sleep(2);

    } 
    else {
        // Caso contrário, insira os dados no banco de dados
        $sql_insert = "INSERT INTO funcionario (nome, genero, dataNascimento, numeroTelefone, linkCurriculo, crocrp, senha, cpf) 
                       VALUES (:nome, :genero, :dataNascimento, :numeroTelefone, :linkCurriculo, :crocrp, :senha, :cpf)";

        $stmt_insert = $conexao->prepare($sql_insert);
        $stmt_insert->bindParam(':nome', $nome);
        $stmt_insert->bindParam(':genero', $genero);
        $stmt_insert->bindParam(':dataNascimento', $dataNascimento);
        $stmt_insert->bindParam(':numeroTelefone', $numeroTelefone);
        $stmt_insert->bindParam(':linkCurriculo', $linkCurriculo);
        $stmt_insert->bindParam(':crocrp', $crocrp);
        $stmt_insert->bindParam(':senha', $senha);
        $stmt_insert->bindParam(':cpf', $cpf);

        if ($stmt_insert->execute()) {

            echo "<script> alert('Cadastrado com sucesso!') 
            window.location.href = 'login-funcionario.php';
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
            $linkCurriculo = $_POST ['linkCurriculo'];
            $crocrp = $_POST ['crocrp'];
            $senha = $_POST ['senha'];
            $cpf = $_POST ['cpf'];
            $id = $user_id;
       
          ##codigo sql
        $sql = "UPDATE  funcionario SET nome= :nome, genero= :genero, dataNascimento= :dataNascimento, numeroTelefone= :numeroTelefone, linkCurriculo= :linkCurriculo, crocrp= :crocrp, senha= :senha, cpf= :cpf WHERE id= :id";
       
        ##junta o codigo sql a conexao do banco
        $stmt = $conexao->prepare($sql);
    
        ##diz o paramentro e o tipo  do paramentros7
        $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
        $stmt->bindParam(':genero',$genero, PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimento',$dataNascimento, PDO::PARAM_STR);
        $stmt->bindParam(':numeroTelefone',$numeroTelefone, PDO::PARAM_STR);
        $stmt->bindParam(':linkCurriculo',$linkCurriculo, PDO::PARAM_STR);
        $stmt->bindParam(':crocrp',$crocrp, PDO::PARAM_STR);
        $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
        $stmt->bindParam(':cpf',$cpf, PDO::PARAM_STR);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    
        if($stmt->execute())
            {
                 echo " <script>alert('$nome, seus dados foram alterados com sucesso!!')
                         window.location.href = 'editar-perfil-funcionario.php'</script>;";
            }
    }  
    
    #######alterarsenha
if(isset($_POST['redefinicaoSenha'])){

    ##dados recebidos pelo metodo $_POST
    $nome = $_POST ['nome'];
    $cpf = $_POST ['cpf'];
    $crocrp = $_POST ['crocrp'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirmaSenha'];

    // Verifica se a senha digitada é igual à confirmação de senha
    if ($senha === $confirmaSenha) {

        // Verificar se os dados existem no banco de dados
        $sql_check_dados = "SELECT * FROM funcionario WHERE nome = :nome AND cpf = :cpf AND crocrp = :crocrp";
        $stmt_check_dados = $conexao->prepare($sql_check_dados);
        $stmt_check_dados->bindParam(':crocrp', $crocrp);
        $stmt_check_dados->bindParam(':nome', $nome);
        $stmt_check_dados->bindParam(':cpf', $cpf);
        $stmt_check_dados->execute();

        if ($stmt_check_dados->rowCount() > 0) {

            // Existem registros com o mesmo nome e CPF, então faça o UPDATE no banco de dados
            $sql_update = "UPDATE funcionario SET senha = :senha WHERE nome = :nome AND cpf = :cpf AND crocrp = :crocrp";
            $stmt_update = $conexao->prepare($sql_update);
            $stmt_update->bindParam(':senha', $senha);
            $stmt_update->bindParam(':nome', $nome);
            $stmt_update->bindParam(':cpf', $cpf);
            $stmt_update->bindParam(':crocrp', $crocrp);

            if ($stmt_update->execute()) {
                echo "<script>alert('$nome, sua senha foi redefinida com sucesso!!')
                window.location.href = 'login-funcionario.php'</script>;";
                sleep(2);
            } else {
                echo "<script>alert('Erro ao atualizar a senha.')
                      window.location.href = 'redefinicao-senha-funcionario.php'</script>;";
            }

        } else {
            echo "<script>alert('Não foram encontrados registros com o mesmo nome, cpf e email.')
            window.location.href = 'login-funcionario.php'</script>;";
        }
    } else {
        echo "<script>alert('Senha e confirmação de senha apresentam diferentes caracteres.')
            window.location.href = 'redefinicao-senha-funcionario.php'</script>;";
    }
}
?>

</body>
</html>
