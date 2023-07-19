<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Nhập từ khóa của bạn...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
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
                    <ul>
                        <?php session_start();
                        if(isset($_SESSION['user'])){
                            echo'<li><a>'.$_SESSION['user'].'</a></li>';
                            echo '<li><a href="dangxuat.php">Đăng xuất</a></li>';
                        }
                        else{
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
        <!-- Header Area End -->

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Danh mục</h6>


                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "diengiadung");
                        mysqli_set_charset($conn, 'UTF8');
                        $sql = "SELECT * FROM danhmuc";
                        $ketqua = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($ketqua)) {
                            echo '<a href="danhmuc.php?iddanhmuc=' . $row['id'] . '">' . $row['tendanhmuc'] . '<br>' . '</a>';
                        }
                        ?>
                    </ul>
                </div>
            </div>



            <!-- ##### Single Widget ##### -->
            <div class="widget brands mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Nhãn hiệu</h6>

                <div class="widget-desc">
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="amado">
                        <label class="form-check-label" for="amado">Amado</label>
                    </div>
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="ikea">
                        <label class="form-check-label" for="ikea">Ikea</label>
                    </div>
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="furniture">
                        <label class="form-check-label" for="furniture">Furniture Inc</label>
                    </div>
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="factory">
                        <label class="form-check-label" for="factory">The factory</label>
                    </div>
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="artdeco">
                        <label class="form-check-label" for="artdeco">Artdeco</label>
                    </div>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget color mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Color</h6>

                <div class="widget-desc">
                    <ul class="d-flex">
                        <li><a href="#" class="color1"></a></li>
                        <li><a href="#" class="color2"></a></li>
                        <li><a href="#" class="color3"></a></li>
                        <li><a href="#" class="color4"></a></li>
                        <li><a href="#" class="color5"></a></li>
                        <li><a href="#" class="color6"></a></li>
                        <li><a href="#" class="color7"></a></li>
                        <li><a href="#" class="color8"></a></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget price mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Giá</h6>

                <div class="widget-desc">
                    <div class="slider-range">
                        <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="range-price">$10 - $1000</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Hiển thị</p>
                                <div class="view d-flex">
                                    <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Sorting -->
                            <!-- <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sắp xếp theo</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortBydate">
                                            <option value="value">Ngày</option>
                                            <option value="value">Mới nhất</option>
                                            <option value="value">Phổ biến</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="view-product d-flex align-items-center">
                                    <p>Lượt xem</p>
                                    <form action="#" method="get">
                                        <select name="select" id="viewProduct">
                                            <option value="value">12</option>
                                            <option value="value">24</option>
                                            <option value="value">48</option>
                                            <option value="value">96</option>
                                        </select>
                                    </form>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // PHẦN XỬ LÝ PHP
                // BƯỚC 1: KẾT NỐI CSDL
                $id = $_GET['iddanhmuc'];
                $conn = mysqli_connect("localhost", "root", "", "diengiadung");
                mysqli_set_charset($conn, 'UTF8');
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'SELECT count(id) as total from hanghoa where iddanhmuc='.$id.'');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 2;
                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                // Tìm Start
                $start = ($current_page - 1) * $limit;
                // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                $result = mysqli_query($conn, "SELECT * FROM hanghoa where iddanhmuc=$id LIMIT $start,$limit");
                ?>
                <div>
                    <div class="w3-row w3-grayscale">

                        <?php
                        // PHẦN HIỂN THỊ TIN TỨC
                        // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="product-meta-data">
                                <img src="images/<?php echo $row['img'] ?>" alt="" width="400px" height="300px">
                                <div class="line"></div>

                                <h6><?php echo $row['tenhang'] ?></h6>
                                <p><?php echo 'Giá:' . $row['giaban'] . 'VND' ?></p>
                                <h2><?php echo '<a href="product-details.php?id=' . $row['id'] . '">Chi tiết</a>'; ?></h2>

                                <!-- <div class="cart">
                                    <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><img src="img/core-img/cart.png" alt=""></a>
                                </div> -->

                            </div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="pagination">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <!-- <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li> -->

                        <?php
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev

                        if ($current_page > 1 && $total_page > 1) {
                            // echo '<a href="index.php?page=' . ($current_page - 1) . '">Prev</a>| ';
                        ?>
                            <li class="page-item disabled">
                                <?php echo '<a class="page-link" tabindex="-1" href="danhmuc.php?page=' . ($current_page - 1) . '&iddanhmuc='.$id.'">Previous</a>' ?>
                            </li>
                        <?php
                        }
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++) {
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page) {
                                echo '<span>' . $i . '</span>  ';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="danhmuc.php?page=' . $i . '&iddanhmuc='.$id. '">' . $i . '</a></li>';
                            }
                        }
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị

                        if ($current_page < $total_page && $total_page > 1) {
                        ?>
                            <li class="page-item ">
                                <?php echo '<a class="page-link" href="danhmuc.php?page=' . ($current_page + 1) . '&iddanhmuc='.$id. '">Next</a>' ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- Ratings & Cart -->
            <div class="ratings-cart text-right">
                <div class="ratings">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <!-- <div class="cart">
                                        <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><img src="img/core-img/cart.png" alt=""></a>
                                    </div> -->
            </div>
        </div>
    </div>
    </div>



    </div>

    <div class="row">
        <div class="col-12">
            <!-- Pagination -->
            <nav aria-label="navigation">
                <ul class="pagination justify-content-end mt-50">
                    <!-- <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                <li class="page-item"><a class="page-link" href="#">04.</a></li> -->
                </ul>
            </nav>
        </div>
    </div>
    </div>
    </div>
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