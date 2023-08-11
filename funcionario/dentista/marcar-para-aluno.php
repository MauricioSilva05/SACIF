<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>Marcar Consulta Para Aluno</title>
    <style>
  

  body {
       background-color: #f2f2f2;
       font-family: Arial, sans-serif;
       color: #3e95f7;margin:0;
   }

form {
   width: 500px;
   padding: 20px;
   padding-right:30px;
   background-color: #ffffff;
   box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
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
   width: 98%;
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
font-size:16px;
   border: none;
   width: 150px;
   height: 40px;
   border-radius: 4px;
   cursor: pointer;
}



.button-container {
      background-color: transparent;
   color: #ffffff;
   border: none;
   display: flex;
   flex-direction:row;
   justify-content:space-around;
}

.button {
text-align:center;
padding-top:10px;
   background-color: #3b60ed;
   color: #ffffff;
  width: 150px;
   text-decoration: none;
   border-radius: 4px;
   transition: background-color 0.3s ease;
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
   background-color: #3e95f7;
   box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3); transform: scale(1.05);
}

.bu:hover {
   background-color: #3e95f7;
   box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3); transform: scale(1.05);
}

a {
   text-decoration: none;
   color: inherit;
}

select{
   width: 103%;
   padding: 10px;
   margin-bottom: 20px;
   border: 1px solid #cccccc;
   border-radius: 4px;
   transition: border-color 0.3s ease;
}

header {
       background-color: #3b60ed;
       color: #ffffff;
       padding: 10px;
       text-align: center;
       align-items: center;
}

.ulti{
   display: flex;
   justify-content: space-around;
}

    </style>
</head>
<body> 
<header>
        <h1>Marque o horário para o aluno</h1>
    </header>
    <?php
        require_once('../../conexao-banco-de-dados.php');

        $id = $_GET['id'];

        ##sql para selecionar apenas um aluno
        $sql = "SELECT * FROM ConsultaDentista where id= :id";
        
        # junta o sql à conexão do banco
        $retorno = $conexao->prepare($sql);

        ##diz o parâmetro e o tipo do parâmetro
        $retorno->bindParam(':id', $id, PDO::PARAM_INT);

        #executa a estrutura no banco
        $retorno->execute();

        #transforma o retorno em array
        $array_retorno = $retorno->fetch();
        
        ##armazena o retorno em variáveis
        $horario = $array_retorno['horario'];
        $dt = $array_retorno['dt'];
        $funcionario = $array_retorno['funcionario'];
        $tipo = $array_retorno['tipo'];
        $aluno = $array_retorno['aluno'];
        $id = $array_retorno['id'];
    ?>

    <div class="container">
    <form method="GET" action="crud-dentista.php">
        <label for="horario">Horário</label>
        <input type="text" name="horario" id="horario" value="<?php echo $horario ?>" readonly>
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <label for="dt">Data</label>
        <input type="text" name="dt" id="dt" value="<?php echo $dt ?>" readonly>

        <label for="funcionario">Funcionário</label>
        <input type="text" name="funcionario" id="funcionario" value="<?php echo $funcionario ?>" readonly>

        <label for="tipo">Consulta Online ou Presencial?</label>
        <select name="tipo" class="select" id="tipo">
            <option value="Presencial" <?php if ($tipo === 'Presencial') echo 'selected'; ?>>Presencial</option>
            <option value="Online" <?php if ($tipo === 'Online') echo 'selected'; ?>>Online</option>
        </select>

        <label for="aluno">Nome do Aluno</label>
        <input type="text" placeholder="Digite seu nome" name="aluno" id="aluno" value="<?php echo $aluno ?>">

        <div class="ulti"> <input type="submit"  name="update" value="Marcar">
    <div class="button"><a href="calendario-dentista.php" >Voltar</a></div>
        </div>
    </form>
    </div>
</body>
</html>