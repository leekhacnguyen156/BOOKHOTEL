<?php
class ckhachsan extends Controller
{

  protected $khachsan;
  protected $danhmuc;

  function __construct()
  {
    $this->khachsan = parent::setModel('mkhachsan', $this->khachsan);
    $this->danhmuc = parent::setModel('mdanhmuc', $this->danhmuc);
  }

  function getKhachSan()
  {
    $khachsan = $this->khachsan->getKhachSanId($_SESSION['mataikhoan']);
    if ($khachsan) {
      echo json_encode($khachsan);
    }
  }

  public function getAllKhachsan()
  {
    $khachsan = $this->khachsan->getKhachsan();
    echo json_encode($khachsan);
  }

  public function viewkhachsan($mataikhoan)
  {
    $data = [];
    $khachsan = $this->khachsan->getKhachSanId($mataikhoan);
    $danhmuc = $this->danhmuc->getdanhmuc($mataikhoan);
    if ($khachsan) {
      $data = [
        "khachsan" => $khachsan,
        "danhmuc" => $danhmuc,
      ];
    }
    $this->view("Hotel", "home_hotel", ($data));
  }

  function viewsearch($matinh)
  {
    $data = [];
    if (isset($matinh) && $matinh != 'null') {
      $searchtinh = $this->khachsan->getKhachsanByMaTinh($matinh);
      $data = [
        "khachsan" => $searchtinh,
      ];
    } else {
      if (isset($_POST['key_search'])) {
        $key_search = $_POST['key_search'];
        if ($key_search) {
          $search = $this->khachsan->getKhachsanByKeyTinh($key_search);
          $data = [
            "khachsan" => $search,
          ];
        }
      }
    }
    $this->view("timkiem", "danhsachphong", $data);
  }

  function updateKhachsan()
  {
    if (!empty($_POST['name']) && !empty($_POST['sdt']) && !empty($_POST['email']) && !empty($_POST['mota']) && !empty($_POST['dchi']) && !empty($_POST['Latitude']) && !empty($_POST['Longitude'])) {
      $name = $_POST['name'];
      $mota = $_POST['mota'];
      $tinh = $_POST['tinh'];
      $dchi = $_POST['dchi'];
      $fb = $_POST['fb'];
      $web = $_POST['webnha'];
      $Latitude = $_POST['Latitude'];
      $Longitude = $_POST['Longitude'];
      $sdt = $_POST['sdt'];
      $email = $_POST['email'];
      $giayphep_old = $_POST['giayphep_old'];
      $avt_old = $_POST['avt_old'];
      $idus = $_SESSION['mataikhoan'];
      $check_update_hotel = $this->khachsan->check_ks_update($name, $sdt, $email, $web, $fb, $idus);
      if ($check_update_hotel) {
        if ($check_update_hotel == "succes") {
          $renamegiayphep = "";
          $renameavt = "";
          if (isset($_FILES['giayphepkinhdoanh'])) {
            $giayphep = $_FILES['giayphepkinhdoanh'];
            if ($giayphep['name']) {
              $path = root . "/mvc/assets/img/";
              if ($giayphep_old) {
                unlink($path . $giayphep_old);
              }
              $renamegiayphep = $giayphep['name'];
              if (file_exists($path . $giayphep['name'])) {
                $str = explode(".", $giayphep['name']);
                $renamegiayphep = $str[0] . round(microtime(true)) . "." . $str[1];
              }
              move_uploaded_file($giayphep['tmp_name'], $path . $renamegiayphep);
            }
          }
          if (isset($_FILES['fileavt'])) {
            $avt = $_FILES['fileavt'];
            if ($avt['name']) {
              $path = root . "/mvc/assets/img/";
              if ($avt_old) {
                unlink($path . $avt_old);
              }
              $renameavt = $avt['name'];
              if (file_exists($path . $avt['name'])) {
                $str = explode(".", $avt['name']);
                $renameavt = $str[0] . round(microtime(true)) . "." . $str[1];
              }
              move_uploaded_file($avt['tmp_name'], $path . $renameavt);
            }
          }
          if ($renamegiayphep) {
            $giayphep_old = $renamegiayphep;
          }
          if ($renameavt) {
            $avt_old = $renameavt;
          }
          $updatehotel = $this->khachsan->updatehotel($idus, $name, $mota, $tinh, $dchi, $Latitude, $Longitude, $sdt, $email, $web, $fb, $avt_old, $giayphep_old);
          if ($updatehotel) {
            echo json_encode("succes");
          } else {
            echo json_encode("hhhhhhhh");
          }
        } else {
          echo json_encode($check_update_hotel);
        }
      } else {
        echo json_encode("fail");
      }
    } else {
      echo json_encode("null");
    }
  }
}
