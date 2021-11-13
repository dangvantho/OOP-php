<?php
require __DIR__ . "/../vendor/autoload.php";
$newenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . "/../");
$newenv->load();
class DB
{
    private static $conn;
    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->db_name = getenv("DB_NAME");
        $this->db_password = getenv("DB_PASSWORD");
        $this->user = getenv("DB_USER_NAME");
        $this->db_port = getenv("DB_PORT");
    }
    public function connect()
    {
        if (!DB::$conn) {
            DB::$conn = mysqli_connect(
                $this->host,
                $this->user,
                $this->db_password,
                $this->db_name,
                $this->db_port
            );
        }
    }
    public function disconnect()
    {
        echo getenv("DB_USER_NAME");
        if (DB::$conn) {
            mysqli_close(DB::$conn);
        }
    }
    public function getStatus()
    {
        if (DB::$conn) {
            return 'connected';
        }
        return 'disconnected';
    }
    public function create_table($_table, $fields)
    {
        $this->connect();
        if(!is_array($fields) || !count($fields)) {
            throw new Exception('Bạn phải có ít nhất 1 field');
            return;
        }
        $mapFields = join(',', $fields);
        // $mapFields = substr($mapFields, 0, -1);
        $query = "create table " . $_table . "(" . $mapFields . ")";
        if (!mysqli_query(DB::$conn, $query)) {
            throw new Exception('Tạo bảng thất bại');
            return;
        }
    }
}
