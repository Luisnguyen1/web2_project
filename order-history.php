<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: http://localhost/web2-project/admin/login.php");
    die();
}
if (isset($_REQUEST['submit'])) {
    if ($_REQUEST['submit'] == 'logout') {
        session_destroy();
        header("Location: http://localhost/web2-project/admin/login.php");
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lịch sử mua hàng</title>

<!-- Special css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Document</title>


<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/order.scss">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


<body>
    <style>
        header.sticky {
            background: var(--bg-color);
            padding: 12px 13%;
            box-shadow: 0px 4px 15px rgb(0 0 0 /8%);
        }

        body {
            margin-top: 100px;
            background: #f8f8f8
        }
    </style>
    <?php include('setupDB.php'); ?>
    <?php include('header.php'); ?>

    <div class="center-text" style="text-align: center;">
        <h5 style="color: var(--main-color);    font-size: 16px;    font-weight: 600;    letter-spacing: 1px;    margin-bottom: 20px; margin-top: 20px;">VM School</h5>
        <h2 style="font-size: var(--h2-font);    line-height: 1.2;">Lịch sử mua hàng</h2>
    </div>
    <?php
    $name = "";

    $sql = "SELECT * FROM khachhang WHERE email='" . $_SESSION['id'] . "'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['makhachang'];

    $sql = "SELECT * FROM hoadon WHERE makhachang='" . $name . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="container mt-3 mt-md-5">
                <div class="row">
                    <div class="col-12">
                        <div class="list-group mb-5">
                            <div class="list-group-item p-3 bg-snow" style="position: relative;">
                                <div class="row w-100 no-gutters">
                                    <div class="col-6 col-md">
                                        <h6 class="text-charcoal mb-0 w-100">Order Number</h6>
                                        <a href="" class="text-pebble mb-0 w-100 mb-2 mb-md-0">#<?php echo $row['mahoadon']; ?></a>
                                    </div>
                                    <div class="col-6 col-md">
                                        <h6 class="text-charcoal mb-0 w-100">Date</h6>
                                        <p class="text-pebble mb-0 w-100 mb-2 mb-md-0"><?php echo $row['ngayxuat']; ?></p>
                                    </div>
                                    <div class="col-6 col-md">
                                        <h6 class="text-charcoal mb-0 w-100">Total</h6>
                                        <p class="text-pebble mb-0 w-100 mb-2 mb-md-0"><?php
                                                                                        $tongtien = 0;
                                                                                        $sql2 = "SELECT * FROM chitiethoadon WHERE mahoadon = '" . $row["mahoadon"] . "'";
                                                                                        $result2 = $conn->query($sql2);
                                                                                        if ($result2->num_rows > 0) {
                                                                                            while ($row2 = $result2->fetch_assoc()) {
                                                                                                $sql3 = "SELECT * FROM khoahoc WHERE MaKhoaHoc = '" . $row2["makhoahoc"] . "'";
                                                                                                $result3 = $conn->query($sql3);
                                                                                                $row3 = $result3->fetch_assoc();
                                                                                                $tongtien = ((int)$row3['price'] * (int)$row2["soluong"]);
                                                                                            }
                                                                                        }
                                                                                        echo number_format($tongtien); ?>
                                            VND</p>
                                    </div>
                                    
                                    <div class="col-6 col-md">
                                        <h6 class="text-charcoal mb-0 w-100">Trạng thái</h6>
                                        <p class="text-pebble mb-0 w-100 mb-2 mb-md-0"><?php echo $row['trangthai']; ?></p>
                                    </div>
                                    <?php
                                    if ($row['trangthai'] == 'Accept') { ?>
                                        <div class="col-12 col-md-3">
                                            <a href="http://localhost/web2-project/final-order.php?mahd=<?php echo $row['mahoadon']?>" target="_blank" class="btn btn-primary w-100">Xuất hóa đơn</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>

                            </div>
                            <div class="list-group-item p-3 bg-white">
                                <div class="row no-gutters">
                                    <?php
                                    $sql2 = "SELECT * FROM chitiethoadon WHERE mahoadon = '" . $row["mahoadon"] . "'";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            $sql3 = "SELECT * FROM khoahoc WHERE MaKhoaHoc = '" . $row2["makhoahoc"] . "'";
                                            $result3 = $conn->query($sql3);
                                            $row3 = $result3->fetch_assoc(); ?>

                                            <div class="row no-gutters mt-3">
                                                <div class="col-3 col-md-1">
                                                    <img class="img-fluid pr-3" src="<?php echo $row3["PicLink"]; ?>" alt=" ">
                                                </div>
                                                <div class="col-9 col-md-8 pr-0 pr-md-3">
                                                    <h6 class="text-charcoal mb-2 mb-md-1">
                                                        <a href="" class="text-charcoal"><?php echo $row3["TenKhoaHoc"]; ?></a>
                                                    </h6>
                                                    <ul class="list-unstyled text-pebble mb-2 small">
                                                        <li class="">
                                                            <b>Mã chi tiết hóa đơn:</b> #CTHD<?php echo $row2["machitiethoadon"]; ?>
                                                        </li>
                                                        <li class="">
                                                            <b>Số lượng</b> <?php echo $row2["soluong"]; ?>
                                                        </li>

                                                    </ul>
                                                    <h6 class="text-charcoal text-left mb-0 mb-md-2"><b><?php $tongtien = ((int)$row3['price'] * (int)$row2["soluong"]);
                                                                                                        echo number_format($tongtien); ?></b></h6>
                                                </div>
                                                <div class="col-12 col-md-3 hidden-sm-down">
                                                    <a href="http://localhost/web2-project/product-detail.php?productID=<?php echo $row2["makhoahoc"] ?>" class="btn btn-secondary w-100 mb-2">Buy It Again</a>

                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>



                                </div>
                            </div>
                        </div>
                    </div>
            <?php
        }
    } ?>




            <?php include('footer.php'); ?>
            <script src="js/script.js"></script>
</body>

</html>