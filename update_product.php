<?php
    require 'config.php';
    $pro_id = $_POST['proid'];
    $pro_name = $_POST['pname'];
    $typeid = $_POST['typeID'];
    $price = $_POST['price'];
    $num = $_POST['num'];
    $image = $_POST['txtimg'];

    // โค้ดคำสั่ง อัพโหลดรูปภาพ
    if (is_uploaded_file($_FILES['fileimg']['tmp_name'])){
        $new_image_name = 'No.' . uniqid() . "." . pathinfo($_FILES['fileimg']['name'], PATHINFO_EXTENSION);
        $image_upload_path = "./image/".$new_image_name;
        move_uploaded_file($_FILES['fileimg']['tmp_name'],$image_upload_path);
    } else{
        $new_image_name = "$image";
    }
    // สิ้นสุด

    $sql = "UPDATE product SET pro_name = '$pro_name',
    type_id = '$typeid',
    price = '$price',
    amount = '$num',
    image = '$new_image_name' 
    WHERE pro_id ='$pro_id' ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('อัพเดทข้อมูลสำเร็จแล้ว');</script>";
        echo "<script>window.location='product.php'</script>";
    }else{
        echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
        echo "<script>window.location='product.php'</script>";
    }
?>