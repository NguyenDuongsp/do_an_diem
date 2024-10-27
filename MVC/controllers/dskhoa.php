<?php

class dskhoa extends controller
{
    protected $dskhoa;
    function __construct(){
        $this->dskhoa=$this->model('khoa');
    }
        function Get_data(){
            $this->view("contac",[
                'page'=>'qlkhoa',
                'mk'=>'',
                'tk'=>'',
                'dulieu'=>$this->dskhoa->khoa_timkiem('','')
            ]);
        }
      
        function timkiem(){
            if(isset($_POST['btntimkiem'])){
                $mk=$_POST['txtmakhoa'];
                $tk=$_POST['txttenkhoa'];
                $dl=$this->dskhoa->khoa_timkiem($mk, $tk);
                $this->view("contac", [
                    'page'=>'qlkhoa',
                    'mk'=>$mk,
                    'tk'=>$tk,
                    'dulieu'=>$dl
                ]);
            }
           
        }
        function xoa($mk){
            $kq=$this->dskhoa->khoa_del($mk);
            if($kq){
                echo "<script>alert('Xoa thanh cong!')</script>";
            }
            else{
                echo "<script>alert('Xoa that bai!')</script>";
            }
            $this->view("contac", [
                'page'=>'qlkhoa',
                'mk'=>'',
                'tk'=>'',
                'dulieu'=>$this->dskhoa->khoa_timkiem('','')
            ]);
        }
        function sua($mk){
            $dl=$this->dskhoa->khoa_timkiem($mk, '');
            $this->view("contac",[
                'page'=>'khoa_sua',
                'dulieu'=>$dl
            ]);
        }
        function themmoi(){
            if(isset($_POST['btnluu']))
        {
            $mk = $_POST['txtmakhoa'];
                $tk = $_POST['txttenkhoa'];
            $tm=$this->dskhoa->checktrungmakhoa($mk);
            if($tm){
                echo "<script>alert('Ma khoa da ton tai!')</script>";
            }
            else{
                $kq=$this->dskhoa->khoa_ins($mk, $tk);
                if($kq){
                    echo "<script>alert('Them moi thanh cong!')</script>";
                    echo "<script>window.location.href='./dskhoa.php'</script>";
                }
                        else {
                            echo "<script>alert('Them moi that bai!')</script>";
                        }
            }
            
                    $this->view("contac", [
                        'page'=>'qlkhoa',
                        'mk'=>$mk,
                        'tk'=>$tk
                    ]);
        }
    }
        function sua_dl(){
         if(isset($_POST['btnluu']))
            {
                $mk = $_POST['txtmakhoa'];
                $tk = $_POST['txttenkhoa'];
                $kq=$this->dskhoa->khoa_upd($mk, $tk);
                if($kq){
                    echo "<script>alert('Sua thanh cong!')</script>";
                }
                else{
                    echo "<script>alert('Sua that bai!')</script>";
                }
                $this->view("contac", [
                    'page'=>'qlkhoa',
                    'mk'=>'',
                    'tk'=>'',
                    'dulieu'=>$this->dskhoa->khoa_timkiem('','')
                ]);
            }
        }
}
?>
