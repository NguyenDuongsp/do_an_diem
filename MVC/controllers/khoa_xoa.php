<?php
class khoa_xoa extends controller{
    protected $khoa;
    function __construct(){
        $this->khoa=$this->model('khoa');
    }
    function Get_data(){
        $mk=$_GET['makhoa'];
    }
}
?>