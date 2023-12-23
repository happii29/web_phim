<?php
include "slider.php";
include "class/category-class.php";
?>

<?php
$category = new category;
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $category_name = $_POST['category_name'];
    $insert_category = $category ->insert_category($category_name);
}
?>

<div class="admin-ct-right">
            <div class="admin-ct-right-category-add">
                <h1>Thêm danh mục</h1>
                <form action="" method="POST">
                    <input required name="category_name" type="text" placeholder="Nhập tên danh mục">
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn thêm?')">Thêm</button>
                </form>
            </div>
        </div>
    </section>

</body>
</html>