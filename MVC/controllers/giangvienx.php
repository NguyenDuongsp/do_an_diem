<?php

class ttingiangvien extends controller
{
    protected $dsgv;
    function __construct(){
        $this->dssv=$this->model('giangvien');
    }
        function Get_data(){
            $this->view("contac_gv",[
                'page'=>'ttingiangvien',
                'mgv'=>'',
                'tgv'=>'',
                'ns'=>'',
                'gt'=>'',
                'dc'=>'',
                'em'=>'',
                'sdt'=>'',
                'nbd'=>'',

                'dulieu'=>$this->dsgv->giangvien1($_SESSION['ma'])
            ]);
        }
    }
    ?>