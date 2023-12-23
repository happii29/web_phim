<?php
include "slider.php";
include "class/product-class.php";
?>

<?php
$product = new product;
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    // var_dump($_POST,$_FILES);
    // echo '<pre>';
    // echo print_r($_POST);
    // echo '</pre>';
    $insert_product = $product ->insert_product($_POST,$_FILES);
}
?>

<div class="admin-ct-right">
    <div class="admin-ct-right-product-add">
                    <h1>Thêm phim</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="">Nhập tên phim <span style="color: red">*</span></label>
                        <input name="product_name" required type="text" placeholder="Nhập tên phim">
                        <select name="category_id" id="category_id">
                            <option value="#">--Chọn Danh mục--</option>
                            <?php
                                $show_category = $product -> show_category();
                                if($show_category){while($result = $show_category ->fetch_assoc()){

                            ?>
                            <option value="<?php echo $result ['category_id'] ?>"><?php echo $result ['category_name'] ?></option>
                            <?php
                                }}
                            ?>
                        </select>
                        <select name="brand_id" id="brand_id"> 
                            <option value="#">--Chọn Thể loại--</option>
                            
                        </select>
                        <input name="product_year" required type="text" placeholder="Năm phát hành">
                        <input name="product_time" required type="text" placeholder="Thời lượng">
                        <input name="product_where" required type="text" placeholder="Quốc gia">
                        <input name="product_category" required type="text" placeholder="Thể loại">
                        <textarea name="product_desc" id="" cols="30" rows="10" placeholder="Mô tả phim"></textarea>
                        <input required name="product_img_desc" type="file" onchange="previewImage(event)">
                        <img id="preview-image" src="#" alt="Ảnh sản phẩm" style="display: none;">
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn thêm?')">Thêm</button>
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