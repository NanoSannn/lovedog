<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "config.php";
    $date2 = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
    $date = $date2->format("Y-m-d H:i:s");
?>

    <?php
            $member_ID = $_SESSION['member'];
            $conn1 = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
            $sql1 = "UPDATE member SET user='$user', member_name='$member_name', Tal='$Tal', mail='$mail', Edit_MODIFY='$date' WHERE member_ID ='$member_ID'";
            if($conn1->query($sql1) === TRUE){
    ?>
                <script>
                        var result = confirm("เปลี่ยนแปลงข้อมูลสำเร็จ!");
                        if (result) {
                            // ถ้าผู้ใช้กด "ตกลง" ให้เด้งไปยังหน้าที่ทำการเข้าสู่ระบบ
                            window.location.href = "profile.php"; // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
                        } else {
                            // ถ้าผู้ใช้กด "ยกเลิก" ให้เด้งไปยังหน้าหลักหรือทำอย่างอื่น
                            window.location.href = "index.php"; // เปลี่ยนเส้นทางไปยังหน้าหลัก
                        }
                </script>
    <?php
            }else{
                echo "Error: " . $sql1 . "<br>" . $conn1->error;
            }
            mysqli_close($conn1);
        
    ?>
