<?php
class hocphan extends ketnoiDB{
    function hocphan_ins($mhp, $thp, $tin){
        $sql ="INSERT INTO hocphan(mahocphan,tenhocphan,tinchi) VALUE('$mhp','$thp','$tin')";
        return mysqli_query($this->con, $sql);
    }
    function hocphan_all(){
        $sql="SELECT * FROM hocphan";
        return mysqli_query($this->con,$sql);
    }
    function checktrungmahp($mhp){
        $sql="SELECT * FROM hocphan WHERE mahocphan= '$mhp'";
        $data=mysqli_query($this ->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
    function hocphan_timkiem($mhp, $thp)
    {
        $sql="SELECT * FROM hocphan WHERE mahocphan like '%$mhp%' AND tenhocphan like '%$thp%'";
        return mysqli_query($this->con, $sql);
    }
    function hocphan_del($mhp){
        $sql="DELETE FROM hocphan WHERE mahocphan='$mhp'";
        return mysqli_query($this->con, $sql);
    }
    function hocphan_upd($mhp, $thp, $tin){
        $sql="UPDATE hocphan SET tenhocphan='$thp' WHERE mahocphan='$mhp'";
        return mysqli_query($this->con,$sql);
    }

    function hocphangv_all($mhp){
        $sql="SELECT * FROM hocphan where mahocphan='$mhp'";
        return mysqli_query($this->con,$sql);
    }
}
?>