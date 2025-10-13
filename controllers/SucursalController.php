<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol_id'] != 1) die('Acceso denegado');

require_once __DIR__ . '/../models/Sucursal.php';
$model = new Sucursal();

$mode = $_GET['mode'] ?? null;
$id = $_GET['id'] ?? null;

if ($mode == 'deleteSucursal' && $id) {
    $model->delete($id);
    header('Location: index.php?action=sucursales');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postId = $_POST['id'] ?? null;
    $data = [
        'nombre' => $_POST['nombre'],
        'direccion' => $_POST['direccion'],
        'telefono' => $_POST['telefono'],
        'email' => $_POST['email'],
        'latitud' => $_POST['latitud'],
        'longitud' => $_POST['longitud']
    ];

    if ($postId) {
        $model->update($postId, $data);
    } else {
        $model->create($data);
    }
    header('Location: index.php?action=sucursales');
    exit;
} elseif ($mode == 'newSucursal') {
    $sucursal = null;
    include __DIR__ . '/../views/sucursal_form.php';
    exit;
} elseif ($mode == 'editSucursal' && $id) {
    $sucursal = $model->getById($id);
    include __DIR__ . '/../views/sucursal_form.php';
    exit;
}

$sucursales = $model->getAll();
include __DIR__ . '/../views/sucursales.php';
?>


