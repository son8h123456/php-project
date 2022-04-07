<?php 
    $id_sp = $_GET["id_sp"];

    $sqlDm = "SELECT * FROM dmsanpham";
    $queryDm = mysqli_query($conn, $sqlDm);

    $sql = "SELECT * FROM sanpham WHERE id_sp=$id_sp";
    $query = mysqli_query($conn, $sql);
    $row= mysqli_fetch_array($query);

    if(isset($_POST['submit'])) {
        $ten_sp=$_POST["ten_sp"];
        $gia_sp=$_POST["gia_sp"];
        $bao_hanh=$_POST["bao_hanh"];
        $phu_kien=$_POST["phu_kien"];
        $tinh_trang=$_POST["tinh_trang"];
        $khuyen_mai=$_POST["khuyen_mai"];
        $trang_thai=$_POST["trang_thai"];
        $chi_tiet_sp=$_POST["chi_tiet_sp"];

        if($_FILES['anh_sp']['name'] == ''){
            $anh_sp = $_POST['anh_sp'];
        }
        else{
            $anh_sp = $_FILES['anh_sp']['name'];
            $tmp = $_FILES['anh_sp']['tmp_name'];
        }
        // Danh mục Sản phẩm
            $id_dm = $_POST['id_dm'];
        // Sản phẩm Đặc biệt
            $dac_biet = $_POST['dac_biet'];
        // Xử lý Sửa Thông tin Sản phẩm
        if(isset($ten_sp) && isset($gia_sp) && isset($bao_hanh) && isset($phu_kien) && isset($tinh_trang) && isset($khuyen_mai) && isset($trang_thai) && isset($chi_tiet_sp)){
            if($_FILES['anh_sp']['name'] != ""){
                move_uploaded_file($tmp, 'image/'.$anh_sp);
            }  
            $sqlUpdate = "UPDATE sanpham  SET     id_dm = $id_dm,
                                            ten_sp = '$ten_sp',
                                            anh_sp ='$anh_sp',
                                            gia_sp = '$gia_sp',
                                            bao_hanh = '$bao_hanh',
                                            phu_kien = '$phu_kien',
                                            tinh_trang = '$tinh_trang',
                                            khuyen_mai = '$khuyen_mai',
                                            trang_thai = '$trang_thai', 
                                            dac_biet ='$dac_biet',
                                            chi_tiet_sp = '$chi_tiet_sp'
                                    WHERE   id_sp = $id_sp";
            $query=mysqli_query($conn, $sqlUpdate);
            header("location: quantri.php?page_layout=danhsachsp");
    }
}
?>
           <h2>Sửa thông tin sản phẩm</h2>
           <form method="post" enctype="multipart/form-data">
            <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" value="<?php if(isset($_POST["ten_sp"])) {echo $_POST["ten_sp"];} else {echo $row["ten_sp"];} ?>" /></td>
                </tr>
                <tr>
                    <td>
                        <label>Ảnh mô tả</label><br />
                        <input type="file" name="anh_sp" />
                        <input tyle="hidden" name="anh_sp" value="<?php echo $row["anh_sp"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label>Nhà cung cấp</label><br />
                        <select name="id_dm">
                            <option value="unselect" selected="selected">Lựa chọn nhà cung cấp</option>
                            
                            <?php
                                while($rowDm=mysqli_fetch_array(($queryDm))) {
                            ?>
                                <option 
                                    <?php 
                                        if($row["id_dm"] ==$rowDm["id_dm"]) {
                                            echo 'selected="selected"';
                                        }
                                    ?>
                                value="<?php echo $rowDm["id_dm"]; ?>"><?php echo $rowDm["ten_dm"]; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá sản phẩm</label>
                        <br />
                        <input type="text" name="gia_sp" value="<?php  if(isset($_POST["gia_sp"])) {echo $_POST["gia_sp"];} else {echo $row["gia_sp"];} ?>" /> VNĐ
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Bảo hành</label>
                        <br />
                        <input type="text" name="bao_hanh" value="<?php  if(isset($_POST["bao_hanh"])) {echo $_POST["bao_hanh"];} else {echo $row["bao_hanh"];} ?>"  />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Đi kèm</label>
                        <br /><input type="text" name="phu_kien" value="<?php echo $row["phu_kien"]; if(isset($_POST["phu_kien"])) {echo $_POST["phu_kien"];} else {echo $row["phu_kien"];} ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tình trạng</label>
                        <br />
                        <input type="text" name="tinh_trang" value="<?php  if(isset($_POST["tinh_trang"])) {echo $_POST["tinh_trang"];} else {echo $row["tinh_trang"];} ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Khuyến mại</label>
                        <br />
                        <input type="text" name="khuyen_mai" value="<?php  if(isset($_POST["khuyen_mai"])) {echo $_POST["khuyen_mai"];} else {echo $row["khuyen_mai"];} ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Còn hàng</label>
                        <br />
                        <input type="text" name="trang_thai" value="<?php  if(isset($_POST["trang_thai"])) {echo $_POST["trang_thai"];} else {echo $row["trang_thai"];} ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sản phẩm đặc biệt</label>
                        <br />
                         <input type="radio" name="dac_biet" value=1 <?php if($row['dac_biet'] == 1) {echo 'checked';} ?> /> Có
                         <input  type="radio" name="dac_biet" value=0 <?php if($row['dac_biet'] == 0) {echo 'checked';} ?> /> Không
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thông tin chi tiết sản phẩm</label>
                        <br />
                        <textarea cols="60" rows="12" name="chi_tiet_sp" ><?php if(isset($_POST["chi_tiet_sp"])) {echo $_POST["chi_tiet_sp"];} else {echo $row["chi_tiet_sp"];} ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Cập nhật" /> 
                        <input type="reset" name="reset" value="Làm mới" />
                    </td>
                </tr>
            </table>
            </form>
