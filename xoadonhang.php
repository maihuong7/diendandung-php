<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
$sql = "DELETE FROM hoadon WHERE id=".$_GET['id'];
$ketqua = mysqli_query($conn, $sql);
?>
<html>
<head>
	<title>Xóa đơn hàng</title>
	<link rel="stylesheet" href="css/core-style.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include('menu.php'); ?>
</body>
</html>