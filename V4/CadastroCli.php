<?php
      #Virou cadastro de colaborador/Empregado
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="CSS/login_stl.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <title>Login Nutri</title>
</head>
<body>
    <div class="login"style="width: 370px; top: 50%;">
        <form action = "LoginCli.php" method = "Post">
            <h1>Cadastro Colaborador</h1>
            <p>Nome</p>
            <input type = "text" name = "Nome" placeholder="Insira seu nome">
            <p>Email</p>
            <input type = "text" name = "Email" placeholder="Insira seu email">
            <p>Senha</p>
            <input type = "password" name = "Senha" placeholder="Insira sua senha">
            <p>Funcao</p>
            <input type = "text" name = "Função" placeholder="Insira sua funcao na empresa (caso não saiba qual a sua funcao, verfique seu email, se não recebeu entre em contato conosco)">
            <p>CPF</p>
            <input type = "text" name = "CPF" placeholder="Insira seu CPF">
            <p>Squad</p>
            <input type = "text" name = "CRN" placeholder="Insira o Squad que faz parte">
            <p>Data de Nascimento</p>
            <input type = "date" name = "DataNasc" placeholder="Insira sua data de nascimento">
            <input type = "submit" name = "Login">

        </form>
     </div>
</body>