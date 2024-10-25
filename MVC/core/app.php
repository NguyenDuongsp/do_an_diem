<?php

    class app{
<<<<<<< HEAD
        protected $Controllers='dsgiangvien';
=======
        
        protected $Controllers='dangnhap_c';
>>>>>>> ad40b75975c42e4d1daae54ddfc64b08cae4c080
        protected $action='Get_data';
        protected $params=[];
        function __construct(){
            
            $arr=$this->Urlprocess();
           // print_r($arr);
             //xử lý Controller
             if($arr!=null){
                if(file_exists("./MVC/controllers/".$arr[0].".php")){
                    $this->Controllers=$arr[0];
                    unset($arr[0]);
                }
             }
        
        require_once "./MVC/controllers/".$this->Controllers.".php";
        $this->Controllers=new $this->Controllers;
        //xử lý Action
        if(isset($arr[1])){
            if(method_exists($this->Controllers,$arr[1])){
                $this->action=$arr[1];
            }
            unset($arr[1]);
        }
        //Xử lý params
        $this->params=$arr?array_values($arr):[];
        //tạo biến có 3 tham số
        call_user_func_array([$this->Controllers,$this->action],$this->params);
        }
        function Urlprocess(){
            if(isset($_GET['url'])){
                $flags= null ? "/": 0;
                return explode("/",filter_var(trim($_GET["url"]),FILTER_DEFAULT,$flags));
             //return explode("/",filter_var(trim($_GET["url"]),FILTER_DEFAULT,"/"));
            }
        }

       
    }
?>