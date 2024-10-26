<?php
class dshocphan extends controller
{
    protected $dshp;
    function __construct(){
        $this->dshp=$this->model('hocphan');
    }
        function Get_data(){
            $this->view("contac",[
                'page'=>'qlhocphan',
                'mhp'=>'',
                'thp'=>'',
                'tin'=>'',
                'dulieu'=>$this->dshp->hocphan_timkiem('','')
            ]);
        }
        function Get_data1(){
            $this->view('contac',[
                'page'=>'qlhocphan',
                'dulieu'=>$this->dshp->hocphan_all(),
                'mhp'=>'',
                'thp'=>'',
                'tin'=>''
            ]);
        }
        function timkiem(){
            if(isset($_POST['btntimkiem'])){
                $mhp=$_POST['txtmahocphan'];
                $thp=$_POST['txttenhocphan'];
                $dl=$this->dshp->hocphan_timkiem($mhp, $thp);
                $this->view("contac", [
                    'page'=>'qlhocphan',
                    'mhp'=>$mhp,
                    'thp'=>$thp,
                    'dulieu'=>$dl
                ]);
            }
           
        }
        function xoa($mhp){
            $kq=$this->dshp->hocphan_del($mhp);
            if($kq){
                echo "<script>alert('Xoa thanh cong!')</script>";
            }
            else{
                echo "<script>alert('Xoa that bai!')</script>";
            }
            $this->view("contac", [
                'page'=>'qlhocphan',
                'mhp'=>'',
                'thp'=>'',
                'dulieu'=>$this->dshp->hocphan_timkiem('','')
            ]);
        }
        function sua($mhp){
            $dl=$this->dshp->hocphan_timkiem($mhp, '');
            $this->view("contac",[
                'page'=>'hocphan_sua',
                'dulieu'=>$dl
            ]);
        }
        function themmoi(){
            if(isset($_POST['btnluu']))
        {
                $mhp = $_POST['txtmahocphan'];
                $thp = $_POST['txttenhocphan'];
                $tin = $_POST['txttinchi'];
                $tm=$this->dshp->checktrungmahp($mhp);
            if($tm){
                echo "<script>alert('Ma hoc phan da ton tai!')</script>";
            }
            else{
                $kq=$this->dshp->hocphan_ins($mhp, $thp, $tin);
                if($kq){
                    echo "<script>alert('Them moi thanh cong!')</script>";
                    echo "<script>window.location.href='./dshocphan.php'</script>";
                }
                        else {
                            echo "<script>alert('Them moi that bai!')</script>";
                        }
            }
            
                    $this->view("contac", [
                        'page'=>'qlhocphan',
                        'mhp'=>$mhp,
                        'thp'=>$thp,
                        'tin'=>$tin
                    ]);
        }
    }
        function sua_dl(){
         if(isset($_POST['btnluu']))
            {
                $mhp = $_POST['txtmahocphan'];
                $thp = $_POST['txttenhocphan'];
                $tin = $_POST['txttinchi'];
                $kq=$this->dshp->hocphan_upd($mhp, $thp, $tin);
                if($kq){
                    echo "<script>alert('Sua thanh cong!')</script>";
                }
                else{
                    echo "<script>alert('Sua that bai!')</script>";
                }
                $this->view("contac", [
                    'page'=>'qlhocphan',
                    'mhp'=>'',
                    'thp'=>'',
                    'dulieu'=>$this->dshp->hocphan_timkiem('','')
                ]);
            }
        }
}
?>
