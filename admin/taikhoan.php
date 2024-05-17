<?php include('setupDB.php'); ?>
<?php
if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['inputEmail'];
    $sql = "SELECT * FROM khachhang WHERE email = '" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Email đã tồn tại');</script>";
    } else {
        if ($_REQUEST['inputType'] == 'nhanvien') {
            if ($_REQUEST['inputPasswordConfirm'] != $_REQUEST['inputPassword']) {
                echo "<script>alert('Password chưa đồng nhất');</script>";
            } else {
                $sql = "SELECT count(*) as total FROM taikhoan";
                $result = $conn->query($sql);
                $row =  $result->fetch_assoc();
                $id = $row['total'] + 1;

                $email = $_REQUEST['inputEmail'];
                $password = $_REQUEST['inputPassword'];
                $tennv = $_REQUEST['inputFirstName'];
                $honv = $_REQUEST['inputLastName'];


                $sql = "INSERT INTO taikhoan (mataikhoan, email, matkhau) VALUES ('$id', '$email', '$password')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Thêm tài khoản thành công!');</script>";
                } else {
                    echo "<script>alert('Thêm tài khoản xảy ra lỗi!');</script>";
                }


                $sql = "SELECT count(*) as total FROM nhanvien";
                $result = $conn->query($sql);
                $row =  $result->fetch_assoc();
                $idNV = $row['total'] + 1;
                $sql = "INSERT INTO nhanvien (manhanvien, tennhanvien, honhanvien, email, mataikhoan) VALUES ('$idNV', '$tennv', '$honv', '$email', '$id')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: http://localhost/web2-project/admin/login.php");
                    die();
                } else {
                    echo "<script>alert('Thêm tài khoản xảy ra lỗi!');</script>";
                }
            }
        } else if ($_REQUEST['inputType'] == 'khachhang') {
            if ($_REQUEST['inputPasswordConfirm'] != $_REQUEST['inputPassword']) {
                echo "<script>alert('Password chưa đồng nhất');</script>";
            } else {
                $sql = "SELECT count(*) as total FROM taikhoan";
                $result = $conn->query($sql);
                $row =  $result->fetch_assoc();
                $id = $row['total'] + 1;

                $email = $_REQUEST['inputEmail'];
                $password = $_REQUEST['inputPassword'];
                $tennv = $_REQUEST['inputFirstName'];
                $honv = $_REQUEST['inputLastName'];


                $sql = "INSERT INTO taikhoan (mataikhoan, email, matkhau) VALUES ('$id', '$email', '$password')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Thêm tài khoản thành công!');</script>";
                } else {
                    echo "<script>alert('Thêm tài khoản xảy ra lỗi!');</script>";
                }


                $sql = "SELECT count(*) as total FROM khachhang";
                $result = $conn->query($sql);
                $row =  $result->fetch_assoc();
                $idNV = $row['total'] + 1;
                $sql = "INSERT INTO khachhang (makhachang, tenkhachhang, hokhachhang, email, mataikhoan) VALUES ('$idNV', '$tennv', '$honv', '$email', '$id')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: http://localhost/web2-project/admin/login.php");
                    die();
                } else {
                    echo "<script>alert('Thêm tài khoản xảy ra lỗi!');</script>";
                }
            }
        }
    }
}

?>