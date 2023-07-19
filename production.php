<!DOCTYPE html>
<html>

<head>
    <title>L</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<h8><b>Lựa chọn sản phẩm mỗi trang</b></h8>
<div class="col" style="text-align: right; height: 50px;">
							<form action="shop.php" method="get">
								<select name="phantrang" style="width: 15%; height: 40px;">
									<option value="2">2</option>
									<option value="4">4</option>
									<option value="6">6</option>
								</select>
								<input class="btn btn-info" type="submit" name="submit" value="Phân Trang" style="height: 40px;">
							</form>
						</div>
    <?php
    // PHẦN XỬ LÝ PHP
    // BƯỚC 1: KẾT NỐI CSDL
    $conn = mysqli_connect("localhost", "root", "", "diengiadung");
    mysqli_set_charset($conn, 'UTF8');
    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
    $result = mysqli_query($conn, 'SELECT count(id) as total from hanghoa');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = '';
    if (isset($_GET['phantrang'])) {
        $limit = $_GET['phantrang'];
    } else {
        $limit = 2;
    }
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
    $result = mysqli_query($conn, "SELECT * FROM hanghoa LIMIT $start,$limit");
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
                        <a href="addcart.php" data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><img src="img/core-img/cart.png" alt=""></a>
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
                        <?php echo '<a class="page-link" tabindex="-1" href="shop.php?page=' . ($current_page - 1) . '">Trang trước</a>' ?>
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
                        echo '<li class="page-item"><a class="page-link" href="shop.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                // nếu current_page < $total_page và total_page > 1 mới hiển thị

                if ($current_page < $total_page && $total_page > 1) {
                ?>
                    <li class="page-item ">
                        <?php echo '<a class="page-link" href="shop.php?page=' . ($current_page + 1) . '">Trang tiếp theo</a>' ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</body>

</html>