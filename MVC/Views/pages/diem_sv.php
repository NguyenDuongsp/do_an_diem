<?php
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="http://localhost/do_an_diem/diem_sv_c/get_data">

    <div class="conten">
        <table class="table table-striped">
            <tr>
                <td colspan="7" style="text-align: left;">
                    <h2>Điểm Số</h2>
                </td>
            </tr>

            <tr>
                <td colspan="9" class="cold2">

                </td>
            </tr>
          
                    <td class="col1">Năm Học_ Học Kì </td>
                    <td class="col2">
                        <select class="form-control" name="hocki" id="">
                            <option value="">--Chọn năm học_ Học kì--</option>
                            <!-- <?php 
                            if(isset($data5)&&$data5!=null){
                                while($row=mysqli_fetch_array($data5)){
                             ?>
                                <option ><?php echo $row['namhoc_hocki'] ?></option>
                             <?php       
                                }
                            }
                             ?> -->
                            
                    </td>
                    <td>
                        <input type="submit" name ="btxem" value="xem" >
               
            <tr>
                
                <th>Tên học phần</th>
                
                
                <th>Điểm chuyên cần</th>
                <th>Điểm giữa kì</th>
                <th>Điểm thực hành</th>
            
                <th>Thi kết thúc</th>
                <th>Lần học</th>
                <th>Điểm tổng kết</th>
                <th>Điểm chữ</th>
                <th>Đánh giá</th>
            </tr>
            
            <?php
            // Xử lý kết quả truy vấn (hiển thị mảng $data lên bảng)
            if(isset($data['dulieu'])&&$data['dulieu']!=null)
                {
                    $i=0;
                    while($row=mysqli_fetch_array($data['dulieu']))
                    {
                    // Tính tổng điểm
                    $tongDiem = $row['diemchuyncan']*0.1 + ($row['giuaki'] + $row['thaoluan'] )/2*0.3 + $row['cuoihocphan']*0.6;

                    // Xác định đánh giá dựa trên tổng điểm
                    $danhGia = '';
                    $diemchu = '';
                    if ($tongDiem >= 4.0) {
                        $danhGia = 'Đạt';
                    } elseif ($tongDiem <4) {
                        $danhGia = 'Không đạt';
                    } 
                    if ($tongDiem >= 8.5) {
                        $diemchu = 'A';
                    } elseif ($tongDiem >= 7 ) {
                        $diemchu = 'B';
                    } elseif ($tongDiem >=5.5) {
                        $diemchu = 'C';
                    }
                    elseif ($tongDiem >= 4.0){
                            $diemchu = 'D';
                    }
                    else {
                        $diemchu ='F';
                    }
                    ?>
                    <tr>
                        
                        <td><?php echo $row['tenhocphan'] ?></td>
                        
                        
                        <td><?php echo $row['diemchuyncan'] ?></td>
                        <td><?php echo $row['giuaki'] ?></td>
                        <td><?php echo $row['thaoluan'] ?></td>
                  
                        <td><?php echo $row['cuoihocphan'] ?></td>
                        <td><?php echo $row['lanthi'] ?></td>
                        <td><?php echo $tongDiem ?></td>
                        <td><?php echo $diemchu ?></td>
                        <td><?php echo $danhGia ?></td>
                    </tr>
                <?php
                }
            }
            // Kết thúc xử lý kết quả truy vấn
            ?>
        </table>
    </div>
</form>
</body>
</html>