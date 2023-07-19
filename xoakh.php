<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
$sql = "DELETE FROM user WHERE id=".$_GET['id'];
$ketqua = mysqli_query($conn, $sql);
?>
<html>
<head>
	<title>Xóa khách hàng</title>
</head>
<body>
	<?php include('menu.php'); ?>
	<link rel="stylesheet" href="css/core-style.css">
	<link rel="stylesheet" href="style.css">
</body>
</html>