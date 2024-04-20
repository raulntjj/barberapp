<?php
require_once "../database/connection.php";

$connection = newConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $connection->real_escape_string($_POST["cpf"]);
    $name = $connection->real_escape_string($_POST["name"]);
    $contact = $connection->real_escape_string($_POST["contact"]);
    $password = $connection->real_escape_string($_POST["password"]);

    //Codificando senha
    $encodedPass = password_hash($password, PASSWORD_DEFAULT);

    $check_query = "SELECT * FROM users WHERE cpf = ?";
    $stmt = $connection->prepare($check_query);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        header("Location: ../views/signup/signup.php?stats=cpf_exist");
        exit();
    } else {
        $sql = "INSERT INTO users (name, cpf, contact, password) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $name, $cpf, $contact, $encodedPass);

        if ($stmt->execute()) {
            error_log("Registrado!");
            header("Location: ../views/login/login.php?stats=registered");
            exit();
        } else {
            error_log($connection->error);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <script>
        window.location.href = "../views/login/login.php?stats=registred";
    </script>
</head>
<body>
</body>
</html>