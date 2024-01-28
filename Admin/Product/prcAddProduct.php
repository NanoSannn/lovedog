<?php
    session_start();
    extract($_POST);extract($_GET);extract($_REQUEST);
    include_once "../config.php";
    // echo $Products_Name;
    // echo $Products_price;
    // echo $Products_img;
    // echo $details1;
    
    $conn2 = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
    $sql2 = "SELECT * FROM products";
    $result2 = mysqli_query($conn2, $sql2);
    $Count = 1;
    while($data2 = mysqli_fetch_array($result2)){
        $Count++;
    }


    // // echo $Count;
    $conn = mysqli_connect($serverName, $uesrName, $passwordserver, $datebase);
    $sql = "INSERT INTO products (Products_Name, Products_price, Products_img, details1, productsNew, details2) 
            VALUES ('$Products_Name','$Products_price','$Products_img','$details1','$Count', '$details2;')";
    if($conn->query($sql) === TRUE){
?>
                <script>
                        var result = confirm("เพิ่มข้อมูลสำเร็จ! ต้องการเพิ่มข้อมูลอีก?");
                        if (result) {
                            // ถ้าผู้ใช้กด "ตกลง" ให้เด้งไปยังหน้าที่ทำการเข้าสู่ระบบ
                            window.location.href = "AddProduct.php"; // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
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