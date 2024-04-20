<?php
    require_once "../database/connection.php";
    $connection = newConnection();

    //Receber dados
    session_start();
    $user_id = $connection->real_escape_string($_SESSION['user_id']);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = $connection->real_escape_string($_POST["date"]);
        $hour = $connection->real_escape_string($_POST["hour"]);
        $services = $connection->real_escape_string($_POST["services"]);

        $sql = "INSERT INTO appointments (user_id, date, hour, services) VALUES(?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $user_id, $date, $hour, $services);
        if ($stmt->execute()) {
            header("Location: ../views/dashboard/dashboard.php?stats=sucessfully_shedule");
        }
        else {
            error_log($connection->error);
        }
    }

    $connection->close();
?>