<?php
    if(isset($_POST["submit"])) {
        $ten_dm=$_POST["ten_dm"];
        if(isset($ten_dm)) {
            $sql="INSERT INTO dmsanpham(ten_dm) VALUES('$ten_dm')";
            $query=mysqli_query($conn, $sql);
            header("location: quantri.php?page_layout=danhsachdm");
        }
    }
?>

<h2>Thêm mới danh mục</h2>

<form method="post" enctype="multipart/form-data">
            <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td><label>Tên danh mục</label><br /><input type="text" name="ten_dm" style="padding: 5px; border-radius: 10px; outline: none; margin: 10px 0;"  /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Thêm mới"  class="btn btn-primary"  /> <input type="reset" name="reset" value="Làm mới"  class="btn btn-danger" /></td>
                </tr>
            </table>
            </form>
       