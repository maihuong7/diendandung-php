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
    <!-- Search Wrapper Area Start -->
    <?php include 'header.php';?>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <?php
                $conn = mysqli_connect("localhost", "root", "", "diengiadung");
                mysqli_set_charset($conn, 'UTF8');
                $sql = "SELECT * FROM danhmuc";
                $ketqua = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($ketqua)) {
                ?>
                    <div class="single-products-catagory clearfix">
                        <!-- <a href="shop.php"> -->
                        <img src="images/<?php echo $row['img'] ?>" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p><?php echo 'Từ' . '<br>' . $row['gia'] ?></p>
                            <h2><?php echo '<a href="shop.php?iddanhmuc=' . $row['id'] . '">' . $row['tendanhmuc'] . '</a>'; ?></h2>
                        </div>

                        <!-- </a> -->
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
        <!-- Product Catagories Area End -->
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