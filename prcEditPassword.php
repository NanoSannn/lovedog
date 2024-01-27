<?php
    session_start();
    extract($_POST);extract($_POST);extract($_REQUEST);
    include_once "config.php";
    $date2 = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
    $date = $date2->format("Y-m-d H:i:s");

        $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
        $sql = "SELECT * FROM member WHERE member_ID='$_SESSION[member]' ";
        $result = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_array($result)){
            $passcode = $data['passcode'];
        }
        mysqli_close($conn);

        if($passcode!=$password){
            echo "รหัสผ่านไม่ถูกต้อง";
        }else{
            $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
            $sql2 = "UPDATE member SET passcode='$newPassword', Edit_MODIFY='$date' WHERE member_ID='$_SESSION[member]' ";
            if($conn->query($sql2) === TRUE){
    ?>
                <script>
                        var result = confirm("เปลี่ยนรหัสสำเร็จ! ต้องการเข้าสู่ระบบใหม่เดี๋ยวนี้หรือไม่?");
                        if (result) {
                            // ถ้าผู้ใช้กด "ตกลง" ให้เด้งไปยังหน้าที่ทำการเข้าสู่ระบบ
                            window.location.href = "logout.php"; // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
                        } else {
                            // ถ้าผู้ใช้กด "ยกเลิก" ให้เด้งไปยังหน้าหลักหรือทำอย่างอื่น
                            window.location.href = "index.php"; // เปลี่ยนเส้นทางไปยังหน้าหลัก
                        }
                </script>
    <?php
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            mysqli_close($conn);
        }
    ?>