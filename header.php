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
                  <div class="mt-3">
                      <form role="search" action="timkiem.php" method="post">
                          <div><center>
                              <button class="btn btn-info" type="submit" name="nho100" id="search" value=100000> Dưới 100,000</button>
                              <button class="btn btn-info" type="submit" name="lon100" id="search" value=100000> Trên 100,000</button>
                          </center>
                          </div>
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

                  <li><a href="cart1.php">Đơn mua</a></li>
                  <!-- <li><a href="dnhap.php">Đăng nhập</a></li>
                    <li><a href="dnhap.php">Đăng xuất</a></li> -->
                  <ul>
                      <?php session_start();
                        if (isset($_SESSION['user'])) {
                            echo '<li><a href ="dsdanhmuc.php">' . $_SESSION['user'] . '</a></li>';
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