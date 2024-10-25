<?php
class dsgiangvien extends controller
{
    protected $dsgv;

    function __construct(){
        $this->dsgv = $this->model('giangvien');
    }

    function Get_data(){
        $this->view("contac", [
            'page' => 'qlgiangvien',
            'mgv' => '',
            'tgv' => '',
            'ns' => '',
            'gt' => '',
            'dc' => '',
            'em' => '',
            'sdt' => '',
            'nbd' => '',
            'dulieu' => $this->dsgv->giangvien_timkiem('', '')
        ]);
    }

    function Get_data1(){
        $this->view('contac', [
            'page' => 'qlgiangvien',
            'dulieu' => $this->dsgv->giangvien_all(),
            'mgv' => '',
            'tgv' => '',
            'ns' => '',
            'gt' => '',
            'dc' => '',
            'em' => '',
            'sdt' => '',
            'nbd' => ''
        ]);
    }

    function timkiem(){
        if (isset($_POST['btntimkiem'])) {
            $mgv = $_POST['txtmagiangvien'];
            $tgv = $_POST['txttengiangvien'];
            $dl = $this->dsgv->giangvien_timkiem($mgv, $tgv);
            $this->view("contac", [
                'page' => 'qlgiangvien',
                'mgv' => $mgv,
                'tgv' => $tgv,
                'dulieu' => $dl
            ]);
        }
    }

    function xoa($mgv){
        $kq = $this->dsgv->giangvien_del($mgv);
        if ($kq) {
            echo "<script>alert('Xoa thanh cong!')</script>";
        } else {
            echo "<script>alert('Xoa that bai!')</script>";
        }
        $this->view("contac", [
            'page' => 'qlgiangvien',
            'mgv' => '',
            'tgv' => '',
            'dulieu' => $this->dsgv->giangvien_timkiem('', '')
        ]);
    }

    function sua($mgv){
        $dl = $this->dsgv->giangvien_timkiem($mgv, '');
        $this->view("contac", [
            'page' => 'giangvien_sua',
            'dulieu' => $dl
        ]);
    }

    function themmoi(){
        if (isset($_POST['btnluu'])) {
            $mgv = $_POST['txtmagiangvien'];
            $tgv = $_POST['txttengiangvien'];
            $ns = $_POST['txtngaysinh'];
            $gt = $_POST['txtgioitinh'];
            $dc = $_POST['txtdiachi'];
            $email = $_POST['txtemail'];
            $sdt = $_POST['txtsdt'];
            $nbd = $_POST['txtngaybatdau'];

            $tm = $this->dsgv->checktrungmagv($mgv);
            if ($tm) {
                echo "<script>alert('Ma giang vien da ton tai!')</script>";
            } else {
                $kq = $this->dsgv->giangvien_ins($mgv, $tgv, $ns, $gt, $dc, $email, $sdt, $nbd);
                if ($kq) {
                    echo "<script>alert('Them moi thanh cong!')</script>";
                    echo "<script>window.location.href='./dsgiangvien.php'</script>";
                } else {
                    echo "<script>alert('Them moi that bai!')</script>";
                }
            }
            $this->view("contac", [
                'page' => 'qlgiangvien',
                'mgv' => $mgv,
                'tgv' => $tgv,
                'ns' => $ns,
                'gt' => $gt,
                'dc' => $dc,
                'em' => $email,
                'sdt' => $sdt,
                'nbd' => $nbd
            ]);
        }
    }

    function sua_dl(){
        if (isset($_POST['btnluu'])) {
            $mgv = $_POST['txtmagiangvien'];
            $tgv = $_POST['txttengiangvien'];
            $ns = $_POST['txtngaysinh'];
            $gt = $_POST['txtgioitinh'];
            $dc = $_POST['txtdiachi'];
            $email = $_POST['txtemail'];
            $sdt = $_POST['txtsdt'];
            $nbd = $_POST['txtngaybatdau'];

            $kq = $this->dsgv->giangvien_upd($mgv, $tgv, $ns, $gt, $dc, $email, $sdt, $nbd);
            if ($kq) {
                echo "<script>alert('Sua thanh cong!')</script>";
            } else {
                echo "<script>alert('Sua that bai!')</script>";
            }
            $this->view("contac", [
                'page' => 'qlgiangvien',
                'mgv' => '',
                'tgv' => '',
                'dulieu' => $this->dsgv->giangvien_timkiem('', '')
            ]);
        }
    }
}
?>
