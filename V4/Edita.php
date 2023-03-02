<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Cliente</title>
    <link rel="stylesheet" href="CSS/styleEdita.css">

</head>

        
            <div class="profile">
                <span class="profile-img">
                    <img src="IMG/perfilCli.png" alt="Imagem de perfil">    
                </span>
                <span>
                    <p class="name" align = center><h1>
                    <?php
                        require_once 'bd.php';
                        // Organiza os dados do cliente
                        session_start();
                        $nome = $_POST['cliente'];
                        $_SESSION['cliente'] = $nome;
                        echo "<b><font color=\"#FFFFFF\">". $nome. "</b></font>";
                        $comando = $pdo->prepare('SELECT * FROM cliente WHERE nome = :cliente');
                        $comando->bindParam(':cliente', $nome);
                        $comando->execute();
                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                        if (count($resultado)>0){
                            foreach($resultado as $linha) {
                                $_SESSION['cpfV'] = $linha['codcli'];
                                $_SESSION['squadV'] = $linha['squad'];
                                $_SESSION['nomeD'] = $linha['nome'];
                            }
                        }else{
                            setcookie('nomeI', 'nao', time()+5);
                            header('Location: pagina_nutri.php');
                            exit();
                        }
                    ?>  
                    </h1></p>
                </span>
            </div>
            <ul >
                <li>
                    <a class="link-nav" href="DemandasAdmin.php">
                    <i class="fa-solid fa-dumbbell" style="padding-right: 5px;"></i>
                    Atribuir Demandas                    
                    </a>
                </li>
                <li class="item-nav">
                    <a class="link-nav" href="pagina_admin.php">
                    <i class="fa-solid fa-arrow-rotate-left" style="padding-right: 5px;"></i>
                    Voltar a página inicial            
                    </a>
                </li>
                
            </ul>
            

    </div><!-- Fim menu -->