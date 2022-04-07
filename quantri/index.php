<?php
    ob_start();
    session_start();
    include_once "./ketnoi.php";
  
   if(isset($_POST["submit"])) {
    $email=$_POST["email"];
    $mk=$_POST["password"];
    if(isset($email) && isset($mk)) {
        $sql="SELECT * FROM thanhvien WHERE email='$email' AND mat_khau='$mk'";
        $query=mysqli_query($conn, $sql);
        $rows=mysqli_num_rows($query);
        if($rows>0) {
            $_SESSION["email"]=$email;
            $_SESSION["password"]=$mk;
            header('location: quantri.php');
        } else {
            echo '<center clas="alert alert-danger">Tài khoản không tồn tại hoặc bạn không có quyền truy cập</center>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="s-container">
      <div class="box-wrapper">
        <h2>Đăng nhập hệ thống admin</h2>
        <?php
            if(!isset($_SESSION["email"])) {
        ?>
        <form id="login-form" class="login-form" method="POST">   
            <input type="text" id="email" name="email" placeholder="Tài khoản E-mail">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" >
           <div class="btn-opt">
            <input type="submit" name="submit" value="Đăng nhập">
            <input type="button" value="Làm mới" >
           </div>
        </form>

        <?php
            } else {
                header("location:quantri.php");
            }
         ?>
      </div>
    </div>
</body>
</html>