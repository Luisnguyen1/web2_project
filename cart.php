<?php
$total = 0;
include('setupDB.php');
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
<?php include('addCart.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <!-- Special css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart</title>


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

        body {
            margin-top: 100px;
        }

        .cart-item-thumb {
            display: block;
            width: 10rem
        }

        .cart-item-thumb>img {
            display: block;
            width: 100%
        }

        .product-card-title>a {
            color: #222;
        }

        .font-weight-semibold {
            font-weight: 600 !important;
        }

        .product-card-title {
            display: block;
            margin-bottom: .75rem;
            padding-bottom: .875rem;
            border-bottom: 1px dashed #e2e2e2;
            font-size: 1rem;
            font-weight: normal;
        }

        .text-muted {
            color: #888 !important;
        }

        .bg-secondary {
            background-color: #f7f7f7 !important;
        }

        .accordion .accordion-heading {
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: bold;
        }

        .font-weight-semibold {
            font-weight: 600 !important;
        }
    </style>
    <?php include('setupDB.php'); ?>
    <?php include('header.php'); ?>

    <div class="center-text" style="text-align: center;">
        <h5 style="color: var(--main-color);    font-size: 16px;    font-weight: 600;    letter-spacing: 1px;    margin-bottom: 20px; margin-top: 20px;">VM School</h5>
        <h2 style="font-size: var(--h2-font);    line-height: 1.2;">Giỏ hàng của bạn</h2>
    </div>

    <div class="container pb-5 mt-n2 mt-md-n3">
        <div class="row">
            <div class="col-xl-9 col-md-8">
                <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary"><span>Products</span><a class="font-size-sm" href="http://localhost/web2-project/product-page.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" style="width: 1rem; height: 1rem;">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>Continue shopping</a></h2>
                <!-- Item-->
                <?php
                $name = "";

                $sql = "SELECT MaKhoaHoc, TenKhoaHoc, NoiDung, PicLink, price FROM khoahoc";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        for ($i = 0; $i < count((array)$_SESSION['cart']); $i++) {
                            if ($_SESSION['cart'][$i][0] == $row['MaKhoaHoc']) { ?>
                                <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                                    <div class="media d-block d-sm-flex text-center text-sm-left">
                                        <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="<?php echo $row['PicLink']; ?>" alt="Product"></a>
                                        <div class="media-body pt-3">
                                            <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="http://localhost/web2-project/product-page.php?productID=<?php echo $row['MaKhoaHoc']; ?>"><?php echo $row['TenKhoaHoc']; ?></a></h3>
                                            <div class="font-size-lg text-primary pt-2"><?php $total = ((int)$row['price'] * $_SESSION['cart'][$i][1]) + $total;
                                                                                        echo number_format((int)$row['price'] * $_SESSION['cart'][$i][1]); ?> VND</div>
                                        </div>
                                    </div>
                                    <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                                        <form method="get" action="" class="form" enctype="multipart/form-data">
                                            <input type="hidden" name="IDproduct" value="<?php echo $row["MaKhoaHoc"]; ?>" />
                                            <div class="form-group mb-2">
                                                <label for="quantity1">Số lượng</label>
                                                <input class="form-control form-control-sm" type="number" name="quantity1" id="quantity1" value="<?php echo $_SESSION['cart'][$i][1] ?>">
                                            </div>
                                            <button name="updateCart" class="btn btn-outline-secondary btn-sm btn-block mb-2" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                                                    <polyline points="23 4 23 10 17 10"></polyline>
                                                    <polyline points="1 20 1 14 7 14"></polyline>
                                                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                                                </svg>Update cart</button>

                                        </form>
                                        <a class="btn btn-outline-danger btn-sm btn-block mb-2" href="http://localhost/web2-project/cart.php?delCart=True&IDproduct=<?php echo $row['MaKhoaHoc']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>Remove</a>
                                    </div>
                                </div>

                <?php
                            }
                        }
                    }
                }
                ?>
                <!-- Item-->

            </div>
            <!-- Sidebar-->
            <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
                <h2 class="h6 px-4 py-3 bg-secondary text-center">Subtotal</h2>
                <div class="h3 font-weight-semibold text-center py-3"><?php echo number_format($total); ?> VND</div>
                <hr>
                <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Note</span>Additional comments</h3>
                <textarea class="form-control mb-3" id="order-comments" rows="5"></textarea>
                <a class="btn btn-primary btn-block" href="addhoadon.php?xuathoadon=True">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>Tiến hành thanh toán</a>
                <div class="pt-4">
                    <div class="accordion" id="cart-accordion">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="accordion-heading font-weight-semibold"><a href="#promocode" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="promocode">Apply promo code<span class="accordion-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up">
                                                <polyline points="18 15 12 9 6 15"></polyline>
                                            </svg></span></a></h3>
                            </div>
                            <div class="collapse show" id="promocode" data-parent="#cart-accordion">
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="cart-promocode" placeholder="Promo code" required="">
                                            <div class="invalid-feedback">Please provide a valid promo code!</div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script src="js/script.js"></script>
</body>

</html>