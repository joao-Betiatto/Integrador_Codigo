<?php
    session_start();
    try{

        if(isset($_POST['Projeto'])&& isset ($_POST['Deal'])){
            $Projeto = ($_POST['Projeto']);
            $Deal = ($_POST['Deal']);
            $CNPJ = ($_POST['CNPJ']);
            $CPF = ($_POST['CPF']);
            $Stakeholder = ($_POST['Stakeholder']);
            $Telefone = ($_POST['Telefone']);
            $Email = ($_POST['Email']);
            $Squad = ($_POST['Squad']);
            $Vendedor = ($_POST['vendedor']);
            unset( $_SESSION['autorizado'] ); 
            $comando = $pdo->prepare('INSERT INTO clientesss (projeto, deal, cnpj, stakeholder, cpf, telefone,email, squad) VALUES (:Projeto, :Deal, :CNPJ, :Stakeholder, :CPF, :Telefone, :Email, :Squad)');
            $comando->bindParam(':Projeto', $Projeto);
            $comando->bindParam(':Deal', $Deal);
            $comando->bindParam(':Stakeholder', $Stakeholder);
            $comando->bindParam(':CPF', $CPF);
            $comando->bindParam(':CNPJ', $CNPJ);
            $comando->bindParam(':Telefone', $Telefone);
            $comando->bindParam(':Email', $Email);
            $comando->bindParam(':Squad', $Squad);
            $comando->execute();
            $comando2 = $pdo->prepare('INSERT INTO vendas (projeto, valor, vendedor) VALUES (:Projeto, :Deal, :vendedor)');
            $comando2->bindParam(':vendedor', $vendedor);
            $comando2->bindParam(':Deal', $Deal);
            $comando2->bindParam(':Projeto', $Projeto);
        }
    
    }catch (PDOException $e) {
        echo 'Erro ao executar comando no banco de dados: ' . $e->getMessage();
        exit();
    }
    header('location: pagina_admin.php');

?>