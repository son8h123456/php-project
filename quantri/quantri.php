<?php
    ob_start();
    session_start();
    include_once "./ketnoi.php";

    if($_SESSION["email"] == "huyson@gmail.com" && $_SESSION["password"]=="1") {

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/quantri.css">
</head>
<body>

 <div class="container-fluid">
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">SON SHOP</span>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Xin chào, <?php if(isset($_SESSION["email"])) {echo $_SESSION["email"];}?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Thông tin thành viên</a>
              <a class="dropdown-item" href="#">Cài đặt</a>
              <a class="dropdown-item" href="dangxuat.php">Đăng xuất</a>
            </div>
          </div>
      </nav>
      <div class="row align-items-start">
        <div class="col-2">
          <ul>
              <li>
                <i class="fas fa-user-alt"></i>
                  <a href="quantri.php?page_layout=gioithieu">Trang chủ quản trị</a></li>
              <li>
                 <i class="fas fa-user-alt"></i>
                  <a href="#">Quản lí thành viên</a></li>
              <li>
                <i class="fas fa-clipboard"></i>
                  <a href="quantri.php?page_layout=danhsachdm">Quản lí danh mục</a></li>
              <li>
                <i class="fas fa-shopping-cart"></i>
                  <a href="quantri.php?page_layout=danhsachsp">Quản lí sản phẩm</a></li>
              <li>
                 <i class="fas fa-comment-dots"></i>
                  <a href="#">Quản lí bình luận</a></li>
              <li>
                <i class="fab fa-adversal"></i>
                  <a href="#">Quản lí quảng cáo</a></li>
              <li>
                 <i class="fas fa-comment-dots"></i>
                  <a href="#">Cấu hình</a></li>
              <li><hr></li>
              <li>
                  <a href="dangxuat.php">Đăng xuất</a></li>
          </ul>
        
        </div>
        <div class="col main">
          <?php
             if(isset($_GET["page_layout"])) {
               switch($_GET["page_layout"]) {
                case "gioithieu":include_once "./gioithieu.php";
                    break;
                case "danhsachsp":include_once "./danhsachsp.php";
                    break;
                case "themsp":include_once "./themsp.php";
                    break;
                case "suasp":include_once "./suasp.php";
                    break;
                case "danhsachdm":include_once "./danhsachdm.php";
                    break;
                case "themdm":include_once "./themdm.php";
                    break;
                case "suadm":include_once "./suadm.php";
                    break;
               }
            } else {
                include_once "./gioithieu.php";
            }
          ?>
        </div>
       
      </div>
 </div>


    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php
    }else {
        header("location: index.php");
    }
?>