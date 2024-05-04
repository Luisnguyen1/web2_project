<?php include_once('setupDB.php'); ?>
<?php


function imgur()
{
    $IMGUR_CLIENT_ID = "425b7b6052e33c1";


    $statusMsg = $valErr = '';
    $status = 'danger';
    $imgurData = array();

    // If the form is submitted 
    if (isset($_POST['submit'])) {

        // Validate form input fields 
        if (empty($_FILES["image"]["name"])) {
            $valErr .= 'Please select a file to upload.<br/>';
        }

        // Check whether user inputs are empty 
        if (empty($valErr)) {
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                // Source image 
                $image_source = file_get_contents($_FILES['image']['tmp_name']);

                // API post parameters 
                $postFields = array('image' => base64_encode($image_source));

                if (!empty($_POST['title'])) {
                    $postFields['title'] = $_POST['title'];
                }

                if (!empty($_POST['description'])) {
                    $postFields['description'] = $_POST['description'];
                }

                // Post image to Imgur via API 
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image');
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
                $response = curl_exec($ch);
                curl_close($ch);

                // Decode API response to array 
                $responseArr = json_decode($response);

                // Check image upload status 
                if (!empty($responseArr->data->link)) {
                    $imgurData = $responseArr;
                    $status = 'success';
                    $statusMsg = 'The image has been uploaded to Imgur successfully.';
                } else {
                    $statusMsg = 'Image upload failed, please try again after some time.';
                }
            } else {
                $statusMsg = 'Sorry, only an image file is allowed to upload.';
            }
        } else {
            $statusMsg = '<p>Please fill all the mandatory fields:</p>' . trim($valErr, '<br/>');
        }
        return $imgurData;
    }
}

function addCourse()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vm-school";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $imgurData = imgur();
    $id = $_REQUEST["title"];
    $name = $_REQUEST["namecourse"];
    $description = $_REQUEST["description"];
    $giatien = $_REQUEST["Price"];
    $imgur = $imgurData->data->link;

    $sql = "INSERT INTO khoahoc (MaKhoaHoc, TenKhoaHoc, NoiDung, PicLink, price)
    VALUES ('$id', '$name', '$description', '$imgur', '$giatien')";
    if ($conn->query($sql) === TRUE) {
        echo "<scrpit>alert('Thêm khóa học thành công!'');</script>";
      } else {
        echo "<scrpit>alert('Thêm khóa học xảy ra lỗi!');</script>";
    }
}
if (isset($_REQUEST['submit'])) {
    // thêm 
    if ($_REQUEST['submit'] == "Add") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vm-school";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM `khoahoc` WHERE MaKhoaHoc = '".$_REQUEST['title']."'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            echo "<script>alert('Mã khóa học đã tồn tại !');</script>";
        } else {
            addCourse();
        }
    }
    // sửa
    if ($_REQUEST['submit'] == "Save") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vm-school";

        $sql = "SELECT MaKhoaHoc, TenKhoaHoc, NoiDung, PicLink, price FROM khoahoc WHERE MaKhoaHoc = '".$_REQUEST['EditID']."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $name = "";
        $content = "";
        $giatien = 0;
        $img = $_REQUEST["image"];

        if(empty($_REQUEST["EditName"])){
            $name = $row['TenKhoaHoc'];
        }
        if(!empty($_REQUEST["EditName"])){
            $name = $_REQUEST["EditName"];
        }

        if(empty($_REQUEST["EditPrice"])){
            $giatien = $row['price'];
        }
        if(!empty($_REQUEST["EditPrice"])){
            $giatien = (int)$_REQUEST["EditPrice"];
        }


        if(empty($_REQUEST["EditContent"])){
            $content = $row['NoiDung'];
        }
        if(!empty($_REQUEST["EditContent"])){
            $content = $_REQUEST["EditContent"];
        }

        if(empty($_FILES["image"]["name"])){
            $img = $row['PicLink'];
        }
        if(!empty($_FILES["image"]["name"])){
            $imgurData = imgur();
            $img = $imgurData->data->link;
        }

        $sql = "UPDATE khoahoc SET TenKhoaHoc = '".$name."', Noidung = '".$content."', PicLink = '".$img."', price = '".$giatien."' WHERE MaKhoaHoc = '".$_REQUEST['EditID']."'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Sửa khóa học thành công!');</script>";
          } else {
            echo "<script>alert('Sửa khóa học xảy ra lỗi!');</script>";
        }        
    }
    //xóa
    if ($_REQUEST['submit'] == "Delete") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vm-school";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "DELETE FROM khoahoc WHERE MaKhoaHoc = '".$_REQUEST['DeleteID']."'";
        if ($conn->query($sql) === false) {
            echo "<script>alert('Xóa khóa học xảy ra lỗi!');</script>";
        }
        else {
            echo "<script>alert('Xóa khóa học thành công!');</script>";
        }
        
    }

}

