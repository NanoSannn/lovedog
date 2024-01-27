<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "../config.php";
    $data = array(
        "Breeder" => $Breeder,
        "breeder_animal" => $breeder_animal,
        "birthday" => $birthday
    );

    // แปลงเป็น JSON
    $json_data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
    $sql = "UPDATE products SET Products_Name='$Products_Name', Products_price=$Products_price, Products_img='$Products_img', details1='$details1', details2='$json_data'
            WHERE Products_ID='$Products_ID'";
    if($conn->query($sql) === TRUE){
?>
                <script>
                        var result = confirm("แก้ไขข้อมูลสำเร็จ!");
                        if (result) {
                            // ถ้าผู้ใช้กด "ตกลง" ให้เด้งไปยังหน้าที่ทำการเข้าสู่ระบบ
                            window.location.href = "../product.php"; // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
                        } else {
                            // ถ้าผู้ใช้กด "ยกเลิก" ให้เด้งไปยังหน้าหลักหรือทำอย่างอื่น
                            window.location.href = "../product.php"; // เปลี่ยนเส้นทางไปยังหน้าหลัก
                        }
                </script>
<?php
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
?>