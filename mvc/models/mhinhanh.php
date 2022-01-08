<?php
  class mhinhanh extends Database {
    function hinhanh($idloai, $img){
      $conn = $this->connect();
      $sql = "INSERT INTO hinhanh(id_img, maloai, img) VALUES(null, $idloai, '$img')";
      $result = mysqli_query($conn, $sql);
      if($result){
        return "succes";
      }else{
        return "fail";
      }
    }

    function getimgmota($idphong){
      $conn = $this->connect();
      $sql = "SELECT * FROM hinhanh WHERE maloai = '$idphong'";
      $query = mysqli_query($conn, $sql);
      $data = [];
      if($query){
        while($hinhanh = mysqli_fetch_assoc($query)){
          array_push($data, $hinhanh);
        }
      return $data;
      }else{
        return "fail";
      }
    }

    function deleteimgmota($id){
      $conn = $this->connect();
      $img = "SELECT img FROM hinhanh WHERE id_img = '$id'";
      $result = mysqli_query($conn, $img);
      $tenimg = mysqli_fetch_assoc($result)['img'];
      $path = root."/mvc/assets/imgmota/";
      $xoa = unlink($path.$tenimg);
      if($xoa){
        $sql = "DELETE FROM hinhanh WHERE id_img = '$id'";
        $query = mysqli_query($conn, $sql);
      }
    }

    function deletehinhanh($maloai){
      $conn = $this->connect();
      $sql = "DELETE FROM hinhanh WHERE maloai = '$maloai'";
      $query = mysqli_query($conn, $sql);
      return $query;
    }
  }
?>