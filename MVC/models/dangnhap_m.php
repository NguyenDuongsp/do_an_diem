<?php
class dangnhap_m extends ketnoiDB {
    function login($tk, $mk) {
        $sql = "SELECT tensinhvien,tengiangvien,quyen, taikhoan, taikhoansv, matkhau 
                FROM taikhoan tk left join sinhvien sv
                                on tk.taikhoansv = sv.masinhvien
                                left join giangvien gv
                                on tk.taikhoan = gv.magiangvien 
                WHERE (taikhoansv ='$tk'or taikhoan ='$tk') AND matkhau = '$mk'";
       $result = mysqli_query($this->con, $sql);

       if ($result && mysqli_num_rows($result) > 0) {
           $userData = mysqli_fetch_assoc($result);
           return $userData;
       } else {
           return false;
       }
    }
    
}
?>
