<?php
class sinhvien extends ketnoiDB
{
    function sinhvien_ins($msv, $tsv, $ns, $gt, $dc, $em, $sdt, $mk, $kh)
    {
        $sql = "INSERT INTO  sinhvien(masinhvien,tensinhvien,ngaysinh,gioitinh,diachi,email,sdt,makhoa,khoahoc) VALUE('$msv','$tsv','$ns','$gt','$dc','$em','$sdt','$mk','$kh')";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien_all()
    {
        $sql = "SELECT * FROM sinhvien";
        return mysqli_query($this->con, $sql);
    }
    function checktrungmasv($msv)
    {
        $sql = "SELECT* FROM sinhvien WHERE masinhvien= '$msv'";
        $data = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($data) > 0) {
            $kq = true;
        }
        return $kq;
    }
    function makhoa()
    {
        // Truy vấn để lấy ra mã khoa từ bảng khoa
        $sql = "SELECT makhoa FROM khoa";
        return mysqli_query($this->con, $sql);
    }
    function sv_lop($malop)
    {
        // Truy vấn để lấy ra mã khoa từ bảng khoa
        $sql = "SELECT * FROM sinhvien sv join diem d on sv.masinhvien = d.masv
                                        join hocphan hp on hp.mahocphan = d.mahocphan
                                        join lophoc l on l.mahocphan = hp.mahocphan where l.malop = '$malop'";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien_xem()
    {
        if (isset($_POST['btnxem'])) {
            $makhoa = $_POST['makhoa'];
            // Thực hiện truy vấn để lấy danh sách sinh viên của khoa
            $sql = "SELECT * FROM sinhvien WHERE makhoa = '$makhoa'";
            $result = mysqli_query($this->con, $sql);

            $sinhvienList = array();

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $sinhvienList[] = $row;
                }
            }

           
           
        }
    }
    function sinhvien_timkiem($msv, $tsv)
    {
        $sql = "SELECT * FROM sinhvien WHERE masinhvien like '%$msv%' AND tensinhvien like '%$tsv%'";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien_del($msv)
    {
        $sql = "DELETE FROM sinhvien WHERE masinhvien='$msv'";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien_upd($msv, $tsv, $ns, $gt, $dc, $em, $sdt, $mk, $kh)
    {
        $sql = "UPDATE sinhvien SET tensinhvien='$tsv', ngaysinh='$ns', gioitinh='$gt',diachi='$dc', email='$em', sdt = '$sdt', makhoa = '$mk',khoahoc = '$kh' WHERE masinhvien='$msv'";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien1($msv)
    {
        $sql = "SELECT  * FROM sinhvien WHERE masinhvien='$msv'";
        return mysqli_query($this->con, $sql);
    }
}
