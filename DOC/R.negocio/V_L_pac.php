<?php

// Obtener la lista de pacientes desde la base de datos
$conn = new SQLite3('pacientes.db');
$result = $conn->query('SELECT * FROM Pacientes');
$pacientes = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $pacientes[] = $row;
}
$conn->close();

// Incluir el archivo de la vista HTML
include 'lista_pacientes_html.php';

?>
