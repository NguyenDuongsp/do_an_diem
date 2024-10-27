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

    <form method="post" action="http://localhost/do_an_diem/lophoccontroller/Get_data_admin">
        <div class="content">
        <table class="table table-striped" style="width: 1250px; text-align: left;">
                <tr>
                    <td colspan="9" style="text-align: left;">
                        <h2>THÔNG TIN LỚP HỌC</h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" class="cold2"></td>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>Mã Lớp</th>
                    <th>Mã Học Phần</th>
                    <th>Công Cụ</th>
                </tr>
                <?php
                // Biến khởi tạo
                $malop = '';
                $mahocphan = '';

                // Xử lý kết quả truy vấn (hiển thị mảng $data lên bảng)
                if (isset($data['dulieu']) && $data['dulieu'] != null) {
                    $i = 0;
                    while ($row = mysqli_fetch_array($data['dulieu'])) {
                        ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo $row['malop'] ?></td>
                            <td><?php echo $row['mahocphan'] ?></td>
                            <td>
                                <span class="btntool btn btn-primary">
                                    <a href="http://localhost/do_an_diem/lophoccontroller/sua/<?php echo $row['malop'] ?>">Sửa</a>
                                </span> &nbsp;&nbsp;
                                <span class="btntool btn btn-danger">
                                    <a href="http://localhost/do_an_diem/lophoccontroller/xoa/<?php echo $row['malop'] ?>">Xóa</a>
                                </span> &nbsp;&nbsp;
                                <span class="btntool btn btn-success">
                                    <a href="http://localhost/do_an_diem/dssinhvien/sv_lop/<?php echo $row['malop'] ?>">Chi tiết</a>
                                </span>
                                <span class="btntool btn btn-success">
                                    <a href="http://localhost/do_an_diem/diemgv/diemsinhvien_lop2/<?php echo $row['malop'] ?>">Nhập Điểm</a>
                                </span>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </form>
    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <form method="post" action="http://localhost/do_an_diem/lophoccontroller/themmoi" enctype="multipart/form-data">
                <table class="table table-borderless">
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <h5>CẬP NHẬT THÔNG TIN LỚP HỌC</h5>
                    </td>
                </tr>
                <tr>
                    <td class="col1">Mã Lớp</td>
                    <td class="col2">
                        <input class="form-control" type="text" name="txtmalop" value="" style="width:450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Mã Học Phần</td>
                    <td class="col2">
                        <select class="form-control" name="txtmahocphan" style="width:450px;">
                            <option value="">--Chọn mã học phần--</option>
                            <?php
                            // Tạo các tùy chọn từ HP01 đến HP40
                            for ($i = 1; $i <= 40; $i++) {
                                // Định dạng mã học phần (HP01, HP02, ..., HP40)
                                $mahp = 'HP' . str_pad($i, 2, '0', STR_PAD_LEFT);
                                
                                // Kiểm tra mã học phần đã được chọn hay chưa
                                $selected = ($mahp == $mahocphan) ? 'selected' : '';
                                
                                // In tùy chọn vào dropdown
                                echo "<option value='$mahp' $selected>$mahp</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col1">Mã Giảng Viên</td>
                    <td class="col2">
                        <select class="form-control" name="txtmagiangvien" style="width:450px;">
                            <option value="">--Chọn mã giảng viên--</option>
                            <?php
                            // Tạo các tùy chọn từ GV001 đến GV019
                            for ($i = 1; $i <= 19; $i++) {
                                $magiangvien = 'GV' . str_pad($i, 3, '0', STR_PAD_LEFT); // Định dạng mã giảng viên
                                $selected = ($magiangvien == $magiaovien) ? 'selected' : ''; // Kiểm tra mã giảng viên đã được chọn hay chưa
                                echo "<option value='$magiangvien' $selected>$magiangvien</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col1">Năm Học</td>
                    <td class="col2">
                        <input class="form-control" type="text" name="txtnamhoc" value="" style="width:450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Học Kỳ</td>
                    <td class="col2">
                        <input class="form-control" type="text" name="txthocky" value="" style="width:450px;">
                    </td>
                </tr>
                <tr>
                        <td class="col1"></td>
                        <td class="col2">
                            <input class="btn btn-primary" type="submit" name="btnluu" value="Lưu" style="width:100px;">
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