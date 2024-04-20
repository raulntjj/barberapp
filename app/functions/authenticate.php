<?php
require_once "../database/connection.php";
$connection = newConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $connection->real_escape_string($_POST["cpf"]);
    $password = $connection->real_escape_string($_POST["password"]);

    // Consulta SQL para verificar se o CPF e a senha correspondem a um registro na tabela de usuários
    $check_query = "SELECT * FROM users WHERE cpf = ?";
    $stmt = $connection->prepare($check_query);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $check_result = $stmt->get_result();

    //Confere se o cpf é existente no banco de dados  
    if ($check_result->num_rows == 1) {
        $user_data = $check_result->fetch_assoc();
        //Verifica se a senha confere com o cpf
        if(password_verify($password, $user_data["password"])){
            session_start();
            if(empty($_SESSION)){
                $_SESSION["user_id"] = $user_data["id"];
                $_SESSION["cpf"] = $user_data["cpf"];
                $_SESSION["name"] = $user_data["name"];
                $_SESSION["cpf"] = $user_data["cpf"];
                $_SESSION["contact"] = $user_data["contact"];
                header("Location: ../views/dashboard/dashboard.php");
            }
            else{
                header("Location: ../views/dashboard/dashboard.php");
            }
        }
        else {
            header("Location: ../views/login/login.php?stats=wrong_password");
            exit();
        }
    }
    else {
        header("Location: ../views/login/login.php?stats=cpf_notexist");
        exit();
    }
}

$connection->close();
?>