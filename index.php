<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();

$action = $_GET['action'] ?? 'dashboard';
$mode = $_GET['mode'] ?? null;
$id = $_GET['id'] ?? null;

$adminPages = ['usuarios', 'empleados', 'sucursales'];

require_once 'controllers/AuthController.php';

if (!isset($_SESSION['usuario_id']) && !in_array($action, ['login', 'register'])) {
    header('Location: views/login.php');
    exit;
}

if (in_array($action, $adminPages) && $_SESSION['rol_id'] != 1) {
    die('Acceso denegado');
}

if (isset($_GET['logout'])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    header('Location: views/login.php');
    exit;
}


switch ($action) {
    case 'usuarios':
        require __DIR__ . '/controllers/UsuarioController.php';
        break;
    case 'empleados':
        require __DIR__ . '/controllers/EmpleadoController.php';
        break;
    case 'sucursales':
        require __DIR__ . '/controllers/SucursalController.php';
        break;
    case 'login':
        require __DIR__ . '/views/login.php';
        break;
    case 'register':
        require __DIR__ . '/views/register.php';
        break;
    case 'dashboard':
    default:
        require __DIR__ . '/views/dashboard.php';
        break;
}
?>
