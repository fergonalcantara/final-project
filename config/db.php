//<?php
//$env = parse_ini_file(__DIR__ . '/../.env');

//$host = $env['DB_HOST'];
//$port = $env['DB_PORT'];
//$db   = $env['DB_NAME'];
//$user = $env['DB_USER'];
//$pass = $env['DB_PASS'];

//try {
//    $conn = new PDO(
//        "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
//        $user,
//        $pass
//    );
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $e) {
//    die(" Error de conexión: " . $e->getMessage());
//}
//?>

<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=paints;charset=utf8', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
?>