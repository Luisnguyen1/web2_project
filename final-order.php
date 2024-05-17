<?php include('setupDB.php'); ?>
<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: http://localhost/web2-project/admin/login.php");
    die();
}
if (!isset($_REQUEST['mahd'])) {
    header("Location: http://localhost/web2-project/");
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

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hóa đơn</title>

<!-- Special css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Document</title>


<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<style>
    body {
        margin-top: 20px;
        background: #eee;
    }

    .invoice {
        padding: 30px;
    }

    .invoice h2 {
        margin-top: 0px;
        line-height: 0.8em;
    }

    .invoice .small {
        font-weight: 300;
    }

    .invoice hr {
        margin-top: 10px;
        border-color: #ddd;
    }

    .invoice .table tr.line {
        border-bottom: 1px solid #ccc;
    }

    .invoice .table td {
        border: none;
    }

    .invoice .identity {
        margin-top: 10px;
        font-size: 1.1em;
        font-weight: 300;
    }

    .invoice .identity strong {
        font-weight: 600;
    }


    .grid {
        position: relative;
        width: 100%;
        background: #fff;
        color: #666666;
        border-radius: 2px;
        margin-bottom: 25px;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container">
    <div class="row">
        <!-- BEGIN INVOICE -->
        <?php
        $name = "";

        $sql = "SELECT * FROM hoadon WHERE mahoadon='" . $_REQUEST['mahd'] . "'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $sql4 = "SELECT * FROM khachhang WHERE makhachang='" . $row['makhachang'] . "'";
        $result4 = $conn->query($sql4);
        $khachhang = $result4->fetch_assoc()

        ?>
        <div class="col-xs-12">
            <div class="grid invoice">
                <div class="grid-body">
                    <div class="invoice-title">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="img\CIP-VMSchool\png\logo-no-background.png" alt="" height="35">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2>invoice<br>
                                    <span class="small">order #<?php echo $row['mahoadon'] ?></span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                <?php echo $khachhang['tenkhachhang'] . " " . $khachhang['hokhachhang'] ?><br>
                                <?php echo $khachhang['email'] ?><br>
                            </address>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Visa ending **** 1234<br>
                                <?php echo $khachhang['email'] ?><br>
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                <?php echo $row['ngayxuat'] ?><br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>ORDER SUMMARY</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="line">
                                        <td><strong>#</strong></td>
                                        <td class="text-center"><strong>PROJECT</strong></td>
                                        <td class="text-center"><strong>Số lượng</strong></td>
                                        <td class="text-right"><strong>Giá tiền</strong></td>
                                        <td class="text-right"><strong>Tạm tính</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tongtien = 0;
                                    $tt = 1;
                                    $sql2 = "SELECT * FROM chitiethoadon WHERE mahoadon = '" . $row["mahoadon"] . "'";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            $sql3 = "SELECT * FROM khoahoc WHERE MaKhoaHoc = '" . $row2["makhoahoc"] . "'";
                                            $result3 = $conn->query($sql3);
                                            $row3 = $result3->fetch_assoc();
                                            $tamtinh = ((int)$row3['price'] * (int)$row2["soluong"]);
                                            $tongtien = ((int)$row3['price'] * (int)$row2["soluong"]) + $tongtien;
                                    ?>
                                            <tr>
                                                <td><?php echo $tt;?></td>
                                                <td><strong><?php echo $row3['TenKhoaHoc'];?></strong><br><?php echo $row3['Noidung'];?></td>
                                                <td class="text-center"><?php echo $row2['soluong'];?></td>
                                                <td class="text-center"><?php echo number_format($row3['price']);?> VND</td>
                                                <td class="text-right"><?php echo number_format($tamtinh);?> VND</td>
                                            </tr>


                                    <?php
                                        $tt++;}
                                    }
                                 ?>
                                    
          

                                    
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="text-right"><strong>Thuế</strong></td>
                                        <td class="text-right"><strong>N/A</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                        </td>
                                        <td class="text-right"><strong>Tổng tiền</strong></td>
                                        <td class="text-right"><strong><?php echo number_format($tongtien);?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right identity">
                            <p>CEO VM School<br><strong>Nguyễn Văn Mạnh</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END INVOICE -->
    </div>
</div>