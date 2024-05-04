<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>

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
</head>

<body>
    <style>
        header.sticky {
            background: var(--bg-color);
            padding: 12px 13%;
            box-shadow: 0px 4px 15px rgb(0 0 0 /8%);
        }

        .product-list .product-item {
            margin-bottom: 20px
        }

        .product-list .product-item .image {
            float: left;
            padding-right: 30px;
            margin-bottom: 20px
        }

        .product-list .product-item .image img {
            max-width: 263px
        }

        .product-list .product-item .name a {
            text-transform: uppercase
        }

        .product-list .product-item .description {
            margin: 10px 0 20px
        }

        .product-list .product-item .description p {
            line-height: 21px
        }

        .product-list .product-item .rating {
            padding: 0 0 11px
        }

        .product-list .product-item .price {
            margin-bottom: 10px
        }

        .product-list .product-item .clickable a,
        .product-list .product-item .sale-tag {
            display: none
        }

        .product-list .product-item .btn-primary {
            margin: 0 0 20px
        }

        .product-sidebar {
            width: 100%;
            overflow: auto
        }

        .product-sidebar .product-item {
            position: relative;
            display: block;
            width: 100%;
            margin: 0 0 10px;
            padding: 10px;
            background: #fff;
            border-radius: 3px;
            box-shadow: 0 1px 2px 0 #ccd1d9;
            float: left
        }

        .product-sidebar .product-item .image {
            display: block;
            width: 90px;
            height: 90px;
            float: left;
            margin: 0 10px 0 0;
            padding-bottom: 0
        }

        .product-sidebar .product-item .image img,
        .thumbnails img {
            width: 100%
        }

        .product-sidebar .product-item .name {
            display: block;
            margin: 9px 0 2px;
            line-height: 1pc;
            float: none
        }

        .product-sidebar .product-item .price {
            display: block;
            color: #aab2bd;
            font-weight: 700;
            float: none
        }

        .showcase {
            margin-bottom: 30px;
            -webkit-transition: opacity 1s ease-in-out;
            -o-transition: opacity 1s ease-in-out;
            transition: opacity 1s ease-in-out
        }

        .showcase:hover {
            zoom: 1;
            filter: alpha(opacity=75);
            opacity: .75
        }

        .fa-stack {
            font-size: 6px;
        }

        .fa-star,
        .fa-star-o {
            color: #ffce54;
            font-size: 14px;
        }

        .product-item a {
            display: block;
            color: #434a54;
            font-weight: 700;
        }

        .product-list .product-item .description p {
            line-height: 21px;
        }

        .filter .panel-heading {
            font-weight: 700;
            background: #fff;
            border-color: #e4e7ec;
        }

        .filter .panel-footer,
        .filter .panel-heading {
            font-weight: 700;
            background: #fff;
            border-color: #e4e7ec;
        }

        .list-group a.list-group-item.active,
        .list-group a.list-group-item.active:hover {
            color: #434a54;
            background-color: #f5f7fa;
            border-color: #f5f7fa;
            border-top: 1px solid #d6dadf;
            border-bottom: 1px solid #d6dadf;
        }

        .product-list .image img {
            width: 250px;
            height: 250px
        }
    </style>
    <?php include('setupDB.php'); ?>
    <?php include('header.php'); ?>
    <?php include('product-list.php'); ?>
    <?php include('footer.php'); ?>
    <script src="js/script.js"></script>
    <script src="js/simple-bootstrap-paginator.js"></script>

</body>

</html>