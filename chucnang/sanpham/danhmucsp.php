<?php
    $sql="SELECT * FROM dmsanpham";
    $query= mysqli_query($conn, $sql);
?>
<div class="sidebar border" style="background: #ffffff;">
    <h4 class="title"><i class="fas fa-bars m-2"></i>Danh mục sản phẩm</h4>
    <ul>
        <?php
            while($row=mysqli_fetch_array($query)) {
        ?>
        <li>
            <i class="fas fa-laptop"></i>
            <a href="index.php?page_layout=danhsachsp&id_dm=<?php  echo $row['id_dm']; ?>"><?php  echo $row['ten_dm']; ?></a>
        </li>
      
        <?php
            }
        ?>
    </ul>
</div>