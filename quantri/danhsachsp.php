<link rel="stylesheet" href="../css/danhsachsp.css">
<script>
  function xoaSanPham() {
    const conf = confirm("Bạn muốn xóa danh mục này không?");
    return conf;
  }
</script>
<?php
   if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 1;
  }
  $rowsPerPage = 3;
  $perRow = $page*$rowsPerPage-$rowsPerPage;
  $sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm LIMIT $perRow, $rowsPerPage";
  $query = mysqli_query($conn, $sql);

  $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham"));
$totalPages = ceil($totalRows / $rowsPerPage);

$listPage = "";
for ($i = 1; $i <= $totalPages; $i++) {
  if($page==$i) {
    $listPage.=' <li class="page-item active" aria-current="page">
    <a class="page-link" href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';
  } else {
    $listPage.='  <li class="page-item"><a class="page-link" href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';
  }
}

  // $sql="SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm=dmsanpham.id_dm ORDER BY id_sp DESC";
  // $query=mysqli_query($conn, $sql);
?>
            <h2 class="title">Quản lý sản phẩm</h2>
            <a href="quantri.php?page_layout=themsp" class="btn btn-primary" role="button">Thêm mới sản phẩm</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col" style="width: 30%;">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Nhà cung cấp</th>
                    <th scope="col">Ảnh mô tả</th>
                    <th scope="col">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      while($row=mysqli_fetch_array($query)) {
                  ?>
                  <tr>
                    <th scope="row"><?php echo $row["id_sp"] ?></th>
                    <td><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row["id_sp"]; ?>"><?php echo $row["ten_sp"] ?></a></td>
                    <td><?php echo $row["gia_sp"] ?> vnđ</td>
                    <td><?php echo $row["ten_dm"] ?></td>
                    <td class="des-image"><img src="../image/<?php echo $row["anh_sp"] ?>" alt=""></td>
                    <td>
                        <a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row["id_sp"]; ?>" class="btn btn-outline-primary">Sửa</a>
                        <a onclick="return xoaSanPham();" href="xoasp.php?id_sp=<?php echo $row["id_sp"]; ?>" class="btn btn-outline-danger">Xóa</a>
                    </td>
                  </tr>
                 
                 <?php
                      }
                 ?>
                </tbody>
              </table>
              <nav aria-label="...">
  <ul class="pagination">
   <?php 
    echo $listPage;
   ?>
  </ul>
</nav>