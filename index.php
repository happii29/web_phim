<?php
include "admin/config/config.php";
?>
<?php
    if(!isset($_SESSION['dangnhap'])){
        header('Location:dangnhap.php');
    }
    if(isset($_SESSION['dangnhap']) &&($_SESSION['dangnhap']=='admin')){
        header("Location:admin/slider.php");
    }
    if(isset($_GET['action'])=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('Location:dangnhap.php');
    }

?>



<?php
$sql_danhmuc = "SELECT * FROM tbl_category";
$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
$sql_phim = "SELECT * FROM tbl_product WHERE category_id='9' ";
$query_phim = mysqli_query($mysqli,$sql_phim);
$row_title_product = mysqli_fetch_array($query_phim);
?>
<?php
if(isset($_GET['theloai'])){
    $brand_id = $_GET['theloai'];
    $sql_theloai_1 = "SELECT * FROM tbl_brand WHERE brand_id='$brand_id' ";
    $query_theloai_1 = mysqli_query($mysqli,$sql_theloai_1);
    $row_title = mysqli_fetch_array($query_theloai_1);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Website</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./font/fontawesome-free-6.3.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="nav container">
            <!-- logo -->
            <a href="index.php" class="logo">Movie <span>Website</a>
             <!-- Tìm kiếm    -->
             <div class="search-box">
                <form action="search.php?timkiem" method="POST">
                    <input type="search" name="tukhoa" id="search-input" placeholder="Tìm kiếm phim">
                    <input type="submit" name="timkiem" value="Tìm kiếm">     
                </form>
            </div>      
             
             <a href="#" class="user"><img src="./img/top-phim-hay-nhat-moi-thoi-dai-e1624773261842-1920x1070.jpg" class="user-img"></a>
             <div class="others">
                <li><a href="dangnhap.php" class="fa-solid fa-user"></a></li>
                <li><a href="dangky.php" class="fa-solid fa-lock"></a></li>
                <li><a href="logout.php" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['dangnhap'];
                } ?></a></li>
                
            </div>
             
             <!-- NavBar -->
             <div class="navbar">
                <a href="index.php" class="nav-link"><i class='bx bx-home'></i><span class="nav-link-title">Trang chủ</span></a>
                <a href="category.php?danhmuc=12" class="nav-link"><i class='bx bx-video'></i><span class="nav-link-title">Phim bộ</span></a>
                <a href="category.php?danhmuc=9" class="nav-link"><i class='bx bx-movie-play'></i><span class="nav-link-title">Phim lẻ</span></a>
                <a href="category.php?danhmuc=14" class="nav-link"><i class='bx bx-tv'></i><span class="nav-link-title">Truyền hình</span></a>
                
                
             </div>
        </div>
    </header>
    <!-- Home -->
    <section class="home container" id="home">
        <img src="img/poster-chinh-thuc-cua-phim-mo-dom-dom.jpg" alt="" class="home-img">
            <div class="home-text">
                <h1 class="home-title">Mộ đom đóm</h1>
                <p>Tình cảm | Nhật Bản | 1988</p>
                <a href="product.php?phim=10" class="watch-btn"><i class="bx bx-play"></i><span>Xem Phim</span></a>
            </div>
    </section>
    <!-- Phim chiếu rạp -->
    <?php
            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
    ?>
    <section class="chieurap container" id="chieurap">
        <div class="heading">
            <a href="category.php?danhmuc=<?php echo $row_danhmuc['category_id']?>" class="nav-link">
                <h2 class="heading-title"><?php echo $row_danhmuc['category_name'] ?></h2>
            </a>
            
        </div>
        <div class="swiper chieurap-content">
            <div class="swiper-wrapper">
                <?php
                    $row_danhmuc_1=$row_danhmuc['category_id'];
                    $sql_phim = "SELECT * FROM tbl_product WHERE category_id='$row_danhmuc_1'";
                    $query_phim = mysqli_query($mysqli,$sql_phim);
                    while($row_phim = mysqli_fetch_array($query_phim)){
                ?>
                    
                    <div class="swiper-slide">
                        <div class="movie-box">
                            <img src="admin/uploads/<?php echo $row_phim['product_img_desc'] ?>" class="movie-box-img">
                            <div class="box-text">
                                <h2 class="movie-title"><?php echo $row_phim['product_name'] ?></h2>
                                <span class="movie-type"><?php echo $row_phim['product_category'] ?></span>
                                <a href="product.php?phim=<?php echo $row_phim['product_id'] ?>" class="watch-btn play-btn"><i class="bx bx-play"></i></a>
                            </div>
                        </div>
                    </div>

                <?php
                    }
                ?>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
              
            </div>
        </div>
    </section>
    <?php
    } 
    ?>
    <div class="footer">
        <p>&#169 Trần Việt Hùng - Mã SV: B20DCCN301</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./main.js"></script>
    
</body>
</html>