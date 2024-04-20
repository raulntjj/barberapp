<?php
    //Caso não tenha nenhum usuário em sessão será redirecionado para página login
    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        // Redirecionar o usuário para a página de login ou exibir uma mensagem de erro
        header("Location: ../login/login.php");
        exit();
    }
    
    $id = $_SESSION['user_id'];
    $cpf = $_SESSION['cpf'];
    $contact = $_SESSION['contact'];
    $name = $_SESSION['name'];

    if (isset($_GET["stats"]) && $_GET["stats"] == "sucessfully_shedule")
    echo "<script>var sucessfullyShedule = true;</script>";
?>

<script src="../popup/popup.js"></script>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./dashboard.css"/>
    <link rel="stylesheet" type="text/css" href="../../../index.css"/>

    <title>Dashboard</title>
</head>
<body>
    <header class="header-container">
        
        <div><h1><?php echo "Olá, " . $name . "!"; ?></h1></div>
        <div class="subtitle"><h5><?php echo "Contato: " . $contact . "<br>CPF: " . $cpf ?></h5></div>
    </header>

    <main class="main-container">
        <a href="../appointment/appointment.php"><section class="section-container">
                <img src=""/><h3>Agendamento</h3>
            </section></a>

        <a href="#"><section class="section-container">
            <div><img src=""/><h3>Assinaturas</h3></div>
        </section></a>

        <a href="../events/events.php"><section class="section-container">
            <img src=""/><h3>Eventos</h3>
        </section></a>
        
        <a href="../../functions/logout.php"><section class="section-container">
            <img src=""/><h3>Sair</h3>
        </section></a>
    </main>
    
    <footer class="footer-container">
        <div>
            <h1>What is Lorem Ipsum?</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>
        <div>
            <h1>Why do we use it?</h1>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
        </div>
    </footer>
</body>
</html>