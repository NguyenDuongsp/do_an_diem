<!-- <?php
$con_1 = mysqli_connect("localhost", "root", "", "diem_sv") or die('Lỗi kết nối');


$sql_2 = "SELECT DISTINCT khoa from sinhvien";
$data2 = mysqli_query($con_1, $sql_2);
$sql_3 = "SELECT DISTINCT khoahoc from sinhvien";
$data3 = mysqli_query($con_1, $sql_3);

$sql_4 = "SELECT Distinct * from diem";
$data4 = mysqli_query($con_1, $sql_4);
$sql_5 = "SELECT Distinct namhoc_hocki from hocphan";
$data5 = mysqli_query($con_1, $sql_5);

    // truy vấn hiện lên bảng
    if(isset($_POST['btxem'])){
        $hocki = $_POST['hocki'];
        $khoa = $_POST['ddkhoa'];
        $khoahoc = $_POST['ddkhoahoc'];
        $hocphan = $_POST['ddhocphan'];
        $lop = $_POST['ddlop'];
        // Truy vấn cơ sở dữ liệu dựa trên các lựa chọn
        $sql = "SELECT Distinct * FROM  hocphan, sinhvien
                WHERE 
                hocphan.namhoc_hocki = '$hocki'
                And sinhvien.lop ='$lop'
                and sinhvien.khoahoc = '$khoahoc'
               and sinhvien.khoa ='$khoa'
                and hocphan.tenhocphan = '$hocphan'
             
  AND hocphan.lop = sinhvien.lop;";
 
                
        $data1 = mysqli_query($con_1, $sql);
        if (mysqli_num_rows($data1) < 0) {
           
            echo "<script>alert('Không có dữ liệu!')</script>";
        
    }   }

    if (isset($_POST['btLuu'])) {
        // Lấy dữ liệu từ các ô input
        $masinhvien = $_POST['txtmasinhvien'];
        $mahocphan = $_POST['txtmahocphan'];
        $lanhoc = $_POST['txtlanhoc'];
        $diemGK = $_POST['txtdiemGK'];
        $chuyencan = $_POST['txtdiemchuyencan'];
        $ketthuc = $_POST['txtthiketthuc'];
        $diemthuchanh = $_POST['txtdiemthuchanh'];
    
        // Lặp qua từng sinh viên và lưu thông tin điểm vào cơ sở dữ liệu
        for ($i = 0; $i < count($masinhvien); $i++) {
            $masv = $masinhvien[$i];
            $mahp = $mahocphan[$i];
            $lan = $lanhoc[$i];
            $gk = $diemGK[$i];
            $cc = $chuyencan[$i];
            $kt = $ketthuc[$i];
            $th = $diemthuchanh[$i];
    
            // Tạo và thực hiện truy vấn chèn dữ liệu vào bảng diem
            $sql = "INSERT INTO diem (masinhvien, mahocphan, lanhoc, diemchuyencan, diemGK, diemthuchanh, thiketthuc) 
                    VALUES ('$masv', '$mahp', '$lan', '$cc', '$gk', '$th', '$kt')";
        
            $result = mysqli_query($con_1, $sql);
        
            if (!$result) {
                // Lưu thất bại, thông báo lỗi hoặc xử lý khác
                echo "<script>alert('Thêm mới thất bại!')</script>";
            }
        }
    
        // Lưu thành công, tiếp tục xử lý khác hoặc chuyển hướng đến trang khác
        header("location: nhapdiem.php");
        exit;
    }
mysqli_close($con_1);
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form method="post" action="http://localhost/do_an_diem/diemgv/nhapdiem">
    
    <div class="conten">
        <table class="table table-striped">
            <tr>
                <td colspan="7" style="text-align: left;">
                    <h2>Nhập Điểm Sinh Viên</h2>
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
                        </td> -->
                <!-- </tr> -->
            <tr>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Mã học phần</th>
                <th>Tên học phần</th>
                <th>Điểm chuyên cần</th>
                <th>Điểm giữa kì</th>
                <th>Điểm thực hành</th>
                <th>Thi kết thúc</th>
                
                
               
               
            </tr>
            
            <?php
                   


                    //b3: xử lý kết quả truy vấn(hiển thị mảng $data lên bảng)
                    if (isset($data['dulieu']) && $data['dulieu'] != null) {
                        $i = 0;
                        while ($row = mysqli_fetch_array($data['dulieu'])) {
                    ?>
                    <tr>
                            
                    <td> <input class="form-control" type="text" name="txtmasinhvien[]" value="<?php echo $row['masinhvien'] ?>"></td>
                    <td><?php echo $row['tensinhvien'] ?></td>
                    <td> <input class="form-control" type="text" name="txtmahocphan[]" value="<?php echo $row['mahocphan'] ?>"></td>
                    <td><?php echo $row['tenhocphan'] ?></td>
              
                    <td><input class="form-control" type="number" name="txtdiemchuyencan[]" value=""></td>
                    <td><input class="form-control" type="number" name="txtdiemGK[]" value=""></td>
                    <td><input class="form-control" type="number" name="txtdiemthuchanh[]" value=""></td>
                    <td><input class="form-control" type="number" name="txtthiketthuc[]" value=""></td>
                      
                       
                    </tr>
                   
                <?php
                }
            }
            // Kết thúc xử lý kết quả truy vấn
            ?>
             <tr>
                    <td>
                            <input type="submit" name ="btLuu" value="luu" >
                        </td>
                    </tr>
        </table>
    </div>
</form>

</body>
</html>