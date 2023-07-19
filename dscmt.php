<html>

<head>
    <title>Danh sách bình luận</title>
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        table {
            text-align: center;
            border-collapse: collapse;
            padding-top: 50px;
        }

        table,td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 60%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <?php include('menu.php'); ?>
    <table>
        <tr>
            <th colspan="7">
                <center>DANH SÁCH BÌNH LUẬN</center>
            </th>
        </tr>
        <tr>

            <th><b>ID sản phẩm</b></th>
            <th><b>ID khách hàng</b></th>
            <th><b>Nội dung</b></th>
            <th><b>Xóa</b></th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "diengiadung");
        $sql = "SELECT  * FROM binhluan";
        $ketqua = mysqli_query($conn, $sql);
        while ($dong = mysqli_fetch_assoc($ketqua)) {
            echo '<tr>';
            echo '<td>' . $dong['idsp'] . '</td>';
            echo '<td>' . $dong['idkh'] . '</td>';
            echo '<td>' . $dong['noidung'] . '</td>';
            echo '<td><a href="xoakh.php?id=' . $dong['id'] . '" style="color:red ;"><center><img src="https://www.flaticon.com/svg/static/icons/svg/1345/1345874.svg" width="20px"></center></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php include 'footer.php';?>
</body>

</html>