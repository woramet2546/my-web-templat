<?php
    require 'config.php';

    $product = $_POST['pname'];
    $id_p = $_POST['typeID'];
    $price = $_POST['price'];
    $number_p = $_POST['num'];

    //อัพโหลดรูปภาพ
    if (is_uploaded_file($_FILES['fileimg']['tmp_name'])){
        $new_image_name = 'No.' . uniqid() . "." . pathinfo($_FILES['fileimg']['name'], PATHINFO_EXTENSION);
        $image_upload_path = "./image/".$new_image_name;
        move_uploaded_file($_FILES['fileimg']['tmp_name'],$image_upload_path);
    } else{
        $new_image_name = "";
    }

    //คำสั่งเพิ่มข้อมูลในตาราง product
    $sql="INSERT INTO product(pro_name,type_id,price,amount,image)
    VALUE('$product','$id_p','$price','$number_p','$new_image_name')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='product.php'</script>";
    }else{
        echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
        echo "<script>window.location='product.php'</script>";
    }
?>