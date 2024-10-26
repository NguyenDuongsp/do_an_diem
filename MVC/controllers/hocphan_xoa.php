<?php
class hocphan_xoa extends controller{
    protected $hp;
    function __construct(){
        $this->hp=$this->model('hocphan');
    }
    function Get_data(){
        $mhp=$_GET['mahocphan'];
    }
}
?>