<?php

include "slider.php";
include "class/product-class.php";
?>

<?php
$product = new product;
$product_id = $_GET['product_id'];
    $get_product = $product -> get_product($product_id);
    if($get_product){
        $resultA = $get_product -> fetch_assoc();
    }

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        // var_dump($_POST,$_FILES);
        // echo '<pre>';
        // echo print_r($_POST);
        // echo '</pre>';
        $update_product = $product ->update_product($_POST,$_FILES);
    }
?>
<div class="admin-ct-right">
    <div class="admin-ct-right-product-add">
                    <h1>Sửa phim</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="">Nhập tên phim <span style="color: red">*</span></label>
                        <input require name="product_name"  type="text" placeholder="Nhập tên phim" value="<?php echo $resultA['product_name'] ?>">
                        <select name="category_id" id="category_id">
                            <option value="#">--Chọn Danh mục--</option>
                            <?php
                                $show_category = $product -> show_category();
                                if($show_category){while($result = $show_category ->fetch_assoc()){

                            ?>
                            <option <?php if($resultA['category_id']==$result['category_id']){echo "SELECTED";} ?> value="<?php echo $result ['category_id'] ?>"><?php echo $result ['category_name'] ?></option>
                            <?php
                                }}
                            ?>
                        </select>
                        <select name="brand_id" id="brand_id"> 
                            <option value="#">--Chọn Thể loại--</option>
                            <?php
                                $show_brand = $product -> show_brand();
                                if($show_brand){while($result = $show_brand ->fetch_assoc()){

                            ?>
                            <option <?php if($resultA['brand_id']==$result['brand_id']){echo "SELECTED";} ?> value="<?php echo $result ['brand_id'] ?>"><?php echo $result ['brand_name'] ?></option>
                            <?php
                                }}
                            ?>
                        </select>
                        <input name="product_year" require type="text" placeholder="Năm phát hành" value="<?php echo $resultA['product_year'] ?>">
                        <input name="product_time" require type="text" placeholder="Thời lượng" value="<?php echo $resultA['product_time'] ?>">
                        <input name="product_where" require type="text" placeholder="Quốc gia" value="<?php echo $resultA['product_where'] ?>">
                        <input name="product_category" require type="text" placeholder="Thể loại" value="<?php echo $resultA['product_category'] ?>">
                        <textarea name="product_desc" id="" cols="30" rows="10" placeholder="Mô tả phim" ><?php echo $resultA['product_desc'] ?></textarea>
                        <input name="product_img_desc" type="file" onchange="previewImage(event)">
                        <img id="preview-image" src="#" alt="Ảnh sản phẩm" style="display: none;">
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn sửa?')">Sửa</button>
                    </form>
    </div>            
</div>
</section>

</body>

<script>
    $(document).ready(function(){
        $("#category_id").change(function(){
            // alert($(this).val())
            var x = $(this).val()
            $.get("productadd_ajax.php",{category_id:x},function(data){
                $("#brand_id").html(data);
            })
        })
    })
    //
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imgElement = document.getElementById('preview-image');
            imgElement.src = reader.result;
            imgElement.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>


</html>