<?php
include('../../config/config.php');
$namecategory = $_POST['namecategory'];
$serial = $_POST['serial'];
if (isset($_POST['addcategory'])) {
    $sql_them = "INSERT INTO tbl_category(namecategory,serial) VALUE('" . $namecategory . "','" . $serial . "')";
    mysqli_query($mysqli, $sql_them);
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
    exit();
} elseif (isset($_POST['editcategory'])) {
    $sql_them = "UPDATE tbl_category SET namecategory='" . $namecategory . "', serial='" . $seria . "' WHERE id_category='$_GET[idcategory]'";
    mysqli_query($mysqli, $sql_them);
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
    exit();

} elseif (isset($_GET['idcategory'])) {
    $id = $_GET['idcategory'];
    $sql_xoa = "DELETE FROM tbl_category WHERE id_category = '" . $id . "' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
} elseif (isset($_GET['idcategory'])) {
    $id = $_GET['idcategory'];

    // Kiểm tra xem có sản phẩm nào thuộc danh mục cần xóa không
    $sql_kiemtra = "SELECT COUNT(*) AS product_count FROM tbl_product WHERE id_category = '" . $id . "'";
    $result = mysqli_query($mysqli, $sql_kiemtra);
    $row = mysqli_fetch_assoc($result);
    $product_count = $row['product_count'];

    if ($product_count > 0) {
        // Nếu có sản phẩm thuộc danh mục này, không xóa và thực hiện hành động cần thiết (vd: thông báo lỗi)
        $message = "Không thể xóa danh mục vì có sản phẩm thuộc danh mục này.";
    } else {
        // Nếu không có sản phẩm thuộc danh mục này, thực hiện truy vấn xóa
        $sql_xoa = "DELETE FROM tbl_category WHERE id_category = '" . $id . "'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
    }
}

?>
<script>
    var message = "<?php echo $message; ?>"; // Chuyển biến PHP sang JavaScript

    if (message) {
        // Nếu có thông báo lỗi, hiển thị cảnh báo và chuyển hướng về trang chính
        alert(message);
        window.location.href = '../../index.php?action=quanlidanhmucsanpham&query=add';
    }
</script>