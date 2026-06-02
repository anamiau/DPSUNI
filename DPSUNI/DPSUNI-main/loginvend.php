<?php

session_start();

include "conexao.php";

$msg = "";

if(isset($_POST['login'])) {

    $email_tel = trim($_POST['email_tel']);
    $senha = trim($_POST['senha']);

    $email_tel = mysqli_real_escape_string($conexao, $email_tel);

    $sql = mysqli_query($conexao,
    "SELECT * FROM loginvend WHERE email_tel='$email_tel'");

    if(mysqli_num_rows($sql) > 0) {

        $dados = mysqli_fetch_assoc($sql);

        if(password_verify($senha, $dados['senha'])) {

            $_SESSION['vendedor_id'] = $dados['id'];
            $_SESSION['vendedor_nome'] = $dados['nome'];

            header("Location: painel.php");
            exit;

        } else {
            $msg = "Senha incorreta.";
        }

    } else {
        $msg = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Vendedor</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<form method="POST">

<h2>Login do Vendedor</h2>

<input type="email" name="email" placeholder="Email">

<input type="password" name="senha" placeholder="Senha">

<button type="submit" name="login">
Entrar
</button>

<p><?php echo $msg; ?></p>

</form>

</body>
</html>