<link rel="stylesheet" href="../css/themsp.css">
<?php 
    $sqlDm="SELECT * FROM dmsanpham";
    $queryDm= mysqli_query($conn, $sqlDm);

    if(isset($_POST["submit"])) {
        $ten_sp=$_POST["ten_sp"];
        $gia_sp=$_POST["gia_sp"];
        $bao_hanh=$_POST["bao_hanh"];
        $phu_kien=$_POST["phu_kien"];
        $tinh_trang=$_POST["tinh_trang"];
        $khuyen_mai=$_POST["khuyen_mai"];
        $trang_thai=$_POST["trang_thai"];
        $chi_tiet_sp=$_POST["chi_tiet_sp"];
   

    if($_FILES["anh_sp"]["name"] =="") {
        $error_anh_sp='<span style="color: red;">(*)</span>';
    } else {
        $anh_sp=$_FILES["anh_sp"]["name"];
        $tmp_name=$_FILES["anh_sp"]["tmp_name"];
    }

    if($_POST["id_dm"]=="unselect") {
        $error_id_dm='<span style="color: red;">(*)</span>';
    } else {
        $id_dm=$_POST["id_dm"];
    }

    $dac_biet=$_POST["dac_biet"];
    if(isset($ten_sp) && isset($gia_sp) && isset($bao_hanh) && isset($phu_kien) && isset($tinh_trang) && isset($khuyen_mai) && isset($trang_thai) && isset($chi_tiet_sp) && isset($anh_sp) && isset($id_dm) && isset($dac_biet) ) {
        move_uploaded_file($tmp_name, 'image/'.$anh_sp);
        $sql ="INSERT INTO sanpham(ten_sp, gia_sp, bao_hanh, phu_kien, tinh_trang, khuyen_mai, trang_thai,"."chi_tiet_sp, anh_sp, id_dm, dac_biet) VALUES('$ten_sp', '$gia_sp', '$bao_hanh', '$phu_kien', '$tinh_trang', '$khuyen_mai', '$trang_thai',"."'$chi_tiet_sp', '$anh_sp', '$id_dm', '$dac_biet')";
        $query=mysqli_query($conn, $sql);
        header("location: quantri.php?page_layout=danhsachsp");
    }

}
?>

           <h2>Thêm sản phẩm mới</h2>
           <form method="post" enctype="multipart/form-data">
            <table id="add-prd" border="0" cellpadding="0" cellspacing="0" >
                <tbody style="display: grid; grid-template-columns: repeat(2,1fr);">
                <tr>
                    <td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" /></td>
                </tr>
                <tr>
                    <td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /></td>
                </tr>
                <tr>
                    <td><label>Nhà cung cấp</label><br />
                        <select name="id_dm">
                            <option value="unselect" selected="selected">Lựa chọn nhà cung cấp</option>
                           
                   <?php 
                    while($rowDm = mysqli_fetch_array($queryDm)) {
                   ?>
                        <option value="<?php echo $rowDm["id_dm"]; ?>"><?php echo $rowDm["ten_dm"]; ?></option>
                   <?php 
                    }
                   ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" /> VNĐ</td>
                </tr>
                <tr>
                    <td><label>Bảo hành</label><br /><input type="text" name="bao_hanh" value="12 Tháng" /></td>
                </tr>
                <tr>
                    <td><label>Đi kèm</label><br /><input type="text" name="phu_kien" value="Hộp, sách, sạc, cáp, tai nghe" /></td>
                </tr>
                <tr>
                    <td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="Máy Mới 100%" /></td>
                </tr>
                <tr>
                    <td><label>Khuyến mại</label><br /><input type="text" name="khuyen_mai" value="Dán Màn Hình 3 lớp" /></td>
                </tr>
                <tr>
                    <td><label>Còn hàng</label><br /><input type="text" name="trang_thai" value="Còn hàng" /></td>
                </tr>
                <tr>
                    <td><label>Sản phẩm đặc biệt</label><br />Có <input type="radio" name="dac_biet" value=1 /> Không <input checked="checked" type="radio" name="dac_biet" value=0 /></td>
                </tr>
                <tr>
                    <td><label>Thông tin chi tiết sản phẩm</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Thêm mới"  class="btn btn-primary" /> <input type="reset" name="reset" value="Làm mới"  class="btn btn-warning" /></td>
                </tr>
                </tbody>
            </table>
            </form>
       
