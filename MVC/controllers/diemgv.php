<?php
class diemgv extends controller
{
    protected $dgv;
    function __construct(){
        $this->dgv=$this->model('diemgv_m');
    }
        function Get_data(){
            
            $this->view("contac_gv",[
                'page'=>'diemgv_v',
                'tenhp' => '',
                'dcc' => '',
                'gk' => '',
                'tl' => '',
                'chp' => '',
                'lt' => '',
            
                
                
            ]);
        }
          function diemsinhvien_lop($malop){
            $dl = $this->dgv->diemsinhvien_lop($malop);
        $this->view("contac_gv", [
            'page' => 'diemgv_v',
            'tenhp' => '',
                'dcc' => '',
                'gk' => '',
                'tl' => '',
                'chp' => '',
                'lt' => '',
            'dulieu' => $dl
        ]);
        }
        function timkiem(){
            if(isset($_POST['btntimkiem'])){
                $msv=$_POST['txtmasinhvien'];
                $tsv=$_POST['txttensinhvien'];
                $dl=$this->dgv->sinhvien_timkiem($msv, $tsv);
                $this->view("contac", [
                    'page'=>'qlsinhvien',
                    'msv'=>$msv,
                    'tsv'=>$tsv,
                    'dulieu'=>$dl
                ]);
            }
           
        }
        function nhapdiem() {
            if (isset($_POST['btLuu'])) {
                $masinhvien = $_POST['txtmasinhvien'];
                $mahocphan = $_POST['txtmahocphan'];
                $diemGK = $_POST['txtdiemGK'];
                $chuyencan = $_POST['txtdiemchuyencan'];
                $ketthuc = $_POST['txtthiketthuc'];
                $diemthuchanh = $_POST['txtdiemthuchanh'];
    
                for ($i = 0; $i < count($masinhvien); $i++) {
                    $masv = $masinhvien[$i];
                    $mahp = $mahocphan[$i];
                    $gk = $diemGK[$i];
                    $dcc = $chuyencan[$i];
                    $chp = $ketthuc[$i];
                    $tl = $diemthuchanh[$i];
    
                    try {
                        $kq = $this->dgv->ttgv($masv, $mahp, $dcc, $gk, $tl, $chp);
    
                        if ($kq) {
                            echo "<script>alert('Thành công!')</script>";
                            echo "<script>window.location.href='./dssinhvien.php'</script>";
                        }
                    } catch (Exception $e) {
                        $errorMessage = $e->getMessage();
                        echo "<script>alert('$errorMessage'); window.history.back();</script>";
                    }
                }
            }
        }
    
}
?>
