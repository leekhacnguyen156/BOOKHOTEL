<?php
    class cUser extends Controller{

        protected $user;
        protected $thongbao;

        function __construct(){
          $this->user = parent::setModel('mUser', $this->user);
          $this->thongbao = parent::setModel('mthongbao', $this->thongbao);
        }

        function getTaiKhoan(){
            $user = $this->user->getUserId($_SESSION['mataikhoan']);
            if($user){
              echo json_encode($user);
            }
        }

        function getTaiKhoancmt(){
          $mataikhoan = $_POST['mataikhoan'];
          $user = $this->user->getUserId($mataikhoan);
            if($user){
              echo json_encode($user);
            }
        }

        function updateavatar(){
          if(!empty($_FILES['img'])){
            $mataikhoan = $_SESSION['mataikhoan'];
            $avtcu = $_POST['avtcu'];
            if($_FILES['img']['name'] != null){
              $path=root."/mvc/assets/img/";
              if($avtcu){
                unlink($path.$avtcu);
              }
              $rename = $_FILES['img']['name'];
              if(file_exists($path.$_FILES['img']['name'])){
                  $str = explode(".",$_FILES['img']['name']);
                  $rename = $str[0].round(microtime(true)).".".$str[1];
              }
              move_uploaded_file($_FILES['img']['tmp_name'],$path.$rename);
              $update = $this->user->updateavatar($rename, $mataikhoan);
              if($update){
                echo json_encode('succes');
              }else{
                echo json_encode('fail');
              }
            }
          }
          
          

        }

        function updatecover(){
          if(!empty($_FILES['img_cover'])){
            $mataikhoan = $_SESSION['mataikhoan'];
            $img_cover_cu = $_POST['img_cover_cu'];
            if($_FILES['img_cover']['name'] != null){
              $path=root."/mvc/assets/img/";
              if($img_cover_cu){
                unlink($path.$img_cover_cu);
              }
              $rename = $_FILES['img_cover']['name'];
              if(file_exists($path.$_FILES['img_cover']['name'])){
                  $str = explode(".",$_FILES['img_cover']['name']);
                  $rename = $str[0].round(microtime(true)).".".$str[1];
              }
              move_uploaded_file($_FILES['img_cover']['tmp_name'],$path.$rename);
              $update = $this->user->updatecover($rename, $mataikhoan);
              if($update){
                echo json_encode('succes');
              }else{
                echo json_encode('fail');
              }
            }
          }
          
          

        }


        function checksession(){
          if(isset($_SESSION['mataikhoan'])){
            echo json_encode('succes');
          }else{
            echo json_encode('fail');
          }
        }

        function viewUser($url){
            if(isset($_SESSION["mataikhoan"])){
              if($url == "hoso"){
                $this->view("User","user",["page"=>"info_user"]);
              }elseif($url == "doimatkhau"){
                $this->view("User","user",["page"=>"doimatkhau"]);
              }elseif($url == 'phongdaluu'){
                $this->view("User","user",["page"=>"phongdaluu"]);
              }else{
                $this->view("User","user",["page"=> $url]);
              }
            }
          }

        public function doimatkhau(){
          if(!empty($_POST['passnhe']) && !empty($_POST['newpass']) && !empty($_POST['repass'])){
            $pass = $_POST['passnhe'];
            $newpass = $_POST['newpass'];
            $repass = $_POST['repass'];
            $iduser = $_SESSION['mataikhoan'];
            $check_pass = $this->user->checkPass($pass, $iduser, $newpass, $repass);
            if($check_pass['mk']){
              if($check_pass['mk'] == "yes"){
                $this->user->updatepass($newpass, $iduser);
              }
              echo json_encode($check_pass['mk']);
            }else{
              echo json_encode("fail");
            }
          }else{
            echo json_encode("null");
          }
        }

        public function getsotb_user(){
          $sotb = $this->thongbao->getsotb_user($_SESSION['mataikhoan']);
          echo json_encode($sotb);
        }

        public function gettb_user(){
          $tb = $this->thongbao->gettb_user($_SESSION['mataikhoan']);
          echo json_encode($tb);
        }

        public function gettbhuy_user(){
          $tb = $this->thongbao->gettbhuy_user($_SESSION['mataikhoan']);
          echo json_encode($tb);
        }

        public function gettchuaxem_user(){
          $tb = $this->thongbao->gettchuaxem_user($_SESSION['mataikhoan']);
          echo json_encode($tb);
        }

        public function update_tbus(){
          if(isset($_POST['idpd'])){
            $up = $this->thongbao->update_tbus($_POST['idpd']);
            if($up){
              echo json_encode("ok");
            }
          }
        }
    }
