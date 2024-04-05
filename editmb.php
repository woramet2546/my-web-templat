<?php
    require ("config.php");
    $id=$_GET['id'];
    $sql="SELECT * FROM member WHERE id=$id ";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลสมาชิก</title>
    <link rel="stylesheet" href="./Bootsrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Sweetalert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Sweetalert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

<body>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 mt-5">
            <div class="h4 alert alert-success mt-4 text-center" role="alert">แก้ไขข้อมูลสมาชิก</div>
            <!-- Start form -->
            <form method="POST" action="updateData.php" id="updateForm" enctype="multipart/form-data">
                 <label>รหัสสมาชิก:</label>
                 <input type="text" class="form-control" name="id_member" readonly value="<?php echo $row['id']?>">
                <label for="">ชื่อ:</label>
                <input type="text" class="form-control" name="fname" value="<?php echo$row['name']?>">
                <label for="">นามสกุล:</label>
                <input type="text" class="form-control" name="lname" value="<?php echo$row['surname']?>">
                <label for="">เบอร์โทรศัพท์:</label>
                <input type="number" class="form-control" name="telephone" value="<?php echo$row['telephone']?>">
                <label for="" class="mt-1">รูปภาพ:</label><br>

                    <img src="imagee/<?php echo $row['image']?>" width="150px" class="mt-2 mb-2 img-fluid"><br>
                    <input type="file" name="image" ><br>
                    <input type="hidden" name="image" class="form-control mt-1" value="<?php echo $row['image']?>">
                <input type="submit" class="btn btn-success mt-3 btn-sm" value="Update">
                <a href="index.php" class="btn btn-danger mt-3 btn-sm">Cancel</a>
            </form>  
            <!-- End form -->
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>
</html>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>
</html>