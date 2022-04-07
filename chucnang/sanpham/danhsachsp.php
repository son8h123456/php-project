<?php
  $id_dm = $_GET["id_dm"];
  $sqlDm = "SELECT * FROM dmsanpham WHERE id_dm=$id_dm";
  $queryDm = mysqli_query($conn, $sqlDm);
  $rowDm = mysqli_fetch_array($queryDm);

  $sql = "SELECT * FROM sanpham WHERE id_dm=$id_dm ORDER BY id_sp DESC";
  $query = mysqli_query($conn, $sql);
?>

<h4 class="title"><?php  echo $rowDm['ten_dm']; ?></h4>
<div class="product-list">
  <?php
    while($row=mysqli_fetch_array($query)) {
  ?>
  <div class="product-item border">
    <div class="product-image">
     <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>">
     <img src="./image/<?php  echo $row['anh_sp']; ?>" alt="">
     </a>
    </div>
    <div class="product-name">
      <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>">
        <?php  echo $row['ten_sp']; ?>
      </a>
    </div>
    <div class="bao-hanh">
      Bảo hành:   <?php  echo $row['bao_hanh']; ?>
    </div>
    <div class="tinh-trang">
      Tình trạng:  <?php  echo $row['tinh_trang']; ?>
    </div>
    <div class="price">
      Giá:  <?php  echo $row['gia_sp']; ?> VNĐ
    </div>
  </div>
  <?php
    }
  ?>

</div>
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>