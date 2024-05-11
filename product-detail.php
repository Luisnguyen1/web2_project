<?php
include_once('setupDB.php');
if (!isset($_REQUEST['productID'])) {
    echo "<script>alert('Mã khóa học không tồn tại !');</script>";
    header("Location: http://localhost/web2-project/admin/404.html");
    die();
} else {
    $sql = "SELECT * FROM `khoahoc` WHERE MaKhoaHoc = '" . $_REQUEST['productID'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo "<script>alert('Mã khóa học không tồn tại !');</script>";
        header("Location: http://localhost/web2-project/admin/404.html");
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <!-- Special css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <title>Document</title>


    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <style>
        header.sticky {
            background: var(--bg-color);
            padding: 12px 13%;
            box-shadow: 0px 4px 15px rgb(0 0 0 /8%);
        }

        * {
            box-sizing: border-box;
        }

        .add-inputs,
        .add-inputs input {
            float: left;
            margin-right: 10px;
            margin-bottom: 2px;
        }

        .add-inputs button {
            border-radius: 0;
        }

        .add-inputs input {
            height: 48px;
            width: 65px;
            border-radius: 0;
        }


        .par-title {
            font-size: 1.1rem;
            font-weight: bold;
        }
    </style>
    <?php include('setupDB.php'); ?>
    <?php include('header.php'); ?>
    <div class="home-img">
        <img src="img/topbanner.png">
    </div>
    <?php 
        $sql = "SELECT MaKhoaHoc, TenKhoaHoc, NoiDung, PicLink, price FROM khoahoc WHERE MaKhoaHoc = '" . $_REQUEST['productID'] . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

    ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid details-img" src="<?php echo $row['PicLink']?>" alt="">
            </div>
            <div class="col-md-6">
                <h2><?php echo $row['TenKhoaHoc']?></h2>
                <h3><?php echo number_format((int)$row['price']);?> VND</h3>


                <form class="add-inputs" method="post">
                    <input type="number" class="form-control" id="cart_quantity" name="cart_quantity" value="1" min="1" max="10">
                    <button name="add_to_cart" type="submit" class="btn btn-primary btn-lg">Add to cart</button>
                </form>
                <div style="clear:both"></div>
                <p class="par-title mt-4 mb-1">About this product</p>
                <p class="dummy-description mb-4">
                    <?php echo $row['NoiDung']?>    
                </p>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Container -->

    <?php include('container-section.php'); ?>
    <?php include('footer.php'); ?>
    <script src="js/script.js"></script>
</body>

</html>