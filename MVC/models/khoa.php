<?php
class khoa extends ketnoiDB{
    function khoa_ins($mk, $tk){
        $sql ="INSERT INTO  khoa(makhoa,tenkhoa) VALUE('$mk','$tk')";
        return mysqli_query($this->con, $sql);
    }
    function khoa_all(){
        $sql="SELECT * FROM khoa";
        return mysqli_query($this->con,$sql);
    }
    function checktrungmakhoa($mk){
        $sql="SELECT* FROM khoa WHERE makhoa= '$mk'";
        $data=mysqli_query($this ->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
    function khoa_timkiem($mk, $tk)
    {
        $sql="SELECT * FROM khoa WHERE makhoa like '%$mk%' AND tenkhoa like '%$tk%'";
        return mysqli_query($this->con, $sql);
    }
    function khoa_del($mk){
        $sql="DELETE FROM khoa WHERE makhoa='$mk'";
        return mysqli_query($this->con, $sql);
    }
    function khoa_upd($mk, $tk){
        $sql="UPDATE khoa SET tenkhoa='$tk' WHERE makhoa='$mk'";
        return mysqli_query($this->con,$sql);
    }
    function khoa1($mk){
        $sql="SELECT  * FROM khoa WHERE makhoa='$mk'";
        return mysqli_query($this->con, $sql);
    }
}
?>