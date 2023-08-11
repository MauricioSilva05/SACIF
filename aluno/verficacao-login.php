<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    // Verificar se o email já existe no banco de dados
    $sql_check_email = "SELECT * FROM Aluno WHERE emailInstitucional = :emailInstitucional";
    $stmt_check_email = $conexao->prepare($sql_check_email);
    $stmt_check_email->bindParam(':emailInstitucional', $emailInstitucional);
    $stmt_check_email->execute();

    // Se o email já existe, exiba uma mensagem de erro
    if ($stmt_check_email->rowCount() > 0) {
        echo "<script> alert('Este email já está cadastrado! Faça seu login ou tente o cadastro com outro email.') </script>";
    } else {
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
            $_SESSION['emailInstitucional'] = $emailInstitucional;
            echo "<script> alert('Cadastrado com sucesso!') 
            <a href='escolha-profissional.php'>Login</a></script>";
        } 
        else {
            echo "<script> alert('Este email já está cadastrado! Faça seu login ou tente o cadastro com outro email.') </script>";
        }
    }

    ?>

</body>
</html>