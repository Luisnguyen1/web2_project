
<?php
include('setupDB.php');
session_start();
if (isset($_REQUEST['xuathoadon'])) {
    if ($_REQUEST['xuathoadon'] == "True") {
        if (count((array)$_SESSION['cart']) == 0) {
            echo "<script>alert('Không có sản phẩm trong giỏ hàng !');
            window.location.href='http://localhost/web2-project/';
            </script>";
        } else {
            $sql = "SELECT count(*) as total FROM hoadon";
            $result = $conn->query($sql);
            $row =  $result->fetch_assoc();
            $idhd = $row['total'] + 1;


            $sql = "SELECT * FROM khachhang WHERE email = '" . $_SESSION['id'] . "'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $mkh = $row['makhachang'];

            $sql = "INSERT INTO hoadon (mahoadon, ngayxuat, trangthai, makhachang) VALUES ('$idhd', now(), 'Pending', '$mkh')";
            $conn->query($sql);
            // if ($conn->query($sql) === TRUE) {
            //     echo "<script>alert('Mua hàng thành công, chờ kiểm duyệt !');
            //     window.location.href='http://localhost/web2-project/';
            //     </script>";
            //     $_SESSION['cart'] = array();
            // } else {
            //     echo "<scrpit>alert('Mua hàng xảy ra lỗi!');</script>";
            // }
            for ($i = 0; $i < count((array)$_SESSION['cart']); $i++) {
                // $_SESSION['cart'][$i]
                $sql = "SELECT count(*) as total FROM chitiethoadon";
                $result = $conn->query($sql);
                $row =  $result->fetch_assoc();
                $idcthd = $row['total'] + 1;

                $sql = "INSERT INTO chitiethoadon (machitiethoadon, mahoadon, makhoahoc, soluong) VALUES ('$idcthd', '$idhd', '". $_SESSION['cart'][$i][0]. "', '". $_SESSION['cart'][$i][1]. "')";
                $conn->query($sql);
            }
            $_SESSION['cart'] = array();
            echo "<script>alert('Mua hàng thành công, chờ kiểm duyệt !');
                window.location.href='http://localhost/web2-project/';
                </script>";
        }
    }
} else {
    header("Location: http://localhost/web2-project/");
    die();
}
