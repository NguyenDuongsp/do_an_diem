<?php
class diem_sv_m extends ketnoiDB{
    function diemsinhvien_ins($msv,$mhp, $dcc, $gk,$tl, $chp, $lt){
        $sql ="INSERT INTO  diem(masinhvien,mahocphan,diemchuyencan,giuaki,thaoluan,cuoihocphan,lanthi) VALUE('$msv','$mhp', '$dcc', '$gk','$tl', '$chp', '$lt')";
        return mysqli_query($this->con, $sql);
    }
    function diemsinhvien_all($msv){
        $sql="SELECT tenhocphan,diemchuyncan,giuaki,thaoluan,cuoihocphan,lanthi,namhoc,hocky 
                FROM diem d join hocphan hp on d.mahocphan = hp.mahocphan
                            join lophoc lh on lh.mahocphan = hp.mahocphan
                            join phanconggiaovien pc on pc.malop = lh.malop where masv ='$msv'";
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
}
?>