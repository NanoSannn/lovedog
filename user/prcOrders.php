<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "../config.php";
    $date2 = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
    $date = $date2->format("Y-m-d H:i:s");

    $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
    $sql1 = "SELECT * FROM member WHERE member_ID = '$_SESSION[member]'";
    $result1 = mysqli_query($conn, $sql1);
    $data1 = mysqli_fetch_array($result1);
    $user = $data1['user'];

    $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
    $sql2 = "SELECT * FROM products WHERE Products_ID = '$sarea_id'";
    $result2 = mysqli_query($conn, $sql2);
    $data2 = mysqli_fetch_array($result2);
    $price = $data2['Products_price'];

    // echo $sarea_id;
    // echo $price;
    // echo $user;
    // echo $date;
    $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
    $sql = "INSERT INTO orders (Products_ID, Products_price, user, DATE_MODIFY, Status_order) 
            VALUES ($sarea_id,$price,'$user','$date','1')";
    if($conn->query($sql) === TRUE){
?>
                <script>
                        var result = confirm("สั่งซื้อสำเร็จ! ต้องการซื้ออีกไหม?");
                        if (result) {
                            // ถ้าผู้ใช้กด "ตกลง" ให้เด้งไปยังหน้าที่ทำการเข้าสู่ระบบ
                            window.location.href = "../product.php"; // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
                        } else {
                            // ถ้าผู้ใช้กด "ยกเลิก" ให้เด้งไปยังหน้าหลักหรือทำอย่างอื่น
                            window.location.href = "../index.php"; // เปลี่ยนเส้นทางไปยังหน้าหลัก
                        }
                </script>
<?php
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
?>