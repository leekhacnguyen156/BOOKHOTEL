<?php
  class cAdmin extends Controller{
    protected $admin;
    protected $thongbao;

    function __construct(){
      $this->admin = parent::setModel('mAuth', $this->admin);
      $this->thongbao = parent::setModel('mthongbao', $this->thongbao);
    }

    function admin($id, $pagec){
      if(isset($_SESSION['mataikhoan'])){
        $idus = $_SESSION['mataikhoan'];
        $check = $this->admin->checkhotel($idus);
        if($check['trangthai'] == "co"){
          if($id == "dm" && $pagec == "them"){
            $this->view("admin","admin",["page"=>"admin_dm","pages-con"=>"Add_dm"]);
          }elseif ($id == "dm" && $pagec == "all"){
            $this->view("admin","admin",["page"=>"admin_dm","pages-con"=>"All_dm"]);
          }elseif ($id == "phieudat" && $pagec == "tatca"){
            $this->view("admin","admin",["page"=>"admin_pd","pages-con"=>"All_pd"]);
          }elseif ($id == "phieudat" && $pagec == "conhan"){
            $this->view("admin","admin",["page"=>"admin_pd","pages-con"=>"Con_pd"]);
          }elseif ($id == "phieudat" && $pagec == "hethan"){
            $this->view("admin","admin",["page"=>"admin_pd", "pages-con"=>"Het_pd"]);
          }elseif ($id == "phong" && $pagec == "all_p"){
            $this->view("admin","admin",["page"=>"admin_phong", "pages-con"=>"All_phong"]);
          }elseif ($id == "phong" && $pagec == "them_p"){
            $this->view("admin","admin",["page"=>"admin_phong", "pages-con"=>"Add_phong"]);
          }elseif ($id == "khachsan" && $pagec == "inf"){
            $this->view("admin","admin",["page"=>"admin_hotel", "pages-con"=>"Inf_Ks"]);
          }elseif ($id == "khachsan" && $pagec == "update"){
            $this->view("admin","admin",["page"=>"admin_hotel", "pages-con"=>"update_Ks"]);
          }
        }else{
          header("location: ../../../cAuth/viewregister_hotel");
        }
      }else{
        header("location: ../../../cAuth/viewlogin");
      }
    }

    function view404(){
        $this->view("error","404",[]);
      }

    function getsotb(){
      $sotb = $this->thongbao->getsotb($_SESSION['mataikhoan']);
      echo json_encode($sotb);
    }

    function thongbao(){
      $tb = $this->thongbao->gettb($_SESSION['mataikhoan']);
      echo json_encode($tb);
    }

    function thongbaochuaxn(){
      $tb = $this->thongbao->gettbchuaxn($_SESSION['mataikhoan']);
      echo json_encode($tb);
    }
  }
?>