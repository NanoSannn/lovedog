<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN Admin </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="../index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">DASHMIN</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="../index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-chart-line me-2"></i>สินค้า</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../pom.php" class="dropdown-item">ปอม</a>
                            <a href="../Chihuahua.php" class="dropdown-item">ชิวาวา</a>
                            <a href="../ShihTzu.php" class="dropdown-item">ชิสุ</a>
                            <a href="../product.php" class="dropdown-item">สินค้าทั้งหมด</a>
                        </div>
                    </div>
                    <a href="../orders.php" class="nav-item nav-link"><i class="fa bi-cart me-2"></i>รายการสั่งซื้อ</a>
                    <a href="../member.php" class="nav-item nav-link"><i class="fa bi-person me-2"></i>สมาชิก</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="../index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <a href="#">Admin</a>
                <?php
                    $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
                    $sql = "SELECT * FROM member WHERE member_ID = '$_SESSION[member]'";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_array($result);
                ?>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex"><i class="bi bi-person-circle"><?php echo $data['user'];?></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="../profile.php" class="dropdown-item">โปรไฟล์</a>
                            <a href="../index.php" class="dropdown-item">หน้าหลัก</a>
                            <a href="../logout.php" class="dropdown-item">ออกระบบ</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-center">แก้ไขสินค้า</h6>
                    </div>
                    <div class="table-responsive">
                        <?php 
                            $sql2 = "SELECT * FROM products WHERE Products_ID = '$sarea_id'";
                            $result2 = mysqli_query($conn, $sql2);
                            while($data2 = mysqli_fetch_array($result2)){
                         ?>
                        <form action="prcEditProduct.php" method="post">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <tr>
                                    <th>
                                        <label>ไอดี</label>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Products_ID" value="<?php echo $data2['Products_ID']; ?>" required />
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>ชื่อ</label>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Products_Name" value="<?php echo $data2['Products_Name']; ?>" required />
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>ราคา</label>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Products_price" value="<?php echo $data2['Products_price']; ?>" required />
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>รูป</label>
                                    </th>
                                    <th>
                                        <input class="form-control" type="file" name="Products_img" required />
                                    </th>
                                </tr>
                                <?php
                                    // JSON string ที่ต้องการแยก
                                    $jsonData = $data2['details2'];

                                    $dataArray = json_decode($jsonData, true);

                                    // ตรวจสอบและกำหนดค่าเริ่มต้นถ้าไม่มีค่า
                                    $breeder = isset($dataArray['Breeder']) ? $dataArray['Breeder'] : "N/A";
                                    $breederAnimal = isset($dataArray['breeder_animal']) ? $dataArray['breeder_animal'] : "N/A";
                                    $birthday = isset($dataArray['birthday']) ? $dataArray['birthday'] : "N/A";
                                ?>

                                <tr>
                                    <th>
                                        <label>พ่อพันธุ์</label>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Breeder" value="<?php echo $breeder; ?>" required />
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>แม่พันธุ์</label>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="breeder_animal" value="<?php echo $breederAnimal; ?>" required />
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>วันเกิด</label>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="birthday" value="<?php echo $birthday; ?>" required />
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>พันธุ์</label>
                                    </th>
                                    <th>
                                        <select class="form-select mb-3" aria-label="Default select example" name="details1">
                                            <option selected>เลือกพันธุ์</option>
                                            <option value="1">ปอม</option>
                                            <option value="2">ชิวาวา</option>
                                            <option value="3">ชิสุ</option>
                                        </select>
                                    </th>
                                </tr>                   
                            </table>
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </form>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>