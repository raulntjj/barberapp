<?php
    require_once "./app/database/connection.php";
    $connection = newConnection();

    $ip = $_SERVER["REMOTE_ADDR"];
    $browser = $_SERVER["HTTP_USER_AGENT"];
    $currentDateTime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO logs(ip, browser, hour) VALUES(?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $ip, $browser, $currentDateTime);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <script>
        window.location.href = "./app/views/login/login.php";
    </script>
</head>
<body>
</body>
</html>