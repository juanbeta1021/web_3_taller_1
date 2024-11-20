<?php
require_once 'models/Equipo.php';

$equipo = new Equipo();
$equipo->id = $_GET['id'];
$stmt = $equipo->readOne();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipo->nombre_equipo = $_POST['nombre_equipo'];
    $equipo->tipo = $_POST['tipo'];
    $equipo->marca = $_POST['marca'];
    $equipo->serial = $_POST['serial'];
    $equipo->ubicacion = $_POST['ubicacion'];
    $equipo->estado = $_POST['estado'];

    if ($equipo->update()) {
        header('Location: index.php?mensaje=exitoso');
    } else {
        echo "Error al actualizar el equipo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipo</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4 text-success">Editar Equipo</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nombre_equipo" class="form-label">Nombre del Equipo</label>
            <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" value="<?php echo $row['nombre_equipo']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $row['tipo']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $row['marca']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="serial" class="form-label">Serial</label>
            <input type="text" class="form-control" id="serial" name="serial" value="<?php echo $row['serial']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo $row['ubicacion']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado" required>
                <option value="Bueno" <?php echo $row['estado'] == 'Bueno' ? 'selected' : ''; ?>>Bueno</option>
                <option value="Dañado" <?php echo $row['estado'] == 'Dañado' ? 'selected' : ''; ?>>Dañado</option>
                <option value="En Reparación" <?php echo $row['estado'] == 'En Reparación' ? 'selected' : ''; ?>>En Reparación</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

