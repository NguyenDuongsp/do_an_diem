<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Liên kết đến tệp CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Public/css/frame.css">
    <link rel="stylesheet" href="./Public/css/base.css">
    <link rel="stylesheet" href="./Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Public/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Document</title>
</head>
<body>
<form method="post" action="http://localhost/do_an_diem/dshocphan/sua_dl">
    <div class="conten">
        <table class="table table-striped">
            <tr>
                <td colspan="2">
                    <h5 style="text-align: center;">Sửa thông tin học phần</h5>
                </td>
            </tr>
                <?php
                if(isset($data['dulieu'])&&$data['dulieu']!=null){
                    while($row=mysqli_fetch_array($data['dulieu'])){
                ?>
                <tr>
                    <td class="col1">Mã học phần</td>
                    <td class="col2">
                        <input  type="text" name="txtmahocphan"value="<?php echo $row['mahocphan'] ?>" readonly style="width: 450px;">
                    </td>
                </tr>
                
                <tr>
                    <td class="col1">Tên học phần</td>
                    <td class="col2">
                        <input type="text" name="txttenhocphan"value="<?php echo $row['tenhocphan'] ?>" style="width: 450px;">
                    </td>
                </tr>
                <tr>
                    <td class= "col1">Tín chỉ</td>
                    <td class="col2">
                        <input  type="text" name="txttinchi" value="<?php echo $row['tinchi'] ?>" style="width: 450px;">
                    </td>   
                </tr>
            
           <?php
    }}?>
            <tr>
                <td class="col1"></td>
                <td class="col2">
                    <input class="btn btn-primary" type="submit"name="btnluu" value="Lưu" >
                </td>
            </tr>
        </table>
    </form>
</body>
</html>