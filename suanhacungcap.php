<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
mysqli_set_charset($conn, 'UTF8');
$id = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tennhacungcap = $_POST['name'];
    $diachi = $_POST['dc'];
    $sodienthoai = $_POST['sdt'];
    
        $sql = "UPDATE `hanghoa` 
            SET `tennhacungcap`='$tennhacungcap',`diachi`=$diachi,`sodienthoai`='$sodienthoai'
            WHERE id=$id";
    
    mysqli_query($conn, $sql);
}
$sql = "SELECT * FROM nhacungcap WHERE id=" . $_GET["id"] . "";
$ketqua = mysqli_query($conn, $sql);
$row1 =  mysqli_fetch_assoc($ketqua);
?>
<body>
<?php 
include("headerr.php"); 
include("navbar.php");
?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="name">
            <label>Tên nhà cung cấp</label>
            <input type="text" name="name" value="<?php echo $row1['tennhacungcap']; ?>">
        </div>
        <br>
        <div class="dc">
            <label>Địa chỉ</label>
            <input type="text" name="dc" value="<?php echo $row1['diachi']; ?>">
        </div>
        
        <br>
        <div class="sdt">
            <label>Số điện thoại</label>
            <input type="text" name="sdt" value="<?php echo $row1['sodienthoai']; ?>">
        </div>
       
        <button type="submit" name="" value="Xác nhận" id="">Xác nhận</button>
        </div>
        
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
    <?php 
include("footer.php"); 
?>

</body>