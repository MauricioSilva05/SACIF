
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>Horários</title>

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
            margin:0;
        }

        .container {
            width: 1100px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
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
            cursor:pointer;
            border:none;
        }

        .button:hover {
            background-color: #3e95f7;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: inherit;
        }
        .tip{
            text-align:center;
        }

        header {
            background-color: #3b60ed;
            color: #ffffff;
            padding: 10px;
        }
        h1{
            text-align: center;
        }
          
       

    </style>

</head>
<body>
     <header>
        <h1>Lista de Horários</h1>
    </header>
    <div class="container">
   
        <?php
        require_once('../../conexao-banco-de-dados.php');
        $aluno = 'aluno';
        $dataCompleta = $_GET['dia']; // Recebe o valor da data completa do parâmetro 'dia' na URL
        $funcionario = 'funcionario';
        // Consulta SQL com filtro da data completa
        $retorno = $conexao->prepare('SELECT * FROM ConsultaPsicologo WHERE dt = ?');
        $retorno->bindParam(1, $dataCompleta, PDO::PARAM_STR);
        $retorno->execute();
        ?>

        <table> 
            <thead>
                <tr>
                    <th class="tip">Horário</th>
                    <th class="tip">Data</th>
                    <th class="tip">Funcionário</th>
                    <th class="tip">Consulta online ou presencial?</th>
                    <th class="tip"> Nome do aluno</th>
                   
                    
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($retorno->fetchAll() as $value) { ?>
                    <tr>
                        
                        <td class="tip"><?php echo $value['horario']; ?></td>
                        <td class="tip"><?php echo $value['dt']; ?></td>
                        <td class="tip"><?php echo $value['funcionario']; ?></td>
                        <td class="tip" ><?php echo $value['tipo']; ?></td>
                        <td class="tip"><?php echo $value['aluno']; ?></td>
                        
                        

                        <td>
                        <?php if (empty($value['aluno'])) { ?>
            <!-- Formulário (será exibido somente se a variável $aluno estiver vazia) -->
            <form method="GET" action="marcar-para-aluno.php">
                <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                <button name="alterar" type="submit" class="button">Marcar</button>
            </form>
        
            <?php } ?>
                        </td>
                    </tr>
                <?php } ?> 
            </tbody>
        </table> 

        <div class="button-container">
        <a href="cadastrar-horarios.php " class="button">Cadastrar</a>
        </div>
        
        <div class="button-container">
            <a href="calendario-psicologo.php" class="button">Voltar</a>
        </div>

       
    </div>
</body>
</html>