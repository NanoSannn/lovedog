<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "../config.php";
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
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
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
                        <a href="../index.php" class="nav-item nav-link active">หน้าหลัก</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">สินค้า</a>
                            <div class="dropdown-menu m-0">
                                <a href="../pom.php" class="dropdown-item">ปอม</a>
                                <a href="../Chihuahua.php" class="dropdown-item">ชิวาวา</a>
                                <a href="../ShihTzu.php" class="dropdown-item">ชิสุ</a>
                                <a href="../product.php" class="dropdown-item">ทั้งหมด</a>
                            </div>
                        </div>
                        <a href="../contact.php" class="nav-item nav-link">ติดต่อ</a>
                    </div>
                    <?php
                        if(empty($_SESSION['member'])){
                    ?>
                            <a href="SignUp.php" class="btn btn-primary py-2 px-4">เข้าสู้ระบบ</a>
                    <?php
                        }else{
                            $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
                            $sql = "SELECT * FROM member WHERE member_ID = '$_SESSION[member]'";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_array($result);
                    ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-circle"> <?php echo $data['user'];?></i></a>
                            <div class="dropdown-menu m-0">
                                <a href="../profile.php" class="dropdown-item">โปรไฟล์</a>
                                <a href="../List.php" class="dropdown-item">รายการสั่งซื้อ</a>
                                <a href="../EditPassword.php" class="dropdown-item">เปลี่ยนรหัสผ่าน</a>
                                <?php
                                    if($_SESSION['role'] == '2'){
                                ?>
                                    <a href="../Admin/index.php" class="dropdown-item">ระบบ</a>
                                <?php
                                    }
                                ?>
                                <a href="../logout.php" class="dropdown-item active">ออกระบบ</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <!-- Main -->
        <?php
            $user = $data['user'];
            $sql2 = "SELECT * FROM orders WHERE order_ID = '$sarea_id' ";
            $result2 = mysqli_query($conn, $sql2);
            while($data2 = mysqli_fetch_array($result2)){
        ?>
                <div class="table-responsive" style="margin: 36px 0;margin-left: 129px;margin-right: 120px;">
                    <div class="text-center"><h1>ใบเสร็จ</h1></div>
                    <div class="text-left">
                        <h6>
                            ผู้ซื้อ : <?php echo $user ?><br>
                            วันที่ : <?php echo $data2['DATE_MODIFY'] ?><br>
                            เลขที่สั่งซื้อ : <?php echo $data2['order_ID'] ?>
                        </h6>
                    </div>

                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th colspan="2">
                                    รายการสั่งซื้อ
                                </th>
                                <th>
                                    จำนวนเงิน
                                </th>
                            </tr>
                            <tr class="text-dark">
                                <th scope="col">#</th>
                                <th scope="col">ไอดีสินค้า</th>
                                <th scope="col">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data2['order_ID'] ?></td>
                                <td><?php echo $data2['Products_ID'] ?></td>
                                <td><?php echo number_format( $data2['Products_price'], 0 ) ?></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td align="right">รวมเงิน</td>
                                <td><?php echo number_format( $data2['Products_price'], 0 ) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin: 36px 0;margin-left: 129px;margin-right: 120px;" align="right">
                <?php  
                    if($data2['Status_order']==1){
                        echo "<h3>รอชำระเงิน</h3>";
                    }else{
                        echo "<h3>ชำระเงินแล้ว</h3>";
                    }
                ?>
                </div>
        <?php
            }
        ?>
        <!-- End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>