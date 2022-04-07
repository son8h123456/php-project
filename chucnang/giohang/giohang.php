


<h4 class="title mt-2">Giỏ hàng của bạn</h4>
<?php
  if(isset($_SESSION["giohang"])) {
      if(isset($_POST["sl"])) {
        foreach($_POST["sl"] as $id_sp=>$sl) {
          if($sl==0) {
            unset($_SESSION["giohang"][$id_sp]);
          } else {
            if($sl>0) {
              $_SESSION["giohang"][$id_sp] = $sl;
            }
          }
        }
      }
      $arrId = array();
      foreach($_SESSION["giohang"] as $id_sp=>$so_luong) {
        $arrId[]=$id_sp;
      }
      $strId = implode(",", $arrId);
      $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
      $query = mysqli_query($conn, $sql);
  
?>
<form id="giohang" method="post">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col" style="width: 20%;">Số Lượng</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php 
    $totalPriceAll = 0;
      while($row=mysqli_fetch_array($query)) {
        $totalPrice=$row["gia_sp"]*$_SESSION["giohang"][$row['id_sp']];
      
  ?>
  <tbody>
    <tr>
      <th class="d-flex">
        <div class="prd-img">
          <img src="./image/<?php echo $row["anh_sp"]; ?>" alt="">
        </div>
        <div class="prd-name">
        <?php echo $row["ten_sp"]; ?>
        </div>
      </th>
      <td><?php echo $row["gia_sp"]; ?> VNĐ</td>
      <td class="inp-num">
        <input type="number" name="sl[<?php echo $row["id_sp"]; ?>]" id="" value="<?php echo $_SESSION["giohang"][$row["id_sp"]]; ?>">
      </td>
      <td><?php echo $totalPrice; ?> VNĐ</td>
      <td>
        <a href="chucnang/giohang/xoahang.php?id_sp=<?php echo $row["id_sp"]; ?>"  class="btn btn-danger">Xóa</a>
      </td>
    </tr>

  </tbody>

  <?php 
    $totalPriceAll+=$totalPrice;
    }
  ?>
  <tfoot>
   
    <th scope="col">
      <a href="index.php" class="btn btn-warning">Tiếp tục mua hàng</a>
      <a  class="btn btn-info" onclick="document.getElementById('giohang').submit()" href="#">Cập nhật giỏ hàng</a>
    </th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col">Tổng tiền giỏ hàng: <?php echo $totalPriceAll; ?> </th>
    <th scope="col">
      <a href="index.php?page_layout=muahang"  class="btn btn-success">Thanh toán</a>
    </th>
  </tfoot>
</table>
</form>
<?php
  }else {
    echo "Gio hang rong";
  }
?>