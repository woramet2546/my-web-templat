<?php
    require ("config.php");
    
    // รับค่า Array จาก Method POST ที่ส่งมาจาก FORM
    $id = $_POST['id_member'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $telephone = $_POST['telephone'];
    
    // ตรวจสอบว่ามีการอัพโหลดรูปภาพหรือไม่
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // กำหนดชื่อใหม่และเส้นทางการอัพโหลดรูปภาพ
        $new_image_name = 'No.' . uniqid() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_upload_path = "./imageindex/" . $new_image_name;
        
        // อัพโหลดรูปภาพไปยังเส้นทางที่กำหนด
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_upload_path)) {
            // ถ้าอัพโหลดรูปภาพสำเร็จ
            $image = $new_image_name;
        } else {
            // ถ้ามีข้อผิดพลาดในการอัพโหลดรูปภาพ
            $image = $_POST['image'];
        }
    } else {
        // ถ้าไม่มีการอัพโหลดรูปภาพใหม่
        $image = $_POST['image'];
    }

    // สร้างคำสั่ง SQL สำหรับการอัพเดทข้อมูล
    $sql = "UPDATE member SET 
        name = '$fname',
        surname = '$lname',
        telephone = '$telephone',
        image = '$image'
    WHERE id = '$id'";


    // ทำการ query และตรวจสอบผลลัพธ์
    $result = mysqli_query($conn, $sql);
    if($result) {
        // ถ้า query สำเร็จ
        echo "<script>alert('อัพเดทข้อมูลสำเร็จแล้ว');</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        // ถ้า query ไม่สำเร็จ
        echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
        echo "<script>window.location='index.php'</script>";
    }
?>
