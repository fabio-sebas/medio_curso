<?php

require_once '../B.datos/doctores_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $hora = isset($_POST["hora"]) ? $_POST["hora"] : null;  // Añade verificación para "hora"
    $dia = $_POST["dia"];
    $turno = $_POST["turno"];
    $maxPacientes = $_POST["max_pacientes"];

    // Validar y procesar los datos
    if (empty($nombre) || empty($apellido) || empty($hora) || empty($dia) || empty($turno) || empty($maxPacientes)) {
        echo "Por favor, completa todos los campos.";
    } else {
        // Validar el rango de horas
        if ($hora < 1 || $hora > 18) {
            echo "La hora debe estar entre 1 y 18.";
        } else {
            // Validar el rango de pacientes
            if ($maxPacientes < 1 || $maxPacientes > 50) {
                echo "El número máximo de pacientes debe estar entre 1 y 50.";
            } else {
                inicializarDoctoresDB();
                agregarDoctor($nombre, $apellido, $hora, $dia, $turno, $maxPacientes);

                echo "Registro exitoso del doctor.";
            }
        }
    }

    exit();
}

?>
