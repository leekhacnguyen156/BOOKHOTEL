<?php
  class mgia extends Database {
    function insertGiaLoai($gia, $idloai, $ngaycapnhat){
      $con = $this->connect();
      $sql = "INSERT INTO gia (magia, gia, maloai, ngaycapnhat) VALUES(null, $gia, '$idloai', '$ngaycapnhat')";
      $query = mysqli_query($con, $sql);
      if($query){
        return "succes";
      }else{
        return "fail";
      }
    }

    function  getGiaNew($idloai){
      $con = $this->connect();
      $sql = "SELECT * FROM gia WHERE maloai = $idloai ORDER BY magia DESC LIMIT 1";
      $query = mysqli_query($con, $sql);
      if($query){
        $gia = mysqli_fetch_assoc($query);
        return $gia;
      }else{
        return "fail";
      }
    }
  }
?>