<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
mysqli_set_charset($conn, 'UTF8');
$id = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenhang = $_POST['name'];
    $giaban = $_POST['price'];
    $iddanhmuc = $_POST['iddanhmuc'];
    $mota = $_POST['content'];
    $img = $_FILES['img']['name'];
    if ($img == '') {
        $sql = "UPDATE `hanghoa` 
            SET `tenhang`='$tenhang',`giaban`=$giaban,`mota`='$mota',`iddanhmuc`= $iddanhmuc
            WHERE id=$id";
    } else {
        $sql = "UPDATE `hanghoa` 
            SET `tenhang`='$tenhang',`giaban`=$giaban,`img`='$img',`mota`='$mota',`iddanhmuc`= $iddanhmuc
            WHERE id=$id";
    }
    mysqli_query($conn, $sql);
}
$sql = "SELECT * FROM hanghoa WHERE id=" . $_GET["id"] . "";
$ketqua = mysqli_query($conn, $sql);
$row1 =  mysqli_fetch_assoc($ketqua);
?>
<html>

<head>
    <title>Sửa hàng hóa</title>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            padding: 10px;

        }
        input{
            height: 35px;
        }
    </style>
</head>

<body>
    <?php include 'menu.php'; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="name">
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" value="<?php echo $row1['tenhang']; ?>">
        </div>
        <br>
        <div class="price">
            <label>Giá sản phẩm:</label>
            <input type="text" name="price" value="<?php echo $row1['giaban']; ?>">
        </div>
        <br>
        <div class="img">
            <label>Ảnh sản phẩm:</label>
            <input type="file" name="img" value="<?php echo $row1['img']; ?>" accept="image/*">
        </div>
        <label>Danh mục:</label>
        <div>
            <select name="iddanhmuc">
                <?php
                $sql = "SELECT * FROM danhmuc";
                $ketqua = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($ketqua)) {
                    $select = '';
                    if ($row['id'] == $row1['iddanhmuc']) $select = "selected";
                    echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['tendanhmuc'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div>
            <br>
            <br>
            <br>
            <label>Mô tả:</label>
            <textarea name="content" id="product-content"><?php echo $row1['mota']; ?></textarea>
        </div>
        <input type="submit" name="" value="Xác nhận" id="">
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
    <?php include 'footer.php'; ?>
</body>

</html>