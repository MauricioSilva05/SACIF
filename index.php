<?php 

include 'sessao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Início</title>
    

    <style>
            body{
    margin: 0px;
    padding: 0px;
    font-family:arial;
}

.txt{
    margin-left: 29px;
    font-size: 40px;
    
}

.main{
   
    flex-direction: row;
    height: 100%;
    width: 100%;
    display:flex;
    
    

    
}
.opcao{
    height: 400px;
    width: 100%;
    padding: 30px;
    display: flex;
    flex-direction: column;
    justify-content:center;
    
}
img{
  height: 20px;
  width:20px;
  margin-top:-5px;
  margin-left:-6px;
}
.consulta {
   
    border: none;
    color: white;
    height: 100px;
    width: 320px;
    text-align: center  ;
    text-decoration: none;
    display: inline-block;
    font-size: 30px;
    margin: 4px 2px;
    cursor: pointer;
    display:flex;
    justify-content: center;
    align-items: center;
   margin-left: 30px;
    margin-top: -120px;
    -webkit-box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);
-moz-box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);
box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);

}

    
  
  .consulta {
    background-color: rgb(6, 153, 30);
    color: black;
    
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
    
  }
  .consulta:hover{
    transform: scale(1.1);
  }
  .consulta .icon{
    max-width:40px;
    max-height:40px;
    width: auto;
    height: auto;
    margin-top: -30px;
    margin-left: -30px;
    
   
  }
  :root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria: #3E95F7;
  }


  .historico .icon{
    max-width:40px;
    max-height:40px;
    width: auto;
    height: auto;
    margin-top: -30px;
    margin-right: 12px;
    
   
  }
  
  .avisos{
    width: 100%;
    height: 100px;
  }
  a{
    text-decoration: solid;
    color:white;
    padding: 40px 50px;
    margin-right: 1px;
  }
  .historico{
    border: none;
    color: white;
    height: 100px;
    width: 320px;
    text-align: center  ;
    text-decoration: none;
    display: inline-block;
    font-size: 30px;
    margin: 4px 2px;
    cursor: pointer;
    display:flex;
    justify-content: center;
    align-items: center;
   margin-left: 50px;
    margin-top: -120px;
    -webkit-box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);
-moz-box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);
box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);

  }
  .historico {
    background-color: rgb(176, 202, 28);
    color: black;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
    
  }
  .historico:hover{
    transform: scale(1.1);
  }
  
 
    p{
      margin-left: 10px; 
      width: 40px;
    }
  
header {
  background-color: var(--corterciaria);
  color: #fff;
  padding: 10px;
  display: flex;
  height:90px;
  flex-direction: row;
  justify-content:space-between;
  align-items:center;
  
}
.titulo{
  font-size: 50px;
  display: flex;
  align-items: center;
  margin-left:46%;
  margin-top:25px;
}

.if{
  width: 14%; /* Reduzirá a largura para 50% do tamanho original */
  height: 100px;
  
  
  
}


.barralateral{
    width: 150px;
    height: 539px;
    background-color:var(--corterciaria) ;
    display: flex;
    align-items: center;
    justify-items: center;
    flex-direction: column;
    border: solid #3E95F7 1px;
    gap: 20px;
}

.lateralic{
    border: 1px solid var(--corterciaria);
    border-radius: 15px;
    color: white;
    height: 25px;
    width: 100px;
    text-align: center  ;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    display:flex;
    justify-content: center;
    align-items: center;
    margin-left:0px;
    padding: 30px;
    margin-top: 50px;
    
  }
  .lateralic {
    background-color: var(--corterciaria);
    color: rgb(238, 231, 231);
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
    
  }
  .lateralic:hover{
    background-color: #83bdff;
    
  }
  #icon{
    margin-top: -10px;
    margin-left: 10px;
  }
  .ifdois{
    width: 34%; /* Reduzirá a largura para 50% do tamanho original */
  height: 200px;
  margin-right:200px;
  margin-top:-50px;
  margin-left:-25px;

  }
  .opcao2{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
    justify-content: center;
    
  }

  .marcar{
    border: none;
    color: white;
    height: 100px;
    width: 320px;
    text-align: center  ;
    text-decoration: none;
    display: inline-block;
    font-size: 30px;
    margin: 4px 2px;
    cursor: pointer;
    display:flex;
    justify-content: center;
    align-items: center;
   margin-left: 50px;
    margin-top: -120px;
    -webkit-box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);
