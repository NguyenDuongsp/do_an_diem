<?php
class dangnhap_c extends controller
{
    protected $dn;

    function __construct(){
        $this->dn = $this->model('dangnhap_m');
    }

    function Get_data(){
        $this->view("Pages/dangnhap", []);
    }
    
    function dangnhap_1(){
      

        if (isset($_POST['btn-login'])) {
            $tk = $_POST['txtuser'];
            $mk = $_POST['txtpassword'];
            
            $userData = $this->dn->login($tk, $mk);

            if ($userData) {
                if($userData['quyen']==3){
                    $tenSinhVien = $userData['tensinhvien'];
                    $masv = $userData['taikhoansv'];
                    $_SESSION['ma'] = $masv;
                }
                elseif($userData['quyen']==2){
                    $tenSinhVien = $userData['tengiangvien'];
                    $ma = $userData['taikhoan'];
                    $_SESSION['ma'] = $ma;
                }
                // Lấy tên sinh viên từ thông tin người dùng
                

                // Lưu thông tin người dùng và tên sinh viên vào session
                $_SESSION['user_data'] = $userData;
                $_SESSION['ten_sinhvien'] = $tenSinhVien;

                // Thực hiện chạy đoạn mã trong class dssinhvien
                require_once __DIR__ . '/../core/controller.php';
                $dssinhvien_instance = new diem_sv_c();
                $dssinhvien_instance->Get_data();

                exit;
            } else {
                $_SESSION['error_message'] = "Tên người dùng hoặc mật khẩu không đúng!";
                header('Location: ./dangnhap_c.php');
                exit;
            }
        }
    }
}

class diem_sv_c extends controller
{
    protected $dsv;
    function __construct(){
        $this->dsv=$this->model('diem_sv_m');
    }
    function Get_data() {
        $quyen = $_SESSION['user_data']['quyen'];
        $view = '';

        switch ($quyen) {
            case 2:
                $view = 'contac_gv';
                $page = 'diemgv';
                break;
            case 3:
                $view = 'sv_contact';
                $page = 'diem_sv';
                break;
            default:
                // Xử lý cho các trường hợp khác nếu cần
                break;
        }

        $this->view($view, [
            'page' => $page,
            'tenhp' => '',
            'dcc' => '',
            'gk' => '',
            'tl' => '',
            'chp' => '',
            'lt' => '',
            'dulieu' => $this->dsv->diemsinhvien_all($_SESSION['ma'])
        ]);
    }
        }
?>