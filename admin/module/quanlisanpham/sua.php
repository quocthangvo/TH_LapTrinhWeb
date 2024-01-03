<?php
    $sql_sua_sp = "SELECT * FROM tbl_product WHERE id_product = '$_GET[idproduct]' LIMIT 1";
    $query_sua_sp =  mysqli_query($mysqli,$sql_sua_sp); 
?>
<h3 class="section-header">Sửa sản phẩm</h3>
<table class="custom-table" border="1">
    <?php
        while($row = mysqli_fetch_array($query_sua_sp)){

        ?>
    <form class="form-container" method="POST"
        action="module/quanlisanpham/xuly.php?idproduct=<?php echo $row['id_product'] ?>" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><span>Hiện tại : </span><?php echo $row['nameproduct'] ?><input class="input-field" type="text"
                    name="nameproduct"><?php echo $row['nameproduct'] ?></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><span>Hiện tại : </span><input class="input-field" type="text"
                    name="productcode"><?php echo $row['productcode'] ?></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><span>Hiện tại : <?php echo $row['priceproduct'] ?></span><input class="input-field" type="text"
                    name="priceproduct"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><span>Hiện tại : <?php echo $row['quantity'] ?></span><input class="input-field" type="text"
                    name="quantity"></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><span>Hiện tại : <?php echo $row['content'] ?></span><textarea name="content" id="" cols="30"
                    rows="10"></textarea></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><span>Hiện tại : </span><?php echo $row['summary'] ?><textarea name="summary" id="" cols="30"
                    rows="10"><?php echo $row['summary'] ?></textarea></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm</td>
            <td><span>Hiện tại : </span><?php echo $row['picture'] ?><input class="input-field"
                    value="<?php echo $row['picture'] ?>" type="file" name="pictureproduct"></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="category" id="">
                    <?php
                $sql_namecategory="SELECT * FROM tbl_category ORDER BY id_category DESC";
                $query_category=mysqli_query($mysqli,$sql_namecategory);
                while($row_category = mysqli_fetch_array($query_category)){
                    if($row_category['id_category']==$row['id_category']){
             ?>
                    <option selected value="<?php echo $row_category['id_category'] ?>">
                        <?php echo $row_category['namecategory'] ?></option>
                    <?php
              } else{
                ?>
                    <option value="<?php echo $row_category['id_category'] ?>">
                        <?php echo $row_category['namecategory'] ?></option>
                    <?php
              }
               
                }
              ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td><select name="status" id="">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="2"><input class="submit-btn" type="submit" name="editproduct" value="Sửa sản phẩm"></td>
        </tr>
    </form>
</table>