-moz-box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);
box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);

  }
  .marcar {
    background-color: var(--corsecundaria);
    color: black;
    
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
    
  }
  .marcar:hover{
    transform: scale(1.1);
  }
  .marcar .icon{
    max-width:40px;
    max-height:40px;
    width: auto;
    height: auto;
    margin-top: -30px;
    margin-right: 12px;
    
   
  }
  .marcar a{
    margin-right:30px;
  }

  .desmarcar {
   
   border: none;
   color: white;
   height: 100px;
   width: 320px;
   text-align: center  ;
   text-decoration: none;
   display: inline-block;
   font-size: 30px;
   margin: 4px 2px;
   cursor: pointer;
   display:flex;
   justify-content: center;
   align-items: center;
  margin-left: 30px;
   margin-top: 10px;
   margin-right:745px;
   -webkit-box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);
-moz-box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);
box-shadow: -9px 6px 40px -15px rgba(0,0,0,0.6);

}

   
 
 .desmarcar {
  background-color: rgb(228, 51, 51);
   color: black;
   
   transition: transform 0.3s ease-in-out;
   cursor: pointer;
   
 }
 .desmarcar:hover{
   transform: scale(1.1);
 }
 .desmarcar .icon{
   max-width:40px;
   max-height:40px;
   width: auto;
   height: auto;
   margin-top: -30px;
   margin-left: 8px;
   
  
 }
  
  

          </style>
</head>
<body>
<?php 

// Aqui você pode fazer a consulta para obter todas as informações do aluno com base no ID
require_once 'conexao-banco-de-dados.php'; // Se ainda não incluiu a conexão no início da página

// Faça a consulta ao banco de dados usando o ID do aluno
$sql = "SELECT * FROM Aluno WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $user_id);
$stmt->execute();

?>

    
    <header>    
       
         <h1 class="titulo">SACIF</h1>
         <img src="../projeto-interdisciplinar-PSW/imagens-index/if_logo_branca-removebg-preview (1).png" alt="iflogo" class="if">

    </header>
    
      
    
    <div class="main">
      
        <div class="barralateral">
          
      <button  name="" class="lateralic" id="icon2" href  type="submit">
  <img src="../projeto-interdisciplinar-PSW/imagens-index/home.png" alt="">
  <p>Inicio</p></button>


  <button  name="" class="lateralic" id="icon2"  type="submit"> <img src="../projeto-interdisciplinar-PSW/imagens-index/chat.png" alt=""><p>Chat</p></button>

  <form method="POST" action="../projeto-interdisciplinar-PSW/aluno/editar-perfil.php">
  <input name="id" type="hidden" value="<?php echo $user_id;?>">
  <button class="lateralic" name="editarperfil" id="icon2" type="submit"> 
  <img src="../projeto-interdisciplinar-PSW/imagens-index/user.png" alt="">
  <p>Perfil</p>
  </button>
  </form>

   <!-- Botão de logout -->
   <form method="post" action="logout.php">
        <button class="lateralic" onclick="return confirm('Tem certeza que deseja sair?')"  id="icon2" type="submit"><img src="../projeto-interdisciplinar-PSW/imagens-index/logout.png" alt=""><p>Sair</p></button>
   </form>
    </div>
        <div class="opcao">

<div class="opcao2">

<?php

// O usuário está logado, então podemos acessar suas informações
$user_id = getUserId();
$user_name = getUserName();

// Aqui você pode fazer a consulta para obter todas as informações do aluno com base no ID
require_once 'conexao-banco-de-dados.php'; // Se ainda não incluiu a conexão no início da página


// Faça a consulta ao banco de dados usando o ID do aluno
$sql = "SELECT * FROM Aluno WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $user_id);
$stmt->execute();

?>
         
            <button class="consulta"> 
                <img src="../projeto-interdisciplinar-PSW/imagens-index/agenda.png"  alt="agenda.png" class="icon"><a href="../projeto-interdisciplinar-PSW/aluno/escolha-profissional.php" class="um">Consulta</a>
           
            <button class="historico"> 
                <img src="../projeto-interdisciplinar-PSW/imagens-index/dias-do-calendario.png"  alt="dias-do-calendario.png" class="icon"><a href="../projeto-interdisciplinar-PSW/aluno/historico-aluno.php">Histórico</a>  
                
           </div>
            <div class="avisos"></div>
        </div>
    </div>

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
