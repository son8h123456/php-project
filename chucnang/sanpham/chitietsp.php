<?php
$id_sp = $_GET["id_sp"];
$sql = "SELECT * FROM sanpham WHERE id_sp=$id_sp";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<div class="container">
  <div class="row mt-5" style="background: #ffffff;">
    <div class="col-xl-6">
      <div class="product-image">
        <img src="./image/<?php echo $row['anh_sp']; ?>" alt="">
      </div>
    </div>
    <div class="col-xl-6">
      <div class="detail-product">
        <div class="product-name" style="font-weight: bold;"><?php echo $row['ten_sp']; ?></div>
        <table class="table">

          <tr>
            <td>Giá sản phẩm</td>
            <td><?php echo $row['gia_sp']; ?> VNĐ</td>
          </tr>


          <tr>
            <td>Bảo hành</td>
            <td><?php echo $row['bao_hanh']; ?></td>

          </tr>

          <tr>
            <td>Đi kèm</td>
            <td><?php echo $row['phu_kien']; ?></td>

          </tr>
          <tr>
            <td>Tình trạng</td>
            <td><?php echo $row['tinh_trang']; ?></td>

          </tr>
          <tr>
            <td>Khuyến mãi</td>
            <td><?php echo $row['khuyen_mai']; ?></td>

          </tr>
          <tr>
            <td>Còn hàng</td>
            <td><?php echo $row['trang_thai']; ?></td>
          </tr>



        </table>

        <a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row["id_sp"]; ?>" class="btn btn-outline-danger">Đặt mua</a>
      </div>

    </div>
  </div>
  <div class="des-prd">
    <div class="til">Mô tả sản phẩm</div>
    <?php echo $row['chi_tiet_sp']; ?>

  </div>

  <?php
  if (isset($_POST["submit"])) {
    $ten = $_POST["ten"];
    $dien_thoai = $_POST["dien_thoai"];
    $binh_luan = $_POST["binh_luan"];
    $ngay_gio = date('Y-m-d H:i:s');
    $sql = "INSERT INTO blsanpham (id_sp,ten,dien_thoai,binh_luan,ngay_gio) VALUES ($id_sp,'$ten','$dien_thoai','$binh_luan','$ngay_gio')";
    $query = mysqli_query($conn, $sql);
    header('location: index.php?page_layout=chitietsp&id_sp=' . $id_sp);
  }
  ?>

  <div class="comment-product">
    <h4 class="title">Bình luận sản phẩm</h4>
    <form action="index.php?page_layout=chitietsp&id_sp=<?php echo $id_sp; ?>" method="post">
      <div class="form-group">
        <label for="">Tên</label>
        <input required name="ten" type="text" class="form-control" placeholder="Nhap ten..">
      </div>
      <div class="form-group">
        <label for="">Điện thoại</label>
        <input required name="dien_thoai" type="text" class="form-control" placeholder="Nhap sđt..">
      </div>
      <div class="form-group">
        <label for="">Nội dung</label>
        <textarea required name="binh_luan" class="form-control" name="" id="" cols="30" rows="10" placeholder="Nhap noi dung.."></textarea>
      </div>
      <input type="submit" name="submit" value="Binh luan" class="btn btn-success"></input>
    </form>

  </div>
  <?php
  $sql = "SELECT * FROM blsanpham WHERE id_sp = $id_sp ORDER BY id_bl ASC";
  $query = mysqli_query($conn, $sql);

  ?>

  <div class="show-comment" style="border-bottom: 1px solid #eee; padding-bottom: 20px;">
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
      <div class="comm">
        <div class="name"><strong><?php echo $row["ten"]; ?></strong></div>
        <div class="date-tiem"><?php echo $row["ngay_gio"]; ?></div>
        <div class="content">
        <?php echo $row["binh_luan"]; ?>
        </div>
      </div>
    <?php
    }
    ?>
  </div>

</div>