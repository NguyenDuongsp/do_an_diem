<?php
class dieukhien extends Controller {
    protected $dk;

    function __construct() {
        $this->dk = $this->model('dieukhien_m');
    }

    function Get_data() {
        $this->view("contac", [
            "page" => "dieukhien",
            "hoadon" => $this->dk->getCountSoHoaDon(),
            "sanpham" => $this->dk->getCountSanPham(),
            "nhanvien" => $this->dk->getCountNhanVien(),
            "khachhang" => $this->dk->getCountKhachHang(),
            "MaHoaDon" => "",
            "MaSanPham" => "",
            "SDT" => ""
        ]);
    }
    
}


?>