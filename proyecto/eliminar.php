<?php
// Iniciar sesión
session_start();

// Verificar que el ID del equipo ha sido enviado
if (isset($_GET['id'])) {
    // Obtener el ID del equipo a eliminar
    $id_equipo = $_GET['id'];

    // Conexión a la base de datos
    include 'config/Database.php';
    $database = new Database();
    $db = $database->getConnection();

    // Sentencia SQL para eliminar el equipo
    $query = "DELETE FROM equipos WHERE id = :id";
    $stmt = $db->prepare($query);

    // Vincular el parámetro de ID
    $stmt->bindParam(':id', $id_equipo);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        // Redirigir con mensaje de éxito
        header('Location: index.php?mensaje=exitoso');
        exit;
    } else {
        // Redirigir con mensaje de error
        header('Location: index.php?mensaje=error');
        exit;
    }
} else {
    // Si no se pasa un ID, redirigir a la página principal
    header('Location: index.php');
    exit;
}
?>

