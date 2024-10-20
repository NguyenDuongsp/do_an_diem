<?php
class dieukhien_m extends ketnoiDB {
    

   

    public function getCountSoHoaDon() {
        $sql = "SELECT COUNT(DISTINCT MaHoaDon) AS count FROM hoadon";
        return mysqli_query($this->con,$sql);
    }

    public function getCountSanPham() {
        $currentDate = date('Y-m-d');
        $sql = "SELECT COUNT(DISTINCT MaSanPham) AS count FROM sanpham WHERE HanSuDung > '$currentDate'";
        return mysqli_query($this->con,$sql);
    }

    public function getCountNhanVien() {
        $sql = "SELECT COUNT(DISTINCT SDT) AS count FROM nhanvien";
        return mysqli_query($this->con,$sql);
    }

    public function getCountKhachHang() {
        $sql = "SELECT COUNT(DISTINCT SDT) AS count FROM khachhang";
        return mysqli_query($this->con,$sql);
    }
}
?>