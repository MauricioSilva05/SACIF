<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>

<style>

:root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria: #3E95F7;
}

body {
  margin: 0;
  font-family: Arial, sans-serif;
}

header {
  background-color: var(--corterciaria);
  color: #fff;
  padding: 10px;
}

#toggle-menu {
  font-size: 20px;
  background: transparent;
  border: none;
  color: #fff;
  cursor: pointer;
}


nav {
  width: 165px;
  height: 100%;
  background-color: var(--corsecundaria);
  position: fixed;
  top: 0;
  left: -250px;
  transition: left 0.6s ease-in-out;
}

nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

nav li {
  padding: 10px;
}

nav li a {
  text-decoration: none;
  color: #333;
  display: block;
}

main {
  padding: 20px;
}

.lateralic{
    border: 1px solid var(--corsecundaria);
    border-radius: 15px;
    color: white;
    height: 35px;
    width: 150px;
    text-align: center  ;
    text-decoration: none;
    font-size: 20px;
    cursor: pointer;
    display:flex;
    justify-content: center;
    align-items: center;
    font-family: Arial, Helvetica, sans-serif;
    margin-left:0px;
    padding: 30px;
    margin-top: 50px;
    
  }
  .lateralic {
    background-color: var(--corsecundaria);
    color: rgb(238, 231, 231);
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
    
  }
  .lateralic:hover{
    background-color: var(--corterciaria);
    
  }
  p{
    margin-left: 10px;
  }

  a{
    text-decoration: none;
  }


 </style>


<body>

<?php 

// O usuário está logado, então podemos acessar suas informações
$user_id = getUserId();

// Aqui você pode fazer a consulta para obter todas as informações do aluno com base no ID
require_once '../../conexao-banco-de-dados.php'; // Se ainda não incluiu a conexão no início da página

// Faça a consulta ao banco de dados usando o ID do aluno
$sql = "SELECT * FROM Aluno WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $user_id);
$stmt->execute();

?>


<header>
    <button id="toggle-menu">☰</button>
  </header>
  <nav id="off-canvas-menu">
  
  <a href="../../index.php"><button name="" class="lateralic" id="icon2"  type="submit"><img src="../header/imagens/home.png" alt=""><p>Início</p></button></a>
  


  <button  name="" class="lateralic" id="icon2"  type="submit"> <img src="../header/imagens/chat.png" alt=""><p>Chat</p></button>

  <form method="POST" action="editar-perfil.php">
  <input name="id" type="hidden" value="<?php echo $user_id;?>">
  <button class="lateralic" name="editarperfil" id="icon2" type="submit"> 
  <img src="../header/imagens/user.png" alt="">
  <p>Perfil</p>
  </button>
  </form>

   <!-- Botão de logout -->
   <form method="post" action="../../logout.php">
        <button class="lateralic" onclick="return confirm('Tem certeza que deseja sair?')"  id="icon2" type="submit"><img src="../header/imagens/logout.png" alt=""><p>Sair</p></button>
   </form>


    
  </nav>
 
  <script>

const menuToggle = document.getElementById('toggle-menu');
const offCanvasMenu = document.getElementById('off-canvas-menu');

menuToggle.addEventListener('click', () => {
  toggleMenu();
});

document.addEventListener('click', (event) => {
  const isClickInsideMenu = offCanvasMenu.contains(event.target);
  const isClickInsideToggle = menuToggle.contains(event.target);

  if (!isClickInsideMenu && !isClickInsideToggle) {
    hideMenu();
  }
});

function toggleMenu() {
  if (offCanvasMenu.style.left === '-250px') {
    offCanvasMenu.style.left = '0';
  } else {
    hideMenu();
  }
}

function hideMenu() {
  offCanvasMenu.style.left = '-250px';
}


  </script>


</body>
</html>