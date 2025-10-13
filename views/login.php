<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Paints</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-light d-flex align-items-center vh-100">
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="../controllers/AuthController.php" class="col-md-5 bg-white p-4 rounded shadow">
            <h3 class="mb-4">Iniciar sesión</h3>
            <div class="mb-3">
                <label>Usuario</label>
                <input class="form-control" type="text" name="usuario" required/>
            </div>
            <div class="mb-3">
                <label>Contraseña</label>
                <input class="form-control" type="password" name="password" required/>
            </div>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger"><?=htmlspecialchars($_GET['error'])?></div>
            <?php endif; ?>
            <button class="btn btn-primary w-100" type="submit" name="login">Entrar</button>
            <div class="mt-3 text-center">
                <a href="register.php">Registrarse</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>

