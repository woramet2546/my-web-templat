<?php
require 'config.php';

// รับค่าคำค้นหาจากฟอร์ม
$search_term = $_POST['search_term'];

// สร้างคำสั่ง SQL สำหรับค้นหาข้อมูล
$search_query = "SELECT * FROM member WHERE name LIKE '%$search_term%' OR surname LIKE '%$search_term%'";

// ทำการค้นหาข้อมูล
$search_result = mysqli_query($conn, $search_query);

// ตรวจสอบว่ามีผลลัพธ์หรือไม่
if(mysqli_num_rows($search_result) > 0) {
    // ถ้ามีผลลัพธ์ ให้แสดงผลลัพธ์ในตาราง
    while($row = mysqli_fetch_assoc($search_result)) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["surname"]. "<br>";
    }
} else {
    // ถ้าไม่มีผลลัพธ์ ให้แสดงข้อความว่า "ไม่พบข้อมูลที่ตรงกับคำค้นหา"
    echo "ไม่พบข้อมูลที่ตรงกับคำค้นหา";
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

