<?php   
session_start();
require_once 'bd.php';

try{

    if(isset($_POST['Email'])&& isset ($_POST['Senha'])){
        $Email = ($_POST['Email']);
        $Senha = ($_POST['Senha']);
        $Fone = ($_POST['Fone']);
        $CPF = ($_POST['CPF']);
        $Nome = ($_POST['Nome']);
        $squad = ($_POST['squad']);
        $comando = $pdo->prepare('SELECT squad from head where squad = :squad');
        $comando->bindParam(':squad', $squad);
        $comando->execute();
        unset( $_SESSION['autorizado'] ); 
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado)===0){
            setcookie('squad', 'false', time()+60);
            header('Location: CadastroColaborador.php');
            exit();
        }
        $DataNasc = ($_POST['DataNasc']);
        $comando = $pdo->prepare('INSERT INTO cliente (codcli, nome, fone, email, senha, datanasc,squad) VALUES (:CPF, :Nome, :Fone, :Email, :Senha, :DataNasc, :squad)');
        $comando->bindParam(':squad', $squad);
        $comando->bindParam(':CPF', $CPF);
        $comando->bindParam(':Nome', $Nome);
        $comando->bindParam(':Fone', $Fone);
        $comando->bindParam(':Email', $Email);
        $comando->bindParam(':Senha', $Senha);
        $comando->bindParam(':DataNasc', $DataNasc);
        $comando->execute();
    }

}catch (PDOException $e) {
    echo 'Erro ao executar comando no banco de dados: ' . $e->getMessage();
    exit();
}
    $comando = $pdo->prepare('SELECT * FROM cliente');
    $comando->execute();
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultado) > 0) {
        foreach($resultado as $linha) {
            echo 'a senha de: ' . $linha['email'] . ', eh: ' . $linha['senha'] . '<br>';
        }
    } else {
        echo 'Nenhum usuário encontrado';
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="CSS/login_stl.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <title>Login Colaboradore</title>
</head>
<body>
    <div class="logo">
        <img src="IMG/logo_olymp.png" alt= "Logotipo" style="width: 350px; margin-left: 1100px;">
    </div>
    <div class="login">
        <form action = "autenticaCli.php" method = "Post">
            <h1>Login</h1>
            <?php
            if(isset($_COOKIE['autenticado'])){
                echo "<b><font color=\"#FF0000\">
                Email ou senha incorreto ou inexistentes"."<br>"."verifique suas credenciais e tente novamente.
                </font></b>";
            }
            ?>
            <br><br><p>Email</p>
            <input type = "text" name = "emailV" placeholder="Insira seu email">
            <p>Senha</p>
            <input type = "password" name = "senhaV" placeholder="Insira sua senha">
            <input type = "submit" name = "Login">
            <a href="CadastroCli.php" style="color: #fff;">Cadastrar-se</a>
        </form>
    </div>
</body>
</html>