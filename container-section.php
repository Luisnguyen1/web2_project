<html lang="en">

<body>
    <section class="container" id ="courses">
        <div class="center-text" style="text-align: center;">
            <h5 style="color: var(--main-color);    font-size: 16px;    font-weight: 600;    letter-spacing: 1px;    margin-bottom: 20px;">VM School</h5>
            <h2 style="font-size: var(--h2-font);    line-height: 1.2;">Các khóa học tiêu biểu</h2>
        </div>
        <div class="owl-carousel owl-theme">
        <?php 
            $sql = "SELECT MaKhoaHoc, TenKhoaHoc, NoiDung, PicLink FROM khoahoc";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
        ?>  
                <div class="item" >
                    <div class="container-box" style="padding-left: 20px">
                        <div class="card" style="width: 18rem;" >
                            <img class="card-img-top" src="<?php echo $row["PicLink"]?>" alt="Card image cap" >
                            <div class="card-body">
                                <h5 class="card-title" ><?php echo $row["TenKhoaHoc"]?></h5>
                                <p class="card-text"><?php echo $row["NoiDung"]?></p>
                                <a href="http://localhost/web2-project/product-detail.php?productID=<?php echo $row["MaKhoaHoc"]?>" class="btn btn-primary">Tìm hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                </div>       
        <?php
              }
            } else {
              echo "0 results";
            }        
        ?>     
        </div>
        <div class="main-btn">
            <a href="product-page.php" class="btn1">Toàn bộ các khóa học</a>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            indicators: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
</body>

</html>