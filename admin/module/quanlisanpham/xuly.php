<?php
include('../../config/config.php');

if (isset($_POST['addproduct'])) {
    $nameproduct = $_POST['nameproduct'];
    $productcode = $_POST['productcode'];
    $quantity = $_POST['quantity'];
    $priceproduct = $_POST['priceproduct'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $picture = $_FILES['pictureproduct']['name'];
    $picture_tmp = $_FILES['pictureproduct']['tmp_name'];
    $picture = time() . '_' . $picture;
    $status = $_POST['status'];
    $category = $_POST['category'];

    $sql_edit = "INSERT INTO tbl_product(nameproduct,productcode,priceproduct,quantity,content,summary,picture,
    status,id_category)
     VALUE('" . $nameproduct . "','" . $productcode . "','" . $priceproduct . "','" . $quantity . "','" . $content . "','" . $summary . "',
    '" . $picture . "','" . $status . "','" . $category . "')";
    mysqli_query($mysqli, $sql_edit);
    move_uploaded_file($picture_tmp, 'upload/' . $picture);
    header('Location:../../index.php?action=quanlisanpham&query=add');

} elseif (isset($_POST['editproduct'])) {
    $nameproduct = $_POST['nameproduct'];
    $productcode = $_POST['productcode'];
    $quantity = $_POST['quantity'];
    $priceproduct = $_POST['priceproduct'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $picture = $_FILES['pictureproduct']['name'];
    $picture_tmp = $_FILES['pictureproduct']['tmp_name'];
    $picture = time() . '_' . $picture;
    $status = $_POST['status'];
    $category = $_POST['category'];
    if ($picture != '') {
        $id = $_GET['idproduct'];
        $sql = "SELECT * FROM tbl_product WHERE id_product = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('upload/' . $row['picture']);
        }
        move_uploaded_file($picture_tmp, 'upload/' . $picture);
        $sql_edit = "UPDATE tbl_product SET nameproduct='" . $nameproduct . "', productcode='" . $productcode . "' , quantity='" . $quantity . "',
    priceproduct='" . $priceproduct . "', summary='" . $summary . "', content='" . $content . "', picture='" . $picture . "', status='" . $status . "',
    id_category='" . $category . "' WHERE id_product='$_GET[idproduct]'";

    } else {
        $sql_edit = "UPDATE tbl_product SET nameproduct='" . $nameproduct . "', productcode='" . $productcode . "' , quantity='" . $quantity . "',
    priceproduct='" . $priceproduct . "', summary='" . $summary . "', content='" . $content . "',  status='" . $status . "', category='" . $category . "'
    WHERE id_product='$_GET[idproduct]'";
    }
    mysqli_query($mysqli, $sql_edit);
    header('Location:../../index.php?action=quanlisanpham&query=add');
} elseif (isset($_GET['idproduct'])) {
    $id = $_GET['idproduct'];
    $sql = "SELECT * FROM tbl_product WHERE id_product = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('upload/' . $row['picture']);
    }
    $sql_delete = "DELETE FROM tbl_product WHERE id_product = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    header("Location:../../index.php?action=quanlisanpham&query=add");
}
?>