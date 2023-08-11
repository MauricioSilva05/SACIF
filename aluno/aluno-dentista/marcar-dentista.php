<?php 

include '../../sessao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>Marcar consulta Dentista</title>

</head>
   
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



<body>
<header>
        <h1>Marque seu horario de consulta</h1>
    </header>
<?php
    require_once('../../conexao-banco-de-dados.php');

   $id = $_GET['id'];
   $user_name = getUserName();

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM ConsultaDentista where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $horario = $array_retorno['horario'];
   $dt = $array_retorno['dt'];
   $funcionario = $array_retorno['funcionario'];
   $tipo = $array_retorno['tipo'];
   $aluno = $array_retorno['aluno'];
   $id = $array_retorno['id'];
   


?>
<div class="container">
  <form method="GET" action="crud-aluno-dentista.php">
  <label for="">Horários</label>
        <input type="text" name="horario" id="" value=<?php echo $horario?> readonly >
        <input type="hidden" name="id" id="" value=<?php echo $id ?> >
  <label for="">Data</label>     
        <input type="date" name="dt" id="" value=<?php echo $dt?> readonly>
   <label for="">Funcionário</label>     
        <input type="text" name="funcionario" id="" value="<?php echo htmlspecialchars($funcionario);?>" readonly>
  <label for="">Consulta online ou presencial?</label>                                              
  <select name="tipo" class="select">
  <option value="Presencial">Presencial</option>
  <option value="Online">Online</option></select>
  <label for="">Nome do Aluno</label>                          
        <input type="text"  name="aluno" id="" value="<?php echo htmlspecialchars($user_name); ?>" readonly >
        

        <div class="ulti"> <input type="submit"  name="update" value="Marcar">
       <div class="button"><a href="calendario-aluno-dentista.php" >Voltar</a></div>
        </div>
  </form>
</div>
</body>
</html>