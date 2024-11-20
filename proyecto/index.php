<?php
require_once 'models/Equipo.php';

$equipo = new Equipo();
$stmt = $equipo->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Equipos</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container">
    <h1 class="my-4 text-success ">Inventario de Equipos Electrónicos</h1>
    <a href="crear.php" class="btn btn-success mb-3">Agregar Nuevo Equipo</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Serial</th>
            <th>Ubicación</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre_equipo']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $row['marca']; ?></td>
                <td><?php echo $row['serial']; ?></td>
                <td><?php echo $row['ubicacion']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <!-- Botón de eliminación con confirmación de SweetAlert2 -->
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmarEliminacion(<?php echo $row['id']; ?>)">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'exitoso'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: 'La actualización se completó correctamente.'
        });
    </script>
<?php endif; ?>

<script>
    // Función para mostrar la alerta de confirmación antes de eliminar un equipo
    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Este cambio no se podrá deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'No, cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirige a eliminar.php con el ID del equipo a eliminar
                window.location.href = 'eliminar.php?id=' + id;
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
