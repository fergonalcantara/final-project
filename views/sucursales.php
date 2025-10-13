<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol_id'] != 1) die('Acceso denegado');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Sucursales - Paints Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<?php include __DIR__ . '/navbar_admin.php'; ?>
<div class="container mt-4">
    <h2>Sucursales</h2>
    <a href="index.php?action=sucursales&mode=newSucursal" class="btn btn-primary mb-3">Nueva Sucursal</a>
    <table class="table table-hover table-bordered">
        <thead><tr>
            <th>ID</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Email</th><th>Latitud</th><th>Longitud</th><th>Acciones</th>
        </tr></thead>
        <tbody>
            <?php foreach ($sucursales as $s): ?>
                <tr>
                    <td><?= $s['id'] ?></td>
                    <td><?= htmlspecialchars($s['nombre']) ?></td>
                    <td><?= htmlspecialchars($s['direccion']) ?></td>
                    <td><?= htmlspecialchars($s['telefono']) ?></td>
                    <td><?= htmlspecialchars($s['email']) ?></td>
                    <td><?= $s['latitud'] ?></td>
                    <td><?= $s['longitud'] ?></td>
                    <td>
                        <a href="index.php?action=sucursales&mode=editSucursal&id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?action=sucursales&mode=deleteSucursal&id=<?= $s['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar sucursal?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


