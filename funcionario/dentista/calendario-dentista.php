<?php
include '../../sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>Calendário de cadastro dos horários</title>

    <?php 

    include '../header/header.php';

    ?>

<style>
            :root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria:#3E95F7;
}
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7; /* Fundo ligeiramente acinzentado */
        height: 540;
    }

    header {
        background-color: #3b60ed; /* Azul para o cabeçalho */
        padding: 10px 0;
    }

    h1 {
        text-align: center;
    }

    header h1 {
        color: #ffffff; /* Texto branco */
        margin: 0;
    }

    .container {
        width: 750px; /* Aumentar a largura do calendário */
        margin: auto;
        margin-top: 20px;
        padding: 40px;
        background-color: #ffffff; /* Fundo branco para o calendário */
        border-radius: 10px; /* Bordas arredondadas */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Sombra suave */
    }

    .container2 {
        height: 540px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        
    }

    .calendario {
        margin: auto;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px; /* Espaçamento entre os dias */
        border-collapse: collapse; /* Remover bordas entre células */
        margin-bottom: 20px; /* Espaçamento inferior */
        overflow: hidden; /* Para esconder qualquer conteúdo que ultrapasse o calendário */
    }

    .mes {
        grid-column: 1 / -1;
        text-align: center;
        font-weight: bold;
        margin-bottom: 10px;
        color: var(--cortextoprincipal); /* Azul */
        font-size: 24px; /* Tamanho da fonte maior */
    }

    .dia-semana {
        text-align: center;
        font-weight: bold;
        color: var(--cortextoprincipal); /* Azul */
        padding: 10px 0; /* Espaçamento vertical */
        background-color: #e6e6e6; /* Fundo acinzentado para os dias da semana */
    }

    .dia {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px; /* Altura maior */
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        cursor: pointer;
        font-size: 18px; /* Tamanho da fonte maior */
        color: #3b60ed; /* Azul */
        transition: background-color 0.3s ease;
        position: relative; /* Para posicionamento dos eventos */
    }

    .dia::before {
        content: ''; /* Criação do ponto indicador de evento */
        display: block;
        width: 8px;
        height: 8px;
        background-color: #3b60ed; /* Azul */
        border-radius: 50%;
        position: absolute;
        bottom: 5px;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0; /* Inicialmente invisível */
    }

    .dia.evento {
        position: relative; /* Para posicionamento dos eventos */
    }

    .dia.evento::before {
        opacity: 1; /* Torna o ponto indicador visível para dias com eventos */
    }

    .dia:hover {
        background-color: #e0e0e0; /* Tom mais claro ao passar o mouse */
    }

    .dia.evento:hover::before {
        opacity: 1; /* Torna o ponto indicador visível ao passar o mouse */
    }

    .button-container {
        margin: 20px;
        text-align: center;
    }

    .button {
        display: inline-block;
        background-color: #3b60ed; /* Azul */
        color: #ffffff; /* Texto branco */
        padding: 12px 24px; /* Espaçamento interno */
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #3e95f7;
        color: white;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
    }

    a {
        color: var(--cortextoprincipal); /* Azul para os links */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a:hover {
        transform: scale(1.05);
        color: #3e95f7; /* Tom mais escuro ao passar o mouse */
    }
        
    </style>

</head>
<body>

    <header>
        <h1>Cadastrar horários de trabalho</h1>
    </header>

    <div class="conatiner2">
    <div class="container">
         <?php
         // Verificar se um mês e ano foram passados nos parâmetros da URL
         if (isset($_GET['mes']) && isset($_GET['ano'])) {
             // Obter o mês e o ano a partir dos parâmetros da URL
             $mesAtual = intval($_GET['mes']);
             $anoAtual = intval($_GET['ano']);
         } else {
             // Se não foram passados, usar o mês e o ano atuais
             $dataAtual = new DateTime();
             $mesAtual = intval($dataAtual->format('n'));
             $anoAtual = intval($dataAtual->format('Y'));
         }
 
         $mesesTraduzidos = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );

        // Criar objetos DateTime para o primeiro e o último dia do mês atual
        $primeiroDiaMes = new DateTime("$anoAtual-$mesAtual-01");
        $ultimoDiaMes = new DateTime("$anoAtual-$mesAtual-" . $primeiroDiaMes->format('t'));

        // Obter o nome do mês
        $nomeMes = $mesesTraduzidos[$mesAtual];
 
         ;
 
         // Definir o link para o mês anterior
         $mesAnterior = $mesAtual - 1;
         $anoAnterior = $anoAtual;
         if ($mesAnterior == 0) {
             $mesAnterior = 12;
             $anoAnterior--;
         }
         $linkMesAnterior = $_SERVER['PHP_SELF'] . '?mes=' . $mesAnterior . '&ano=' . $anoAnterior;
 
         // Definir o link para o mês seguinte
         $mesSeguinte = $mesAtual + 1;
         $anoSeguinte = $anoAtual;
         if ($mesSeguinte == 13) {
             $mesSeguinte = 1;
             $anoSeguinte++;
         }
         $linkMesSeguinte = $_SERVER['PHP_SELF'] . '?mes=' . $mesSeguinte . '&ano=' . $anoSeguinte;
        
         $agenda = array(
             1 => 'lista-horarios.php',
             2 => 'lista-horarios.php',
             3 => 'lista-horarios.php',
             4 => 'lista-horarios.php',
             5 => 'lista-horarios.php',
             6 => 'lista-horarios.php',
             7 => 'lista-horarios.php',
             8 => 'lista-horarios.php',
             9 => 'lista-horarios.php',
             10 => 'lista-horarios.php',
             11 => 'lista-horarios.php',
             12 => 'lista-horarios.php',
             13 => 'lista-horarios.php',
             14 => 'lista-horarios.php',
             15 => 'lista-horarios.php',
             16 => 'lista-horarios.php',
             17 => 'lista-horarios.php',
             18 => 'lista-horarios.php',
             19 => 'lista-horarios.php',
             20 => 'lista-horarios.php',
             21 => 'lista-horarios.php',
             22 => 'lista-horarios.php',
             23 => 'lista-horarios.php',
             24 => 'lista-horarios.php',
             25 => 'lista-horarios.php',
             26 => 'lista-horarios.php',
             27 => 'lista-horarios.php',
             28 => 'lista-horarios.php',
             29 => 'lista-horarios.php',
             30 => 'lista-horarios.php',
             31 => 'lista-horarios.php',
             // Adicionar os demais dias e suas respectivas URLs
             // Exemplo: 3 => 'pagina-do-dia-3.html',
             // ...
         );
         ?>
 
    
         <div class="calendario">
             <div class="mes">
                 <a href="<?php echo $linkMesAnterior; ?>"><<</a>
                 <?php echo $nomeMes . ' - ' . $anoAtual; ?>
                 <a href="<?php echo $linkMesSeguinte; ?>">>></a>
             </div>
 
             <?php
             // Exibir os dias da semana no calendário
             $diasSemana = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
             foreach ($diasSemana as $diaSemana) {
                 echo '<div class="dia-semana">' . $diaSemana . '</div>';
             }
 
             // Calcular quantas células vazias antes do primeiro dia do mês
             $diasVaziosAntes = $primeiroDiaMes->format('w');
 
             // Preencher células vazias antes do primeiro dia do mês
             for ($i = 0; $i < $diasVaziosAntes; $i++) {
                 echo '<div class="dia"></div>';
             }
 
             // Preencher os dias do mês com os links para as respectivas páginas
$dataAtual = clone $primeiroDiaMes;
while ($dataAtual <= $ultimoDiaMes) {
    $dia = intval($dataAtual->format('d'));
    // Verificar se o dia está definido no array de agenda
    if (isset($agenda[$dia])) {
        // Obter a URL da página do dia específico
        $paginaDiaEspecifico = $agenda[$dia];
        // Obter a data completa no formato 'Y-m-d'
        $dataCompleta = $dataAtual->format('Y-m-d');
        // Exibir o link para a página do dia com o atributo data-date contendo a data completa
        echo '<a class="dia" href="' . $paginaDiaEspecifico . '?dia=' . $dataCompleta . '" data-date="' . $dataCompleta . '">' . $dia . '</a>';
    } else {
        // Exibir célula vazia para os dias não definidos na agenda
        echo '<div class="dia"></div>';
    }
    $dataAtual->modify('+1 day');
}
             
             ?>
    </div>
    </div>
    </div>
</body>
</html>