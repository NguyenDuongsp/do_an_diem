<?php

class sinhvien_sv extends controller
{
    protected $dssv;
    function __construct(){
        $this->dssv=$this->model('sinhvien');
    }
        function Get_data(){
            $this->view("contac",[
                'page'=>'sinhvien_sv',
                'msv'=>'',
                'tsv'=>'',
                'ns'=>'',
                'gt'=>'',
                'dc'=>'',
                'em'=>'',
                'sdt'=>'',
                'mk'=>'',
                'kh'=>'',
                'dulieu'=>$this->dssv->sinhvien1($_SESSION['ma'])
            ]);
        }
    }
    ?>