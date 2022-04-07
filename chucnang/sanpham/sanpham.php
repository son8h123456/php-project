<?php
    $sql = "SELECT * FROM sanpham WHERE dac_biet=1 ORDER BY id_sp DESC LIMIT 8";
    $query = mysqli_query($conn, $sql);
?>    
    
    <!-- san pham dac biet -->
    <div class="special-product">
        <h4 class="title prd">Sản phẩm đặc biệt</h4>
        <div class="list-product">
            <?php
                while($row=mysqli_fetch_array($query)) {
            ?>
                  <div class="product-item">
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>" class="product-image">
                        <img src="./image/<?php  echo $row['anh_sp']; ?>" alt="">
                    </a>
                    <div class="product-name">
                        <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>">
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
                       Giá:  <?php echo $row['gia_sp']; ?> VNĐ
                   </div>
                   <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>" class="btn btn-outline-danger">Chi tiết sản phẩm</a>
                  </div>
                 
          
             <?php 
                }
             ?>
                 
            
        </div>
    </div>

    <?php 
        $sql1 = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 8";
        $query1 = mysqli_query($conn, $sql1);
    
    ?>
<!-- san pham moi -->
    <div class="new-product">
        <h4 class="title prd">Sản phẩm mới</h4>
        <div class="list-product">
           <?php
                while($row1=mysqli_fetch_array($query1)) {
           ?>
        <div class="product-item border">
                    <div class="product-image">
                        <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row1['id_sp']; ?>">
                            <img src="./image/<?php  echo $row1['anh_sp']; ?>" alt="">
                        </a>
                    </div>
                    <div class="product-name">
                        <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row1['id_sp']; ?>">
                        <?php  echo $row1['ten_sp']; ?>
                    </a>
                        
                    </div>
                    <div class="bao-hanh">
                        Bảo hành: <?php  echo $row1['bao_hanh']; ?>
                    </div>
                   <div class="tinh-trang">
                       Tình trạng: <?php  echo $row1['tinh_trang']; ?>
                   </div>
                   <div class="price">
                       Giá: <?php  echo $row1['gia_sp']; ?> VNĐ
                   </div>
                  </div>
         
                   <?php
                }
                   ?>
        </div>
    </div>
