<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
$isAdmin = ($_SESSION['rol_id'] == 1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Paints</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Paints</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDashboard">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarDashboard">
      <ul class="navbar-nav me-auto">
        <?php if ($isAdmin): ?>
        <li class="nav-item"><a href="index.php?action=usuarios" class="nav-link">Usuarios</a></li>
        <li class="nav-item"><a href="index.php?action=sucursales" class="nav-link">Sucursales</a></li>
        <li class="nav-item"><a href="index.php?action=empleados" class="nav-link">Empleados</a></li>
        <?php else: ?>
        <li class="nav-item"><a href="#" class="nav-link">Tienda en línea</a></li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php?logout=1" class="nav-link">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h1>Bienvenido a la Tienda Paints</h1>
    <?php if ($isAdmin): ?>
        <p>Tienes permisos administrativos. Usa el menú para gestionar el sistema.</p>
    <?php else: ?>
        <p>Explora los productos y realiza tus compras y cotizaciones.</p>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
