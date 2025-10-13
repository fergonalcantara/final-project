<?php
require_once __DIR__ . '/../config/db.php';

class Usuario {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT u.id, u.usuario, u.nombre_completo, u.email, r.nombre AS rol, u.estado FROM usuarios u JOIN roles r ON u.rol_id = r.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (usuario, password_hash, nombre_completo, email, rol_id, estado) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['usuario'], password_hash($data['password'], PASSWORD_BCRYPT),
            $data['nombre_completo'], $data['email'], $data['rol_id'], $data['estado']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET usuario=?, nombre_completo=?, email=?, rol_id=?, estado=? WHERE id=?");
        return $stmt->execute([
            $data['usuario'], $data['nombre_completo'], $data['email'], $data['rol_id'], $data['estado'], $id
        ]);
    }

    public function updatePassword($id, $password) {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET password_hash=? WHERE id=?");
        return $stmt->execute([password_hash($password, PASSWORD_BCRYPT), $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id=?");
        return $stmt->execute([$id]);
    }

    public function getRoles() {
        $stmt = $this->pdo->query("SELECT * FROM roles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

