<?php
session_start();
require_once 'conexao.php';

if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header("Location: pagina2.php");
    exit;
}

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (!empty($usuario) && !empty($senha)) {
        try {
            // Busca os dados do usuário correspondente no banco
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
            $stmt->execute(['usuario' => $usuario]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se o usuário existe e se a senha descriptografada coincide
            if ($user && password_verify($senha, $user['senha'])) {
                $_SESSION['logado'] = true;
                $_SESSION['usuario_nome'] = $user['usuario'];

                header("Location: pagina2.php");
                exit;
            } else {
                $erro = "Usuário ou senha incorretos!";
            }
        } catch (PDOException $e) {
            $erro = "Erro no sistema: " . $e->getMessage();
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angry Birds - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/Angry_Birds_art.ico" type="image/x-icon">
</head>

<body class="login-body">

    <div class="login-wrapper">
        <div class="login-card">
            <img src="img/angrybirds.jfif" alt="Logo Angry Birds" class="login-logo">
            <h2>Acessar o Painel</h2>

            <?php if (!empty($erro)): ?>
                <div class="error-msg"><?php echo htmlspecialchars($erro); ?></div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" required placeholder="Digite seu usuário">
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
                </div>

                <button type="submit" class="btn-login">Entrar</button>
            </form>

            <p class="auth-switch">Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
        </div>
    </div>

</body>

</html>