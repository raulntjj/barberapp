<?php
// Incluir o arquivo de conexão
require_once "connection.php";

// Função para executar um arquivo SQL
function querySQL($filename, $connection) {
    // Ler o conteúdo do arquivo SQL
    $sql = file_get_contents($filename);

    // Executar as consultas SQL
    if ($connection->multi_query($sql)) {
        do {
            // Verificar se a execução foi bem-sucedida
            if ($result = $connection->store_result()) {
                $result->free();
            }
        } while ($connection->more_results() && $connection->next_result());
        error_log("Queries executadas com sucesso");
    } else {
        error_log($connection->error);
    }
}

?>