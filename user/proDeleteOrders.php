<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "config.php";
    $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
    $sql = "DELETE FROM orders WHERE order_ID = $sarea_id";
    if($conn->query($sql) === TRUE){
?>
                <script>
                        var result = confirm("ลบข้อมูลสำเร็จ!");
                        if (result) {
                            // ถ้าผู้ใช้กด "ตกลง" ให้เด้งไปยังหน้าที่ทำการเข้าสู่ระบบ
                            window.location.href = "../orders.php"; // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
                        } else {
                            // ถ้าผู้ใช้กด "ยกเลิก" ให้เด้งไปยังหน้าหลักหรือทำอย่างอื่น
                            window.location.href = "../orders.php"; // เปลี่ยนเส้นทางไปยังหน้าหลัก
                        }
                </script>
<?php
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
?>