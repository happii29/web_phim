<?php
    include "header.php";
?>
<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:/THỰC TẬP CƠ SỞ/dangnhap.php');
    }
    if(isset($_GET['action'])=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('Location:/THỰC TẬP CƠ SỞ/dangnhap.php');
    }

?>
<section class="admin-content">
        <div class="admin-ct-left">
            <ul>
                <li><a href="">Danh mục</a>
                    <ul>
                        <li><a href="categoryadd.php">Thêm danh mục</a></li>
                        <li><a href="categorylist.php">Danh sách Danh mục</a></li>
                    </ul>
                </li>
                    
                <li><a href="">Thể loại</a>
                    <ul>
                        <li><a href="brandadd.php">Thêm thể loại</a></li>
                        <li><a href="brandlist.php">Danh sách thể loại</a></li>
                    </ul>
                </li>
                <li><a href="">Phim</a>
                    <ul>
                        <li><a href="productadd.php">Thêm phim</a></li>
                        <li><a href="productlist.php">Danh sách phim</a></li>
                    </ul>
                </li>
                <li><a href="slider.php?action=dangxuat" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['dangnhap'];
                } ?></a></li>
            </ul>
        </div>