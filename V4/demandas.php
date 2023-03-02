<?php
session_start();
require_once 'bd.php';
$CPF = $_SESSION['CPF'];
try{

    if(isset($_POST['almoco'])&& isset ($_POST['cafe'])&& isset ($_POST['janta'])){
        if (isset($_SESSION['autorizado'])){
            //Verifica se tem alguma refeicao cadastrada para o cliente. Se tiver os dados eles são mostrados dentro das caixas e podem ser atualizados, se não eles são adicionados.
            $comando = $pdo->prepare('SELECT * FROM refeicoes where cpf = :CPF');
            $comando->bindParam(':CPF', $CPF);
            $comando->execute();
            $Cadastrado = $comando->fetchAll(PDO::FETCH_ASSOC);

            $squad = $_SESSION['squad'];
            $Cafe = ($_POST['cafe']);
            $Almoco = ($_POST['almoco']);
            $Janta = ($_POST['janta']);
            $Lanche = ($_POST['lanche']);
            if (count($Cadastrado) > 0){
                $comando = $pdo->prepare('UPDATE refeicoes 
                                            SET cpf = :CPF,
                                            cafe = :Cafe,
                                            almoco = :Almoco,
                                            janta = :Janta,
                                            lanche = :lanche,
                                            squad = :squad
                                            WHERE cpf = :CPF');
                $comando->bindParam(':CPF', $CPF);
                $comando->bindParam(':squad', $squad);
                $comando->bindParam(':Cafe', $Cafe);
                $comando->bindParam(':Almoco', $Almoco);
                $comando->bindParam(':Janta', $Janta);
                $comando->bindParam(':lanche', $Lanche);
                $comando->execute();
            }
            else{ 
                $comando = $pdo->prepare('INSERT INTO refeicoes (cpf, squad, cafe, almoco, janta, lanche) VALUES (:CPF, :squad, :Cafe, :Almoco, :Janta, :lanche)');
                $comando->bindParam(':CPF', $CPF);
                $comando->bindParam(':squad', $squad);
                $comando->bindParam(':Cafe', $Cafe);
                $comando->bindParam(':Almoco', $Almoco);
                $comando->bindParam(':Janta', $Janta);
                $comando->bindParam(':lanche', $Lanche);
                $comando->execute();
            }
        }else{
            $_SESSION['pilantra'] = 1;
        }    

    }

}catch (PDOException $e) {
    echo 'Erro ao executar comando no banco de dados: ' . $e->getMessage();
    exit();
}
//<!-- pega os dados do banco e passa para uma variavel php
    $comando = $pdo->prepare('SELECT cafe,almoco,janta,lanche FROM refeicoes where cpf=:CPF');
    $comando->bindParam(':CPF', $CPF);
    $comando->execute();
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandas</title>
    <link rel="stylesheet" href="CSS/Medi.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
  <div class="container">
    <header class="header">
        <div class="logo">
            <img src="img/logo.png" alt= "Logotipo">
        </div>
        <div class="icon-menu">
            <svg width="21.999999999999996" height="21.999999999999996" xmlns="http://www.w3.org/2000/svg" style="padding-right: 10px;">
                <g>
                    <line stroke="#fff" class="firstLine" y2="4.146656" x2="25.477124" y1="4.146656" x1="-1.973854"
                        stroke-width="3.5" style="color: azure;" />
                    <line stroke="#fff" class="secondLine" y2="11.151682" x2="25.607844" y1="11.020963" x1="-2.104574"
                        stroke-width="3.5" style="color:azure;" />
                    <line stroke="#fff" class="thirdLine" y2="17.804165" x2="24.852663" y1="17.673446" x1="-1.683284"
                        stroke-width="3.5" style="color: azure;" />
                </g>
            </svg>
        </div> 
    </header><!-- Fim header -->
    <div class="menu">
        <nav class="navigation-menu">
            <div class="profile">
                <span class="profile-img">
                    <img src="IMG/perfilCli.png" alt="Imagem de perfil">    
                </span>
                <span>
                    <p class="name"><h1>
                    <?php
                        echo $_SESSION['nome_usuario'];
                    ?>  
                    </h1></p>
                </span>
            </div>
            <ul class="list-nav">
                <li class="item-nav">
                    <a class="link-nav" href="ColaboradorSquad.php">
                    <i class="fa-solidsumbbell" style="padding-right: 5px;"></i>
                    Visualizar colaboradores por Squad                  
                    </a>
                </li>
                <li class="item-nav">
                    <a class="link-nav" href="VerClientes.php">
                    <i class="fa-soliser-vertical" style="padding-right: 5px;"></i>
                    Ver Clientes                  
                    </a>
                </li>
                <li class="item-nav">
                    <a class="link-nav" href="refeicoesCli.php">
                    <i class="fa-solid fastensils" style="padding-right: 5px;"></i>
                    Visualizar Demandas            
                    </a>
                </li>
                <li class="item-nav">
                    <a class="link-nav" href="pagina_cliente.php">
                    <i class="fa-solid fa-sow-rotate-left" style="padding-right: 5px;"></i>
                    Voltar a página inicial           
                    </a>
                </li>
                <li class="item-nav">
                    <a class="link-nav-arrow"></a>
                    <ul class="list-nav-second hide"></ul>
                </li>
            </ul>
            
        </nav><!-- Fim nav -->
    </div><!-- Fim menu -->
    <div class="content">
        <div class="Avalia">
            <h1 class="title">Demandas de <?php
                        echo $_SESSION['nome_usuario'];
                    ?>: <i class="fa-solid fafdsf-bowl-food" style="padding-right: 10px;"></i></h1><br><br>
            <form action = "refeicoes.php" method = "Post">
                

                <!--se o paciente já tiver uma refeicao cadastrada, ela é mostrada, caso contrario não aparecerá nada.--> 
                <h3><b>Demanda:</b></h3>
                <?php
                        foreach($resultado as $linha) {
                            echo "<font size = 3>". $linha['cafe']. "</font>";
                        }
                    ?><br><br>
                <h3><b>Cliente:</b></h3>
                <?php
                        foreach($resultado as $linha) {
                            echo  "<font size = 3>". $linha['almoco']. "</font>";
                        }
                    ?><br><br>
                <h3><b>Status:</b></h3>
                <?php
                        foreach($resultado as $linha) {
                            echo  "<font size = 3>". $linha['janta']. "</font>";
                        }
                    ?><br><br>
                <h3><b>Urgenica:</b></h3>
                <?php
                        foreach($resultado as $linha) {
                            echo  "<font size = 3>". $linha['lanche']. "</font";
                        }
                    ?><br><br>
            
            </form>
        </div>
    </div>
</div>
</div>
<script src="https://kit.fontawesome.com/4a3ddc1d42.js" crossorigin="anonymous"></script>
<script src="JS/app.js"></script>
</body>
</html>