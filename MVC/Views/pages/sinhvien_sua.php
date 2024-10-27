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
    <form method="post" action="http://localhost/do_an_diem/dssinhvien/sua_dl">
        <div class="conten">
            <table class="table table-striped">
                <tr>
                    <td colspan="2">
                        <h5 style="text-align: center;">Sửa thông tin sinh viên</h5>
                    </td>
                </tr>
                <?php
                if (isset($data['dulieu']) && $data['dulieu'] != null) {
                    while ($row = mysqli_fetch_array($data['dulieu'])) {
                ?>
                        <tr>
                            <td class="col1">Mã Sinh Viên</td>
                            <td class="col2">
                                <input type="text" name="txtmasinhvien" value="<?php echo $row['masinhvien'] ?>" readonly style="width: 450px;">
                            </td>
                        </tr>

                        <tr>
                            <td class="col1">Tên sinh viên</td>
                            <td class="col2">
                                <input type="text" name="txttensinhvien" value="<?php echo $row['tensinhvien'] ?>" style="width: 450px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">Ngày Sinh</td>
                            <td class="col2">
                                <input type="date" name="txtngaysinh" value="<?php echo $row['ngaysinh'] ?>" style="width: 450px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">Giới tính</td>
                            <td class="col2">
                                <select class="form-control" name="txtgioitinh" style="width: 450px;">
                                    <option value="">--Chọn giới tính--</option>
                                    <?php
                                    $gioitinh_options = array("Nam", "Nữ"); // Thay thế bằng danh sách tùy chọn thực tế
                                    foreach ($gioitinh_options as $option) {
                                        $selected = ($option == $row['gioitinh']) ? 'selected' : '';
                                        echo "<option value='$option' $selected>$option</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">Địa chỉ</td>
                            <td class="col2">
                                <input type="text" name="txtdiachi" value="<?php echo $row['diachi'] ?>" style="width: 450px;">
                            </td>
                        </tr>

                        <tr>
                            <td class="col1">Email</td>
                            <td class="col2">
                                <input type="text" name="txtemail" value="<?php echo $row['email'] ?>" style="width: 445px;">
                            </td>
                        </tr>


                        <tr>
                            <td class="col1">Số điện thoại</td>
                            <td class="col2">
                                <input type="text" name="txtsdt" value="<?php echo $row['sdt'] ?>" style="width: 445px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">Mã Khoa</td>
                            <td class="col2">
                                <select class="form-control" name="txtmakhoa" style="width: 450px;">
                                    <option value="">--Chọn Mã Khoa--</option>
                                    <?php
                                     $makhoa_options = array("K01", "K02","K03", "K04","K05", "K06","K07", "K08"); // Thay thế bằng danh sách tùy chọn thực tế
                                     foreach ($makhoa_options as $option) {
                                        $selected = ($option == $row['makhoa']) ? 'selected' : '';
                                        echo "<option value='$option' $selected>$option</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">Khóa Học</td>
                            <td class="col2">
                                <input type="text" name="txtkhoahoc" value="<?php echo $row['khoahoc'] ?>" style="width: 445px;">
                            </td>
                        </tr>
                <?php
                    }
                } ?>
                <tr>
                    <td class="col1"></td>
                    <td class="col2">
                        <input class="btn btn-primary" type="submit" name="btnluu" value="Lưu">
                    </td>
                </tr>
            </table>
    </form>
</body>

</html>