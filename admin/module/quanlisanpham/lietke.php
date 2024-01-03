<?php
$sql_lietke_sp = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.id_category = tbl_category.id_category ORDER BY id_product DESC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>


<div class="container_product">

    <h3 class="section-header">Danh sách sản phẩm</h3>

    <table class="custom-table list-table" border="1">
        <form method="POST" action="module/quanlidanhmuc/xuly.php">
            <tr>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Mã sản phẩm</th>
                <th>Tóm Tắt</th>
                <th>Trạng Thái</th>
                <th>Danh mục</th>
                <th>Quản lí</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sp)) {
                $i++;
                ?>
                <tr>
                    <td>
                        <?php echo $i ?>
                    </td>
                    <td>
                        <?php echo $row['nameproduct'] ?>
                    </td>
                    <td> <img src="module/quanlisanpham/upload/<?php echo $row['picture'] ?>" alt="" width="200px"></td>
                    <td>
                        <?php echo $row['priceproduct'] ?>
                    </td>
                    <td>
                        <?php echo $row['quantity'] ?>
                    </td>
                    <td>
                        <?php echo $row['productcode'] ?>
                    </td>
                    <td>
                        <?php echo $row['summary'] ?>
                    </td>
                    <td>
                        <?php echo ($row['status'] == 1) ? 'Kích hoạt' : 'Ẩn'; ?>
                    </td>
                    <td>
                        <?php echo $row['namecategory'] ?>
                    </td>
                    <td>
                        <a href="module/quanlisanpham/xuly.php?idproduct=<?php echo $row['id_product'] ?>">Xóa</a> |
                        <a href="?action=quanlisanpham&query=edit&idproduct=<?php echo $row['id_product'] ?>">Sửa</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </form>
    </table>

</div>