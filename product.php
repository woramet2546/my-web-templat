<?php
 require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="Bootsrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="Bootsrap5/css/js/bootstrap.bundle.min.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
      .text-bg-dark{
        background:black;
      }
    </style>
</head>
<body>
  <?php require 'menu.php';?>


    <div class="container mt-3 container-poo">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-sm-6 shadow border-3 pt-2 pb-2">
            <div class="alert alert-success text-center">ทำการเพิ่มข้อมูลสินค้า</div>
                <!-- ทำการสร้าง form และกำหนด method และ action ไปหน้าที่จะส่งข้อมูล -->
                <form action="insertproduct.php" name=form1 method="POST" enctype="multipart/form-data">
                    <!-- enctype="multipart/form-data คำสั่งในการสร้างรูปภาพ 1 -->
                    <label for="">ชื่อสินค้า:</label>
                    <input type="text" name="pname" class="form-control" placeholder="ค้นหาชื่อสินค้า">
                    <label for="">ประเภทสินค้า</label>
                    <select class="form-select" name="typeID">
                        <?php
                        // ทำการเลือก เข้าถึงที่อยู่ของฐานข้อมูลของ type ในphpmyadmin database 
                    $sql="SELECT * FROM type ORDER BY type_id";
                    $hand=mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($hand)){
                        ?>
                        <option value="<?php echo $row['type_id']?>"><?php echo $row['product']?></option>
                     <?php } mysqli_close($conn);?>

                    </select>

                    <label for="">ราคา:</label>
                    <input type="number" name="price" class="form-control mt-1" placeholder="ราคาสินค้า" required>
                    <label for="">จำนวน:</label>
                    <input type="number" name="num" class="form-control mt-1" placeholder="จำนวนสินค้า" required>
                    <label for="" class="mt-1">รูปภาพ:</label><br>
                    <input type="file" name="fileimg" required><br>
                    <button type="submit" class="btn btn-success mt-2">submit</button>
                    <a href="showproduct.php" class="btn btn-danger mt-2">Cancel</a>
                    <input class="btn btn-warning mt-2" type="reset" value="Reset">
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- js -->

    <link rel="stylesheet" href="Bootsrap5/css/js/bootstrap.bundle.min.js">
</body>
</html>