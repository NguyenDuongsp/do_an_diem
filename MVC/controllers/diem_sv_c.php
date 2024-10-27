<?php
class diem_sv_c extends controller
{
    protected $dsv;
    function __construct(){
        $this->dsv=$this->model('diem_sv_m');
    }
        
    function Get_data(){
            
        $this->view("sv_contact",[
            'page'=>'diem_sv',
            'tenhp' => '',
            'dcc' => '',
            'gk' => '',
            'tl' => '',
            'chp' => '',
            'lt' => '',
            'dulieu' => $this->dsv->diemsinhvien_all($_SESSION['ma'])
            
            
        ]);
    }
        function timkiem(){
            if(isset($_POST['btntimkiem'])){
                $msv=$_POST['txtmasinhvien'];
                $tsv=$_POST['txttensinhvien'];
                $dl=$this->dsv->sinhvien_timkiem($msv, $tsv);
                $this->view("contac", [
                    'page'=>'qlsinhvien',
                    'msv'=>$msv,
                    'tsv'=>$tsv,
                    'dulieu'=>$dl
                ]);
            }
           
        }
        function xoa($msv){
            $kq=$this->dsv->sinhvien_del($msv);
            if($kq){
                echo "<script>alert('Xoa thanh cong!')</script>";
            }
            else{
                echo "<script>alert('Xoa that bai!')</script>";
            }
            $this->view("contac", [
                'page'=>'qlsinhvien',
                'msv'=>'',
                'tsv'=>'',
                'dulieu'=>$this->dsv->sinhvien_timkiem('','')
            ]);
        }
        function sua($msv){
            $dl=$this->dsv->sinhvien_timkiem($msv, '');
            $this->view("contac",[
                'page'=>'sinhvien_sua',
                'dulieu'=>$dl
            ]);
        }
        function themmoi(){
            if(isset($_POST['btnluu']))
        {
            $msv = $_POST['txtmasinhvien'];
                $tsv = $_POST['txttensinhvien'];
                $ns = $_POST['txtngaysinh'];
                $gt = $_POST['txtgioitinh'];
                $dc = $_POST['txtdiachi'];
                $email = $_POST['txtemail'];
                $sdt = $_POST['txtsdt'];
                $mk = $_POST['txtmakhoa'];
                $kh = $_POST['txtkhoahoc'];
            $tm=$this->dsv->checktrungmasv($msv);
            if($tm){
                echo "<script>alert('Ma sinh vien da ton tai!')</script>";
            }
            else{
                $kq=$this->dsv->sinhvien_ins($msv, $tsv, $ns,$gt, $dc, $email,$sdt, $mk, $kh);
                if($kq){
                    echo "<script>alert('Them moi thanh cong!')</script>";
                    echo "<script>window.location.href='./dssinhvien.php'</script>";
                }
                        else {
                            echo "<script>alert('Them moi that bai!')</script>";
                        }
            }
            
                    $this->view("contac", [
                        'page'=>'qlsinhvien',
                        'msv'=>$msv,
                        'tsv'=>$tsv,
                        'ns'=>$ns,
                        'gt'=>$gt,
                        'dc'=>$dc,
                        'em'=>$email,
                        'sdt'=>$sdt,
                        'mk'=>$mk,
                        'kh'=>$kh
                    ]);
        }
    }
        function sua_dl(){
         if(isset($_POST['btnluu']))
            {
                $msv = $_POST['txtmasinhvien'];
                $tsv = $_POST['txttensinhvien'];
                $ns = $_POST['txtngaysinh'];
                $gt = $_POST['txtgioitinh'];
                $dc = $_POST['txtdiachi'];
                $email = $_POST['txtemail'];
                $sdt = $_POST['txtsdt'];
                $mk = $_POST['txtmakhoa'];
                $kh = $_POST['txtkhoahoc'];
                $kq=$this->dsv->sinhvien_upd($msv, $tsv, $ns,$gt, $dc, $email,$sdt, $mk, $kh);
                if($kq){
                    echo "<script>alert('Sua thanh cong!')</script>";
                }
                else{
                    echo "<script>alert('Sua thanh cong!')</script>";
                }
                $this->view("contac", [
                    'page'=>'qlsinhvien',
                    'msv'=>'',
                    'tsv'=>'',
                    'dulieu'=>$this->dsv->sinhvien_timkiem('','')
                ]);
            }
        }
}
?>
