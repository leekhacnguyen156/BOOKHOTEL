<?php
  class cphong extends Controller{

    protected $phong;
    protected $hinhanh;
    protected $dichvu;
    protected $gia;
    protected $danhgia;
    protected $thongbao;

    function __construct(){
      $this->phong = parent::setModel('mphong', $this->phong);
      $this->hinhanh = parent::setModel('mhinhanh', $this->hinhanh);
      $this->dichvu = parent::setModel('mdichvu', $this->dichvu);
      $this->gia = parent::setModel('mgia', $this->gia);
      $this->danhgia = parent::setModel('mdanhgia', $this->danhgia);
      $this->thongbao = parent::setModel('mthongbao', $this->thongbao);
    }

    function getphong(){
      $start = $_POST['start'];
      $count = $_POST['count'];
      $phong = $this->phong->getphong($_SESSION['mataikhoan'], $start, $count);
      if($phong){
        echo json_encode($phong);
      }
    }

    function getphongTheodanhmuc(){
      $madm = $_POST['madm'];
      $phong = $this->phong->getphongbymadm($madm);
      if($phong){
        echo json_encode($phong);
      }
    }

    function getdichvucu(){
      $idloai = $_POST['maloai'];
      $phieudv = $this->dichvu->getdichvucu($idloai);
      if($phieudv){
        echo json_encode($phieudv);
      }
    }

    function gethinhanh(){
      $idp = $_POST['maloai'];
      $hinhanh = $this->phong->getimgtheoidphong($idp);
      if($hinhanh){
        echo json_encode($hinhanh);
      }
    }

    function viewchitietphong($maloai){
      $rs = $this->phong->getphongtheoidphong($maloai);
      $danhgia = $this->danhgia->getdanhgiatheoidphong($maloai);
      $gia = $this->gia->getGiaNew($maloai);
      $diachi = $this->phong->getdiachitheoidphong($maloai);
      $data = ['data' => $rs, 'danhgia' => $danhgia, 'gia' => $gia, 'diachi' => $diachi];
      $this->view("phong","chitietphong", $data);
    }

    function getdanhgia(){
      $maloai = $_POST['maloai'];
      $danhgia = $this->danhgia->getdanhgiatheoidphong($maloai);
      echo json_encode($danhgia);
    }

    function getalldanhgia(){
      $maloai = $_POST['maloai'];
      $danhgia = $this->danhgia->getalldanhgia($maloai);
      echo json_encode($danhgia);
    }

    function checkdatphongcuaminh(){
      $maloai = $_POST['maloai'];
      $mataikhoan = $_SESSION['mataikhoan'];
      $rs = $this->phong->checkdatphongcuaminh($maloai, $mataikhoan);
      if($rs == 'true'){
        echo json_encode('true');
      }else{
        echo json_encode('false');
      }
    }

    function datphong(){
      if(!empty($_POST['ngaynhanphong']) && !empty($_POST['ngaytraphong']) && !empty($_POST['thoigianden']) && !empty($_POST['hoten']) && !empty($_POST['email']) && !empty($_POST['sdt']))
      {
          $ngaynhanphong = $_POST['ngaynhanphong'];
          $ngaytraphong = $_POST['ngaytraphong'];
          $thoigianden = $_POST['thoigianden'];
          $hoten = $_POST['hoten'];
          $email = $_POST['email'];
          $sdt = $_POST['sdt'];
          $magia = $_POST['magia'];
          $maloai = $_POST['idphong'];
          $mataikhoan = $_SESSION['mataikhoan'];
          $trangthai = '0';
          $ngaynhanphong;
          $update = $this->phong->insertDatphong($mataikhoan, $maloai, $magia, $ngaynhanphong, $ngaytraphong ,$hoten, $email, $sdt, $thoigianden, $trangthai);
          if($update == 'succes'){
            echo json_encode("succes");
            $this->thongbao->themthongbaoad();
          }else{
            echo json_encode('fail');
          }
      }else{
        echo json_encode('null');
      }
    }

    function thichphong(){
      $maloai = $_POST['maloai'];
      $mataikhoan = $_SESSION['mataikhoan'];
      $rs = $this->phong->insertThichphong($maloai, $mataikhoan);
      if($rs == 'succes_t'){
        echo json_encode('succes_t');
      }else if($rs == 'succes_bt'){
        echo json_encode('succes_bt');
      }else{
        echo json_encode('fail');
      }
    }

    function checkthichphong(){
      $maloai = $_POST['maloai'];
      $mataikhoan = $_SESSION['mataikhoan'];
      $rs = $this->phong->checkthichphong($maloai, $mataikhoan);
      if($rs == 'true'){
        echo json_encode('succes');
      }else{
        echo json_encode('fail');
      }
    }

    function getdichvutheoidphong(){
      $maloai = $_POST['maloai'];
      $rs = $this->phong->getdichvutheoidphong($maloai);
      if($rs){
        echo json_encode($rs);
      }else{
        echo json_encode('null');
      }
    }

    function getdichvu(){
      $phong = $this->phong->getdichvu();
      echo json_encode($phong);
    }

    function addDanhGia(){
      $sosao = $_POST['sosao'];
      $maloai = $_POST['maloai'];
      $noidung = $_POST['noidung'];
      $thoigian = date("Y-m-d h:m:s");
      $mataikhoan = $_SESSION['mataikhoan'];
      $addcmt = $this->danhgia->addDanhgia($sosao, $maloai, $noidung, $thoigian, $mataikhoan);
      if($addcmt){
        echo json_encode("succes");
      }
    }

    function deletephong(){
        if(isset($_POST['idphong'])){
            $idphong = $_POST['idphong'];
            $phong = $this->phong->xoaphong($idphong);
            if($phong){
              echo json_encode("thanhcong");
            }
          }else{
            echo json_encode("null");
          }
    }

    function checkTrungPhongDG(){
      if(isset($_POST['maloai'])){
        $maloai = $_POST['maloai'];
        $mataikhoan = $_SESSION['mataikhoan'];
        $check = $this->danhgia->checkTrungPhongDG($maloai, $mataikhoan);
        if($check){
          echo json_encode("true");
        }else{
          echo json_encode("false");
        }
      }
    }

    function getGiaNew(){
      if(isset($_POST['idphong'])){
        $gia = $this->gia->getGiaNew($_POST['idphong']);
      }
      echo json_encode($gia['gia']);
    }

    function getMaGiaNew(){
      if(isset($_POST['idphong'])){
        $gia = $this->gia->getGiaNew($_POST['idphong']);
      }
      echo json_encode($gia['magia']);
    }

    // function getMaGiaNew(){
    //   if(isset($_POST['idphong'])){
    //     $gia = $this->gia->getGiaNew($_POST['idphong']);
    //   }
    //   echo json_encode($gia['magia']);
    // }

    function addPhong(){
      if(isset($_POST['iddm']) && isset($_POST['tenphong']) && isset($_POST['gia']) && isset($_POST['dichvu']) && isset($_POST['mota']) && isset($_POST['soluong']) && isset($_POST['sokhach']) && isset($_POST['dtich']) && isset($_POST['slfile']) ){
        $iddm     = $_POST['iddm'];
        $tenphong = $_POST['tenphong'];
        $soluong  = $_POST['soluong'];
        $sokhach  = $_POST['sokhach'];
        $dichvunha = $_POST['dichvu'];
        $mota  = $_POST['mota'];
        $dtich    = $_POST['dtich'];
        $gia = $_POST['gia'];
        $slfile   = $_POST['slfile'];
        $checktenphong = $this->phong->checkTenPhong($iddm, $tenphong);
        if($checktenphong == "succes"){
          if(isset($_FILES['filetieude'])){
            $tieude = $_FILES['filetieude'];
            $path=root."/mvc/assets/img/";
            $renametieude = $tieude['name'];
            if(file_exists($path.$tieude['name'])){
              $str = explode(".",$tieude['name']);
              $renametieude = $str[0].round(microtime(true)).".".$str[1];
            }
            move_uploaded_file($tieude['tmp_name'],$path.$renametieude);
            $insertPhong = $this->phong->insertPhong($iddm, $tenphong, $soluong, $sokhach, $mota ,$dtich, $renametieude);
            if($insertPhong != 'fail'){
              $insertGia = $this->gia->insertGiaLoai($gia, $insertPhong, date("Y/m/d"));
              if($insertGia == 'succes'){
                if($dichvunha){
                  $arrdichvu = explode(",", $dichvunha);
                  $checkdv = false;
                  foreach($arrdichvu as $dv){
                    $phieudv = $this->dichvu->insertPhieuDV($insertPhong, $dv);
                    if($phieudv){
                      if($phieudv == 'succes'){
                        $checkdv = true;
                      }else{
                        $checkdv = false;
                      }
                    }
                  }
                  if($checkdv){
                    if($slfile > 0){
                      $check = false;
                      $path=root."/mvc/assets/imgmota/";
                      for($i = 0; $i < $slfile; $i++){
                        if(isset($_FILES['file'.$i])){
                          $motaimg = $_FILES['file'.$i];
                          $renamemota = $motaimg['name'];
                          if(file_exists($path.$motaimg['name'])){
                            $str = explode(".",$motaimg['name']);
                            $renamemota = $str[0].round(microtime(true)).".".$str[1];
                          }
                          move_uploaded_file($motaimg['tmp_name'],$path.$renamemota);
                          $hinhanh = $this->hinhanh->hinhanh($insertPhong, $renamemota);
                          if($hinhanh == 'succes'){
                            $check = true;
                          }else{
                            $check = false;
                          }
                        }
                      }
                      if($check){
                        echo json_encode("succes");
                      }else{
                        echo json_encode('fail');
                      }
                    }
                  }else{
                    echo json_encode('fail');
                  }
                }
              }else{
                echo json_encode("fail");
              }
            }else{
              echo json_encode("fail");
            }
          }
        }else{
          echo json_encode($checktenphong);
        }
      }else{
        echo json_encode('null');
      }
    }

    function getphongupdate(){
      if(isset($_POST['maloai'])){
        $maloai = $_POST['maloai'];
        $phong = $this->phong->getphongtheoidphong($maloai);
        echo json_encode($phong);
      }
    }

    function countPhong(){
      $countPhong = $this->phong->count_phong($_SESSION['mataikhoan']);
      echo json_encode($countPhong);
    }

    function getanhmotaupdate(){
      if(isset($_POST['maloai'])){
        $maloai = $_POST['maloai'];
        $img = $this->hinhanh->getimgmota($maloai);
        echo json_encode($img);
      }
    }

    function updatePhong(){
      if(isset($_POST['imgphongcu']) && isset($_POST['iddm']) && isset($_POST['maloai']) && !empty($_POST['tenphong']) && !empty($_POST['mota']) && !empty($_POST['soluong']) && !empty($_POST['sokhach']) && !empty($_POST['dtich']) && !empty($_POST['gia']) && isset($_POST['giacu']) && !empty($_POST['dichvu'])){
        $madm = $_POST['iddm'];
        $maloai = $_POST['maloai'];
        $tenphong = $_POST['tenphong'];
        $soluong  = $_POST['soluong'];
        $sokhach  = $_POST['sokhach'];
        $dichvunha = $_POST['dichvu'];
        $mota  = $_POST['mota'];
        $dtich    = $_POST['dtich'];
        $gia = $_POST['gia'];
        $giacu = $_POST['giacu'];
        $imgphongcu = $_POST['imgphongcu'];
        $checktenupdate = $this->phong->checkTenPhongUpdate($madm, $tenphong, $maloai);
        if($checktenupdate == "succes"){
          $renameimgphong = $imgphongcu;
          if(isset($_FILES['filetieude'])){
            $imgphong = $_FILES['filetieude'];
            if($imgphong['name']){
              $path=root."/mvc/assets/img/";
              if($imgphongcu){
                unlink($path.$imgphongcu);
              }
              $renameimgphong = $imgphong['name'];
              if(file_exists($path.$imgphong['name'])){
                  $str = explode(".",$imgphong['name']);
                  $renameimgphong = $str[0].round(microtime(true)).".".$str[1];
              }
              move_uploaded_file($imgphong['tmp_name'],$path.$renameimgphong);
            }
          }
          $updatePhong = $this->phong->updatePhong($maloai, $tenphong, $soluong, $sokhach, $mota, $dtich, $renameimgphong);
          if($updatePhong){
            if($gia != $giacu){
              $insertGia = $this->gia->insertGiaLoai($gia, $maloai, date("Y/m/d"));
            }
            $deletedv = $this->dichvu->deletePhieuDV($maloai);
                if($deletedv == 'succes'){
                  if($dichvunha){
                    $arrdichvu = explode(",", $dichvunha);
                    $checkdv = false;
                    foreach($arrdichvu as $dv){
                      $phieudv = $this->dichvu->insertPhieuDV($maloai, $dv);
                      if($phieudv){
                        if($phieudv == 'succes'){
                          $checkdv = true;
                        }else{
                          $checkdv = false;
                        }
                      }
                    }
                    if($checkdv){
                      if(isset($_POST['slfile'])){
                        $slfile = $_POST['slfile'];
                        if($slfile > 0){
                          $check = false;
                          $path=root."/mvc/assets/imgmota/";
                          for($i = 0; $i < $slfile; $i++){
                            if(isset($_FILES['file'.$i])){
                              $motaimg = $_FILES['file'.$i];
                              $renamemota = $motaimg['name'];
                              if(file_exists($path.$motaimg['name'])){
                                $str = explode(".",$motaimg['name']);
                                $renamemota = $str[0].round(microtime(true)).".".$str[1];
                              }
                              move_uploaded_file($motaimg['tmp_name'],$path.$renamemota);
                              $hinhanh = $this->hinhanh->hinhanh($maloai, $renamemota);
                              if($hinhanh == 'succes'){
                                $check = true;
                              }else{
                                $check = false;
                              }
                            }
                          }
                          if($check){
                            echo json_encode("succes");
                          }else{
                            echo json_encode('fail');
                          }
                        }else{
                          echo json_encode("succes");
                        }
                      }else{
                        echo json_encode("succes");
                      }
                    }else{
                      echo json_encode('fail');
                    }
                  }else{
                    echo json_encode('null');
                  }
                }
            }
        }else{
          echo json_encode($checktenupdate);
        }
      }else{
        echo json_encode('null');
      }
    }

    function deleteimgmota(){
      if(isset($_POST['idimg'])){
        $idimg = $_POST['idimg'];
        $this->hinhanh->deleteimgmota($idimg);
      }
    }
  }
?>