<?php
include "slider.php";
include "class/product-class.php";
?>

<?php
$product = new product;
$show_product = $product ->show_product();
?>

<div class="admin-ct-right">
    <div class="admin-ct-right-category-list">
        <h1>Danh sách phim</h1>
            <table>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Danh mục</th>
                    <th>Thể loại</th>
                    <th>Tên phim</th>
                    <th>Năm sản xuất</th>
                    <th>Thời lượng</th>
                    <th>Mổ tả phim</th>
                    <th>Ảnh mô tả</th>
                    <th>Tùy biến</th>
                </tr>
                <?php
                if($show_product){$i=0;
                    while($result = $show_product->fetch_assoc()){$i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['product_id'] ?></td>
                    <td><?php echo $result['category_name'] ?></td>
                    <td><?php echo $result['brand_name'] ?></td>
                    <td><?php echo $result['product_name'] ?></td>
                    <td><?php echo $result['product_year'] ?></td>
                    <td><?php echo $result['product_time'] ?></td>
                    <td><?php echo $result['product_desc'] ?></td>
                    <td><img src="uploads/<?php echo $result['product_img_desc'] ?>"></td>
                    <td><a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a>|<a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a></td>
                </tr>
                <?php
                }
            }
                ?>
            </table>
    </div>
</div>
</section>

</body>
<style>
    img {
        width: 50px;
        height: 72px;
    }
</style>
</html>