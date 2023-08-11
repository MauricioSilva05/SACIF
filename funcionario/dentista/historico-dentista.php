<?php 

include '../../sessao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>Histórico</title>
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
        width: 130px;
        display: inline-block;
        background-color: #3b60ed;
        color: #ffffff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        border: none; 
        cursor: pointer; 
        margin-bottom: 5px; 
    }

    .button-container2 {
        margin: 20px;
        text-align: center;
    }

    .button:hover {
        background-color: #3e95f7;transform: scale(1.05);
    }

    .button-container td form {
        margin: 0; 
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
        $user_name = getUserName();
        $user_tipo = getUserTipo();

$sql = "SELECT * FROM (
          SELECT horario, dt, tipo, aluno, funcionario, id FROM ConsultaPsicologo
          UNION ALL
          SELECT horario, dt, tipo, aluno, funcionario, id FROM ConsultaDentista
        ) AS todasAsTabelas
        WHERE funcionario = :funcionario
        ORDER BY dt DESC";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':funcionario', $user_name, PDO::PARAM_STR);
$stmt->execute();

date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('Y-m-d');
?>

        <table>
            <thead>
                <tr>
                    <th>Horário</th>
                    <th>Data</th>
                    <th>Consulta online ou presencial?</th>
                    <th>Nome do aluno</th>
                    <th>Nome do funcionário</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($value = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $value['horario']; ?></td>
                        <td><?php echo $value['dt']; ?></td>
                        <td><?php echo $value['tipo']; ?></td>
                        <td><?php echo $value['aluno']; ?></td>
                        <td><?php echo $value['funcionario']; ?></td>
                        <td>
                            <?php if ($value['dt'] >= $dataAtual) { ?>

                                
                                <form method="GET" action="crud-dentista.php">
                                <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                                <button name="remarcar" type="submit" class="button">Remarcar</button>
                                </form>
                                
                               
                                <form method="GET" action="crud-dentista.php">
                                <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                                <button name="excluir" type="submit" class="button">Cancelar</button>
                                </form>
                            <?php } ?>

                            <form method="GET" action="ver-avaliacao.php">
                                <input name="aluno" type="hidden" value="<?php echo htmlspecialchars($value['aluno']); ?>" />
                                <input name="dt" type="hidden" value="<?php echo $value['dt']; ?>" />
                                <input name="horario" type="hidden" value="<?php echo $value['horario']; ?>" />
                                <input name="tipo" type="hidden" value="<?php echo $value['tipo']; ?>" />
                                <input name="funcionario" type="hidden" value="<?php echo htmlspecialchars($value['funcionario']); ?>" />
                                <button name="excluir2" type="submit" class="button">Ver avaliação</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="button-container2">
            <a href="../../index-funcionario.php" class="button">Voltar</a>
        </div>

    </div>
</body>
</html>