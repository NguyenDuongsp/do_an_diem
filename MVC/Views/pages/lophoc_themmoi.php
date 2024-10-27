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
                        <input class="form-control" type="text" name="txtmalop" value="<?php echo $malop; ?>" style="width:450px;">
                    </td>
                </tr>
                <tr>
                    <td class="col1">Mã Học Phần</td>
                    <td class="col2">
                        <select class="form-control" name="txtmahocphan" style="width:450px;">
                            <option value="">--Chọn mã học phần--</option>
                            <?php
                            // Gọi hàm để lấy danh sách học phần
                            $hocphanList = $this->lophocModel->getHocPhanList(); // Gọi hàm lấy danh sách học phần

                            // Lặp qua dữ liệu để tạo các option trong combobox
                            foreach ($hocphanList as $row) {
                                $selected = ($row['mahocphan'] == $mahocphan) ? 'selected' : '';
                                echo "<option value='" . $row['mahocphan'] . "' $selected>" . $row['tenhocphan'] . " (" . $row['mahocphan'] . ")</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
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