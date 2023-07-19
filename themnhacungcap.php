<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
mysqli_set_charset($conn, 'UTF8');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tennhacungcap = $_POST['tennhacungcap'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];
    $sql = "INSERT INTO nhacungcap(id,tennhacungcap, diachi, sodienthoai) VALUES (NULL, '$tennhacungcap','$diachi','$sodienthoai')";
    $ketqua = mysqli_query($conn, $sql);
}
?>
<html>
    <head>
        <title>Thêm nhà cung cấp</title>
        <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
        <style>
        #login {
            text-align: right;
            margin-top: 10px;
        }

        #cart-form input {
            line-height: 30px;
            height: 30px;
        }

        #cart-form label {
            width: 100px;
            display: inline-block;
            margin-top: 15px;
        }

        .add {
            width: 450px;
            height: 300px;
            text-align: center;
            border: 1px solid grey;
            border-radius: 10px;
            margin: 30px auto;
            background-color: white;
        }
    </style>
    </head>
<body>
        <br>
        <link rel="stylesheet" type="text/css" href="login.css">
        <center>
        <form id="cart-form" action="themhanghoa.php" method="POST" >
        <div class="add">
        
            
            <label>Tên nhà cung cấp</label> <input type="text" name="tennhacungcap"><br>
            <label>Địa chỉ</label> <input type="text" name="diachi"><br>
            <label>Số điện thoại</label> <input type="text" name="sodienthoai"><br>
            
            <br>
            <br>
            <button type="submit" >Thêm nhà cung cấp</button>
        </form>
        </center>
        </div>
        
</body>

</html>