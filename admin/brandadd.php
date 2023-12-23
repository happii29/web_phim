<?php
include "slider.php";
include "class/brand-class.php";
?>


<?php
$brand = new brand;
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $category_id = $_POST['category_id'];
    $brand_name = $_POST['brand_name'];
    $insert_brand = $brand ->insert_brand($category_id,$brand_name);
}
?>

<style>
    select{
        height: 30px;
        width: 200px;
    }
</style>

<div class="admin-ct-right">
            <div class="admin-ct-right-category-add">
                <h1>Thêm thành phần danh mục</h1> <br>
                <form action="" method="POST">
                    <select name="category_id" id="">
                        <option value="#">--Chọn Danh mục</option>
                        <?php
                        $show_category = $brand ->show_category();
                        if($show_category){while($rusult = $show_category -> fetch_assoc()){
                     
                        ?>
                        <option value="<?php echo $rusult['category_id'] ?>"><?php echo $rusult['category_name'] ?></option>
                        <?php
                        }}
                        ?>
                    </select> <br>
                    <input required name="brand_name" type="text" placeholder="Nhập tên thành phần trong danh mục">
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn thêm?')">Thêm</button>
                </form>
            </div>
        </div>
    </section>

</body>
</html>