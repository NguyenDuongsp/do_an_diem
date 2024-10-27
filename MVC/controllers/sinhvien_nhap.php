<?php
include_once './Classes/PHPExcel.php';
include_once './Classes/PHPExcel/IOFactory.php';

class sinhvien_nhap extends controller
{
     function importExcel()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'diem_sinh_vien') or die('lỗi kết nối');

        if (isset($_POST['btnnhapexcel'])) {
            $file = $_FILES['txtFile']['tmp_name'];
            $objReader = PHPExcel_IOFactory::createReaderForFile($file);
            $objExcel = $objReader->load($file);
            $sheet = $objExcel->getSheet(0);
            $sheetData = $sheet->toArray(null, true, true, true);

            foreach ($sheetData as $row) {
                $msv = $row["A"];
                $tsv = $row["B"];
                $ns = $row["C"];
                $gt = $row["D"];
                $email = $row["E"];
                $sdt = $row["F"];
                $mk = $row["G"];
                $kh = $row["H"];

                $sql = "INSERT INTO sinhvien VALUES('$msv','$tsv','$ns','$gt','$email','$sdt','$mk','$kh')";
                $conn->query($sql);
            }

            echo "<script>alert('Thêm mới thành công!')</script>";
        }

        mysqli_close($conn);
    }
}


?>