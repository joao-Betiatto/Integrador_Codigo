<?php
    session_start();
    require_once 'bd.php';
    $comando = $pdo->prepare('SELECT nome FROM cliente WHERE email = :emailV' );
    $comando->bindParam(':emailV', $emailV);
    $comando->execute();
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colaboradores</title>
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
                    <a class="link-nav" href="ColaboradorSquadAdmin.php">
                    <i class="fa-solidsumbbell" style="padding-right: 5px;"></i>
                    Visualizar colaboradores por Squad                  
                    </a>
                </li>
                <li class="item-nav">
                    <a class="link-nav" href="VerClientesAdmin.php">
                    <i class="fa-soliser-vertical" style="padding-right: 5px;"></i>
                    Ver Clientes                  
                    </a>
                </li>
                <li class="item-nav">
                    <a class="link-nav" href="pagina_admin.php">
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
<script src="https://kit.fontawesome.com/4a3ddc1d42.js" crossorigin="anonymous"></script>
<script src="JS/app.js"></script> 
<?php
require_once 'bd.php';
#$cpf = $_SESSION['CPF'];
        $comando = $pdo->prepare('SELECT * FROM vendas');
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
      
                        echo "<h1> Vendas por vendedor: </h1> <font color = #000000> <background-color= #ffffff> <table border = 2> <tr> <td>Projeto</td> <td>Valor Venda</td> <td>Vendedor</td> </tr>";
                        foreach($resultado as $linha) {
                            echo "<tr> <td>". $linha['projeto']. "</td> <td> ". $linha['valor']. "</td><td>". $linha['vendedor']. "</td>"." </tr>";
                        }
                        echo "</table>";
            ?>
