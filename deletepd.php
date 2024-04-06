<?php
// ตรวจสอบว่ามีค่า ID ถูกส่งมาหรือไม่
if(isset($_GET['idproduct'])) {
    // นำเข้าไฟล์ config.php เพื่อเชื่อมต่อกับฐานข้อมูล
    require 'config.php';
    
    
    // ดึงค่า ID ที่ส่งมาจากลิงก์ Delete
    $id_member = $_GET['idproduct'];

    // ทำการลบข้อมูลจากฐานข้อมูล
    $sql = "DELETE FROM product WHERE pro_id = $id_member";
    $result = mysqli_query($conn, $sql);
    
    // ตรวจสอบว่าลบข้อมูลสำเร็จหรือไม่
    if($result) {
        // ส่งข้อความกลับไปหน้า index.php แสดงว่าลบข้อมูลสำเร็จ
        header('Location: showproduct.php?delete_success=true');
        exit();
    } else {
        // ส่งข้อความกลับไปหน้า index.php แสดงว่าเกิดข้อผิดพลาดในการลบข้อมูล
        header('Location: showproduct.php');
        exit();
    }
} 
header('Location:index.php');
exit();
?>
