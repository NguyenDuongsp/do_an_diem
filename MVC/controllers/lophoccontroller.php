<?php
class lophoccontroller extends controller
{
    protected $lophocModel;

    function __construct(){
        $this->lophocModel = $this->model('lophocmodel');
    }

    function Get_data(){
        $this->view("contac", [
            'page' => 'lophocview',
            'malop' => '',
            'mahocphan' => '',
            'dulieu' => $this->lophocModel->lophoc_timkiem('', '')
        ]);
    }

    function Get_data1(){
        $this->view('contac', [
            'page' => 'lophocview',
            'dulieu' => $this->lophocModel->lophoc_all(),
            'malop' => '',
            'mahocphan' => ''
        ]);
    }

    function timkiem(){
        if (isset($_POST['btntimkiem'])) {
            $malop = $_POST['txtmalop'];
            $mahocphan = $_POST['txtmahocphan'];
            $dl = $this->lophocModel->lophoc_timkiem($malop, $mahocphan);
            $this->view("contac", [
                'page' => 'lophocview',
                'malop' => $malop,
                'mahocphan' => $mahocphan,
                'dulieu' => $dl
            ]);
        }
    }

    function xoa($malop){
        $kq = $this->lophocModel->lophoc_del($malop);
        if ($kq) {
            echo "<script>alert('Xóa thành công!')</script>";
        } else {
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        $this->view("contac", [
            'page' => 'lophocview',
            'malop' => '',
            'mahocphan' => '',
            'dulieu' => $this->lophocModel->lophoc_timkiem('', '')
        ]);
    }

    function sua($malop){
        $dl = $this->lophocModel->lophoc_timkiem($malop, '');
        $this->view("contac", [
            'page' => 'lophocview_sua',
            'dulieu' => $dl
        ]);
    }

    function themmoi(){
        if (isset($_POST['btnluu'])) {
            $malop = $_POST['txtmalop'];
            $mahocphan = $_POST['txtmahocphan'];

            $tm = $this->lophocModel->checktrungmalop($malop);
            if ($tm) {
                echo "<script>alert('Mã lớp đã tồn tại!')</script>";
            } else {
                $kq = $this->lophocModel->lophoc_ins($malop, $mahocphan);
                if ($kq) {
                    echo "<script>alert('Thêm mới thành công!')</script>";
                } else {
                    echo "<script>alert('Thêm mới thất bại!')</script>";
                }
            }

            $this->view("contac", [
                'page' => 'lophocview',
                'malop' => $malop,
                'mahocphan' => $mahocphan
            ]);
        }
    }

    function sua_dl(){
        if (isset($_POST['btnluu'])) {
            $malop = $_POST['txtmalop'];
            $mahocphan = $_POST['txtmahocphan'];
            $kq = $this->lophocModel->lophoc_upd($malop, $mahocphan);
            if ($kq) {
                echo "<script>alert('Sửa thành công!')</script>";
            } else {
                echo "<script>alert('Sửa thất bại!')</script>";
            }
            $this->view("contac", [
                'page' => 'lophocview',
                'malop' => '',
                'mahocphan' => '',
                'dulieu' => $this->lophocModel->lophoc_timkiem('', '')
            ]);
        }
    }
}
?>