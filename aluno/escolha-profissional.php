<?php 

include '../sessao.php';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>

<?php include '../header/header.php'?>

<style>

:root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria: #3E95F7;
}

body{
    background-color: var(--corprincipal);
    font-family: Arial, Helvetica, sans-serif;
    height: 637px;
    color: var(--cortextoprincipal);

}

.container{
    margin: auto;
    height: 637px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 55px;
    box-shadow: 0px 0px 5px var(--corterciaria), 0px, 0px, 25px var(--corterciaria);
}



.imagens{
    height: 500px;
    width: 500px;
    border-radius: 25px;
    background-image: linear-gradient(var(--corterciaria) ,var(--corsecundaria));
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    box-shadow: 0px 10px 35px var(--corsecundaria);
    transition: width 0.5s, height 0.5s;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
    padding: 10px 0px;
}

.imagens:hover{
    width: 530px;
    height: 530px;
    box-shadow: 0px 10px 75px var(--corsecundaria);
}


.imgfunc{
    width: 70%;
    height: 80%;
    object-fit: contain;
    transition: width 0.5s, height 0.5s;
}

.imgpsicologo{
    width: 73%;
    height: 100%;
    object-fit: contain;
    transition: width 0.5s, height 0.5s;
}

a{
    color: var(--cortextoprincipal);

}

</style>

<?php

// Verifica se o usuário está logado
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
   
// O usuário está logado, então podemos acessar suas informações
   
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Agora você pode usar as variáveis $user_id e $user_name em qualquer lugar desta página
} 
?>

<div class="container">

    <a href="../aluno/aluno-dentista/calendario-aluno-dentista.php">
    <div class="imagens"> 
      Consulta com
      <img class="imgfunc" src="../aluno/imagens/dentista.png" alt="Foto dentista"> 
      Dentista
    </div>
    </a>

    <a href="../aluno/aluno-psicologo/calendario-aluno-psicologo.php">
    <div class="imagens"> 
        Consulta com
        <img class="imgpsicologo" src="../aluno/imagens/psicologo2.1.png" alt="Foto Pscicólogo"> 
        Psicólogo
    </div>

</div>

</body>
</html>
