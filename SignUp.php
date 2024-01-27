<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Love dog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0">🐶 Love dog</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link active">หน้าหลัก</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">สินค้า</a>
                            <div class="dropdown-menu m-0">
                                <a href="pom.php" class="dropdown-item">ปอม</a>
                                <a href="Chihuahua.php" class="dropdown-item">ชิวาวา</a>
                                <a href="ShihTzu.php" class="dropdown-item">ชิสุ</a>
                                <a href="product.php" class="dropdown-item">ทั้งหมด</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">ติดต่อ</a>
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">เข้าสู่ระบบ</h1>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <!-- SignUp -->
        <?php
        if(empty($_SESSION['member'])){
        ?>
        <div class="container border my-3 border-dark rounded-3 sign text-center">
        <form action="prcSignUp.php" method="get">
            <div><br>
                <div id="headerlogin" align="center">
                    <table>
                        <tr>
                            <td align="left">
                                ผู้ใช้ 
                            </td>
                            <td>
                                : <input type="text" placeholder="กรุณาป้อนชื่อ" name = "user" required class="form-control1" value="">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                เมล 
                            </td>
                            <td>
                                : <input type="text" placeholder="กรุณาป้อนเมล" name = "mail" required class="form-control1" value="">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                เบอร์ 
                            </td>
                            <td>
                                : <input type="text" placeholder="กรุณาป้อนเบอร์" name = "Tal" required class="form-control1" value="">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                รหัสผ่าน  
                            </td>
                            <td>
                                : <input type="password" name="passcode" required placeholder="กรุณาป้อนรหัสผ่าน" class="form-control1" value="">
                            </td>
                        </tr>
                    </table>
                </div>
            </div><br>
            <button type="submit" class="btn btn-primary">ตกลง</button>
        </form><br>
        <div><p>คุณมีบัญชีอยู่แล้วใช่หรือไม่? <a href="login.php">เข้าสู่ระบบ</a>.</p></div>
        </div>
        <?php
            }
        ?>
        <!-- SignUp -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>