<?php
 require 'config.php';
 $idpro = $_GET['id'];
 $sql= "SELECT * FROM product WHERE pro_id='$idpro' ";
 $result = mysqli_query($conn,$sql);
 $rs=mysqli_fetch_array($result);
 $p_typeID=$rs['type_id'];
 
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

      .img{
        box-shadow:  3px 3px 10px rgb(153, 153, 153);
        }
    </style>
</head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="product.php" role="button" class="nav-link px-2 text-white">Contact</a></li>
          <li><a href="showproduct.php" class="nav-link px-2 text-white">Volaco</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
  </header>

    <!-- สิ้นสุด header -->

    <div class="container mt-3 container-poo">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-sm-6 shadow border-3 pt-2 pb-2">
            <div class="alert alert-warning text-center">แก้ไขข้อมูลสินค้า</div>
                <!-- ทำการสร้าง form และกำหนด method และ action ไปหน้าที่จะส่งข้อมูล -->
                <form action="update_product.php" name=form1 method="POST" enctype="multipart/form-data">
                    <!-- enctype="multipart/form-data คำสั่งในการสร้างรูปภาพ 1 -->
                    <label for="">รหัสสินค้า:</label>
                    <input type="text" name="proid" class="form-control" readonly value=<?php echo $rs['pro_id']?>>
                    <label for="">ชื่อสินค้า:</label>
                    <input type="text" name="pname" class="form-control" value=<?php echo $rs['pro_name']?>>
                    <label for="">ประเภทสินค้า</label>
                    <select class="form-select" name="typeID">
                        <?php
                        // ทำการเลือก เข้าถึงที่อยู่ของฐานข้อมูลของ type ในphpmyadmin database 
                    $sql="SELECT * FROM type ORDER BY type_id";
                    $hand=mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($hand)){
                        $ttypeId = $row['type_id'];
                        ?>
                        <option value="<?php echo $row['type_id']?>" <?php if($p_typeID==$ttypeId){echo "selected=selected";}?>> 
                        <?php echo $row['product']?></option>
                     <?php } mysqli_close($conn);?>

                    </select>

                    <label for="">ราคา:</label>
                    <input type="number" name="price" class="form-control mt-1" value=<?php echo $rs['price']?>>
                    <label for="">จำนวน:</label>
                    <input type="number" name="num" class="form-control mt-1" value=<?php echo $rs['amount']?>>
                    <label for="" class="mt-1">รูปภาพ:</label><br>

                    <img src="image/<?php echo $rs['image']?>" width="150px" class="mt-2 mb-2 img"><br>
                    <input type="file" name="fileimg" ><br>
                    <input type="hidden" name="txtimg" class="form-control mt-1" value=<?php echo $rs['image']?>>

                    <button type="submit" class="btn btn-success mt-2">update</button>
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