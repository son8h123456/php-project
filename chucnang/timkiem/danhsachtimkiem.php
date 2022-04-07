<?php 
    if(isset($_GET["page"])) {
        $page=$_GET['page'];
    } else {
        $page=1;
    }

    $rowsPerPage=4;
    $perRow=$page*$rowsPerPage-$rowsPerPage;

    $stext = $_POST["searchText"];

    // bo khoang trang
    $stextNew = trim($stext);
    $arr_stextNew = explode(" ", $stextNew);
    $stextNew = implode("%",$arr_stextNew);
    $stextNew = "%".$stextNew."%";

    $sql = "SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew') ORDER BY id_sp DESC";
    $query = mysqli_query($conn, $sql);

    $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew')"));

    $totalPages=ceil($totalRows/$rowsPerPage);
    $listPage="";
    for($i=1; $i<=$totalPages; $i++) {
        if($page==$i) {
          if($page==$i) {
            $listPage.=' <li class="page-item active" aria-current="page">
            <a class="page-link" href="index.php?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$i.'">'.$i.'</a></li>';
          } else {
            $listPage.='  <li class="page-item"><a class="page-link" href="index.php?page_layout=danhsachtimkiem&stext='.$stext.'$page='.$i.'">'.$i.'</a></li>';
          }
        }
    }


?>
<h4 class="title">Kết quả tìm được với từ khóa <span><?php echo $stext; ?></span> </h4>
<div class="product-list">
  <?php 
    while($row=mysqli_fetch_array($query)) {
  ?>
  <div class="product-item border">
    <div class="product-image">
     <a href="">
     <img src="./image/<?php echo $row['anh_sp']; ?>" alt="">
     </a>
    </div>
    <div class="product-name">
      <a href="">
      <?php echo $row['ten_sp']; ?>
      </a>
    </div>
    <div class="bao-hanh">
      Bảo hành:  <?php echo $row['bao_hanh']; ?>
    </div>
    <div class="tinh-trang">
      Tình trạng:  <?php echo $row['tinh_trang']; ?>
    </div>
    <div class="price">
      Giá: <?php echo $row['gia_sp']; ?> VNĐ
    </div>
  </div>
<?php 
    }
?>

</div>
<nav aria-label="...">
  <ul class="pagination">
   <?php 
    echo $listPage;
   ?>
  </ul>
</nav>