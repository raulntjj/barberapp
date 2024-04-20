<?php
    session_start();

    if(!empty($_SESSION)) {
        header("Location: ../dashboard/dashboard.php");
        exit();
    }

    if (isset($_GET["stats"]) && $_GET["stats"] == "cpf_exist")
        echo "<script>var cpfExistError = true;</script>";

    if (isset($_GET["stats"]) && $_GET["stats"] == "cpf_notexist")
        echo "<script>var cpfNotExistError = true;</script>";

    if (isset($_GET["stats"]) && $_GET["stats"] == "wrong_password")
        echo "<script>var wrongPass = true;</script>";

    if (isset($_GET["stats"]) && $_GET["stats"] == "registred")
        echo "<script>var userRegistred = true;</script>";
?>

<script src="../popup/popup.js"></script>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../index.css"/>
    <link rel="stylesheet" type="text/css" href="./login.css"/>
    <title>Login</title>
</head>
<body>
    <main>
        <header class="header-container">
            <div><h1>BarberShop</h1></div>
        </header>
        
        <section class="section-container login">
            <form method="post" action="../../functions/authenticate.php">
                <div class="title"><h1>Login</h1></div>
                <div><p>Faça o login para uma experiência única de barbearia.</p></div>
                <div class="form-container">
                    <label for="cpf"><p>CPF</p></label>
                    <input type="text" name="cpf" id="cpf" placeholder="Seu CPF..." required>
                </div>
                <div>
                    <label for="password"><p>Senha</p></label>
                    <input type="password" name="password" id="password" placeholder="Sua senha..." required>
                </div>
                <input type="submit" value="Entrar">
            </form>
            <div class="divider"></div>
            <form method="post" action="../signup/signup.php">
                <div class="sign-up">
                    <label><p>Não possue conta?</p></label>
                    <input type="submit" value="Cadastre-se!">
                </div>
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