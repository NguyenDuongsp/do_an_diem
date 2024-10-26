<?php
class lophoc_xoa extends controller {
    protected $lh;

    function __construct() {
        $this->lh = $this->model('lophoc');
    }

    function Get_data() {
        $malop = $_GET['malop'];
        
        // Xóa lớp học dựa trên mã lớp
        $result = $this->lh->lophoc_del($malop);
        
        if ($result) {
            echo "<script>alert('Xóa lớp học thành công!')</script>";
        } else {
            echo "<script>alert('Xóa lớp học thất bại!')</script>";
        }
        
        // Chuyển hướng về trang quản lý lớp học
        header("Location: http://localhost/do_an_diem\MVC\core\app.php");
    }
}
?>