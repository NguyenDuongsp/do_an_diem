<?php
class diem_sv_m extends ketnoiDB{




function ttgv($mgv){
    
        $sql = "SELECT tenhocphan,malop,namhoc,hocky FROM  lophoc lh join hocphan hp on lh.mahocphan = hp.mahocphan
                                                                     join phanconggiangvien pc on pc.malop=lp.malop
                WHERE 
                mangiangvien = $mgv
  AND hocphan.mahocphan = diem.mahocphan;";
 
                
 return mysqli_query($this->con,$sql);
        
    }   }

?>