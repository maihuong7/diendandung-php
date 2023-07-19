<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "diengiadung");
//kiểm tra cart có sp nào ch
$ok = 1;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if (isset($value)) {
            $ok = 2;
        }
    }
}
if ($ok != 2) {
} else {
    $items = $_SESSION['cart'];
}

?>
<html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Product Details</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<body>
    <script>
        $(document).ready(function() {
            $('button[type="submit"]').click(function() {
                var nd = $('input[id="cmt"]').val();
//
                var url = window.location.href;
                var u = new URL(url);
                var id = u.searchParams.get("id");
                //
                var today = new Date();

                var day = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                var date = day + ' ' + time;
                //
                $.post("xulicmt.php", {
                    noidung: nd,
                    id: id,
                    date: date
// 
                }, function(result) {
                    $("#ccc").append(result);
                });
            });
        });

        function layid(id) {
            var url_string = window.location.href;
            var url = new URL(url_string);
            var id = id;
            var t = "#noidungrepbinhluan" + id;
            var txt = $(t).val();

            var a = $("#_token").val();
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var idsp = url.searchParams.get("id");
            $.post("xulireply.php", {
                idrep: id,
                noidung: txt,
                idsach: idsp
            }, function(result) {
                $("#dsbinhluan").append('<hr>' + ".<img src='images/avt.jpg'  width='30' height='23'> <span>&nbsp&nbsp;</span>&nbsp." + a + '<span>&nbsp&nbsp;</span>&nbsp' + today + '<br><br>' + txt + '<hr>');

            });

        }
    </script>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form role="search" action="timkiemten.php" method="post">
                            <input type="text" name="search" id="search" placeholder="Tìm kiếm từ khóa...">
                            <button type="submit" name='timkiem'><img src="img/core-img/search.png" alt=""></button>

                        </form>
                    </div>
                    <div class="search-content">
                        <form role="search" action="timkiem.php" method="post">
                            <button type="submit" name="tkgia" id="search" value=100000> Dưới 100,000</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Cửa hàng</a></li>

                    <li><a href="cart1.php">Giỏ hàng</a></li>
                    <li><a href="checkout.php">Thanh toán</a></li>
                    <!-- <li><a href="dnhap.php">Đăng nhập</a></li>
                    <li><a href="dnhap.php">Đăng xuất</a></li> -->
                    <ul>
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo '<li><a href ="menu.php">' . $_SESSION['user'] . '</a></li>';
                            echo '<li><a href="dangxuat.php">Đăng xuất</a></li>';
                        } else {
                            echo '<li><a href="dky.php">Đăng ký</a></li>';
                            echo '<li><a href="dnhap.php">Đăng nhập</a></li>';
                        }
                        ?>
                    </ul>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Giảm giá%</a>
                <a href="#" class="btn amado-btn active">Tin trong tuần</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Giỏ hàng <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Yêu thích</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Tìm kiếm</a>

            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Điện gia dụng</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
                <?php
                $id = $_GET['id'];
                $ketnoi = mysqli_connect("localhost", "root", "", "diengiadung");
                mysqli_set_charset($ketnoi, 'UTF8');
                $sql = "SELECT * FROM hanghoa WHERE id=$id";
                $ketqua = mysqli_query($ketnoi, $sql);
                $row = mysqli_fetch_array($ketqua);

                ?>
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb"><img src="images/<?php echo $row['img'] ?>" alt="">

                            <!-- <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/pro-big-1.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/pro-big-2.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/pro-big-3.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/pro-big-4.jpg);">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                            <img class="d-block w-100" src="images/<?php echo $row['img'] ?>" alt="First slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-2.jpg" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-3.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-3.jpg" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-4.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">
                                    <?php echo $row['giaban'] . 'VND' ?></p>
                                <a href="#">
                                    <h6><?php echo $row['tenhang'] ?></h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <br>
                                    <div class="review">
                                        <a href="#">Viết đánh giá</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> Trong kho</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>
                                    <?php echo $row['mota'] ?>
                                </p>
                            </div>

                            <!-- Add to Cart Form -->
                            <!-- <form action="addcart.php" class="cart clearfix" method="post">
                                <input type="hidden" name="item" id="" value="<?php echo $row['id'] ?>">
                                <div class="cart-btn d-flex mb-50"> -->
                            <p>Số lượng</p>
                            <!-- <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div> -->
                            <!-- <button type="submit" name="addcart" value="5" class="btn amado-btn">Thêm vào giỏ hàng</button>
                            </form> -->
                            <form id="addcart" action="cart1.php?action=add" method="post">
                                <input type="text" value="1" name="quanlity[<?= $row['id'] ?>]" /><br>
                                <button type="submit" class="btn amado-btn">Thêm vào giỏ hàng</button>

                            </form>

                        </div>
                    </div>
                </div>

                <h2>Đánh giá</h2>
                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <div class="panel" id="tab-reviews">
                        <?php
                        //$sql = "SELECT user.username, binhluan.noidung, ngay FROM user, binhluan 
                        // WHERE binhluan.id=id and  user.id=binhluan.idkh AND binhluan.idsp=$id  ORDER BY binhluan.idsp ASC";
                        $sql = "SELECT  * FROM  binhluan WHERE  idsp=$id";
                        $kq = $conn->query($sql);

                        while ($row = mysqli_fetch_assoc($kq)) {
                            $sq = "SELECT * FROM user WHERE id = ". $row['idkh'] . "";
                            $hh  =  $conn->query($sq);
                            $rw = mysqli_fetch_assoc($hh);


                            echo '<b>' . $rw['username'] . '</b>';
                            echo '<br>';

                            echo '<b>' . $row['noidung'] . '</b> ';
                            echo '<br>';
                            echo $row['ngay'] . '<br>';
                            echo " <button type='button' class='btn btn-info' data-toggle='collapse' data-target='#repbinhluan" . $row['id'] . "'
                            style ='position:relative;left:700px;top:-10px;'>
                            Trả lời</button>";
                            
                            $sqlrep = "SELECT * FROM replycmt WHERE idrep = " . $row['id'] . "";
                            $kqrep = mysqli_query($ketnoi, $sqlrep);
                            while ($dongrep = mysqli_fetch_assoc($kqrep)) {
                                $sq = "SELECT * FROM user WHERE id = " . $dongrep['iduser'] . "";
                                $hh  =  $conn->query($sq);
                                $rw = mysqli_fetch_assoc($hh);
 

                                echo '<b>' . $rw['username'] . '</b>';
                                echo '<br>';
                                echo " <span>&nbsp&nbsp;</span> <span><b></b> &nbsp; 
                                <span style = 'margin-left:80px;'><b>$dongrep[thoigian]</b></span></span>";
                                echo "<br>";
                                echo "<p style = 'margin-left:100px;'>$dongrep[noidung]</p>";
                            }
                            echo '<div id = "dsbinhluan' . $row['id'] . '">
                            </div><br><br>';
                            echo "  <div  id='repbinhluan" . $row['id'] . "'  class='collapse'>      
                            <textarea class='form-control' rows='1' id='noidungrepbinhluan" . $row['id'] . "' name='noidungrepbinhluan" . $row['id'] . "' ></textarea>
                             <button type='button' class='btn btn-primary' value = 'Gửi'  onclick = layid($row[id])>GỬI</button>
                            </div>";
                        }

                        ?>
                        <div id="ccc"></div>
                        <div class="input-group">
                            <input id="cmt" type="text" class="form-control" placeholder="Nhấn vào đây để nhận xét">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    Nhận xét
                                </button>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->


    <!-- ##### Newsletter Area Start ##### -->
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
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder=" E-mail">
                            <input type="submit" value="Đăng ký">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'footer.php'; ?>
</body>

</html>