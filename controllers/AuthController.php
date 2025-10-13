<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../services/AuthService.php';

$auth = new AuthService();

if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $user = $auth->login($usuario, $password);
    if ($user) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['rol_id'] = $user['rol_id'];
        header('Location: ../index.php');
        exit;
    } else {
        header('Location: ../views/login.php?error=Credenciales inválidas');
        exit;
    }
}
if (isset($_POST['register'])) {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $nombre_completo = $_POST['nombre_completo'];
    $password = $_POST['password'];
    $ok = $auth->register($usuario, $password, $nombre_completo, $email);
    if ($ok) {
        header('Location: ../views/login.php?success=Usuario registrado');
        exit;
    } else {
        header('Location: ../views/register.php?error=Error en registro');
        exit;
    }
}
?>