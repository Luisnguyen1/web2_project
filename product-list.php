<html lang="en">

<body>
    <div class="home-img">
        <img src="img/topbanner.png">
    </div>
    <div class="center-text" style="text-align: center;">
        <h5 style="color: var(--main-color);    font-size: 16px;    font-weight: 600;    letter-spacing: 1px;    margin-bottom: 20px; margin-top: 20px;">VM School</h5>
        <h2 style="font-size: var(--h2-font);    line-height: 1.2;">Các khóa học của chúng tôi</h2>
    </div>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="container">
        <div class="row">
            <div class="col-sm-3 hidden-xs">
                <div class="list-group">
                    <a href="#" class="list-group-item">Robot</a>
                    <a href="#" class="list-group-item">Thiết kế 3D</a>
                    <a href="#" class="list-group-item">Lập trình Website</a>
                    <a href="#" class="list-group-item">Mạch điện</a>
                    <a href="#" class="list-group-item">Làm game</a>
                </div>

                <div class="product-sidebar">
                    <h5 class="text-center">Các khóa học bán chạy</h5>

                    <!-- Featured Product Item -->
                    <?php
                    $name = "";

                    $sql = "SELECT MaKhoaHoc, TenKhoaHoc, NoiDung, PicLink, price FROM khoahoc";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="product-item">
                                <div class="image">
                                    <a href="http://localhost/web2-project/product-detail.php?productID=<?php echo $row["MaKhoaHoc"]; ?>"><img src="<?php echo $row["PicLink"] ?>" alt="Product 2"></a>
                                </div>
                                <div class="name">
                                    <a href="http://localhost/web2-project/product-detail.php?productID=<?php echo $row["MaKhoaHoc"]; ?>"><?php echo $row["TenKhoaHoc"] ?></a>
                                </div>
                                <div class="price">
                                    <span class="price-new"><?php echo number_format((int)$row['price']);?> VND</span>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                    <!--/ Featured Product Item -->

                </div>
            </div>

            <div class="col-sm-9">

                <div class="row">

                    <!-- <div class="col-sm-4">
                        <div class="btn-group hidden-xs">
                            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" data-container="body" title="List View"><i class="fa fa-th-list"></i></button>
                            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" data-container="body" title="Grid View"><i class="fa fa-th"></i></button>
                        </div>                        
                    </div> -->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" id="searchID" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </form>


                    <div class="col-sm-2 text-right">
                        <label class="control-label" for="input-sort">Sort By:</label>
                    </div>

                    <div class="col-sm-3 text-right">
                        <select id="input-sort" class="form-control">
                            <option value="" selected="selected">Default</option>
                            <option value="">Name</option>
                            <option value="">Date</option>
                        </select>
                    </div>

                    <div class="col-sm-1 text-right">
                        <label class="control-label" for="input-limit">Show:</label>
                    </div>
                    <div class="col-sm-2 text-right">
                        <select id="input-limit" class="form-control">
                            <option value="" selected="selected">9</option>
                            <option value="">15</option>
                            <option value="">25</option>
                            <option value="">50</option>
                            <option value="">100</option>
                        </select>
                    </div>
                </div>
                <br>

                <div class="row">

                    <!-- Product Item -->
                    <?php
                    $name = "";

                    $sql = "SELECT MaKhoaHoc, TenKhoaHoc, NoiDung, PicLink, price FROM khoahoc";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="product-list col-xs-12">
                                <div class="product-item">
                                    <div class="item-overlay">
                                        <div class="clickable">
                                            <a href="http://localhost/web2-project/product-detail.php?productID=<?php echo $row["MaKhoaHoc"]; ?>"><?php echo $row["TenKhoaHoc"]; ?></a>
                                        </div>
                                    </div>
                                    <div class="sale-tag">
                                        <span>SALE</span>
                                    </div>
                                    <div class="image">
                                        <a href="http://localhost/web2-project/product-detail.php?productID=<?php echo $row["MaKhoaHoc"]; ?>"><img src="<?php echo $row["PicLink"] ?>" alt="Product 2"></a>
                                    </div>
                                    <div class="caption">
                                        <div class="name">
                                            <a href="http://localhost/web2-project/product-detail.php?productID=<?php echo $row["MaKhoaHoc"]; ?>"><?php echo $row["TenKhoaHoc"] ?></a>
                                        </div>
                                        <div class="description">
                                            <p><?php echo $row["NoiDung"] ?></p>
                                        </div>
                                        <div class="price">
                                            <span class="price-new"><?php echo number_format((int)$row['price']);?> VND</span>
                                        </div>
                                        <div class="cart">
                                            <button type="button" class="btn btn-primary">Add to Cart</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-default wishlist" data-toggle="tooltip" data-placement="right" title="Wishlist"><i class="fa fa-heart"></i></button>
                                    <button type="button" class="btn btn-default compare" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fa fa-circle-o"></i></button>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                    <!--/ Product Item -->
                    <div id="pagination" class="text-center"></div>
                    <script>
                        var pag = $('#pagination').simplePaginator({

                            // options here
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
</body>

</html>