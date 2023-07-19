<?php  
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
session_start();
    $nd = $_POST["noidung"];
    $idsp = $_POST["id"];
    $date = $_POST["date"];
    if(isset($_SESSION['id'])){
        $idkh = $_SESSION['id'];
        $name = $_SESSION['user'];
        $sql = "INSERT INTO `binhluan`(`idsp`, `idkh`, `noidung`, `ngay`) VALUES ($idsp, $idkh, '$nd', '$date')";
        $conn->query($sql);
        echo $name.' đã bình luận :  '.$nd.'<br>';
    }
    else {
        echo "<script type='text/javascript'>alert('Đăng nhập trước khi nhận xét');</script>";
    }
?>