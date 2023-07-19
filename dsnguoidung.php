<style>
    table,td{
        border: 1px solid gray;
    }
    </style>
<?php 
include("headerr.php"); 
include("navbar.php");
?>
<?php
$conn=mysqli_connect("localhost","root","","diengiadung") ;
mysqli_set_charset($conn, 'UTF8');
$sql = "SELECT * FROM user";
$query = mysqli_query($conn, $sql);
?>
<div class="container-fluid">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Tài khoản Admin</h6>
    </div>
    <div class="card body">
<table class="table">
    <thead class ="thead-dark">
    <tr>
        <th>Tên tài khoản</th>
        <th>Mật khẩu</th>
        <th>Số điện thoại</th>
        <th>Xóa</th>
    </tr>
</thead>
<tbody>
    <?php
    while($row=mysqli_fetch_assoc($query)){
     ?>
<tr>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['pass'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo'<a href="xoakh.php?id='.$row['id'].'"style="color:red ;">Xóa</a>' ?></td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
<?php 
include("footer.php"); 
?>

</div>


