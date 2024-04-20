<?php
    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        // Redirecionar o usuário para a página de login ou exibir uma mensagem de erro
        header("Location: ../login/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../index.css"/>
    <title>Eventos</title>
</head>
<body>
<header class="header-container">
        <div><h1>Eventos</h1></div>
    </header>

    <?php
    require_once "../../database/connection.php";
    $connection = newConnection();

    $sql = "SELECT * FROM appointments WHERE user_id = ? ORDER BY date ASC, hour ASC";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $checkEvents = $stmt->get_result();

    $events = array();
    if ($checkEvents->num_rows > 0) {
        while ($eventsData = $checkEvents->fetch_assoc()) {
            echo "
                <section class='section-container'>
                    <h2>Evento marcado:</h2>
                    <p><strong>Dia:</strong> " . $eventsData['date'] . " às " . $eventsData['hour'] . "</p>
                    <p><strong>Serviço agendado:</strong> " . $eventsData['services'] . "</p>
                    <p>Esperamos você lá!</p>
                </section>";
        }
    } else {
        echo "<section class='section-container'><p><strong>Nenhum evento marcado.</strong></p></section>";
    }

    $connection->close();
?>

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