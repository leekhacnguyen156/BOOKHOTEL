<?php
  class mdichvu extends Database {
    function insertPhieuDV($idloai, $iddv){
      $con = $this->connect();
      $sql = "INSERT INTO phieudv (maphieu, maloai, madv) VALUES(null, '$idloai', '$iddv')";
      $query = mysqli_query($con, $sql);
      if($query){
        return "succes";
      }else{
        return "fail";
      }
    }

    function deletePhieuDV($idloai){
      $con = $this->connect();
      $sql = "DELETE FROM phieudv WHERE maloai = $idloai";
      $query = mysqli_query($con, $sql);
      if($query){
        return "succes";
      }else{
        return "fail";
      }
    }

    function getdichvucu($idloai){
      $con = $this->connect();
      $sql = "SELECT * FROM phieudv WHERE maloai = $idloai";
      $query = mysqli_query($con, $sql);
      $data = array();
      if($query){
        while($dv = mysqli_fetch_array($query)){
          array_push($data, $dv);
        }
      }
      return $data;
    }
  }
?>