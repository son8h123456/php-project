<a href="index.php?page_layout=giohang" class="btn btn-primary position-relative">
    <i class="fas fa-shopping-cart"></i>  Giỏ hàng   
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?php if(isset($_SESSION["giohang"])) {echo count(($_SESSION["giohang"]));} else {echo 0;} ?>
        <span class="visually-hidden">unread messages</span>
    </span>
</a>