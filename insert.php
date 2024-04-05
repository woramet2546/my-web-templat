<?php
require 'config.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลสมาชิก</title>
    <link rel="stylesheet" href="./Bootsrap5/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php require 'menu.php';?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 mt-5">
            <div class="h4 alert alert-success mt-4 text-center" role="alert">แสดงข้อมูลสมาชิก</div>
            <!-- Start form -->
            <form method="POST" action="insert-member.php" id="myForm" enctype="multipart/form-data">
                <label for="">ชื่อ:</label>
                <input type="text" class="form-control" name="fname" required>
                <label for="">นามสกุล:</label>
                <input type="text" class="form-control" name="lname" required>
                <label for="">เบอร์โทรศัพท์:</label>
                <input type="number" class="form-control" name="telephone" required>
                <label for="" class="mt-1">รูปภาพ:</label><br>
                <input type="file" name="image" required><br>
                <input type="submit" class="btn btn-success mt-3 btn-sm" value="บันทึกข้อมูล">
                <a href="index.php" class="btn btn-danger mt-3 btn-sm">ยกเลิก</a>
            </form>  
            <!-- End form -->
        </div>
    </div>
</div>






</body>
</html>