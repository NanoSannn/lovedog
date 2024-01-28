<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "config.php";
    if(empty($_SESSION['member'])){
        echo "<meta http-equiv='refresh' content='0;URL=../SignUp.php'>";
    }else{
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
            <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
            
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
            <link href="../css/orders.css" rel="stylesheet">
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

                <?php
                    $sql2 = "SELECT * FROM products WHERE Products_ID = '$sarea_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    while($data2 = mysqli_fetch_array($result2)){
                ?>
                <!-- Team Start -->
                <div class="wrapper">
                    <div class="product-img">
                        <img src="../img/<?php echo $data2['Products_img'] ?>" alt="" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1><?php echo $data2['Products_Name'] ?></h1>
                            <p><h2>
                                <?php 
                                    if($data2['details1']==1){
                                        echo "พันธุ์ ปอม";
                                    }elseif($data2['details1']==2){
                                        echo "พันธุ์ ชิวาวา";
                                    }else{
                                        echo "พันธุ์ ชิสุ";
                                    }
                                ?><br> 
                                <?php
                                    echo "รายละเอียด : ".$data2['details2'];
                                ?><br>
                                ฿<?php echo number_format( $data2['Products_price'], 0 ) ?><br> 
                            </h2></p>
                            <div class="product-price-btn">
                                <table class="text-center">
                                    <tr>
                                        <th>
                                        <a class="btn btn-square btn-primary" href="prcOrders.php?sarea_id=<?php echo $data2['Products_ID']; ?>">
                                            <i class="fab bi-cart"></i>
                                        </a>
                                        </th>
                                        <th>
                                        <a class="btn btn-square btn-primary" href="../product.php">
                                            &#10060;
                                        </a>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team End -->
                <?php
                    }
                ?>

                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
<?php
    }
?>