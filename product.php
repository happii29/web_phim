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
if(isset($_GET['phim'])){
    $product_id = $_GET['phim'];
    $sql_phim = "SELECT * FROM tbl_product WHERE product_id='$product_id' ";
    $query_phim = mysqli_query($mysqli,$sql_phim);
    $row_phim = mysqli_fetch_array($query_phim);
    $row_phim_category=$row_phim['category_id'];
    $sql_danhmuc = "SELECT * FROM tbl_category WHERE category_id='$row_phim_category'";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
    $row_danhmuc = mysqli_fetch_array($query_danhmuc);
}

if(isset($_POST['binhluan_submit'])){
    $product_id_bl = $_POST['product_id_binhluan'];
    $tenbinhluan=$_POST['tennguoibinhluan'];
    $binhluan =$_POST['binhluan'];
    $danhgia = $_POST['danhgia'];
    if(empty($tenbinhluan)||empty($binhluan)){
        echo "Vui lòng điền đầy đủ thông tin";
        return false;
    }else{
        $sql_binhluan = "INSERT INTO binhluan(binhluan_id,tenbinhluan,binhluan,product_id,danhgia) VALUES(NULL,'$tenbinhluan','$binhluan','$product_id_bl','$danhgia')";
        $result = mysqli_query($mysqli,$sql_binhluan);
    }
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
    <br><br><br><br>
    <!-- Phim chiếu rạp -->
    <section class="content container" id="content">
        <div class="heading">
            <a href="" class="nav-link">
                <h2 class="heading-title">Danh mục <?php echo $row_danhmuc['category_name'] ?> </h2>
            </a>
        </div>

        <div class="block" id="page-info">  
          <div class="info">
              <h2 class="title fr"><?php echo $row_phim['product_name'] ?></h2>
              <div class="poster"><a href="#" title="Xem phim EUREKA SEVEN AO"><img src="admin/uploads/<?php echo $row_phim['product_img_desc'] ?>"></a></div>
              <div class="name2 fr">
                  <h3>Film produced in &nbsp;<?php echo $row_phim['product_year'] ?></h3><span class="year" style="font-size:12px"></span>
              </div>
              <div class="dinfo">
                  <div class="col1 fr">
                      <ul>
                          <li>Status: <span class="status1">Hoàn tất&nbsp;</span></li>
                          <li>Danh mục: <?php echo $row_danhmuc['category_name'] ?></li>
                          <li>Phát hành năm: <?php echo $row_phim['product_year'] ?></li>
                          <li>Thể loại: <a href="the-loai/phim-hanh-dong/" title="Phim Hành Động"><?php echo $row_phim['product_category'] ?></a></li>
                      </ul>
                  </div>
                  <div class="col2">
                      <ul>
                          <li>Quốc gia: <a href="?mod=list&amp;type=nation&amp;id=9" title="Phim Hồng Kông "><?php echo $row_phim['product_where'] ?></a></li>
                          <li>Thời lượng: <?php echo $row_phim['product_time'] ?></li>
                          <!-- <li>Lượt xem: 53837</li>
                          <li>Đăng bởi: Không xác định</li> -->
                      </ul>
                  </div>
              </div>
              <div class="groups-btn">
                  <a href="watch.php?phim=<?php echo $row_phim['product_id'] ?>"><div class="btn-watch fr"></div></a>
              </div>
          </div>
          <div class="detail">
              <div class="blocktitle tab">Thông tin phim</div>
              <div class="content">
                  <h4>Nội dung phim <?php echo $row_phim['product_name'] ?>:</h4>
                  <p><?php echo $row_phim['product_desc'] ?>..</p>
              </div>
          </div>
        </div>
        <h2 class="heading">Đánh giá về phim</h2><br><br>
        <div class="binhluan">
            <br>
            <?php
            $sql_phim_1 = "SELECT * FROM binhluan WHERE product_id='$product_id' ";
            $query_phim_1 = mysqli_query($mysqli,$sql_phim_1);
            if (mysqli_num_rows($query_phim_1) > 0) {
                while ($row_danhgia = mysqli_fetch_array($query_phim_1)) {
                    $ten_nguoi_danh_gia = $row_danhgia['tenbinhluan'];
                    $binh_luan = $row_danhgia['binhluan'];
                    $danh_gia = $row_danhgia['danhgia'];

                    echo "<p><strong>{$ten_nguoi_danh_gia}</strong>: {$binh_luan}</p>";
                    echo "<p>Đã đánh giá: ";
                    for ($i = 1; $i <= $danh_gia; $i++) {
                        echo "<img src='img/star.png' alt='star'>";
                    }
                    echo "</p>\n";

                }
            } else {
                echo "<p>Chưa có đánh giá nào về bộ phim này.</p>";
            }
            ?>
            <br><br>
        </div>
        <br><br><br><br><br><br>
        <!-- ---------------------- -->
        <div class="danhgia" >
            <h5>Ý kiến sản phẩm</h5>
            <form action="product.php?phim=<?php echo $row_phim['product_id'] ?>" method="POST" style="display:block">
                <p><input type="hidden" value="<?php echo $row_phim['product_id'] ?>" name="product_id_binhluan"></p>
                <p><input required type="text" placeholder="Điền tên" class="form-control" name="tennguoibinhluan"></p>
                <p><textarea required style="resize: none" placeholder="Bình luận về sách...." class="form-control" name="binhluan" cols="60" rows="5"></textarea></p>
                
                <div class="star">
                    <span>Đánh giá:</span>
                    <input type="radio" name="danhgia" value="1" id="star1"><label for="star1"><img src="img/star.png" alt="1 star"></label>
                    <input type="radio" name="danhgia" value="2" id="star2"><label for="star2"><img src="img/star.png" alt="2 stars"></label>
                    <input type="radio" name="danhgia" value="3" id="star3"><label for="star3"><img src="img/star.png" alt="3 stars"></label>
                    <input type="radio" name="danhgia" value="4" id="star4"><label for="star4"><img src="img/star.png" alt="4 stars"></label>
                    <input type="radio" name="danhgia" value="5" id="star5"><label for="star5"><img src="img/star.png" alt="5 stars"></label>
                </div>
                <p><input type="submit" name="binhluan_submit" class="btn btn-success" value="Gửi bình luận"></p>
            </form>
        </div>
    </section>
    <!-- ---------------------- -->
    <div class="footer">
        <p>&#169 Trần Việt Hùng - Mã SV: B20DCCN301</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./main.js"></script>
    
</body>
</html>
