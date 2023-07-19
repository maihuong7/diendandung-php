<?php session_start(); ?>
<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<link rel="icon" href="img/core-img/favicon.ico">

	<!-- Core Style CSS -->
	<link rel="stylesheet" href="css/core-style.css">
	<link rel="stylesheet" href="style.css">

    <title>Đơn mua của khách hàng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale=1.0>
    <link rel="stylesheet" type="text/css" href="stylecart.css">
    <style>
        h4{
            color: #4CAF50;
        }
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 1px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    margin: 4px 2px;
    cursor: pointer;
}
.p3 {
  font-family:  "Courier New", monospace;
}
a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}
</style>
</head>

<body>

    <?php
    $conn = mysqli_connect("localhost", "root",  "", "diengiadung");
    mysqli_set_charset($conn, 'UTF8');
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    $error = false;//
    $success =  false;
    if (isset($_GET['action'])) {
        function update_cart($add = false)//truyền biến add vào
        {
            foreach ($_POST['quanlity'] as $id => $quanlity) {
                if ($quanlity == 0) {//
                    unset($_SESSION["cart"][$id]);//
                }
                else{
                    if ($add) {//
                        $_SESSION["cart"][$id] =  $_SESSION["cart"][$id] + $quanlity;
                    } else {//giữ nguyên
                        $_SESSION["cart"][$id] = $quanlity;
                    }
                }
            }
        }
        switch ($_GET['action']) {
            case "add":
                update_cart(true);
                header('location: ./cart1.php');
                break;
            case "delete":
                if (isset($_GET['id'])) {//nếu tồn tại id này sẽ xóa
                    unset($_SESSION["cart"][$_GET['id']]);
                }
                header('location: ./cart1.php');
                break;
            case "submit":
                if (isset($_POST['update_click'])) { //Cập nhật sl sản phẩm
                    update_cart();
                    header('location: ./cart1.php');
                } elseif ($_POST['order_click']) {  //Đặt hàng sản phẩm
                    if (empty($_POST['name'])) {
                        $error = "Bạn chưa nhập tên của người nhận!";
                    } elseif (empty($_POST['sdt'])) {
                        $error = "Bạn chưa nhập số điện thoại!";
                    } elseif (empty($_POST['diachigiaohang'])) {
                        $error = "Bạn chưa nhập địa chỉ giao hàng!";
                    } elseif (empty($_POST['quanlity'])) {
                        $error = "Giỏ hàng rỗng";
                    }
                    if ($error == false && !empty($_POST['quanlity'])) {  //Xử lí giỏ hàng lưu vào csdl(nếu k có lỗi và có sl ms xử lí)
                        // SELECT * FROM `hanghoa` WHERE `id` IN (3,31)
                        $ketqua = mysqli_query($conn, "SELECT * FROM `hanghoa` WHERE `id` IN (" . implode(",", array_keys($_POST['quanlity'])) . ")");
                        $total = 0;
                        $orderProducts = array();
                        while ($row = mysqli_fetch_array($ketqua)) {
                            $orderProducts[] = $row;
                            $total += $row['giaban'] *  $_POST['quanlity'][$row['id']];
                        }
                        // INSERT INTO `hoadon` (`id`, `name`, `sdt`, `diachigiaohang`, `note`, `trangthai`, `tongtien`, `created_time`, `last_updated`) VALUES (NULL, 'Mai', '087635776', 'hà nội', '', '', '5456', '45376', '3536556');
                        $insertOrder = mysqli_query($conn, "INSERT INTO `hoadon` (`id`, `name`, `sdt`, `diachigiaohang`, `note`, `tongtien`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['sdt'] . "', '" . $_POST['diachigiaohang'] . "', '" . $_POST['note'] . "',  '" . $total . "', '" . time() . "', '" . time() . "')");
                        $orderID = $conn->insert_id;
                        $insertString = "";
                        foreach ($orderProducts  as $key => $ketqua) {
                            $insertString  .= "(NULL, '" . $orderID . "', '" . $ketqua['id'] . "', '" . $_POST['quanlity'][$ketqua['id']] . "', '" . $ketqua['giaban'] . "', '" . time() . "', '" . time() . "')";
                            if ($key != count($orderProducts) - 1) {
                                $insertString  .= ",";
                            }
                        }
                        $insertOrder = mysqli_query($conn, "INSERT INTO `chitiethoadon` (`id`, `idhoadon`, `idsp`, `soluong`, `dongia`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
                        $success = "Đặt hàng thành công";
                        unset($_SESSION['cart']);
                    }
                }
                break;
        }
    }
    if (!empty($_SESSION["cart"])) {
        $ketqua = mysqli_query($conn, "SELECT * FROM `hanghoa` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    }
    ?>
    <div class="container">
        <?php if (!empty($error)) { ?>
            <div id="notify-msg">
                <?= $error ?><br>
                <a href="cart1.php">Quay lại</a>
                <!-- javascript:history.back() -->
            </div>
        <?php } else if (!empty($success)) { ?>
            <div id="notify-msg">
                <?= $success ?><br>
                <a href="shop.php">Tiếp tục mua hàng</a>
            </div>
        <?php } else { ?>
            <p class="p3" ><center><b><h4>ĐƠN MUA CỦA KHÁCH HÀNG</h4></b></center></p>
            <form class="p3" id="cart-form" action="cart1.php?action=submit" method="post">
                <table>
                    <tr>
                        <th class="product-number">STT</th>
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-img">Ảnh sản phẩm</th>
                        <th class="product-price">Đơn giá</th>
                        <th class="product-quanlity">Số lượng</th>
                        <th class="total-money">Thành tiền</th>
                        <th class="product-delete">Xóa</th>
                    </tr>
                    <?php
                    if (!empty($ketqua)) {
                        $total = 0;
                        $num = 1;
                        while ($row = mysqli_fetch_array($ketqua)) { ?>
                            <tr>
                                <th class="product-number"><?= $num++; ?></th>
                                <th class="product-name"><?= $row['tenhang'] ?></th>
                                <th class="product-img"><img src="images/<?php echo $row['img'] ?>" alt=""></th>
                                <th class="product-price"><?= number_format($row['giaban'], 0, ",", ".") ?></th>
                                <th class="product-quanlity"><input type="text" value="<?= $_SESSION["cart"][$row['id']] ?>" name="quanlity[<?= $row['id'] ?>]"></th>
                                <th class="total-money"><?= number_format($row['giaban'] *  $_SESSION["cart"][$row['id']], 0, ",", ".") ?></th>
                                <th class="product-delete"><a href="cart1.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></th>
                            </tr>
                        <?php
                            $total += $row['giaban'] *  $_SESSION["cart"][$row['id']];
                            $num++;
                        }
                        ?>

                        <tr id="row-total">
                            <td class="product-number">&nbsp;</td>
                            <td class="product-name">Tổng tiền</td>
                            <td class="product-img">&nbsp;</td>
                            <td class="product-price">&nbsp;</td>
                            <td class="product-quanlity">&nbsp;</td>
                            <td class="total-money"><?= number_format($total, 0, ",", ".") ?></td>
                            <td class="product-delete"><a href="delcart.php?productid=$row[id]">Xóa</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div id="form-button">
                    <!-- <input type="submit" name="update_click" value="Cập nhật" /> -->
                    <input type="submit" class="button" name="update_click" value="Cập nhật">
                </div>
                <hr><h6>
                <div><label id="1">Người nhận:</label><input type="text" value="" name="name" /> </div>
                <div><label id="1">Điện thoại:</label><input type="text" value="" name="sdt" /> </div>
                <div><label id="1">Địa chỉ:</label><input type="text" value="" name="diachigiaohang" /> </div>
                <div><label id="1">Ghi chú:</label><textarea name="note" cols="50" rows="7"></textarea> </div></h6>
                <!-- <input type="submit" name="order_click" value="Đặt hàng" /> -->
                <input type="submit" class="button" name="order_click" value="Lưu">
            </form>
        <?php } ?>

    </div>
    <?php include"footer.php"?>

</body>

</html>