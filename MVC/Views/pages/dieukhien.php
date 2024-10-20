<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Public/css/frame.css">
    <link rel="stylesheet" href="./Public/css/base.css">
    <link rel="stylesheet" href="./Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Public/fonts/fontawesome-free-6.4.2-web/css/all.min.css">đá -->
    <style>
        .large-number {
            font-size: 30px;
            font-weight: bold;
            color: red;
        }
       
   

    </style>
</head>
<body>
    <div class=" are_display">
        <div class="main_item">
            <div class="item_baoboc">
                <a class="item_app" href="./hoadon.php">
                    <div class="item_name">
                        <div class="span-css">
                        <?php
$result = mysqli_fetch_assoc($data['hoadon']);
$count = $result['count'];
?>
<span class="large-number"><?php echo $count; ?></span>
                            <span>Tổng hóa đơn</span>
                        </div>
                        <i class="btn btn-info item_icon fa-solid fa-money-bill-1-wave"></i>
                    </div>
                </a>
                <a class="item_app" href="./Quanlysanpham.php">
                    <div class="item_name">
                        <div class="span-css">
                        <?php
$result = mysqli_fetch_assoc($data['sanpham']);
$count = $result['count'];
?>
<span class="large-number"><?php echo $count; ?></span>
                            <span>Các mặt hàng đang bán</span>
                        </div>
                        <i style="color:white" class="btn btn-warning item_icon fa-solid fa-cart-shopping"></i>
                    </div>
                </a>
            </div>
            <div class="item_baoboc">
                <a class="item_app" href="./Quanlykhachhang.php">
                    <div class="item_name">
                        <div class="span-css">
                        <?php
$result = mysqli_fetch_assoc($data['khachhang']);
$count = $result['count'];
?>
<span class="large-number"><?php echo $count; ?></span>
                            <span>Số Khách Hàng</span>
                        </div>
                        <i class="btn btn-primary  item_icon fa-solid fa-users-line"></i>
                    </div>
                </a>
                <a class="item_app" href="./dsnv.php">
                    <div class="item_name">
                        <div class="span-css">
                        <?php
$result = mysqli_fetch_assoc($data['nhanvien']);
$count = $result['count'];
?>
<span class="large-number"><?php echo $count; ?></span>
                            <span>Nhân Viên</span>
                        </div>
                        <i class="btn btn-danger  item_icon fa-solid fa-user-tie"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="conten_dieukhien">
            <br>
            <br>
            <br>
            <br>
            <p>MANAGE 999 SỰ LỰA CHỌN CỦA BẠN</p>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

    <style>
        .search-add-filter{
            display: none;
        }
        .form-control{
            width: 550px;
            height:40px;
        }
    </style>
    <script>
        // Lấy dữ liệu từ localStorage
        var selectedCellData = localStorage.getItem('selectedCellData');

        // Tìm và đánh dấu ô có dữ liệu tương tự
        var cells = document.getElementsByClassName('menu__item');
        for (var i = 0; i < cells.length; i++) {
            if (cells[i].innerText === selectedCellData) {
                cells[i].classList.add('highlight');
            }
        }
    </script> 
</body>
</html>