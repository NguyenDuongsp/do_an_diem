<?php
class sinhvien extends ketnoiDB{
    function sinhvien_ins($msv, $tsv, $ns,$gt, $dc, $em,$sdt, $mk, $kh){
        $sql ="INSERT INTO  sinhvien(masinhvien,tensinhvien,ngaysinh,gioitinh,diachi,email,sdt,makhoa,khoahoc) VALUE('$msv','$tsv','$ns','$gt','$dc','$em','$sdt','$mk','$kh')";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien_all(){
        $sql="SELECT * FROM sinhvien";
        return mysqli_query($this->con,$sql);
        
    }
    function checktrungmasv($msv){
        $sql="SELECT* FROM sinhvien WHERE masinhvien= '$msv'";
        $data=mysqli_query($this ->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
    function sinhvien_timkiem($msv, $tsv)
    {
        $sql="SELECT * FROM sinhvien WHERE masinhvien like '%$msv%' AND tensinhvien like '%$tsv%'";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien_del($msv){
        $sql="DELETE FROM sinhvien WHERE masinhvien='$msv'";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien_upd($msv, $tsv, $ns,$gt, $dc, $em,$sdt, $mk, $kh){
        $sql="UPDATE sinhvien SET tensinhvien='$tsv', ngaysinh='$ns', gioitinh='$gt',diachi='$dc', email='$em', sdt = '$sdt', makhoa = '$mk',khoahoc = '$kh' WHERE masinhvien='$msv'";
        return mysqli_query($this->con,$sql);
    }
    function sinhvien1($msv){
        $sql="SELECT  * FROM sinhvien WHERE masinhvien='$msv'";
        return mysqli_query($this->con, $sql);
    }
}
?>