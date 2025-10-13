<?php
require_once __DIR__ . '/../config/db.php';

class Sucursal {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM sucursales");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM sucursales WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO sucursales (nombre, direccion, telefono, email, latitud, longitud) VALUES (?,?,?,?,?,?)");
        return $stmt->execute([$data['nombre'], $data['direccion'], $data['telefono'], $data['email'], $data['latitud'], $data['longitud']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE sucursales SET nombre=?, direccion=?, telefono=?, email=?, latitud=?, longitud=? WHERE id=?");
        return $stmt->execute([$data['nombre'], $data['direccion'], $data['telefono'], $data['email'], $data['latitud'], $data['longitud'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM sucursales WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>

