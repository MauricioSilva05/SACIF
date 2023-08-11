<?php
session_start(); // Iniciar a sessão (caso não esteja iniciada)

// Destruir todas as variáveis de sessão
$_SESSION = array();

// Se desejar destruir a sessão completamente, é possível limpar o cookie de sessão
// (Isso irá apagar a sessão no lado do cliente e no lado do servidor)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir a sessão
session_destroy();

echo "<script> 
      window.location.href = '../projeto-interdisciplinar-PSW/aluno/login-aluno.php';
      </script>";
      sleep(2);
exit();
?>