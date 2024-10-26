<?php
class lophocmodel extends ketnoiDB {
    
    // Thêm lớp học
    function lophoc_ins($malop, $mahocphan) {
        $sql = "INSERT INTO lophoc(malop, mahocphan) VALUES('$malop', '$mahocphan')";
        return mysqli_query($this->con, $sql);
    }

    // Lấy tất cả lớp học
    function lophoc_all() {
        $sql = "SELECT * FROM lophoc";
        return mysqli_query($this->con, $sql);
    }
    // Lấy lớp học của giảng viên
    function lophoc_quygiangvien($magiaovien) {
        $sql = "SELECT l.*
                FROM lophoc l
                JOIN phanconggiaovien pc ON l.malop = pc.malop
                WHERE pc.magiangvien = $magiaovien";
        // $sql = "SELECT  FROM lophoc WHERE magiaovien = '$magiaovien'";
        return mysqli_query($this->con, $sql);
    }

    // Kiểm tra mã lớp đã tồn tại
    function checktrungmalop($malop) {
        $sql = "SELECT * FROM lophoc WHERE malop = '$malop'";
        $data = mysqli_query($this->con, $sql);
        return mysqli_num_rows($data) > 0; // Trả về true nếu có kết quả
    }

    // Tìm kiếm lớp học
    function lophoc_timkiem($malop, $mahocphan) {
        $sql = "SELECT * FROM lophoc WHERE malop LIKE '%$malop%' OR mahocphan LIKE '%$mahocphan%'";
        return mysqli_query($this->con, $sql);
    }

    // Xóa lớp học
    function lophoc_del($malop) {
        $sql = "DELETE FROM lophoc WHERE malop='$malop'";
        return mysqli_query($this->con, $sql);
    }

    // Cập nhật lớp học
    function lophoc_upd($malop, $mahocphan) {
        $sql = "UPDATE lophoc SET mahocphan='$mahocphan' WHERE malop='$malop'";
        return mysqli_query($this->con, $sql);
    }
}
?>