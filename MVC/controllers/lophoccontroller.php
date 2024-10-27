<?php
class lophoccontroller extends controller
{
    protected $lophocModel;

    function __construct(){
        $this->lophocModel = $this->model('lophocmodel');
    }

    function Get_data(){
        $this->view("contac_gv", [
            'page' => 'lophocview_giaovien',
            'malop' => '',
            'mahocphan' => '',
            'dulieu' => $this->lophocModel->lophoc_quygiangvien($_SESSION['ma']),
            //'mahp' => $this->lophocModel->getHocPhanList()
        ]);
    }
    function Get_data_admin(){
        $this->view("contac", [
            'page' => 'lophocview',
            'malop' => '',
            'mahocphan' => '',
            'dulieu' => $this->lophocModel->lophoc_all(),
            // 'mahocphan_hp' => '',
            'mahp' => $this->lophocModel->getHocPhanList()
        ]);
    }

    //đây là sinh viên lấy dữ liệu lớp học
    function Get_data_sv(){
        $this->view("sv_contact", [
            'page' => 'lophoc_svview',
            'malop' => '',
            'mahocphan' => '',
            'tenhocphan' => '',
            'dulieu' => $this->lophocModel->lophoc_quysinhvien($_SESSION['ma'])
           // 'mahp' => $this->lophocModel->getHocPhanList()
        ]);
    }

    function Get_data1($magiaovien) {
        $this->view('contac', [
            'page' => 'lophocview',
            'dulieu' => $this->lophocModel->lophoc_quygiangvien($magiaovien),
            'malop' => '',
            'mahocphan' => ''
        ]);
    }

    //quy lan fix
    // function getdataquy1(){
    //     if (isset($_POST['btntimkiem'])) {
    //         $malop = $_POST['txtmalop'];
    //         $mahocphan = $_POST['txtmahocphan'];
    //         $dl = $this->lophocModel->lophoc_timkiem($malop, $mahocphan);
    //         $this->view("contac", [
    //             'page' => 'lophocview',
    //             'malop' => $malop,
    //             'mahocphan' => $mahocphan,
    //             'dulieu' => $dl
    //         ]);
    //     }
    // }

    // den day

    function timkiem(){
        if (isset($_POST['btntimkiem'])) {
            $malop = $_POST['txtmalop'];
            $mahocphan = $_POST['txtmahocphan'];
            $dl = $this->lophocModel->lophoc_timkiem($malop, $mahocphan);
            $this->view("contac_gv", [
                'page' => 'lophocview',
                'malop' => $malop,
                'mahocphan' => $mahocphan,
                'dulieu' => $dl
            ]);
        }
    }
    //xoá gian
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

        $dl = $this->lophocModel->lophoc_timkiem($malop,'');
        $this->view("contac", [
            'page' => 'lophocview_sua',
            'dulieu' => $dl
        ]);
    }


    // function sua($malop){
    //     $dl=$this->dssv->sinhvien_timkiem($malop, '');
    //     $this->view("contac",[
    //         'page'=>'sinhvien_sua',
    //         'dulieu'=>$dl
    //     ]);
    // }


    //đây là thêm mới

    function themmoi(){
        if (isset($_POST['btnluu'])) {
            $malop = $_POST['txtmalop'];
            $mahocphan = $_POST['txtmahocphan'];
            // $tenhocphan = $_POST['txttenhocphan'];

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
// sửa ở đây nữa


            $this->view("sv_contact", [
                'page' => 'lophoc_themmoi',
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