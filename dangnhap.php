<?php
    include "admin/config/config.php";
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_dangky WHERE tenkhachhang='".$taikhoan."' AND matkhau='".$matkhau."' LIMIT 1";
        $result = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($result);
        if($count>0){
            $row = mysqli_fetch_assoc($result);
            echo '<p style="color:green">Bạn đã đăng nhập thành công !</p>';
            $_SESSION['dangnhap'] = $row['role'];
            header("Location:index.php");
        }else{
            echo '<p style="color:red">Tên người dùng hoặc mật khẩu không đúng !</p>';
            header("Location:dangnhap.php");
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style type="text/css">
        body{
            background:#f2f2f2;
        }
        .wrapper-login {
            width: 15%;
            margin: 0 auto;
        }
        table.table-login {
            width:100%
        }
        table.table-login tr td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="wrapper-login">
        <form action="dangnhap.php" autocomplete="off" method="POST">
           <table border="1" class="table-login" style="text-align: center;">
                <tr>
                    <td colspan="2"><h3>Đăng nhập</h3></td>
                </tr>
                <tr>
                    <td>Tên khách hàng</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                <td colspan="1"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
                <td><li><a style="font-weight: bold;" href="dangky.php">Đăng ký</a></li></td>
                
                </tr>
            </table>
        </form>
        
    </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
