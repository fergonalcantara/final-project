<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol_id'] != 1) die('Acceso denegado');
$editing = isset($empleado) && $empleado;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title><?= $editing ? 'Editar Empleado' : 'Nuevo Empleado' ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<?php include __DIR__ . '/navbar_admin.php'; ?>
<div class="container mt-4">
    <h2><?= $editing ? 'Editar Empleado' : 'Nuevo Empleado' ?></h2>
    <form method="POST" action="index.php?action=empleados">
        <input type="hidden" name="id" value="<?= $editing ? $empleado['id'] : '' ?>" />
        <div class="mb-3">
            <label>Usuario</label>
            <select name="usuario_id" class="form-select" required>
                <option value="">Seleccione</option>
                <?php foreach ($usuarios as $u): ?>
                <option value="<?= $u['id'] ?>" <?= $editing && $empleado['usuario_id'] == $u['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($u['usuario']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Sucursal</label>
            <select name="sucursal_id" class="form-select" required>
                <option value="">Seleccione</option>
                <?php foreach ($sucursales as $s): ?>
                <option value="<?= $s['id'] ?>" <?= $editing && $empleado['sucursal_id'] == $s['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($s['nombre']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Nombre Completo</label>
            <input type="text" name="nombre_completo" class="form-control" required value="<?= $editing ? htmlspecialchars($empleado['nombre_completo']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>DPI</label>
            <input type="text" name="dpi" class="form-control" required value="<?= $editing ? htmlspecialchars($empleado['dpi']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>NIT</label>
            <input type="text" name="nit" class="form-control" required value="<?= $editing ? htmlspecialchars($empleado['nit']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Puesto</label>
            <input type="text" name="puesto" class="form-control" value="<?= $editing ? htmlspecialchars($empleado['puesto']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?= $editing ? htmlspecialchars($empleado['telefono']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" class="form-control" required value="<?= $editing ? htmlspecialchars($empleado['fecha_ingreso']) : '' ?>" />
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-select" required>
                <option value="1" <?= $editing && $empleado['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                <option value="0" <?= $editing && $empleado['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                <option value="2" <?= $editing && $empleado['estado'] == 2 ? 'selected' : '' ?>>Suspendido</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success"><?= $editing ? 'Actualizar' : 'Guardar' ?></button>
        <a href="index.php?action=empleados" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>