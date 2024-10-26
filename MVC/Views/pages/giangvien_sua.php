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
    <title>Sửa thông tin giảng viên</title>
</head>
<body>
    <form method="post" action="http://localhost/do_an_diem/dsgiangvien/sua_dl">
        <div class="conten">
            <table class="table table-striped">
                <tr>
                    <td colspan="2">
                        <h5 style="text-align: center;">Sửa thông tin giảng viên</h5>
                    </td>
                </tr>
                
                <?php if (isset($data['dulieu']) && $data['dulieu'] != null) {
                    $row = mysqli_fetch_array($data['dulieu']); // Lấy một hàng duy nhất ?>
                
                <tr>
                    <td class="col1">Mã Giảng Viên</td>
                    <td class="col2">
                        <input type="text" name="txtmagiangvien" value="<?php echo $row['magiangvien']; ?>" readonly style="width: 450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Tên giảng viên</td>
                    <td class="col2">
                        <input type="text" name="txttengiangvien" value="<?php echo $row['tengiangvien']; ?>" style="width: 450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Ngày Sinh</td>
                    <td class="col2">
                        <input type="date" name="txtngaysinh" value="<?php echo $row['ngaysinh']; ?>" style="width: 450px;">
                    </td>
                </tr> 
                <tr>
                    <td class="col1">Giới tính</td>
                    <td class="col2">
                        <input type="text" name="txtgioitinh" value="<?php echo $row['gioitinh']; ?>" style="width: 450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Địa chỉ</td>
                    <td class="col2">
                        <input type="text" name="txtdiachi" value="<?php echo $row['diachi']; ?>" style="width: 450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Email</td>
                    <td class="col2">
                        <input type="email" name="txtemail" value="<?php echo $row['email']; ?>" style="width: 450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Số điện thoại</td>
                    <td class="col2">
                        <input type="text" name="txtsdt" value="<?php echo $row['sdt']; ?>" style="width: 450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Ngày Bắt Đầu</td>
                    <td class="col2">
                        <input type="date" name="txtngaybatdau" value="<?php echo $row['ngaybatdau']; ?>" style="width: 450px;">
                    </td>
                </tr> 
                
                <?php } ?>

                <tr>
                    <td></td>
                    <td class="col2">
                        <input class="btn btn-primary" type="submit" name="btnluu" value="Lưu">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
