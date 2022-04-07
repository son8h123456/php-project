<?php
    $id_dm=$_GET["id_dm"];
    $sql="SELECT * FROM dmsanpham WHERE id_dm=$id_dm";
    $query= mysqli_query($conn, $sql);
    $row= mysqli_fetch_array(($query));

    if(isset($_POST["submit"])) {
        $ten_dm = $_POST["ten_dm"];
        if(isset($ten_dm)) {
            $sql="UPDATE dmsanpham SET ten_dm='$ten_dm' WHERE id_dm=$id_dm";
            $query= mysqli_query($conn, $sql);
            header("location: quantri.php?page_layout=danhsachdm");
        }
    }
?>

<h2>Sửa danh mục</h2>

<form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên danh mục</label><br />
            <input type="text" name="ten_dm" value="<?php echo $row["ten_dm"]; ?>" />
        </td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
</form>