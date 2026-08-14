<?php
session_start();
require_once 'conexao.php';

$erro = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (!empty($usuario) && !empty($senha)) {
        try {
            // Verifica se o nome de usuário já está cadastrado
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE usuario = :usuario");
            $stmt->execute(['usuario' => $usuario]);
            
            if ($stmt->rowCount() > 0) {
                $erro = "Este nome de usuário já está em uso.";
            } else {
                // Criptografa a senha para maior segurança antes de salvar
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

                // Insere o novo usuário na tabela
                $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)");
                $stmt->execute([
                    'usuario' => $usuario,
                    'senha' => $senha_hash
                ]);
                
                $sucesso = "Conta criada com sucesso! Você já pode fazer login.";
            }
        } catch (PDOException $e) {
            $erro = "Erro no sistema ao cadastrar: " . $e->getMessage();
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
    <title>Angry Birds - Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/Angry_Birds_art.ico" type="image/x-icon">
</head>
<body class="login-body">
    
    <div class="login-wrapper">
        <div class="login-card">
            <img src="img/angrybirds.jfif" alt="Logo Angry Birds" class="login-logo">
            <h2>Criar uma Conta</h2>
            
            <?php if (!empty($erro)): ?>
                <div class="error-msg"><?php echo htmlspecialchars($erro); ?></div>
            <?php endif; ?>

            <?php if (!empty($sucesso)): ?>
                <div class="success-msg"><?php echo htmlspecialchars($sucesso); ?></div>
            <?php endif; ?>

            <form action="cadastro.php" method="POST">
                <div class="input-group">
                    <label for="usuario">Novo Usuário</label>
                    <input type="text" id="usuario" name="usuario" required placeholder="Escolha um nome de usuário">
                </div>
                
                <div class="input-group">
                    <label for="senha">Escolha uma Senha</label>
                    <input type="password" id="senha" name="senha" required placeholder="Crie uma senha segura">
                </div>
                
                <button type="submit" class="btn-login">Criar Conta</button>
            </form>
            
            <p class="auth-switch">Já possui uma conta? <a href="login.php">Faça login aqui</a></p>
        </div>
    </div>

</body>
</html>