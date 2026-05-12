<html>
    <head>
        <title>Cadastro</title>
    </head>
        <style>
            
        </style>
    <body>
        <h2>CADASTRO DE USUÁRIOS</h2>

    <form method="post" action="">
        <label>Nome:</label>
        <input name="nome" type="text">
        <label>E-mail ou telefone:</label>
        <input name="email_tel" type="text">
        <label>CPF:</label>
        <input name="cpf" type="text">
        <label>Data de nascimento:</label>
        <input name="data_nasc" type="text">
        <label>Senha:</label>
        <input type="password" name="senha">
        <label>CEP:</label>
        <input type="text" name="cep">  

        <button type="submit" name="inserir">CADASTRAR</button>
    </form>

<?php

    include "conexao.php";

    function validarCPF($cpf){

        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if(strlen($cpf) != 11) return false;
        if(preg_match('/(\d)\1{10}/', $cpf)) return false;
        for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($i = 0; $i < $t; $i++) {
            $soma += $cpf[$i] * (($t + 1) - $i);
        }
        $digito = ((10 * $soma) % 11) % 10;
        if ($cpf[$t] != $digito) {
            return false;
        }
        }
        return true;
    }

    if(isset($_POST['inserir'])):

    $email_tel = $_POST['email_tel'];
    $senha = $_POST['senha'];

    $senhavalida = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha);
    $emailvalido = filter_var($email_tel, FILTER_VALIDATE_EMAIL);
    $somenteNumeros = preg_replace('/[^0-9]/', '', $email_tel);
    $cpfvalido = validarCPF($somenteNumeros);
    $telefonevalido = (strlen($somenteNumeros) >= 10 && strlen($somenteNumeros) <= 11);

    if(($emailvalido || $telefonevalido || $cpfvalido) && $senhavalida){

    $senha_crip = password_hash($senha, PASSWORD_DEFAULT);

    if($cpfvalido){
        $valor = password_hash($somenteNumeros, PASSWORD_DEFAULT);
    }
    else{
        $valor = $email_tel;
    }

    $sql = mysqli_query($conexao, "INSERT INTO `cadastro`(`nome`, `email_tel`, `cpf`, `data_nasc`, `senha`, `cep`) VALUES ('nome','email_tel','cpf','data_nasc','senha','cep')");

    if($sql){
        echo "Cadastro realizado com sucesso!";
        header("Location:Login.php");
    }
    else{
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
    }

    else{

        if(!$senhavalida){
            echo "A senha deve ter no mínimo 8 caracteres, letra maiúscula, minúscula, número e símbolo.";
        }
        else{
            echo "E-mail, telefone ou CPF inválido!";
        }
    }
    endif;
?>
    </body>
</html>