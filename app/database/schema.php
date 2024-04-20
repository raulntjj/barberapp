<?php
    require_once "connection.php";
    require_once "querySQL.php";

    $connection = newConnection(null);

    querySQL("barberapp.sql", $connection);

    $connection->close();
?>