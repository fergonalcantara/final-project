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
    <title>Usuarios - Paints Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<?php include __DIR__ . '/navbar_admin.php'; ?>
<div class="container mt-4">
    <h2>Usuarios</h2>
    <a href="index.php?action=usuarios&mode=newUsuario" class="btn btn-primary mb-3">Nuevo Usuario</a>
    <table class="table table-bordered table-hover">
        <thead><tr>
            <th>ID</th><th>Usuario</th><th>Nombre Completo</th><th>Email</th><th>Rol</th><th>Estado</th><th>Acciones</th>
        </tr></thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['usuario']) ?></td>
                    <td><?= htmlspecialchars($u['nombre_completo']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['rol']) ?></td>
                    <td><?= $u['estado'] == 1 ? 'Activo' : ($u['estado'] == 0 ? 'Inactivo' : 'Suspendido') ?></td>
                    <td>
                        <a href="index.php?action=usuarios&mode=editUsuario&id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?action=usuarios&mode=deleteUsuario&id=<?= $u['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


