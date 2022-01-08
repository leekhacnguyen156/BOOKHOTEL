<?php
  class mdanhmuc extends Database {

    public function getdanhmucP($id, $start, $count){
      $con = $this->connect();
      $query = "SELECT makhachsan FROM khachsan WHERE mataikhoan = '$id'";
      $result = mysqli_query($con, $query);
      $makhachsan = mysqli_fetch_assoc($result)['makhachsan'];
      $query2 = "SELECT * FROM danhmucloai WHERE makhachsan = '$makhachsan' LIMIT $start, $count";
      $result2 = mysqli_query($con, $query2);
      $data = array();
      if($result2){
        while($tinh = mysqli_fetch_assoc($result2)){
          array_push($data, $tinh);
        }
      }
      return $data;
    }

    public function getdanhmuc($id){
      $con = $this->connect();
      $query = "SELECT makhachsan FROM khachsan WHERE mataikhoan = '$id'";
      $result = mysqli_query($con, $query);
      $makhachsan = mysqli_fetch_assoc($result)['makhachsan'];
      $query2 = "SELECT * FROM danhmucloai WHERE makhachsan = '$makhachsan'";
      $result2 = mysqli_query($con, $query2);
      $data = array();
      if($result2){
        while($tinh = mysqli_fetch_assoc($result2)){
          array_push($data, $tinh);
        }
      }
      return $data;
    }

    public function getAllDanhmuc(){
      $con = $this->connect();
        $query = "SELECT dm.*, ks.mataikhoan FROM danhmucloai as dm JOIN khachsan as ks on dm.makhachsan = ks.makhachsan";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function conutDanhmuc($mataikhoan){
      $con = $this->connect();
      $query = "SELECT makhachsan FROM khachsan WHERE mataikhoan = '$mataikhoan'";
      $result = mysqli_query($con, $query);
      $makhachsan = mysqli_fetch_assoc($result)['makhachsan'];
      $query2 = "SELECT count(madm) as n FROM danhmucloai WHERE makhachsan = '$makhachsan'";
      $result2 = mysqli_query($con, $query2);
      $data = mysqli_fetch_assoc($result2);
      return $data['n'];
    }

    public function getdanhmucid($iddm){
      $con = $this->connect();
      $query2 = "SELECT * FROM danhmucloai WHERE madm = '$iddm'";
      $result2 = mysqli_query($con, $query2);
      $data = mysqli_fetch_assoc($result2);
      return $data;
    }
    
    public function insertdanhmuc($id, $name, $mota, $img){
      $con = $this->connect();
      $query = "SELECT makhachsan FROM khachsan WHERE mataikhoan = '$id'";
      $result = mysqli_query($con, $query);
      $makhachsan = mysqli_fetch_assoc($result)['makhachsan'];
      $sql = "INSERT INTO danhmucloai (madm, makhachsan, tendm, mota, img) VALUES(null, '$makhachsan', '$name', '$mota', '$img')";
      $query = mysqli_query($con, $sql);
    }

    public function updatedm($id, $name, $mota, $img){
      $con = $this->connect();
      $sql = "UPDATE danhmucloai SET tendm = '$name', mota = '$mota', img='$img' WHERE madm =".$id;
      $result = mysqli_query($con, $sql);
    }
    
    public function check_themdanhmuc($name){
      $conn = $this->connect();
      $idus = $_SESSION['mataikhoan'];
      $query = "SELECT makhachsan FROM khachsan WHERE mataikhoan = '$idus'";
      $result = mysqli_query($conn, $query);
      $makhachsan = mysqli_fetch_assoc($result)['makhachsan'];
      $sql = "SELECT tendm FROM danhmucloai WHERE tendm = '$name' AND makhachsan = '$makhachsan'";
      $result2 = mysqli_query($conn, $sql);
      if($result2){
        if(mysqli_num_rows($result2) == 0){
          return [
            'makhachsan'=> null,
            'danhmuc'=> "succes"
          ];
        }else{
          return [
            'mataikhoan'=> null,
            'danhmuc'=> "tendm"
          ];
        }
      }else{
        return [
          'mataikhoan'=> null,
          'danhmuc'=> "fail"
        ];
      }
    }

    public function check_suadanhmuc($name, $iddm){
      $conn = $this->connect();
      $idus = $_SESSION['mataikhoan'];
      $query = "SELECT makhachsan FROM khachsan WHERE mataikhoan = '$idus'";
      $result = mysqli_query($conn, $query);
      $makhachsan = mysqli_fetch_assoc($result)['makhachsan'];
      $sql = "SELECT tendm FROM danhmucloai WHERE tendm = '$name' AND makhachsan = '$makhachsan' except SELECT tendm FROM danhmucloai WHERE madm = '$iddm'";
      $result2 = mysqli_query($conn, $sql);
      if($result2){
        if(mysqli_num_rows($result2) == 0){
          return [
            'makhachsan'=> null,
            'danhmuc'=> "succes"
          ];
        }else{
          return [
            'mataikhoan'=> null,
            'danhmuc'=> "tendm"
          ];
        }
      }else{
        return [
          'mataikhoan'=> null,
          'danhmuc'=> "fail"
        ];
      }
    }

    function delete_dm($iddm){
      $conn = $this->connect();
      $img = "SELECT img FROM danhmucloai WHERE madm = '$iddm'";
      $getimg = mysqli_query($conn, $img);
      $tenimg = mysqli_fetch_assoc($getimg)['img'];
      $path = root."/mvc/assets/img/";
      $xoa = unlink($path.$tenimg);
      if($xoa){
        $sql = "DELETE FROM danhmucloai WHERE madm = '$iddm'";
        $result = mysqli_query($conn, $sql);
      }
      return $result;
    }
  }
?>