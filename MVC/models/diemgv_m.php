<?php
class diem_sv_m extends ketnoiDB{


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
        $sql = "SELECT Distinct * FROM  hocphan, diem, sinhvien
                WHERE 
                hocphan.namhoc_hocki = '$hocki'
                And sinhvien.lop ='$lop'
                and sinhvien.khoahoc = '$khoahoc'
               and sinhvien.khoa ='$khoa'
                and hocphan.tenhocphan = '$hocphan'
               and sinhvien.masinhvien = diem.masinhvien
  AND hocphan.mahocphan = diem.mahocphan;";
 
                
        $data1 = mysqli_query($con_1, $sql);
        if (mysqli_num_rows($data1) < 0) {
           
            echo "<script>alert('Không có dữ liệu!')</script>";
        
    }   }
}
?>