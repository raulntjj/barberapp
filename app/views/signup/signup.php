<?php
    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        // Redirecionar o usuário para a página de login ou exibir uma mensagem de erro
        header("Location: ../login/login.php");
        exit();
    }

    if (isset($_GET["stats"]) && $_GET["stats"] == "cpf_exist")
        echo "<script>var cpfExistError = true;</script>";
?>

<script src="../popup/popup.js"></script>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../index.css"/>
    <link rel="stylesheet" type="text/css" href="./signup.css"/>
    <title>Sign-Up</title>
</head>
<body>
    <header class="header-container">
        <a href="../login/login.php"><h1>BarberShop</h1></a>
    </header>
    <main class="main-container">
        <section class="section-container login">
            <form method="post" action="../../functions/register.php">
                <div class="title"><h1>Cadastre-se</h1></div>
                <div><p>É rápido e fácil.</p></div>
                <div class="form-container">
                    <label for="name"><p>Nome:</p></label>
                    <input type="text" name="name" id="name" placeholder="Nome" required>
                    <label for="name"><p>Sobrenome:</p></label>
                    <input type="text" name="name" id="name" placeholder="Nome" required>
                </div>
                <div>
                    <label for="cpf"><p>CPF</p></label>
                    <input type="text" name="cpf" id="cpf" placeholder="CPF" required>
                </div>
                <div>
                    <label for="contact"><p>Email</p></label>
                    <input type="text" name="contact" id="contact" placeholder="Celular ou email" required>
                </div>
                <div>
                    <label for="password"><p>Senha</p></label>
                    <input type="password" name="password" id="password" placeholder="Nova senha" required>
                </div>
                <input type="submit" value="Cadastrar">
            </form>
        </section>
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