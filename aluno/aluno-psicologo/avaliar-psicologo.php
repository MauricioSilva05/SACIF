<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>Avaliar Psicólogo</title>
    <style>
    
      body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color:#3e95f7;margin:0;
        }

    form {
        max-width: 500px;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .container{
        display:flex;   
        align-items: center;
        justify-content: center;
        flex-direction:column;
        height: 537px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"] {
        width: 95%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus {
        border-color: #3b60ed;
        outline: none;
    }

    input[type="submit"] {
        background-color: #3b60ed;
        color: #ffffff;
        width: 180px;
        height: 40px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        border:none;
        cursor:pointer;
        margin-left:50px;
        font-size:16px;
    }
    input[type="number"] {
        width: 7%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    .button-container {
        margin: 20px;
        text-align: center;
    }

    .button {
        background-color: #3b60ed;
        color: #ffffff;
        width: 180px;
        height: 40px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        border:none;
        cursor:pointer;
        margin-left:40px;
        text-align:center;
        align-items:center;display:flex;justify-content:center;
    }
    input[type="date"] {
        width: 98%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    input[type="date"]:focus {
        border-color: #3b60ed;
        outline: none;
    }

    .button:hover {
        background-color:#3e95f7;transform: scale(1.05);
    }

    input[type="submit"]:hover{
        background-color:#3e95f7;transform: scale(1.05);
    }

    a {
        text-decoration: none;
        color: inherit;
    }
    .ulti{
display:flex;
flex-direction:row;
    }

    header {
            background-color: #3b60ed;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }
</style>

</style>

</head>
<body> 
<header>
        <h1>Avalie sua consulta</h1>
    </header>
<?php
   require_once('../../conexao-banco-de-dados.php');
   $aluno = $_GET['aluno'];
   $dt = $_GET['dt'];
   $horario = $_GET['horario'];
   $tipo = $_GET['tipo'];
   $funcionario = $_GET['funcionario'];
   ?>

    <div class="container">
    <form method="GET" action="crud-aluno-psicologo.php">
        <label for="nota">Nota da consulta</label>
        <input type="number" max="10" min="0" id="nota" name="nota" required>
        
        <!-- Corrigir aqui os campos ocultos para enviar o nome do aluno -->
        <label for="aluno">Nome do aluno</label>
        <input name="aluno" type="text" readonly value="<?php echo $aluno; ?>" />
        <input name="dt" type="hidden" value="<?php echo $dt; ?>" />
        <input name="horario" type="hidden" value="<?php echo $horario; ?>" />
        <input name="tipo" type="hidden" value="<?php echo $tipo; ?>" />
        <input name="funcionario" type="hidden" value="<?php echo $funcionario; ?>" />
        <label for="texto">Comentario</label>
        <input type="text" id="texto" name="texto" required>

        <div class="ulti"> <input type="submit"  name="avaliar" value="Avaliar">
    <a href="calendario-aluno-psicologo.php" class="button">Voltar</a>
        </div>
    </form>
    </div>

  

   
</body>
</html>