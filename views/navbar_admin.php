<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">Paints - Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a href="index.php?action=usuarios" class="nav-link">Usuarios</a></li>
                <li class="nav-item"><a href="index.php?action=sucursales" class="nav-link">Sucursales</a></li>
                <li class="nav-item"><a href="index.php?action=empleados" class="nav-link">Empleados</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php?logout=1" class="nav-link">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>