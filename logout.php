<?php
    session_start();
    unset($_SESSION['member']);
    unset($_SESSION['role']);
    session_destroy();
?>
                <script>
                        var result = confirm("ออกระบบสำเร็จ!");
                        if (result) {
                            // ถ้าผู้ใช้กด "ตกลง" ให้เด้งไปยังหน้าที่ทำการเข้าสู่ระบบ
                            window.location.href = "index.php"; // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
                        } else {
                            // ถ้าผู้ใช้กด "ยกเลิก" ให้เด้งไปยังหน้าหลักหรือทำอย่างอื่น
                            window.location.href = "login.php"; // เปลี่ยนเส้นทางไปยังหน้าหลัก
                        }
                </script>
