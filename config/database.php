
<?php
class Database {
    private $hostName;
    private $userName;
    private $password;
    private $dbName;
    public $conn;

    public function __construct($hostName = "localhost", $userName = "root", $password = "", $dbName = "laravel_app") {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->hostName};dbname={$this->dbName};charset=utf8",
                $this->userName,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

$user= new Database();

$data=$user->getConnection();

  

?>
