<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol_id'] != 1) die('Acceso denegado');

require_once __DIR__ . '/../models/Empleado.php';
$model = new Empleado();

$mode = $_GET['mode'] ?? null;
$id = $_GET['id'] ?? null;

if ($mode == 'deleteEmpleado' && $id) {
    $model->delete($id);
    header('Location: index.php?action=empleados');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postId = $_POST['id'] ?? null;
    $data = [
        'usuario_id' => $_POST['usuario_id'],
        'sucursal_id' => $_POST['sucursal_id'],
        'nombre_completo' => $_POST['nombre_completo'],
        'dpi' => $_POST['dpi'],
        'nit' => $_POST['nit'],
        'puesto' => $_POST['puesto'],
        'telefono' => $_POST['telefono'],
        'fecha_ingreso' => $_POST['fecha_ingreso'],
        'estado' => $_POST['estado']
    ];

    if ($postId) {
        $model->update($postId, $data);
    } else {
        $model->create($data);
    }
    header('Location: index.php?action=empleados');
    exit;
} elseif ($mode == 'newEmpleado') {
    $empleado = null;
    $usuarios = $model->getUsuarios();
    $sucursales = $model->getSucursales();
    include __DIR__ . '/../views/empleado_form.php';
    exit;
} elseif ($mode == 'editEmpleado' && $id) {
    $empleado = $model->getById($id);
    $usuarios = $model->getUsuarios();
    $sucursales = $model->getSucursales();
    include __DIR__ . '/../views/empleado_form.php';
    exit;
}

$empleados = $model->getAll();
include __DIR__ . '/../views/empleados.php';
?>



