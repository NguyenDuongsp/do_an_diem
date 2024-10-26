

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form method="post" action="">
   
    <div class="conten">
        <table class="table table-striped">
            <tr>
                <td colspan="7" style="text-align: left;">
                    <h2>Điểm Sinh Viên</h2>
                </td>
            </tr>

            <tr>
                <td colspan="9" class="cold2">

                </td>
            </tr>
            <!-- <tr>
                <td class="col1">Khoa</td>
                <td class="col2">
                    <select class="form-control" name="ddkhoa" id="">
                        <option value="">--Chọn Khoa--</option>
                        <?php
                        if (isset($data2) && $data2 != null) {
                            while ($row = mysqli_fetch_array($data2)) {
                                ?>
                                <option><?php echo $row['khoa'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </td>
                    <td class="col1">Khóa</td>
                    <td class="col2">
                        <select class="form-control" name="ddkhoahoc" id="ddkhoahoc" >
                            <option value="">--Chọn khóa--</option>
                            <?php
                            if (isset($data3) && $data3 != null) {
                                while ($row = mysqli_fetch_array($data3)) {
                                    ?>
                                    <option value="<?php echo $row['khoahoc'] ?>"><?php echo $row['khoahoc'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td class="col1">Lớp</td>
                    <td class="col2">
                        <select class="form-control" name="ddlop" id="ddlop">
                            <option value="">--lớp--</option>
                            <?php
                            if (isset($data7) && $data7 != null) {
                                while ($row = mysqli_fetch_array($data7)) {
                                    ?>
                                    <option value="<?php echo $row['lop'] ?>"><?php echo $row['lop'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>

                
                    <td class="col1">Năm Học_ Học Kì </td>
                    <td class="col2">
                        <select class="form-control" name="hocki" id="">
                            <option value="">--Chọn năm học_ Học kì--</option>
                            <?php 
                            if(isset($data5)&&$data5!=null){
                                while($row=mysqli_fetch_array($data5)){
                             ?>
                                <option ><?php echo $row['namhoc_hocki'] ?></option>
                             <?php       
                                }
                            }
                             ?>
                            
                    </td>
                    <td class="col1">Học Phần</td>
                    <td class="col2">
                        <select class="form-control" name="ddhocphan" id="">
                            <option value="">--Chọn học phần--</option>
                            <?php 
                            if(isset($data6)&&$data6!=null){
                                while($row=mysqli_fetch_array($data6)){
                                    ?>
                                <option ><?php echo $row['tenhocphan'] ?></option>
                                <?php       
                                }
                            }
                            ?>
                            
                        </td>
                        <td>
                            <input type="submit" name ="btxem" value="xem" >
                        </td>
                </tr> -->
            <tr>
                <th>Mã Sinh Viên</th>
                <th>Tên Sinh Viên</th>
                <th>Mã Học Phần</th>
                <th>Tên học phần</th>
                <th>Lần học</th>
                <th>Đánh giá</th>
                <th>Điểm chuyên cần</th>
                <th>Điểm giữa kì</th>
                <th>Điểm thực hành</th>
            
                <th>Thi kết thúc</th>
                <th>Điểm tổng kết</th>
                <th>Điểm chữ</th>
                <th>Thao tác</th>
            </tr>
            
            <?php
            // Xử lý kết quả truy vấn (hiển thị mảng $data lên bảng)
            if (isset($data1) && $data1 != null) {
                while ($row = mysqli_fetch_array($data1)) {
                    
$masinhvien = $row['masinhvien'];
$mahocphan = $row['mahocphan'];

$url = "./Sua_diem.php?masinhvien=$masinhvien&mahocphan=$mahocphan";
                    // Tính tổng điểm
                    $tongDiem = $row['diemchuyencan']*0.1 + ($row['diemGK'] + $row['diemthuchanh'] )/2*0.2 + $row['thiketthuc']*0.7;

                    // Xác định đánh giá dựa trên tổng điểm
                    $danhGia = '';
                    $diemchu = '';
                    if ($tongDiem >= 4.0) {
                        $danhGia = 'Đạt';
                    } elseif ($tongDiem <4) {
                        $danhGia = 'Không đạt';
                    } 
                    if ($tongDiem >= 8.5) {
                        $diemchu = 'A';
                    } elseif ($tongDiem >= 7 ) {
                        $diemchu = 'B';
                    } elseif ($tongDiem >=5.5) {
                        $diemchu = 'C';
                    }
                    elseif ($tongDiem >= 4.0){
                            $diemchu = 'D';
                    }
                    else {
                        $diemchu ='F';
                    }
                    ?>
                    <tr>
              
                    <td><?php echo $row['masinhvien'] ?></td>
                        <td><?php echo $row['tensinhvien'] ?></td>
                      
                        <td><?php echo $row['mahocphan'] ?></td>
                        <td><?php echo $row['tenhocphan'] ?></td>
                        <td><?php echo $row['lanhoc'] ?></td>
                        <td><?php echo $danhGia ?></td>
                        <td><?php echo $row['diemchuyencan'] ?></td>
                        <td><?php echo $row['diemGK'] ?></td>
                        <td><?php echo $row['diemthuchanh'] ?></td>
                  
                        <td><?php echo $row['thiketthuc'] ?></td>
                        <td><?php echo $tongDiem ?></td>
                        <td><?php echo $diemchu ?></td>
                       
                    
                        <td>
                           
                            <span class="btntool btn btn-primary">
                            <a href="<?php echo $url; ?>" style="color:#0018; text-decoration: none">Sửa</a>
                            </span>
                          
                        </td>
                    </tr>
                <?php
                }
            }
            // Kết thúc xử lý kết quả truy vấn
            ?>
        </table>
    </div>
</form>
<?php
mysqli_close($con_1);
?>
</body>
</html>