<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
mysqli_set_charset($conn, 'UTF8');
$id = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {//gửi lên bằng phương thức POST để xử lí
    $tendanhmuc = $_POST['name'];
    $iddanhmuc = $_POST['iddanhmuc'];
    $img = $_FILES['img']['name'];
    if ($img == '') {
        $sql = "UPDATE `danhmuc` 
            SET `tendanhmuc`='$tendanhmuc'WHERE id=$id";
    } else {
        $sql = "UPDATE `danhmuc` 
            SET `tendanhmuc`='$tendanhmuc'WHERE id=$id";
    }
    mysqli_query($conn, $sql);
}
$sql = "SELECT * FROM danhmuc WHERE id=" . $_GET["id"] . "";
$ketqua = mysqli_query($conn, $sql);
$row1 =  mysqli_fetch_assoc($ketqua);
?>
<html>

<head>
    <title>Sửa danh mục</title>
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
        form{
            text-align: center;
            border: 1px solid grey;
            width: 450px;
            height: 200px;
        }
    </style>
</head>

<body>
    <?php include 'menu.php'; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="name">
            <label>Tên danh mục:</label>
            <input type="text" name="name" value="<?php echo $row1['tendanhmuc']; ?>">
        </div>
        <br>
        <div class="img">
            <label>Ảnh danh mục:</label>
            <input type="file" name="img" value="<?php echo $row1['img']; ?>" accept="image/*">
        </div>
       
        <input class="btn btn-info" type="submit" name="" value="Xác nhận" id="">
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
    <?php include 'footer.php'; ?>
</body>

</html>