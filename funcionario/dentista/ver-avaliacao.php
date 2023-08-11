<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>Ver Avaliação</title>
    <style>

:root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria:#3E95F7;
}

        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: var(--cortextoprincipal);
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #dddddd;
        }

        th {
            background-color: #3b60ed;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .button-container {
            margin: 20px;
            text-align: center;
        }

        .button {
            display: inline-block;
            background-color: #3b60ed;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #3e95f7;transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <div class="container">
   
    <?php
require_once('../../conexao-banco-de-dados.php');
$aluno = $_GET['aluno'];
$dt = $_GET['dt'];
$horario = $_GET['horario'];
$tipo = $_GET['tipo'];
$funcionario = $_GET['funcionario'];

$sql = "SELECT * FROM avaliacao WHERE aluno = :aluno AND dt = :dt AND horario = :horario AND tipo = :tipo AND funcionario = :funcionario";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':aluno', $aluno, PDO::PARAM_STR);
$stmt->bindParam(':dt', $dt, PDO::PARAM_STR);
$stmt->bindParam(':horario', $horario, PDO::PARAM_STR);
$stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
$stmt->bindParam(':funcionario', $funcionario, PDO::PARAM_STR);
$stmt->execute();
?>

<table>
    <thead>
        <tr>
            <th>Horário</th>
            <th>Data</th>
            <th>Consulta online ou presencial?</th>
            <th>Nome do aluno</th>
            <th>Nota da consulta</th>
            <th>Comentário da consulta</th>
            <th colspan="2"></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($stmt->fetchAll() as $value) { ?>
            <tr>
                <td><?php echo $value['horario']; ?></td>
                <td><?php echo $value['dt']; ?></td>
                <td><?php echo $value['tipo']; ?></td>
                <td><?php echo $value['aluno']; ?></td>
                <td><?php echo $value['nota']; ?></td>
                <td><?php echo $value['texto']; ?></td>
                <td>
                    <!-- Adicione aqui os botões de edição ou exclusão -->
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div class="button-container">
    <a href="historico-dentista.php" class="button">Voltar</a>
</div>

       
    </div>
</body>
</html>