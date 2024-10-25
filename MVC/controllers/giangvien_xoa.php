<?php
class giangvien_xoa extends controller{
    protected $gv;
    function __construct(){
        $this->gv=$this->model('giangvien');
    }
    function Get_data(){
        $mgv=$_GET['magiangvien'];
    }
}
?>