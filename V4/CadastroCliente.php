<?php
      #Virou cadastro de Clientesss
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="CSS/login_stl.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <title>Cadastro colaborador</title>
</head>
<body>
    <div class="login"style="width: 370px; top: 50%;">
        <form action = "Insere_cliente.php" method = "Post">
            <h1>Cadastro Cliente </h1>
            <p>Projeto</p>
            <input type = "text" name = "Projeto" placeholder="Insira o nome do projeto">
            <p>Valor do Deal</p>
            <input type = "text" name = "Deal" placeholder="Insira o valor do projeto">
            <p>CNPJ</p>
            <input type = "text" name = "CNPJ" placeholder="Insira o CNPJ">
            <p>Stakeholder</p>
            <input type = "text" name = "Stakeholder" placeholder="Insira o nome do principal stakeholder do projeto">
            <p>CPF</p>
            <input type = "text" name = "CPF" placeholder="Insira o CPF do stakeholder">
            <p>Telefone</p>
            <input type = "text" name = "Telefone" placeholder="Insira o telefone do Stakeholder">
            <p>Email</p>
            <input type = "text" name = "Email" placeholder="Insira um email para contato com o Stakeholder">
            <p>Squad</p>
            <input type = "text" name = "Squad" placeholder="Insira o Squad que faz parte">
            <p>Vendedor</p>
            <input type = "text" name = "vendedor" placeholder="Quem fez a venda">

            <input type = "submit" name = "Login">

        </form>
     </div>
</body>