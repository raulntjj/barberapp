<?php
    function newConnection($database = "barberapp"){
        $server = "127.0.0.1";
        $user = "root";
        $password = "root";

        $connection = new mysqli($server, $user, $password, $database);

        if($connection->connect_error){
            error_log("Error: " . $connection->error);
            exit();
        }

        return $connection;
    }
?>