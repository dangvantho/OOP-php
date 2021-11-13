<?php
include_once __DIR__."/db.php";
$type = isset($_POST['type']) ? $_POST['type']: 'get';
$data = isset($_POST['data']) ? $_POST['data']: null;
$db = new DB();

try {
    switch ($type) {
        case 'create_table':
            $table_name = $data['table_name'];
            $fields = isset($data['fields']) ? $data['fields']: [];
            $db->create_table($table_name, $fields);
            echo "Tạo bảng thành công";
            break;
        case 'disconnect':
            $db->disconnect();
            echo $db->getStatus();
        default:
            # code...
            break;
    }
} catch (Exception $th) {
   header('X-PHP-Response-Code: 500', true, 500);
   echo "Tạo bảng thất bại";
}