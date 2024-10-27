<?php
class dssinhvien extends controller
{
    protected $dssv;
    function __construct(){
        $this->dssv=$this->model('sinhvien');
    }
        function Get_data(){
            $this->view("contac",[
                'page'=>'qlsinhvien',
                'msv'=>'',
                'tsv'=>'',
                'ns'=>'',
                'gt'=>'',
                'dc'=>'',
                'em'=>'',
                'sdt'=>'',
                'mk'=>'',
                'kh'=>'',
                'dulieu'=>$this->dssv->sinhvien_timkiem('',''),
                'khoa'=> $this->dssv->makhoa()
            ]);
        }
        
        function timkiem(){
            if(isset($_POST['btntimkiem'])){
                $msv=$_POST['txtmasinhvien'];
                $tsv=$_POST['txttensinhvien'];
                $dl=$this->dssv->sinhvien_timkiem($msv, $tsv);
                $this->view("contac", [
                    'page'=>'qlsinhvien',
                    'msv'=>$msv,
                    'tsv'=>$tsv,
                    'dulieu'=>$dl
                ]);
            }
           
        }
        function xoa($msv){
            $kq=$this->dssv->sinhvien_del($msv);
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
                'dulieu'=>$this->dssv->sinhvien_timkiem('','')
            ]);
        }

        function xem($mk){
            $dl=$this->dssv->sinhvien_timkiem($mk, '');
            $this->view("contac",[
                'page'=>'qlssinhvien',
                'dulieu'=>$dl
            ]);
        }

        function sua($msv){
            $dl=$this->dssv->sinhvien_timkiem($msv, '');
            $this->view("contac",[
                'page'=>'sinhvien_sua',
                'dulieu'=>$dl
            ]);
        }
        function themmoi(){
            $this->view("contac",[
                'page'=>'qlsinhvien',
                        
                        'khoa'=> $this->dssv->makhoa()
                    ]);
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
            $tm=$this->dssv->checktrungmasv($msv);
            
            if($tm){
                echo "<script>alert('Ma sinh vien da ton tai!')</script>";
            }
            else{
                $kq=$this->dssv->sinhvien_ins($msv, $tsv, $ns,$gt, $dc, $email,$sdt, $mk, $kh);
                if($kq){
                    echo "<script>alert('Them moi thanh cong!')</script>";
                    echo "<script>window.location.href='./dssinhvien.php'</script>";
                }
                        else {
                            echo "<script>alert('Them moi that bai!')</script>";
                        }
            }
            
                    
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
                $kq=$this->dssv->sinhvien_upd($msv, $tsv, $ns,$gt, $dc, $email,$sdt, $mk, $kh);
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
                    'dulieu'=>$this->dssv->sinhvien_timkiem('','')
                ]);
            }
        }
}
?>
