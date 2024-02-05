<?php

require_once '../B.datos/pacientes_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $hora = isset($_POST["hora"]) ? $_POST["hora"] : null;  // Añade verificación para "hora"
    $dia = $_POST["dia"];
    $turno = $_POST["turno"];
    $registroClinico = $_POST["registro_clinico"];

    // Validar y procesar los datos
    if (empty($nombre) || empty($apellido) || empty($hora) || empty($dia) || empty($turno) || empty($registroClinico)) {
        echo "Por favor, completa todos los campos.";
    } else {
        // Validar el rango de horas
        if ($hora < 1 || $hora > 18) {
            echo "La hora debe estar entre 1 y 18.";
        } else {
            // Validar el rango de registro clínico
            // (puedes agregar más validaciones según tus necesidades)

            inicializarPacientesDB();
            agregarPaciente($nombre, $apellido, $hora, $dia, $turno, $registroClinico);

            echo "Registro exitoso del paciente.";
        }
    }

    exit();
}

?>
