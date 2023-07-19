<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
$sql = "DELETE FROM hanghoa WHERE id=".$_GET['id'];
$ketqua = mysqli_query($conn, $sql);
?>
<html>
<head>
	<title>Xóa hàng hóa</title>
</head>
<body>
	<?php include('menu.php'); ?>
</body>
</html>