<!DOCTYPE html>
<html lang="en">

<head>
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

</head>

<body>
<?php include 'header.php';?>


        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <!-- <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">

                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <div class="beta-products-details">

                                <div class="clearfix"></div>
                            </div> -->
                        <div class="row">
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "diengiadung");
                            mysqli_set_charset($conn, 'UTF8');
                            if(isset($_POST['timkiem'])){
                                $name = $_POST['search'];
                                $sql = "SELECT * FROM hanghoa WHERE tenhang LIKE '%$name%'  ";
                          }
                          if(isset($_POST['nho100'])){
                              $gia = $_POST['nho100'];
                              $sql = "SELECT * FROM hanghoa WHERE giaban <  $gia  ";
                          }
                          if(isset($_POST['lon100'])){
                              $gia = $_POST['lon100'];
                              $sql = "SELECT * FROM hanghoa WHERE giaban >  $gia  ";
                          }
                           
                            $kq = $conn->query($sql);
                            if (mysqli_num_rows($kq) > 0) {
                                while ($row = $kq->fetch_assoc()) {
                            ?>
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="product-details.php?id=<?php echo $row['id'] ?>"><img src="images/<?php echo $row['img'] ?>" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title"><?php echo 'Giá:' . $row['giaban'] . 'VND' ?></p>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title"><?php echo $row['tenhang'] ?></p>
                                            </div>
                                            <div class="single-item-body">
                                            <h2><?php echo '<a href="product-details.php?id=' . $row['id'] . '">Chi tiết</a>'; ?></h2>
                                            </div>
                                            <div class="cart">
                                                <a href="addcart.php" data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><img src="img/core-img/cart.png" alt=""></a>
                                            </div>


                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo 'Không tìm thấy sản phẩm nào!';
                            }
                            ?>



                        </div>
                        <div class="space40">&nbsp;</div>
                        <!-- 
                        </div> 
                    </div> -->
                    </div> <!-- end section with sidebar and main content -->


                </div> <!-- .main-content -->
            </div> <!-- #content -->
        </div> <!-- .container -->


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
        <?php include 'footer.php';?>

</body>

</html>