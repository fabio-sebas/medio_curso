<?php

function inicializarDoctoresDB() {
    $conn = new SQLite3('../B.datos/doctores.db');
    $conn->exec('
        CREATE TABLE IF NOT EXISTS Doctores (
            Nombre TEXT,
            Apellido TEXT,
            Hora INTEGER CHECK (Hora >= 1 AND Hora <= 18),
            Dia TEXT CHECK (Dia IN ("lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo")),
            Turno TEXT CHECK (Turno IN ("mañana", "tarde", "noche")),
            MaxPacientes INTEGER CHECK (MaxPacientes >= 1 AND MaxPacientes <= 50)
        )
    ');
    $conn->close();
}

function agregarDoctor($nombre, $apellido, $hora, $dia, $turno, $maxPacientes) {
    $conn = new SQLite3('../B.datos/doctores.db');
    $conn->exec('
        INSERT INTO Doctores VALUES (
            "' . $nombre . '",
            "' . $apellido . '",
            ' . $hora . ',
            "' . $dia . '",
            "' . $turno . '",
            ' . $maxPacientes . '
        )
    ');
    $conn->close();
}

?>
