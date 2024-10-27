<?php
class diemgv_m extends ketnoiDB{




  function ttgv($masv, $mahocphan, $dcc, $gk, $tl, $chp){
    // Thực hiện truy vấn SQL để cập nhật điểm
    $sql = "UPDATE diem
            SET diemchuyncan = '$dcc', giuaki = '$gk', thaoluan = '$tl', cuoihocphan = '$chp'
            WHERE masv = '$masv' AND mahocphan = '$mahocphan'";

    try {
        $result = mysqli_query($this->con, $sql);

        if (!$result) {
            // Xử lý lỗi khi truy vấn không thành công
            throw new Exception("Lỗi khi cập nhật điểm: " . mysqli_error($this->con));
        }

        return true; // Trả về true nếu cập nhật thành công
    } catch (mysqli_sql_exception $e) {
        if (strpos($e->getMessage(), 'Giá trị không được vượt quá 10 và nhỏ hơn 0') !== false) {
            throw new Exception("Lỗi: Giá trị không được vượt quá 10 và nhỏ hơn 0!");
        } else {
            throw $e; // Ném exception khác nếu không phải lỗi vượt quá giới hạn
        }
    }
}
    function diemsinhvien_lop($ml){
        $sql="SELECT masinhvien,tensinhvien,tenhocphan,diemchuyncan,giuaki,thaoluan,cuoihocphan,lanthi,namhoc,hocky,hp.mahocphan
                FROM diem d join hocphan hp on d.mahocphan = hp.mahocphan
                            join lophoc lh on lh.mahocphan = hp.mahocphan
                            join sinhvien sv on sv.masinhvien = d.masv
                            join phanconggiaovien pc on pc.malop = lh.malop where lh.malop ='$ml'";
        return mysqli_query($this->con,$sql);
    }
    

  }

?>