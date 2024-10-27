<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   
   .highlight{
          background-color: #202126;
          border-left: 3px solid #dce1ea;
      }
      table img{
          width: 50px;
      }

  </style>
</head>

<body>
    <form method="post" action="http://localhost/do_an_diem/dsgiangvien/timkiem">
        <div class="conten">
        <table class="table table-striped" style="width: 1270px; text-align: left;">
                <tr>
                    <td colspan="9" style="text-align: left;">
                        <h2>THÔNG TIN GIẢNG VIÊN</h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" class="cold2"></td>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>Mã giảng viên</th>
                    <th>Tên giảng viên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Ngày bắt đầu</th>
                </tr>
                <?php
                    $mgv = ''; $tgv = ''; $ns = ''; $gt = ''; $dc = ''; $email = ''; $sdt = ''; $nbd = '';

                    // Xử lý kết quả truy vấn (hiển thị mảng $data lên bảng)
                    if(isset($data['dulieu']) && $data['dulieu'] != null) {
                        $i = 0;
                        while($row = mysqli_fetch_array($data['dulieu'])) {
                ?>
                    <tr>
                        <td><?php echo ++$i ?></td>
                        <td><?php echo $row['magiangvien'] ?></td>
                        <td><?php echo $row['tengiangvien'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['ngaysinh'])) ?></td>
                        <td><?php echo $row['gioitinh'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['sdt'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['ngaybatdau'])) ?></td>
                        <td>
                            <span class="btntool btn btn-primary">
                                <a href="http://localhost/do_an_diem/dsgiangvien/sua/<?php echo $row['magiangvien'] ?>">Sửa</a> 
                            </span>&nbsp;&nbsp;
                            <span class="btntool btn btn-danger">
                                <a href="http://localhost/do_an_diem/dsgiangvien/xoa/<?php echo $row['magiangvien'] ?>">Xóa</a>
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
            <form method="post" action="http://localhost/do_an_diem/dsgiangvien/themmoi" enctype="multipart/form-data">
                <table class="table table-borderless">
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <h5>CẬP NHẬT THÔNG TIN GIẢNG VIÊN</h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Mã giảng viên</td>
                        <td class="col2">
                            <input class="form-control" type="text" name="txtmagiangvien" value="<?php echo $mgv ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Tên giảng viên</td>
                        <td class="col2">
                            <input class="form-control" type="text" name="txttengiangvien" value="<?php echo $tgv ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Ngày Sinh</td>
                        <td class="col2">
                            <input class="form-control" type="date" name="txtngaysinh" value="<?php echo $ns ?>" style="width:450px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Giới Tính</td>
                        <td class="col2">
                            <select class="form-control" name="txtgioitinh" style="width: 450px;">
                                <option value="">--Chọn giới tính--</option>
                                <?php
                                    $gioitinh_options = array("Nam", "Nữ");
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
                    </tr>
                    <tr>
                        <td class="col1">Ngày Bắt Đầu</td>
                        <td class="col2">
                            <input class="form-control" type="date" name="txtngaybatdau" value="<?php echo $nbd ?>" style="width:450px;">
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
    </div>

    <script>
        const buyBtn = document.querySelector('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalClose = document.querySelector('.js-modal-close');
        const modalContainer = document.querySelector('.js-modal-container');

        function showBuyTickers() {
            modal.classList.add('open');
            var formElement = document.querySelector('form');
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
            });
        }

        function hideBuyTickers() {
            modal.classList.remove('open');
            var form = document.querySelector('form');
            form.submit();
        }

        buyBtn.addEventListener('click', showBuyTickers);
        modalClose.addEventListener('click', hideBuyTickers);
        modal.addEventListener('click', hideBuyTickers);
        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    </script>

    <script>
        var selectedCellData = localStorage.getItem('selectedCellData');
        var cells = document.getElementsByClassName('menu__item');
        for (var i = 0; i < cells.length; i++) {
            if (cells[i].innerText === selectedCellData) {
                cells[i].classList.add('highlight');
            }
        }
    </script>
</body>
</html>
