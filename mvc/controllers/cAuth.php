<?php
  class cAuth extends Controller{
    protected $auth;
    
    function __construct(){
      $this->auth = parent::setModel('mAuth', $this->auth);
    }

    function viewlogin(){
      $this->view("login","login",[]);
    }

    function viewregister_hotel(){
      $tinh = $this->auth->gettinh();
      $this->view("register","hotel_register",["tinh"=>$tinh]);
    }

    function updateGetTinh(){
      $tinh = $this->auth->gettinh();
      echo json_encode($tinh);
    }

    function logout(){
      unset($_SESSION['mataikhoan']);
      header("location: ./../cHome/home");
    }

    public function login(){
      if( isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']) ){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $check_login = $this->auth->checkLogin($username, $password);
        if($check_login['message']){
          $_SESSION["mataikhoan"] = $check_login['mataikhoan'];
          echo json_encode($check_login['message']);
        }else{
          echo json_encode("fail");
        }
      }else{
        echo json_encode("null");
      }
    }

    function signup(){
      $this->view("register","register",[]);
    }

    // function check_hotel($idus){
    //   $hotel = $this->auth->check_hotel($_SESSION['mataikhoan']);
    //   echo json_encode($hotel);
    // }

    function getIDU(){
      if(isset($_SESSION['mataikhoan'])){
        $user = $this->auth->getUserById($_SESSION['mataikhoan']);
        echo json_encode($user);
      }else{
        $user = [
          "trangthai" =>"none"
        ];;
        echo json_encode($user);
      }
    }

    function register(){
      if(!empty($_POST['name']) && !empty($_POST['sdt']) && !empty($_POST['email']) && !empty($_POST['cmnd']) && !empty($_POST['dob']) && !empty($_POST['gtinh']) && !empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['repass'])){
        $name = $_POST['name'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $cmnd = $_POST['cmnd'];
        $dob = $_POST['dob'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];
        $gt = $_POST['gtinh'];

        $check_register = $this->auth->check_register($name, $cmnd, $sdt, $email, $pass, $repass);
        if($check_register['user']){
          if($check_register['user'] == "succes"){
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $this->auth->InsertUser($name, $cmnd, $dob, $gt, $email, $sdt, $user, $password);
          }
          echo json_encode($check_register['user']);
        }else{
          echo json_encode("fail");
        }
      }else{
        echo json_encode("nulll");
      }
    }

    function register_hotel(){
      if(!empty($_POST['name']) && !empty($_POST['sdt']) && !empty($_POST['email']) && !empty($_POST['mota']) && !empty($_POST['dchi']) && !empty($_POST['Latitude']) && !empty($_POST['Longitude'])){
        $name = $_POST['name'];
        $mota = $_POST['mota'];
        $tinh = $_POST['tinh'];
        $dchi = $_POST['dchi'];
        $Latitude = $_POST['Latitude'];
        $Longitude = $_POST['Longitude'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $idus = $_SESSION['mataikhoan'];
        $hinhanh = $_FILES['file'];
        $check_registerhotel = $this->auth->check_registerhotel($name, $sdt, $email);
        if($check_registerhotel['khachsan']){
          if($check_registerhotel['khachsan'] == "succes"){
            if($hinhanh['name'] != null){
              $path=root."/mvc/assets/img/";
              $rename = $_FILES['file']['name'];
              if(file_exists($path.$_FILES['file']['name'])){
                  $str = explode(".",$_FILES['file']['name']);
                  $rename = $str[0].round(microtime(true)).".".$str[1];
              }
              $addhotel = $this->auth->addhotel($idus, $name, $mota, $tinh, $dchi, $Latitude, $Longitude, $sdt, $email, $rename);
              move_uploaded_file($_FILES['file']['tmp_name'],$path.$rename);
            }
          }
          echo json_encode($check_registerhotel['khachsan']);
        }else{
          echo json_encode("fail");
        }
      }else{
        echo json_encode("nulll");
      }
    }

    #Hàm update account
    function updateaccount(){
      if(!empty($_POST['name']) && !empty($_POST['sdt']) && !empty($_POST['ngaysinh']) && !empty($_POST['email']) && !empty($_POST['cmnd']) && !empty($_POST['gtinh']) && !empty($_POST['user'])){
        $name = $_POST['name'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $ngaysinh = $_POST['ngaysinh'];
        $cmnd = $_POST['cmnd'];
        $user = $_POST['user'];
        $gtinh = $_POST['gtinh'];
        $userid = $_SESSION['mataikhoan'];
        $check_updateaccount = $this->auth->check_updateaccount($userid,$user, $cmnd, $email, $sdt);
        if($check_updateaccount){
          if($check_updateaccount == "succes"){
            $update = $this->auth->updateuser($userid, $user, $name, $ngaysinh, $email, $sdt, $gtinh, $cmnd);
            if($update){
              echo json_encode('succes');
            }
          }else{
            echo json_encode($check_updateaccount);
          }
        }else{
          echo json_encode("fail");
        }
      }else{
        echo json_encode("null");
      }
    }
  }
  
?>