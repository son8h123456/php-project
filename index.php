<?php
ob_start();
session_start();
include_once "./ketnoidb/ketnoi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SON SHOP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/mainfe.css">
    <link rel="stylesheet" href="./css/trangchu.css">

    <?php
    if (isset($_GET["page_layout"])) {
        switch ($_GET["page_layout"]) {
            case "danhsachtimkiem":
                echo '<link rel="stylesheet" href="./css/timkiemfe.css">';
                break;
            case "chitietsp":
                echo ' <link rel="stylesheet" href="./css/chitietspfe.css" />';
                break;
            case "danhsachsp":
                echo ' <link rel="stylesheet" href="./css/danhsachspfe.css" />';
                break;
            case "giohang":
                echo ' <link rel="stylesheet" href="./css/giohangfe.css" />';
                break;
            case "muahang":
                echo '<link rel="stylesheet" href="./css/giohangfe.css" />';
                break;
        }
    }
    ?>
</head>

<body>
    <div class="container-fruid" style="background: #edeef2;">
        <nav class="navbar navbar-dark bg-dark " >
            <div class="container mt-2">
                <a class="navbar-brand" href="index.php">
                    SON SHOP
                </a>
                <?php
                include_once "./chucnang/timkiem/timkiem.php";
                ?>
                <div class="phone-number text-light d-flex  align-items-center">
                    <div class="icon">
                    <i class="fas fa-phone"></i>
                    </div>
                    <ul>
                        <li>012345678</li>
                        <li>098765432</li>
                    </ul>
                </div>
                <div class="tuvan text-light d-flex  align-items-center">
                    <div class="icon">
                    <i class="fas fa-desktop"></i>
                    </div>
                    <ul>
                        <li>Tư vấn</li>
                        <li>Cấu hình laptop</li>
                    </ul>
                </div>
                <?php
                include_once "./chucnang/giohang/giohangcuab.php";
                ?>
            </div>
            <div class="container mt-4 navbar-bottom">
                <ul class="d-flex text-light justify-content-around w-100 ">
                    <li>
                        <i class="fas fa-check"></i>
                        Sản phẩm bạn đã xem
                    </li>
                    <li>
                        <i class="fas fa-bolt"></i>
                        Flash sale
                    </li>
                    <li>
                        <i class="fas fa-phone-volume"></i>
                        Tư vấn bán hàng
                    </li>
                    <li>
                        <i class="fas fa-award"></i>
                        Hàng chính hãng
                    </li>
                    <li>
                        <i class="fas fa-cart-arrow-down"></i>
                        Đổi trả miễn phí
                    </li>
                    <li>
                        <i class="fas fa-car-side"></i>
                        Miễn phí vận chuyển
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">

            <div class="row align-items-start p-3">
                <div class="col-xl-3">
                    <?php
                    include_once "./chucnang/sanpham/danhmucsp.php";
                    ?>

                    <?php
                    include_once "./chucnang/quangcao/quangcao.php"
                    ?>
                    <?php
                    include_once "./chucnang/thongke/thongke.php"
                    ?>


                </div>
                <div class="col-xl-9 main">
                    <div class="all-banner">
                        
                    <?php
                    include_once "./chucnang/slideshow/slideshow.php"
                    ?>

                    <div class="banner">
                       <div class="right-banner">
                       <div class="banner-item">
                            <img src="./image/banner01.png" alt="">
                        </div>
                        <div class="banner-item">
                            <img src="./image/banner02.png" alt="">
                        </div>
                       </div>
                    </div>
                   
                    </div>
                    <div class="banner-bottom">
                        <div class="banner-item">
                        <img src="./image/banner03.png" alt="">
                        </div>
                        <div class="banner-item">
                        <img src="./image/banner04.png" alt="">
                        </div>
                        <div class="banner-item">
                        <img src="./image/banner05.png" alt="">
                        </div>
                    </div>

                    <div class="main-content">

                        <?php

                        if (isset($_GET["page_layout"])) {
                            switch ($_GET["page_layout"]) {
                                case "danhsachtimkiem":
                                    include_once "./chucnang/timkiem/danhsachtimkiem.php";
                                    break;
                                case "danhsachsp":
                                    include_once "./chucnang/sanpham/danhsachsp.php";
                                    break;
                                case "chitietsp":
                                    include_once "./chucnang/sanpham/chitietsp.php";
                                    break;
                                case "giohang":
                                    include_once "./chucnang/giohang/giohang.php";
                                    break;
                                case "muahang":
                                    include_once "./chucnang/giohang/muahang.php";
                                    break;
                                case "hoanthanh":
                                    include_once "./chucnang/giohang/hoanthanh.php";
                                    break;
                            }
                        } else {
                            include_once "./chucnang/sanpham/sanpham.php";
                        }

                        ?>


                    </div>

                   
                </div>
            </div>
        </div>

        <div class="connect container-fruid">
                        <div class="connect-us">
                            <div class="title-name">Kết nối với chúng tôi</div>
                            <ul>
                                <li><i class="fab fa-facebook-f"></i></li>
                                <li><i class="fab fa-google"></i></li>
                                <li><i class="fab fa-youtube"></i></li>
                                <li><i class="fab fa-linkedin"></i></li>
                            </ul>
                        </div>
                        <div class="process">
                            <div class="title-name">Chấp nhận thanh toán</div>
                           <div class="icon icon-payment"></div>
                        </div>
                        <div class="email-inp">
                            <div class="title-name">Mới bạn nhập email để nhận thông tin khuyến mãi</div>
                            <input type="text" placeholder="Nhập email của bạn">
                            <input type="submit" value="Gửi" class="btn btn-outline-warning">
                        </div>
                    </div>
    </div>

    <div class="tintuc container">
       <div class="row">
       <div class="noibat col-xl-6">
            <div class="tit">Tin nổi bật trong ngày</div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
        </div>
        <div class="khuyenmai col-xl-6">
        <div class="tit">Tin khuyến mãi</div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
            <div class="content">
                <div class="image-content"><img src="https://anphat.com.vn/media/news/120_8405_0812_2005_456.jpg" alt=""></div>
               <div class="main-content">
               <div class="name-content">An Phát Computer - Top 500 doanh nghiệp tư nhân lớn nhất Việt Nam năm 2021</div>
                <div class="des-content">An Phát Computer với thành tích nhiều năm liền lọt Bảng xếp hạng VNR500 - Top 500 doanh nghiệp tư nhân lớn nhất Việt</div>
               </div>
            </div>
        </div>
       </div>
    </div>

    <div class="footer text-center" style="margin-top: 200px;">
        Copyright SON SHOP
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 5000,
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>