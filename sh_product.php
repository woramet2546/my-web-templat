<?php 
    require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="stylesheet" href="./Bootsrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="mediaquery.css">
</head>
<body>
    <?php require 'menu.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <?php
                //คำสั่งแบ่งหน้าเพจ
                $perpage = 10;
                    if(isset($_GET['page'])){
                        $page = intval($_GET['page']);
                    } else {
                        $page = 1;
                    }
                    $star = ($page - 1) * $perpage;
                
                //คำสั่งแสดงข้อมูล
                $sql = "SELECT * FROM product ORDER BY pro_id LIMIT {$star}, {$perpage}";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                $num = $row['price'];
            ?>
            <div class="col-md-3">
                <img src="image/<?php echo $row['image']; ?>" width="200px" height="200px" class="shadow mt-5 p-2 my-2 border"> <br>
                ID: <?php echo $row['pro_id']; ?> <br>
                <h5 class="text-success"> <?php echo $row['pro_name']; ?> </h5>
                ราคา: <b class="text-danger"><?php echo number_format($num,2); ?></b> บาท <br>
                <a href="" class="btn btn-primary">Add</a>
                <br> <br>
            </div>
            <?php
                }
                //mysqli_close($conn);
            ?>
        </div>
        <!-- close row -->
        <?php 
        $sql1="SELECT * FROM product";
        $query1 = mysqli_query($conn,$sql1);
        $total_record = mysqli_num_rows($query1);
        $total_page = ceil($total_record / $perpage);
        $next_page = $page + 1;
        $next_page = min($next_page, $total_page);
        ?>

        <!-- Bootsrap 5 -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="sh_product.php?page=<?php echo max(1, $page - 1); ?>">Previous</a></li>
        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>"><a class="page-link" href="sh_product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php } ?>
        <li class="page-item"><a class="page-link" href="sh_product.php?page=<?php echo $next_page; ?>">Next</a></li>
        </ul>
    </nav>
    </div>
    <!-- close container -->
    <!-- Js -->
    <script src="./Bootsrap5/js/bootstrap.bundle.min.js"></script>
</body>
</html>
