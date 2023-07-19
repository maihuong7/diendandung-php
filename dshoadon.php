<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<link rel="icon" href="img/core-img/favicon.ico">

	<!-- Core Style CSS -->
	<link rel="stylesheet" href="css/core-style.css">
	<link rel="stylesheet" href="style.css">
	<title>Quản lý danh mục</title>
	<style type="text/css">

		table,
		td {
			border: 1px solid black;
		}
	</style>

</head>

<body>
<?php 
include("headerr.php"); 
include("navbar.php");
?>
	<div class="container-fluid">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn</h6>
    </div>
    <div class="card body">
<table class="table">
    <thead class ="thead-dark">
		
    <tr>
        <th><center>Tên người mua hàng</center></th>
        <th><center>Số điện thoại</center></th>
		<th><center>Địa chỉ</center></th>
        <th><center>Ghi chú</center></th>
		<th><center>Tổng tiền</center></th>
        <th><center>Ngày mua</center></th>
        <th><center>Xóa</center></th>
    </tr>
	
</thead>
<tbody>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "diengiadung");
		mysqli_set_charset($conn, 'UTF8');
		$sql = "SELECT * FROM hoadon";
		$ketqua = mysqli_query($conn, $sql);
		while ($dong = mysqli_fetch_assoc($ketqua)) {
			echo '<tr>';
            echo '<td>' . $dong['name'] . '</td>';
            echo '<td>' . $dong['sdt'] . '</td>';
            echo '<td>' . $dong['diachigiaohang'] . '</td>';
            echo '<td>' . $dong['note'] . '</td>';
            echo '<td>' . $dong['tongtien'] . '</td>';
            echo '<td>' . date('d/m/Y H:i',  $dong['created_time']) . '</td>';
            echo '<td><a href="xoadonhang.php?id=' . $dong['id'] . '" style="color:red ;"><center><img src="https://www.flaticon.com/svg/static/icons/svg/1345/1345874.svg" width="20px"></center></a></td>';
            echo '</tr>';
		}
		?>
		</tbody>
	</table>
	</div>
	<?php include 'footer.php'; ?>
	</div>
</body>

</html>