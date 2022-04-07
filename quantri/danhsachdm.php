<script>
  function xoaDanhMuc() {
    const conf = confirm("Bạn muốn xóa danh mục này không?");
    return conf;
  }
</script>
<?php
if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}

$rowsPerPage = 5;
$perRow = $page * $rowsPerPage - $rowsPerPage;
$sql = "SELECT * FROM dmsanpham ORDER BY id_dm ASC LIMIT $perRow, $rowsPerPage";
$query = mysqli_query($conn, $sql);

// $sql="SELECT * FROM dmsanpham ORDER BY id_dm ASC";
// $query= mysqli_query($conn, $sql)
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dmsanpham"));
$totalPages = ceil($totalRows / $rowsPerPage);

$listPage = "";
for ($i = 1; $i <= $totalPages; $i++) {
  if($page==$i) {
    $listPage.=' <li class="page-item active" aria-current="page">
    <a class="page-link" href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
  } else {
    $listPage.='  <li class="page-item"><a class="page-link" href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
  }
}
?>
<link rel="stylesheet" href="./css/danhsachdm.css">
<h2 class="title">Quản lý danh mục</h2>
<a href="quantri.php?page_layout=themdm" class="btn btn-primary">Thêm mới danh mục</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Chức năng</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_array($query)) {


    ?>
      <tr>
        <th scope="row"><?php echo $row["id_dm"]; ?></th>
        <td>
          <a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row["id_dm"]; ?>"><?php echo $row["ten_dm"]; ?></a>
        </td>
        <td>
          <a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row["id_dm"]; ?>" class="btn btn-outline-primary">Sửa</a>
          <a onclick="return xoaDanhMuc();" href="xoadm.php?id_dm=<?php echo $row["id_dm"]; ?>" class="btn btn-outline-danger">Xóa</a>
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