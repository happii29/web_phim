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
?>
<?php
if(isset($_GET['phim'])){
    $product_id = $_GET['phim'];
    $sql_phim = "SELECT * FROM tbl_product WHERE product_id='$product_id' ";
    $query_phim = mysqli_query($mysqli,$sql_phim);
    $row_phim = mysqli_fetch_array($query_phim);
    $brand_id = $row_phim['brand_id'];
    $sql_phim_1 = "SELECT * FROM tbl_product WHERE brand_id='$brand_id' ";
    $query_phim_1 = mysqli_query($mysqli,$sql_phim_1);
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
        <div id="content">
            <div id="movie-display">
                <div class="heading">
                    <a href="" class="nav-link">
                        <!-- <h2 class="heading-title">PHIM CHIẾU RẠP</h2> -->
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row_phim['product_name'] ?></li>
                    </a>
                </div>

                <div class="row body_video">
                    <div class="col-sm-12">
                        <video width="100%" height="100%" controls="">
                            <source src="./img/video/film121-1.mp4" type="video/mp4">
                            <!-- <src="https://www.w3schools.com/tags/movie.mp4" type="video/mp4"> -->
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
            <div id="detail">
                <div class="row">
                    <p>Bạn đang xem phim
                        <a href="#"><?php echo $row_phim['product_name'] ?></a> online chất lượng cao miễn phí tại server phim GD 1.</p>
                    <fieldset>
                        <legend>Hướng khắc phục lỗi xem phim</legend>
                        <ul>
                            <li>Sử dụng DNS 8.8.8.8, 8.8.4.4 hoặc 208.67.222.222, 208.67.220.220 để xem phim nhanh
                                hơn.
                            </li>
                            <li>Chất lượng phim mặc định chiếu là 360. Để xem phim chất lượng cao hơn xin vui lòng
                                chọn trên player.</li>
                            <li>Xem phim nhanh hơn với trình duyệt Google Chrome, Cốc Cốc</li>
                            <li>Nếu bạn không xem được phim vui lòng nhấn CTRL + F5 hoặc CMD + R trên MAC vài lần.</li>
                        </ul>
                    </fieldset>
                </div>
        
            </div>
        </div>
    </section>
    
    <div class="footer">
        <p>&#169 Trần Việt Hùng - Mã SV: B20DCCN301</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./main.js"></script>
    
</body>
</html>