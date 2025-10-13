<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol_id'] != 1) die('Acceso denegado');

require_once __DIR__ . '/../models/Usuario.php';
$model = new Usuario();

$mode = $_GET['mode'] ?? null;
$id = $_GET['id'] ?? null;

if ($mode == 'deleteUsuario' && $id) {
    $model->delete($id);
    header('Location: index.php?action=usuarios');
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postId = $_POST['id'] ?? null;
    $data = [
        'usuario' => $_POST['usuario'],
        'nombre_completo' => $_POST['nombre_completo'],
        'email' => $_POST['email'],
        'rol_id' => $_POST['rol_id'],
        'estado' => $_POST['estado']
    ];

    if ($postId) {
        $model->update($postId, $data);
        if (!empty($_POST['password'])) {
            $model->updatePassword($postId, $_POST['password']);
        }
    } else {
        $data['password'] = $_POST['password'];
        $model->create($data);
    }
    header('Location: index.php?action=usuarios');
    exit;
} elseif ($mode == 'newUsuario') {
    $roles = $model->getRoles();
    $usuario = null;
    include __DIR__ . '/../views/usuario_form.php';
    exit;
} elseif ($mode == 'editUsuario' && $id) {
    $usuario = $model->getById($id);
    $roles = $model->getRoles();
    include __DIR__ . '/../views/usuario_form.php';
    exit;
}

$usuarios = $model->getAll();
include __DIR__ . '/../views/usuarios.php';
?>



