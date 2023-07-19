<?php
$mess = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST["username"];
    // $p = md5($_POST["password"]);
    // $e = $_POST["email"];
    // $ph = $_POST["phone"];
    // $dc = $_POST["diachi"];
    // $cr = $_POST["created_time"];
    // $lu = $_POST["last_updated"];
    $conn = mysqli_connect("localhost", "root", "", "diengiadung");
    $sql = "SELECT * FROM user WHERE username='$u' ";
    $kq = mysqli_query($conn, $sql);
    $soluong = mysqli_num_rows($kq);
    if ($soluong == 0) {
        $sql = "INSERT INTO user (`id`, `username`, `password`, `email`, `phone`, `diachi`,`role`, `created_time`, `last_updated`) VALUES (NULL, '$u', '" . md5($_POST['password']) . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "',  '" . $_POST['diachi'] . "', 'khach', '" . time() . "', '" . time() . "')";
        $conn->query($sql);
        
        $mess = "<h5>Bạn đã đăng ký thành công!</h5>";
    } else {
        $mess = "<h5>Tên đăng nhập '$u' đã tồn tại!</h5>";
    }
}
?>
<html>

<head>
    <title>Đăng ký</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

    <form action="dky.php" method="post">
        <div class="login">
            <h2>Đăng ký</h2>
            <div class="enter">
                <img src="https://www.flaticon.com/svg/static/icons/svg/151/151782.svg">
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="enter">
                <img src="https://www.flaticon.com/svg/static/icons/svg/151/151783.svg">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="enter">
                <img src="https://www.flaticon.com/svg/static/icons/svg/151/151778.svg">
                <input type="text" placeholder="Email" name="email">
            </div>
            <div class="enter">
                <img src="https://www.flaticon.com/svg/static/icons/svg/151/151768.svg">
                <input type="text" placeholder="Phone number" name="phone">
            </div>
            <div class="enter">
                <img src="https://www.flaticon.com/svg/static/icons/svg/151/151775.svg">
                <input type="text" placeholder="Địa chỉ" name="diachi">
            </div>
            <button type="submit">Đăng ký</button>
            <br>
            <br>
            <a href="dnhap.php">
            <h6 style="color:red;"><b>Đăng nhập</b></h6> </a>
            <?php echo $mess; ?>
        </div>
    </form>

 <!-- ##### Footer Area Start ##### -->
 <footer class="footer_area clearfix">
    <link rel="stylesheet" href="css/core-style.css">
        <link rel="stylesheet" href="style.css">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.php"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="shop.php">Cửa hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="product-details.php">Chi tiết</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="cart1.php">Giỏ hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="checkout.php">Thanh toán</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
  
</body>

</html>