<?php
    require 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // รับค่าที่ส่งมาจากฟอร์ม
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $telephone = $_POST['telephone'];
        
        // รับข้อมูลรูปภาพ
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        
        // กำหนดโพรไฟล์ภาพ
        $target = "imageindex/" . basename($image);
        
        // เพิ่มข้อมูลลงในฐานข้อมูล
        $sql = "INSERT INTO member (name, surname, telephone, image) VALUES ('$fname', '$lname', '$telephone', '$image')";
        
        if (move_uploaded_file($image_tmp, $target)) {
            echo "รูปภาพถูกอัพโหลดเรียบร้อยแล้ว";
        } else {
            echo "มีปัญหาในการอัพโหลดรูปภาพ";
        }
        
        // ทำการ query ข้อมูล
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('อัพเดทข้อมูลสำเร็จแล้ว');</script>";
            echo "<script>window.location='index.php'</script>";
        } else {
            echo "มีปัญหาในการบันทึกข้อมูล: " . mysqli_error($conn);
        }
    }
    
?>


