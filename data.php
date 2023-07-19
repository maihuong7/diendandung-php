<?php 
header('Content-Type: application/json');
// kết nối csdl
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diengiadung";
$conn = new mysqli($servername, $username, $password, $dbname);


$data = array();
// truy vấn dữ liệu ra, vd: ngày với tiền(của t)
$query = "SELECT `created_time`, `tongtien` FROM `hoadon` LIMIT 7";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
  } 

echo json_encode($data);
