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
    <title>Empleados - Paints Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<?php include __DIR__ . '/navbar_admin.php'; ?>
<div class="container mt-4">
    <h2>Empleados</h2>
    <a href="index.php?action=empleados&mode=newEmpleado" class="btn btn-primary mb-3">Nuevo Empleado</a>
    <table class="table table-bordered table-hover">
        <thead><tr>
            <th>ID</th><th>Usuario</th><th>Sucursal</th><th>Nombre Completo</th><th>DPI</th><th>NIT</th><th>Puesto</th><th>Teléfono</th><th>Fecha Ingreso</th><th>Estado</th><th>Acciones</th>
        </tr></thead>
        <tbody>
            <?php foreach ($empleados as $e): ?>
                <tr>
                    <td><?= $e['id'] ?></td>
                    <td><?= htmlspecialchars($e['usuario']) ?></td>
                    <td><?= htmlspecialchars($e['sucursal']) ?></td>
                    <td><?= htmlspecialchars($e['nombre_completo']) ?></td>
                    <td><?= htmlspecialchars($e['dpi']) ?></td>
                    <td><?= htmlspecialchars($e['nit']) ?></td>
                    <td><?= htmlspecialchars($e['puesto']) ?></td>
                    <td><?= htmlspecialchars($e['telefono']) ?></td>
                    <td><?= htmlspecialchars($e['fecha_ingreso']) ?></td>
                    <td><?= $e['estado'] == 1 ? 'Activo' : ($e['estado'] == 0 ? 'Inactivo' : 'Suspendido') ?></td>
                    <td>
                        <a href="index.php?action=empleados&mode=editEmpleado&id=<?= $e['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?action=empleados&mode=deleteEmpleado&id=<?= $e['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar empleado?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


