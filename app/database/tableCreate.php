<?php
    require_once "connection.php";
    require_once "querySQL.php";

    $connection = newConnection();

    querySQL("users.sql", $connection);
    querySQL("appointments.sql", $connection);
    querySQL("logs.sql", $connection);
    
    $connection->close();
?>