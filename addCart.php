<?php
// for ($i = 0; $i < count((array)$_SESSION['cart']); $i ++) {
//    if($_SESSION['cart'][$i][0] == $_REQUEST['IDproduct']){
//         echo"<script>alert('Sản phẩm đã có trong giỏ hàng');</script>";
//         $a = array($_SESSION['cart'][$i][0],$_SESSION['cart'][$i][1] + 1);
//         array_splice($_SESSION['cart'],$i,1);
//         array_push($_SESSION['cart'],$a);

//    }
// }
if (isset($_REQUEST['addCart']) && isset($_REQUEST['IDproduct'])) {
    if (checkExists($_REQUEST['IDproduct'])) {
        echo "<script>alert('Sản phẩm đã có trong giỏ hàng');</script>";
    } else {
        if (!isset($_REQUEST['soluong']) || $_REQUEST['soluong'] == 1) {
            $newProduct = array($_REQUEST['IDproduct'], 1);
            array_push($_SESSION['cart'], $newProduct);
            echo "<script>alert('Thêm vào giỏ hàng thành công !');</script>";
        } else {
            $newProduct = array($_REQUEST['IDproduct'], $_REQUEST['soluong']);
            array_push($_SESSION['cart'], $newProduct);
            echo "<script>alert('Thêm vào giỏ hàng thành công !');</script>";
        }
    }
}

if (isset($_REQUEST['delCart']) && isset($_REQUEST['IDproduct'])) {
    for ($i = 0; $i < count((array)$_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $_REQUEST['IDproduct']) {
            array_splice($_SESSION['cart'], $i, 1);
            echo "<script>alert('Xóa khỏi giỏ hàng thành công !');</script>";
        }
    }
}

if (isset($_REQUEST['updateCart']) && isset($_REQUEST['IDproduct']) && isset($_REQUEST['quantity1'])) {
    for ($i = 0; $i < count((array)$_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $_REQUEST['IDproduct']) {
            $a = array($_SESSION['cart'][$i][0],$_REQUEST['quantity1']);
            array_splice($_SESSION['cart'],$i,1);
            array_push($_SESSION['cart'],$a);
        }
    }
}
function checkExists($checkProduct)
{
    for ($i = 0; $i < count((array)$_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $checkProduct) {
            return true;
        }
    }
    return false;
}
