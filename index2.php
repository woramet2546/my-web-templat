<?php
    require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกฐานข้อมูล</title>
    <link rel="stylesheet" href="./Bootsrap5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        td {
            text-align: center; /* ทำให้อักษรอยู่ตรงกลางของเซลล์ */
            vertical-align: middle; /* ทำให้อักษรอยู่กึ่งกลางตามแนวดิ่ง */
        }
    </style>
</head>
<body>
    <?php require 'menu.php'; ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <div class="h4 alert alert-success mt-4 text-center" role="alert">แสดงข้อมูลสมาชิก</div>
                <form action="search.php" method="post">
                    <input type="search" class="md-3 form-control" name="search_term">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form> 
                <a href="insert.php" class="btn btn-success mb-2 mt-2">Add+</a>
                <table class="table table-striped">
                    <tr>
                        <th>รหัส</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>รูปภาพพนักงาน</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <!-- php -->
                    <?php 
                    $sql= "SELECT * FROM member";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td><?php echo $row["id"]?></td>
                            <td><?php echo $row["name"]?></td>
                            <td><?php echo $row["surname"]?></td>
                            <td><?php echo $row["telephone"]?></td>
                            <td><img src="imageindex/<?php echo $row['image']?>" width="100px" class="zoom"></td>
                            <td><a href="editmb.php?id=<?php echo $row["id"]?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $row["id"]?>" onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
                    }
                    mysqli_close($conn); 
                    ?> 
                    <!-- ปิดการเชื่อมต่อฐานข้อมูล -->
                </table>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="Bootsrap5/css/js/bootstrap.bundle.min.js"></script>

    <!-- การสร้าง function javaScript -->
    <script>
        function confirmDelete(id) {
            var confirmResult = confirm('คุณต้องการลบข้อมูลคนพนักงานนี้?');
            if (confirmResult) {
                window.location.href='delete.php?id=' +id;
            }
        }
    </script>
</body>
</html>
