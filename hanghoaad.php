<?php session_start(); ?>
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

		table {
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
       <h6 class="m-0 font-weight-bold text-primary">Danh sách hàng hóa</h6>
    </div>
	<!-- <div class="container"> -->
          <div class="row">
              <div class="col-12">
                  <div class="search-content">
                      <form role="search" action="timkiemten.php" method="post">
                          <input type="text" name="search" id="search" placeholder="Tìm kiếm từ khóa...">
                          <button type="submit" name='timkiem'><img src="img/core-img/search.png" alt=""></button>

                      </form>
                  </div>
                 
              </div>
          </div>
      <!-- </div> -->
    <div class="card body">
<table class="table">
    <thead class ="thead-dark">
		
    <tr>
        <th><center>STT</center></th>
        <th><center>Tên sản phẩm</center></th>
        <th><center>Giá</center></th>
		<th><center>Số lượng</center></th>
		<th><center>Ảnh</center></th>
        <th><center>Mô tả sản phẩm</center></th>
        <th><center>ID danh mục</center></th>
        <th><center>Thêm</center></th>
		<th><center>Sửa</center></th>
        <th><center>Xóa</center></th>
    </tr>
	
</thead>
<tbody>
	
		<?php
		
		$conn = mysqli_connect("localhost", "root", "", "diengiadung");
		mysqli_set_charset($conn, 'UTF8');
		$sql = "SELECT * FROM hanghoa";
		$ketqua = mysqli_query($conn, $sql);
		$num = 1;
		$total = 0;
		while ($row = mysqli_fetch_assoc($ketqua)) {
			echo '<tr>';
			echo '<td>' . $num++ . '</td>';
			echo '<td><a href ="shop.php?iddanhmuc=' . $row['id'] . '"><b>' . $row['tenhang'] . '</b></a></td>';
            echo '<td>' . $row['giaban'] . '</td>';
			echo '<td>' . $row['sl'] . '</td>';
            echo '<td><img src="images/'. $row['img'] .'" alt="" width="200px" height="100px"></td>';
            echo '<td>' . $row['mota'] . '</td>';
            echo '<td>' . $row['iddanhmuc'] . '</td>';
			echo '<td><center><a href ="addhanghoa.php" style="color:red ;" >Thêm</a></center></td>';
			echo '<td><center><a href ="suahanghoa.php?id=' . $row['id'] . '" style="color:green ;" >Sửa</a></center></td>';
			echo '<td><center><a href="delhanghoa.php?id=' . $row['id'] . '" style="color:blue ;"><img src="https://www.flaticon.com/svg/static/icons/svg/1345/1345874.svg" width="20px"></a></center></td>';
			echo '<tr>';
		}
		?>
		</tbody>
	</table>
	</div>
	<?php include 'footer.php'; ?>
	</div>
</body>

</html>
