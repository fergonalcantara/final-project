<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol_id'] != 1) die('Acceso denegado');
$editing = isset($sucursal) && $sucursal;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title><?= $editing ? 'Editar Sucursal' : 'Nueva Sucursal' ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<?php include __DIR__ . '/navbar_admin.php'; ?>
<div class="container mt-4">
    <h2><?= $editing ? 'Editar Sucursal' : 'Nueva Sucursal' ?></h2>
    <form method="POST" action="index.php?action=sucursales">
        <input type="hidden" name="id" value="<?= $editing ? $sucursal['id'] : '' ?>" />
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required value="<?= $editing ? htmlspecialchars($sucursal['nombre']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" required value="<?= $editing ? htmlspecialchars($sucursal['direccion']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?= $editing ? htmlspecialchars($sucursal['telefono']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $editing ? htmlspecialchars($sucursal['email']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Latitud</label>
            <input type="number" step="0.0000001" name="latitud" class="form-control" required value="<?= $editing ? $sucursal['latitud'] : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Longitud</label>
            <input type="number" step="0.0000001" name="longitud" class="form-control" required value="<?= $editing ? $sucursal['longitud'] : '' ?>" />
        </div>
        <button type="submit" class="btn btn-success"><?= $editing ? 'Actualizar' : 'Guardar' ?></button>
        <a href="index.php?action=sucursales" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>