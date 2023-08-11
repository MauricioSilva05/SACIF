<?php 

include '../sessao.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>Histórico</title>

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
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
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



    .button-container2 {
        margin: 20px;
        text-align: center;
    }

    .button {
        display:flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 130px;
        background-color: #3b60ed;
        color: #ffffff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        border: none; 
        cursor: pointer; 
        margin-bottom: 5px; 
        text-align: center;    
    }

    .button:hover {
        background-color: #3e95f7;
        color: white; box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);transform: scale(1.05);
    }

    .button-container {
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
    require_once('../conexao-banco-de-dados.php');
    $user_name = getUserName();
    $user_tipo = getUserTipo();

    class Consulta {
        private $conexao;
    
        public function __construct($conexao) {
            $this->conexao = $conexao;
        }
    
        public function getConsultas($aluno) {
            $sql = "SELECT * FROM (
                  SELECT horario, dt, tipo, aluno, funcionario, id FROM ConsultaPsicologo
                  UNION ALL
                  SELECT horario, dt, tipo, aluno, funcionario, id FROM ConsultaDentista
                ) AS todasAsTabelas
                WHERE aluno = :aluno
                ORDER BY dt DESC";
    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':aluno', $aluno, PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    $user_name = getUserName();
    $user_tipo = getUserTipo();
    
    $consulta = new Consulta($conexao);
    $consultas = $consulta->getConsultas($user_name);
    
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
            <?php foreach ($consultas as $value) { ?>
                <tr>
                    <td><?php echo $value['horario']; ?></td>
                    <td><?php echo $value['dt']; ?></td>
                    <td><?php echo $value['tipo']; ?></td>
                    <td><?php echo $value['aluno']; ?></td>
                    <td><?php echo $value['funcionario']; ?></td>
                    <td>
                        <?php if ($value['dt'] >= $dataAtual) { ?>
                            <?php $crudAction = ($value['funcionario'] === 'João Paulo') ? 'aluno-dentista/crud-aluno-dentista.php' : 'aluno-psicologo/crud-aluno-psicologo.php'; ?>
                            <form method="GET" action="<?php echo $crudAction; ?>">
                                <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                                <button name="remarcar" type="submit" class="button">Remarcar</button>
                            </form>
    
                            <?php $cancelAction = ($value['funcionario'] === 'João Paulo') ? 'aluno-dentista/crud-aluno-dentista.php' : 'aluno-psicologo/crud-aluno-psicologo.php'; ?>
                            <form method="GET" action="<?php echo $cancelAction; ?>">
                                <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                                <button name="excluir" type="submit" class="button">Cancelar</button>
                            </form>
                        <?php } ?>
    
                        <?php $avaliarAction = ($value['funcionario'] === 'João Paulo') ? 'aluno-dentista/avaliar-dentista.php' : 'aluno-psicologo/avaliar-psicologo.php'; ?>
                        <form method="GET" action="<?php echo $avaliarAction; ?>">
                            <input name="aluno" type="hidden" value="<?php echo $value['aluno']; ?>" />
                            <input name="dt" type="hidden" value="<?php echo $value['dt']; ?>" />
                            <input name="horario" type="hidden" value="<?php echo $value['horario']; ?>" />
                            <input name="tipo" type="hidden" value="<?php echo $value['tipo']; ?>" />
                            <input name="funcionario" type="hidden" value="<?php echo $value['funcionario']; ?>" />
                            <input name="crocrp" type="hidden" value="<?php echo $user_tipo; ?>" />
                            <button name="avaliar" type="submit" class="button">Avaliar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="button-container2">
            <a href="../index.php" class="button">Voltar</a>
        </div>
</div>
</body>
</html>
