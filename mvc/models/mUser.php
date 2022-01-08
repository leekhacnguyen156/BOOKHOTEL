<?php
  class mUser extends Database {
    public function getUserId($iduser){
        $conn = $this->connect();
        $sql = "SELECT * FROM taikhoan WHERE mataikhoan = $iduser";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

    public function updatepass($pass, $iduser){
      $con = $this->connect();
      $password = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "UPDATE taikhoan SET matkhau = '$password' WHERE mataikhoan=".$iduser;
      $result = mysqli_query($con, $sql);
    }

    public function updateavatar($img, $iduser){
      $conn = $this->connect();
      $sql = "UPDATE taikhoan SET avt = '$img' WHERE mataikhoan=".$iduser;
      $result = mysqli_query($conn, $sql);
      return $result;
    }

    public function updatecover($img, $iduser){
      $conn = $this->connect();
      $sql = "UPDATE taikhoan SET anhbia = '$img' WHERE mataikhoan=".$iduser;
      $result = mysqli_query($conn, $sql);
      return $result;
    }

    public function checkPass($pass, $iduser, $newpass, $repass){
      $conn = $this->connect();
      $query = "SELECT matkhau FROM taikhoan WHERE mataikhoan =".$iduser;
      $result = mysqli_query($conn, $query);
      $matkhau = mysqli_fetch_assoc($result)['matkhau'];
      if($result){
        if(password_verify($pass, $matkhau)){
          if($newpass == $repass){
            return [
              'mataikhoan'=> null,
              'mk'=> "yes"
            ];
          }else{
            return [
              'mataikhoan'=> null,
              'mk'=> "xacnhan"
            ];
          }
        }else{
          return [
            'mataikhoan'=> null,
            'mk'=> "sai"
          ];
        }
      }else{
        return [
          'mataikhoan'=> null,
          'mk'=> "fail"
        ];
      }
    }
}
?>