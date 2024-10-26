<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   
   .highlight{
         
          background-Color : #202126;
          border-Left :3px solid #dce1ea;
      }
      table img{
  width: 50px;
}

  </style>
</head>

<body>
   
    
        <form method="post" action="http://localhost/do_an_diem/dssinhvien/timkiem">
         
            <div class="conten">
            <table>
                <tr>
                    <td colspan="2"><h2>Thông tin sinh viên</h2></td>
                </tr>
                <tr>
                    <td><label for="masinhvien">Mã sinh viên:</label></td>
                    <td><input type="text" name="masinhvien" value="<?php echo isset($row["masinhvien"]) ? $row["masinhvien"] : ''; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="tensinhvien">Tên sinh viên:</label></td>
                    <td><input type="text" name="tensinhvien" value="<?php echo isset($row["tensinhvien"]) ? $row["tensinhvien"] : ''; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="ngaysinh">Ngày Sinh:</label></td>
                    <td><input type="date" name="ngaysinh" value="<?php echo isset($row["ngaysinh"]) ? $row["ngaysinh"] : ''; ?>"readonly></td>
                </tr>
                <tr>
                    <td><label for="gioitinh">Giới tính:</label></td>
                    <td><input type="text" name="gioitinh" value="<?php echo isset($row["gioitinh"]) ? $row["gioitinh"] : ''; ?>"readonly></td>
                </tr>
                <tr>
                    <td><label for="diachi">Địa chỉ:</label></td>
                    <td><input type="text" name="diachi" value="<?php echo isset($row["diachi"]) ? $row["diachi"] : ''; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="text" name="email" value="<?php echo isset($row["email"]) ? $row["email"] : ''; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="sdt">Số điện thoại:</label></td>
                    <td><input type="text" name="sdt" value="<?php echo isset($row["sdt"]) ? $row["sdt"] : ''; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="makhoa">Mã Khoa:</label></td>
                    <td><input type="text" name="makhoa" value="<?php echo isset($row["makhoa"]) ? $row["makhoa"] : ''; ?>" readonly></td>
                </tr>
                
                <tr>
                    <td><label for="khoahoc">khóa học:</label></td>
                    <td><input type="text" name="khoahoc" value="<?php echo isset($row["khoahoc"]) ? $row["khoahoc"] : ''; ?>" readonly></td>
                </tr>
                
               
            </table>
        </div>
    </form>
</body>
</html>

   
    <script  >
        const buyBtn= document.querySelector('.js-buy-ticket')
        const modal=document.querySelector('.js-modal')
        const modalClose=document.querySelector('.js-modal-close')
        const modalContainer=document.querySelector('.js-modal-container')
       //thêm class open vào modal

       function showBuyTickers(){
                modal.classList.add('open')
                var formElement = document.querySelector('form');
            formElement.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                 // Call the function to show the modal
                // Additional logic for form submission if needed
            });
            
       }
       
       //gỡ bỏ class open khỏi modal
       function hideBuyTickers(){
              modal.classList.remove('open')
              var form = document.querySelector('form');
          form.submit();
       }
        
            
            buyBtn.addEventListener('click',showBuyTickers)
        
        modalClose.addEventListener('click',hideBuyTickers)

        modal.addEventListener('click',hideBuyTickers)

        modalContainer.addEventListener('click',function(event){
           event.stopPropagation()      })
          
    </script>


<script>
        // Lấy dữ liệu từ localStorage
        var selectedCellData = localStorage.getItem('selectedCellData');

        // Tìm và đánh dấu ô có dữ liệu tương tự
        var cells = document.getElementsByClassName('menu__item');
        for (var i = 0; i < cells.length; i++) {
            if (cells[i].innerText === selectedCellData) {
                cells[i].classList.add('highlight');
            }
        }
    </script> 
</body>
</html>