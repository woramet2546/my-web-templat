<?php 
    require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product</title>
    <link rel="stylesheet" href="./Bootsrap5/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
    .zoom {
      transition: transform .2s; /* เพื่อทำให้การขยายภาพมีการเปลี่ยนแปลงอย่างน้อย */
      margin: 0 auto;
    }

    .zoom:hover {
      transform: scale(1.3); /* ปรับขนาดภาพใหญ่ขึ้นเมื่อมีการชี้ */
    }

    td {
      text-align: center; /* ทำให้อักษรอยู่ตรงกลางของเซลล์ */
      vertical-align: middle; /* ทำให้อักษรอยู่กึ่งกลางตามแนวดิ่ง */
    }
    </style>
</head>
<body>
    <?php require 'menu.php'; ?>

    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-9">
                <div class="alert alert-success text-center"><B>ข้อมูลสินค้า</B></div>
                <a href="product.php" class="btn btn-primary">Add</a>
                <table class="table table-striped table-hover text-center col-sm-8 rounded mt-2">
                    <tr class="">
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>รูปภาพ</th>
                        <th>แก้ไขข้อมูล</th>
                        <th>ลบข้อมูล</th>
                    </tr>
                    <!-- เปิด PHP1 -->
    <?php 
        $sql = "SELECT * FROM product ,type WHERE product.type_id = type.type_id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
    ?>
                    <!-- ปิด PHP1 -->
            <tr>
                <td><?php echo $row["pro_id"]?></td>
                <td><?php echo $row["pro_name"]?></td>
                <td><?php echo $row["product"]?></td>
                <td><?php echo $row["price"]?></td>
                <td class="text-center"><?php echo $row["amount"]?></td>
                <td><img src="image/<?php echo $row['image']?>"width="100px" class="zoom"></td>
                <td><a href="edit_product.php?id=<?php echo $row["pro_id"] ?>" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $row['pro_id'];?>" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
                    <!-- เปิด PHP2 -->
    <?php } ?>
                    <!-- ปิด PHP2 -->
                </table>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="Bootsrap5/css/js/bootstrap.bundle.min.js">
</body>
</html>