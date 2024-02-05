<?php

function inicializarPacientesDB() {
    $conn = new SQLite3('../B.datos/pacientes.db');
    $conn->exec('
        CREATE TABLE IF NOT EXISTS Pacientes (
            Nombre TEXT,
            Apellido TEXT,
            Hora INTEGER CHECK (Hora >= 1 AND Hora <= 18),
            Dia TEXT CHECK (Dia IN ("lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo")),
            Turno TEXT CHECK (Turno IN ("mañana", "tarde", "noche")),
            RegistroClinico TEXT,
            PRIMARY KEY (Nombre, Apellido, Hora, Dia, Turno)
        )
    ');
    $conn->close();
}

function agregarPaciente($nombre, $apellido, $hora, $dia, $turno, $registroClinico) {
    $conn = new SQLite3('../B.datos/pacientes.db');
    $conn->exec('
        INSERT INTO Pacientes VALUES (
            "' . $nombre . '",
            "' . $apellido . '",
            ' . $hora . ',
            "' . $dia . '",
            "' . $turno . '",
            "' . $registroClinico . '"
        )
    ');
    $conn->close();
}

?>
