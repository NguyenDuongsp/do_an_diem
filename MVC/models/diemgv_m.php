<?php
class diem_sv_m extends ketnoiDB{




function ttgv($hocki,$lop,$khoahoc,$khoa,$hocphan){
    
        $sql = "SELECT Distinct * FROM  hocphan, diem, sinhvien
                WHERE 
                hocphan.namhoc_hocki = '$hocki'
                And sinhvien.lop ='$lop'
                and sinhvien.khoahoc = '$khoahoc'
               and sinhvien.khoa ='$khoa'
                and hocphan.tenhocphan = '$hocphan'
               and sinhvien.masinhvien = diem.masinhvien
  AND hocphan.mahocphan = diem.mahocphan;";
 
                
 return mysqli_query($this->con,$sql);
        
    }   }

?>