<?php
    require 'config.php';
     $name =$_POST["employees"];

     $sql= "SELECT * FROM member WHERE name LIKE '%$name%' ORDER BY name ASC";
     $result =mysqli_query($conn,$sql);

     $row = mysqli_fetch_assoc($result);
     $order = 1;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกฐานข้อมูล</title>
    <link rel="stylesheet" href="./Bootsrap5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <form action="search.php" class="form-group" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="ค้นหาชื่อพนักงาน" aria-label="ค้นหาชื่อพนักงาน" aria-describedby="button-addon2" name="employees">
                    <button class="btn btn-primary" type="submit" id="button-addon2">ค้นหา</button>
                    <a href="index.php" class="btn btn-dark">ย้อนกลับ</a>
                </div>
            </form>
         
            <a href="insert.php" class="btn btn-success mb-2 mt-2">Add+</a>
                <table class="table table-striped">
                <tr class="text-center">
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>แผนก</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>รูปภาพพนักงาน</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </div>
        </div>
    

<!--   php   -->
<?php 
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
?>
    <tr>
        <td><?php echo $order++ ?></td>
        <td><?php echo $row["name"]?></td>
        <td><?php echo $row["surname"]?></td>
        <td><?php echo $row["position"]?></td>
        <td><?php echo $row["telephone"]?></td>
        <td><img src="imageindex/<?php echo $row['image']?>"width="100px" class="zoom"></td>
        <td><a href="editmb.php?id=<?php echo $row["id"]?>" class="btn btn-warning">Edit</a></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
<?php
}
mysqli_close($conn); 
?> 
<!-- ปิดการเชื่อมต่อฐานข้อมูล -->
</table>
</div>

    <!-- JS -->
    <script src="Bootsrap5/css/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


<!-- การสร้าง function javaScript -->
<script>
    function confirmDelete(id) {
        var confirmDelete = confirm('คุณต้องการลบข้อมูลคนพนักงานนี้?');
        if (confirmResult) {
            window.location.href='delete.php?id=' +id;
        }
    }
    // comment
</script>

