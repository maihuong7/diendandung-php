<?php
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
mysqli_set_charset($conn, 'UTF8');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenhang = $_POST['tenhang'];
    $giaban = $_POST['giaban'];
    $img = $_POST['img'];
    $mota = $_POST['mota'];
    $iddanhmuc = $_POST['iddanhmuc'];
    $sql = "INSERT INTO hanghoa(tenhang, giaban,img,mota, iddanhmuc) VALUES ('$tenhang','$giaban','$img','$mota','$iddanhmuc')";
    $ketqua = mysqli_query($conn, $sql);
}
?>
<html>
    <head>
        <title>Thêm hàng hóa</title>
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
        <?php include 'menu.php'; ?>
        <br>
        <link rel="stylesheet" type="text/css" href="login.css">
        <center>
        <form id="cart-form" action="addhanghoa.php" method="POST" >
        <div class="add">
        
            
            <label>Tên mặt hàng</label> <input type="text" name="tenhang"><br>

            <label>Đơn giá</label> <input type="text" name="giaban"><br>
            <label>Ảnh</label> <input type="text" name="img"><br>
            <label>Mô tả</label> <input type="text" name="mota"><br>
            <label>Danh mục</label>
            
            <select name="iddanhmuc">
                <?php

                $sql = "SELECT * FROM danhmuc";
                $ketqua =  mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($ketqua)) {
                    echo '<option value =' . $row['id'] . '>' . $row['tendanhmuc'] . '</option>';
                }
                ?>
            </select>
            <br>
            <br>
            <button type="submit" >Thêm</button>
        </form>
        </center>
        </div>
        <section class="newsletter-area section-padding-100-0">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Newsletter Text -->
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="newsletter-text mb-100">
                            <h2>Đăng kí để được <span>giảm giá 25%</span></h2>
                            <p>Bạn nghĩ sao khi nội thất trong ngôi nhà ấm cúng của mình giảm giá sốc, trong khi giá cả trên thị trường lại “chát” hơn rất nhiều.</p>
                        </div>
                    </div>
                    <!-- Newsletter Form -->
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="newsletter-form mb-100">
                            <form action="" method="post">
                                <input type="email" name="email" class="nl-email" placeholder="E-mail">
                                <input type="submit" value="Đăng ký">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Newsletter Area End ##### -->

        <!-- ##### Footer Area Start ##### -->
        <footer class="footer_area clearfix">
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
                            <p class="copywrite">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
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
                                                <a class="nav-link" href="cart.php">Giỏ hàng</a>
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