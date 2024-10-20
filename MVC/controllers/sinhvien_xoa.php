<?php
class sinhvien_xoa extends controller{
    protected $sv;
    function __construct(){
        $this->sv=$this->model('sinhvien');
    }
    function Get_data(){
        $msv=$_GET['masinhvien'];
    }
}
?>