<?php
  class cdanhmuc extends Controller{
    protected $danhmuc;
    protected $phong;

    function __construct(){
      $this->danhmuc = parent::setModel('mdanhmuc', $this->danhmuc);
      $this->phong = parent::setModel('mphong', $this->phong);
    }

    function getdanhmuc(){
      $id = $_SESSION['mataikhoan'];
      $danhmuc = $this->danhmuc->getdanhmuc($id);
      echo json_encode($danhmuc);
    }

    function getdanhmucP(){
      $id = $_SESSION['mataikhoan'];
      $start = $_POST['start'];
      $count = $_POST['count'];
      $danhmuc = $this->danhmuc->getdanhmucP($id, $start, $count);
      echo json_encode($danhmuc);
    }

    function getAllDanhmuc(){
      $danhmuc = $this->danhmuc->getAllDanhmuc();
      echo json_encode($danhmuc);
    }

    function getdanhmucupdate(){
      $iddm = $_POST['iddm'];
      $danhmuc = $this->danhmuc->getdanhmucid($iddm);
      echo json_encode($danhmuc);
    }

    function countDM(){
      $id = $_SESSION['mataikhoan'];
      $countdm = $this->danhmuc->conutDanhmuc($id);
      echo json_encode($countdm);
    }

    function insertdanhmuc(){
      if(!empty($_POST['tendm']) && !empty($_POST['mota']) && !empty($_FILES['img'])){
        $tendm = $_POST['tendm'];
        $mota = $_POST['mota'];
        $id = $_SESSION['mataikhoan'];
        $themdanhmuc = $this->danhmuc->check_themdanhmuc($tendm);
        if($themdanhmuc['danhmuc']){
            if($themdanhmuc['danhmuc'] == "succes"){
              if($_FILES['img']['name'] != null){
                $path=root."/mvc/assets/img/";
                $rename = $_FILES['img']['name'];
                if(file_exists($path.$_FILES['img']['name'])){
                    $str = explode(".",$_FILES['img']['name']);
                    $rename = $str[0].round(microtime(true)).".".$str[1];
                }
                move_uploaded_file($_FILES['img']['tmp_name'],$path.$rename);
                $this->danhmuc->insertdanhmuc($id, $tendm, $mota, $rename);
              }
            }
            echo json_encode($themdanhmuc['danhmuc']);
        }else{
          echo json_encode("fail");
        }
      }else{
        echo json_encode("null");
      }
    }

    function updatedm(){
      if(!empty($_POST['tendm']) && !empty($_POST['motane']) && !empty($_POST['iddm']) && !empty($_POST['imgcune'])){
        $tendm = $_POST['tendm'];
        $mota = $_POST['motane'];
        $iddm = $_POST['iddm'];
        $imgcu = $_POST['imgcune'];
        $themdanhmuc = $this->danhmuc->check_suadanhmuc($tendm, $iddm);
        if($themdanhmuc['danhmuc']){
            if($themdanhmuc['danhmuc'] == "succes"){
              if(isset($_FILES['img-sua'])){
                $path=root."/mvc/assets/img/";
                unlink($path.$imgcu);
                $rename = $_FILES['img-sua']['name'];
                if(file_exists($path.$_FILES['img-sua']['name'])){
                    $str = explode(".",$_FILES['img-sua']['name']);
                    $rename = $str[0].round(microtime(true)).".".$str[1];
                }
                move_uploaded_file($_FILES['img-sua']['tmp_name'],$path.$rename);
                $this->danhmuc->updatedm($iddm, $tendm, $mota, $rename);
              }else{
                $this->danhmuc->updatedm($iddm, $tendm, $mota, $imgcu);
              }
            }
            echo json_encode($themdanhmuc['danhmuc']);
        }else{
          echo json_encode("fail");
        }
      }else{
        echo json_encode("null");
      }
    }

    function deletedm(){
      if(!empty($_POST['iddm'])){
        $iddm = $_POST['iddm'];
        $idphong = $this->phong->getidphong($iddm);
        foreach($idphong as $key => $value){
          $this->phong->xoaimgphong($value['maloai']);
        }
        $this->danhmuc->delete_dm($iddm);
      }else{
        echo json_encode("null");
      }
    }
  }
?>