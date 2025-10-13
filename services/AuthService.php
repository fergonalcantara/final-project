<?php
require_once __DIR__ . '/../config/db.php';


class AuthService {
    private $pdo;
    private $rolClienteId = 3;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function login($usuario, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? LIMIT 1");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return false;
    }

    public function register($usuario, $password, $nombre_completo, $email) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (usuario, password_hash, nombre_completo, email, rol_id) VALUES (?, ?, ?, ?, ?)");
        try {
            return $stmt->execute([$usuario, $password_hash, $nombre_completo, $email, $this->rolClienteId]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
