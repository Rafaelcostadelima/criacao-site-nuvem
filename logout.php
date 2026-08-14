<?php
// Inicia a sessão para ter acesso aos dados atuais
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = array();

// Se estiver utilizando cookies de sessão, invalida o cookie no navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destrói a sessão completamente no servidor
session_destroy();

// Redireciona o usuário para a tela de login
header("Location: login.php");
exit;
?>