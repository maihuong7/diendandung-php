<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
$sql = "DELETE FROM danhmuc WHERE id=".$_GET['id'];
$ketqua = mysqli_query($conn, $sql);
?>
<html>
<head>
	<title>Xóa danh mục</title>
	<link rel="stylesheet" href="css/core-style.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include('menu.php'); ?>
	<h5>Đã xóa thành công!</h5><br><hr>
	<a href="dsdanhmuc.php">Quay lại</a>
</body>
</html>