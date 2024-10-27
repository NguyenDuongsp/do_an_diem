<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .highlight {

            background-Color: #202126;
            border-Left: 3px solid #dce1ea;
        }

        table img {
            width: 50px;
        }
    </style>
</head>


<body>

    <form method="post" action="http://localhost/do_an_diem/dssinhvien/Get_data">
        <div class="content">
            <table class="table table-striped">
                <tr>
                    <td colspan="9" style="text-align: left;">
                        <h2>THÔNG TIN SINH VIÊN</h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" class="cold2"></td>
                </tr>
                <tr>
                    <td class="col1 ">Mã Khoa </td>
                    <td class="col2">
                        <select class="form-control" name="makhoa" id="">
                            <option value="">--Chọn mã khoa--</option>
                            <?php
                            if (isset($data['khoa']) && $data['khoa'] != null) {
                                $i = 0;
                                while ($row = mysqli_fetch_array($data['khoa'])) {

                                    echo "<option value='" . $row['makhoa'] . "'>" . $row['makhoa'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="btnxem" value="xem">

                </tr>
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Mã Khoa</th>
                    <th>Khóa Học</th>
                    <th>Công cụ</th>
                </tr>
                <?php
                $msv = '';
                $tsv = '';
                $ns = '';
                $gt = '';
                $dc = '';
                $email = '';
                $sdt = '';
                $mk = '';
                $kh = '';


                //b3: xử lý kết quả truy vấn(hiển thị mảng $data lên bảng)
                if (isset($data['dulieu']) && $data['dulieu'] != null) {
                    $i = 0;
                    while ($row = mysqli_fetch_array($data['dulieu'])) {
                ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo $row['masinhvien'] ?></td>
                            <td><?php echo $row['tensinhvien'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['ngaysinh'])) ?></td>
                            <td><?php echo $row['gioitinh'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['sdt'] ?></td>
                            <td><?php echo $row['makhoa'] ?></td>
                            <td><?php echo $row['khoahoc'] ?></td>
                            <td>
                                <span class="btntool btn btn-primary">
                                    <a href="http://localhost/do_an_diem/dssinhvien/sua/<?php echo $row['masinhvien'] ?>">Sửa</a>
                                </span> &nbsp;&nbsp;
                                <span class="btntool btn btn-danger">
                                    <a href="http://localhost/do_an_diem/dssinhvien/xoa/<?php echo $row['masinhvien'] ?>">Xóa</a>
                                </span>
                            </td>
                        </tr>
                <?php
                    }
                }
                //kết thúc b3
                ?>
            </table>
        </div>
    </form>
    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <form method="post" action="http://localhost/do_an_diem/dssinhvien/themmoi" enctype="multipart/form-data">
                <table class="table table-borderless`">
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <h5>CẬP NHẬT THÔNG TIN SINH VIÊN</h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Mã sinh viên</td>
                        <td class="col2">
                            <input class="form-control" type="text" name="txtmasinhvien" value="<?php echo $msv ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Tên sinh viên</td>
                        <td class="col2">
                            <input class="form-control" type="text" name="txttensinhvien" value="<?php echo $tsv ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Ngày Sinh </td>
                        <td class="col2">
                            <input class="form-control" type="date" name="txtngaysinh" value="<?php echo $ns ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Giới Tính</td>
                        <td class="col2">
                            <select class="form-control" name="txtgioitinh" style="width: 450px;">
                                <option value="">--Chọn giới tính-</option>
                                <?php
                                $gioitinh_options = array("Nam", "Nữ"); // Thay thế bằng danh sách tùy chọn thực tế
                                foreach ($gioitinh_options as $option) {
                                    $selected = ($option == $gt) ? 'selected' : '';
                                    echo "<option value='$option' $selected>$option</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Địa chỉ</td>
                        <td class="col2">
                            <input class="form-control" type="text" name="txtdiachi" value="<?php echo $dc ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Email</td>
                        <td class="col2">
                            <input class="form-control" type="text" name="txtemail" value="<?php echo $email ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">SĐT</td>

                        <td class="col2">
                            <input class="form-control" type="text" name="txtsdt" value="<?php echo $sdt ?>" style="width:450px;">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Mã khoa</td>
                        <td class="col2">
                        <select class="form-control" name="txtmakhoa" style="width: 450px;">
                                <option value="">--Chọn Mã Khoa-</option>
                                <?php
                                $makhoa_options = array("K01", "K02","K03", "K04","K05", "K06","K07", "K08"); // Thay thế bằng danh sách tùy chọn thực tế
                                foreach ($makhoa_options as $option) {
                                    $selected = ($option == $mk) ? 'selected' : '';
                                    echo "<option value='$option' $selected>$option</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td class="col1">Mã Khoa</td>
                        <td class="col2">
                            <select class="form-control" name="makhoa" id="" style="width:450px;">
                                <option value="">--Chọn mã khoa--</option>
                                <?php
                                if (isset($data['khoa']) && $data['khoa'] != null) {
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($data['khoa'])) {

                                        echo "<option value='" . $row['makhoa'] . "'>" . $row['makhoa'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr> -->
                    <tr>
                        <td class="col1">Khóa Học</td>
                        <td class="col2">
                            <input class="form-control" type="text" name="txtkhoahoc" value="<?php echo $kh ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1"></td>
                        <td class="col2">
                            <input class=" btn btn-primary" type="submit" name="btnluu" value="Lưu" style="width:100px;">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <script>
            const buyBtn = document.querySelector('.js-buy-ticket')
            const modal = document.querySelector('.js-modal')
            const modalClose = document.querySelector('.js-modal-close')
            const modalContainer = document.querySelector('.js-modal-container')
            //thêm class open vào modal

            function showBuyTickers() {
                modal.classList.add('open')
                var formElement = document.querySelector('form');
                formElement.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent form submission

                    // Call the function to show the modal
                    // Additional logic for form submission if needed
                });
            }
            //gỡ bỏ class open khỏi modal
            function hideBuyTickers() {
                modal.classList.remove('open')
                var form = document.querySelector('form');
                form.submit();
            }
            buyBtn.addEventListener('click', showBuyTickers)

            modalClose.addEventListener('click', hideBuyTickers)

            modal.addEventListener('click', hideBuyTickers)

            modalContainer.addEventListener('click', function(event) {
                event.stopPropagation()
            })
        </script>
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