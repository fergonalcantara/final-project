<?php
require_once __DIR__ . '/../config/db.php';

class Empleado {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getAll() {
        $sql = "SELECT e.*, u.usuario AS usuario, s.nombre AS sucursal FROM empleados e JOIN usuarios u ON e.usuario_id=u.id JOIN sucursales s ON e.sucursal_id=s.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM empleados WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO empleados(usuario_id, sucursal_id, nombre_completo, dpi, nit, puesto, telefono, fecha_ingreso, estado) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['usuario_id'], $data['sucursal_id'], $data['nombre_completo'], $data['dpi'], $data['nit'], $data['puesto'], $data['telefono'], $data['fecha_ingreso'], $data['estado']
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE empleados SET usuario_id=?, sucursal_id=?, nombre_completo=?, dpi=?, nit=?, puesto=?, telefono=?, fecha_ingreso=?, estado=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['usuario_id'], $data['sucursal_id'], $data['nombre_completo'], $data['dpi'], $data['nit'], $data['puesto'], $data['telefono'], $data['fecha_ingreso'], $data['estado'], $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM empleados WHERE id=?");
        return $stmt->execute([$id]);
    }

    public function getUsuarios() {
        $stmt = $this->pdo->query("SELECT id, usuario FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSucursales() {
        $stmt = $this->pdo->query("SELECT id, nombre FROM sucursales");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>


