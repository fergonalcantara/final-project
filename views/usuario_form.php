<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol_id'] != 1) die('Acceso denegado');
$editing = isset($usuario) && $usuario;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title><?= $editing ? 'Editar Usuario' : 'Nuevo Usuario' ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<?php include __DIR__ . '/navbar_admin.php'; ?>
<div class="container mt-4">
    <h2><?= $editing ? 'Editar Usuario' : 'Nuevo Usuario' ?></h2>
    <form method="POST" action="index.php?action=usuarios">
        <input type="hidden" name="id" value="<?= $editing ? $usuario['id'] : '' ?>" />
        <div class="mb-3">
            <label>Usuario</label>
            <input type="text" name="usuario" class="form-control" required value="<?= $editing ? htmlspecialchars($usuario['usuario']) : '' ?>" <?= $editing ? 'readonly' : '' ?> />
        </div>
        <div class="mb-3">
            <label><?= $editing ? 'Nueva contraseña (dejar vacía para no cambiar)' : 'Contraseña' ?></label>
            <input type="password" name="password" class="form-control" <?= $editing ? '' : 'required' ?> />
        </div>
        <div class="mb-3">
            <label>Nombre Completo</label>
            <input type="text" name="nombre_completo" class="form-control" required value="<?= $editing ? htmlspecialchars($usuario['nombre_completo']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="<?= $editing ? htmlspecialchars($usuario['email']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Rol</label>
            <select name="rol_id" class="form-select" required>
                <?php foreach ($roles as $rol): ?>
                <option value="<?= $rol['id'] ?>" <?= $editing && $usuario['rol_id'] == $rol['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($rol['nombre']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-select" required>
                <option value="1" <?= $editing && $usuario['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                <option value="0" <?= $editing && $usuario['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                <option value="2" <?= $editing && $usuario['estado'] == 2 ? 'selected' : '' ?>>Suspendido</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success"><?= $editing ? 'Actualizar' : 'Guardar' ?></button>
        <a href="index.php?action=usuarios" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
