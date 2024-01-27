<?php
    extract($_POST);extract($_POST);extract($_REQUEST);
    include_once "config.php";
    $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);

    if(empty($passcode)or empty($member)){
        echo "กรุณาใส่ ข้อมูล Username หรือ Password";
    }else{
        if(isset($passcode)and isset($member)){
            $sql = "SELECT * FROM member WHERE user = '$member' AND passcode = '$passcode' ";
            $result = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($result)==1){
                while($date = mysqli_fetch_array($result)){
                    $t = $date['member_ID'];
                    $p = $date['role_ID'];
                }
                mysqli_close($conn);
                $t=base64_encode($t);
                $p=base64_encode($p);
                echo "<meta http-equiv='refresh' content='0;URL=login.php?p=$p&t=$t'>";
            }else{
                echo "<center>รหัสผ่านผิดพลาด</center>";
?>
                <script>
                        var result = confirm("รหัสผ่านผิดพลาด");
                        if (result) {
                            // ถ้าผู้ใช้กด "ตกลง" ให้เด้งไปยังหน้าที่ทำการเข้าสู่ระบบ
                            window.location.href = "login.php"; // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
                        } else {
                            // ถ้าผู้ใช้กด "ยกเลิก" ให้เด้งไปยังหน้าหลักหรือทำอย่างอื่น
                            window.location.href = "index.php"; // เปลี่ยนเส้นทางไปยังหน้าหลัก
                        }
                </script>
<?php
            }
        }
    }
?>