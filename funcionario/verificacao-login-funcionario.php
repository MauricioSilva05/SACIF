<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    // Verificar se o crocrp já existe no banco de dados
    $sql_check_crocrp = "SELECT * FROM funcionario WHERE crocrp = :crocrp";
    $stmt_check_crocrp = $conexao->prepare($sql_check_crocrp);
    $stmt_check_crocrp->bindParam(':crocrp', $crocrp);
    $stmt_check_crocrp->execute();

    // Se o crocrp já existe, exiba uma mensagem de erro
    if ($stmt_check_crocrp->rowCount() > 0) {
        echo "<script> alert('Este CRO ou CRP já está cadastrado! Faça seu login ou tente o cadastro com outro CRO ou CRP.') </script>";
    } else {
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
            $_SESSION['crocrp'] = $crocrp;
            echo "<script> alert('Cadastrado com sucesso!') 
            <a href='../index.php'>Login</a></script>";
        } 
        else {
            echo "<script> alert('Este CRO ou CRP já está cadastrado! Faça seu login ou tente o cadastro com outro CRO ou CRP.') </script>";
        }
    }

    ?>

</body>
</html>