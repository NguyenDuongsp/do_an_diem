<?php
class giangvien extends ketnoiDB {
    function giangvien_ins($mgv, $tgv, $ns, $gt, $dc, $em, $sdt, $nbd) {
        $sql = "INSERT INTO giangvien(magiangvien, tengiangvien, ngaysinh, gioitinh, diachi, email, sdt, ngaybatdau) VALUES ('$mgv', '$tgv', '$ns', '$gt', '$dc', '$em', '$sdt', '$nbd')";
        return mysqli_query($this->con, $sql);
    }
    
    function giangvien_all() {
        $sql = "SELECT * FROM giangvien";
        return mysqli_query($this->con, $sql);
    }
    
    function checktrungmagv($mgv) {
        $sql = "SELECT * FROM giangvien WHERE magiangvien = '$mgv'";
        $data = mysqli_query($this->con, $sql);
        return mysqli_num_rows($data) > 0;
    }
    
    function giangvien_timkiem($mgv, $tgv) {
        $sql = "SELECT * FROM giangvien WHERE magiangvien LIKE '%$mgv%' AND tengiangvien LIKE '%$tgv%'";
        return mysqli_query($this->con, $sql);
    }
    
    function giangvien_del($mgv) {
        $sql = "DELETE FROM giangvien WHERE magiangvien = '$mgv'";
        return mysqli_query($this->con, $sql);
    }
    
    function giangvien_upd($mgv, $tgv, $ns, $gt, $dc, $em, $sdt, $nbd) {
        $sql = "UPDATE giangvien SET tengiangvien = '$tgv', ngaysinh = '$ns', gioitinh = '$gt', diachi = '$dc', email = '$em', sdt = '$sdt', ngaybatdau = '$nbd' WHERE magiangvien = '$mgv'";
        return mysqli_query($this->con, $sql);
    }

    function giangvien1($msv){
        $sql="SELECT  * FROM giangvien WHERE magiangvien='$mgv'";
        return mysqli_query($this->con, $sql);
    }

}
?>
