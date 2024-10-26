<?php

class sinhvien_sv extends controller
{
    protected $sv;
    function __construct(){
        $this->sv=$this->model('sinhvien');
    }
        function Get_data(){
            $this->view("sv_contact",[
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
                'dulieu'=>$this->sv->sinhvien1($_SESSION['ma'])
            ]);
        }
    }
    ?>