<?php
  class mphong extends Database {
    
    public function getphong($id, $start, $count){
      $conn = $this->connect();
      $ks = "SELECT p.maloai, p.madm, p.tenloai, p.soluong, p.anhtieude, p.mota, p.dientich, p.sokhach, d.tendm 
            FROM loaiphong as p JOIN danhmucloai as d ON p.madm = d.madm JOIN khachsan as k ON d.makhachsan = k.makhachsan 
            WHERE k.mataikhoan = $id
            LIMIT $start, $count";
      $result2 = mysqli_query($conn, $ks);
      $data = array();
      if($result2){
          while($phong = mysqli_fetch_assoc($result2)){
          array_push($data, $phong);
          }
      }
      return $data;
    }

    public function getphongbymadm($madm){
      $conn = $this->connect();
      $ks = "SELECT * FROM loaiphong WHERE madm = $madm";
      $result2 = mysqli_query($conn, $ks);
      $data = array();
      if($result2){
          while($phong = mysqli_fetch_assoc($result2)){
            array_push($data, $phong);
          }
      }
      return $data;
    }
    
    public function count_phong($id){
      $conn = $this->connect();
      $ks = "SELECT count(p.maloai) as n FROM loaiphong as p JOIN danhmucloai as d ON p.madm = d.madm JOIN khachsan as k ON d.makhachsan = k.makhachsan WHERE k.mataikhoan = ".$id;
      $result2 = mysqli_query($conn, $ks);
      $data = mysqli_fetch_assoc($result2);
      return $data['n'];
    }

    public function getidphong($iddm){
      $conn = $this->connect();
      $sql = "SELECT maloai FROM loaiphong WHERE madm = '$iddm'";
      $result = mysqli_query($conn, $sql);
      $data = array();
      if($result){
          while($phong = mysqli_fetch_assoc($result)){
          array_push($data, $phong);
          }
      }
      return $data;
    }

    public function getphongtheoidphong($idp){
      $conn = $this->connect();
      $sql = "SELECT * FROM loaiphong WHERE maloai = $idp";
      $rs = mysqli_query($conn,$sql);
      $data = mysqli_fetch_assoc($rs);
      return $data;
    }

    public function getimgtheoidphong($idp){
      $conn = $this->connect();
      $sql = "SELECT img FROM hinhanh as hp join loaiphong as lp on hp.maloai = lp.maloai where hp.maloai = $idp";
      $rs = mysqli_query($conn, $sql);
      $data = array();
      if($rs){
          while($dt = mysqli_fetch_assoc($rs)){
          array_push($data, $dt);
          }
      }
      return $data;
    }

    public function getdiachitheoidphong($idp){
      $conn = $this->connect();
      $sql = "SELECT diachi FROM khachsan as p join danhmucloai as dm 
      on p.makhachsan = dm.makhachsan join loaiphong as lp on dm.madm = lp.madm WHERE lp.maloai = $idp";
      $rs = mysqli_query($conn,$sql);
      $data = mysqli_fetch_assoc($rs);
      return $data;
    }

    public function xoaphong($idphong){
      $conn = $this->connect();
      $img = "SELECT anhtieude FROM loaiphong WHERE maloai = '$idphong'";
      $getimg = mysqli_query($conn, $img);
      $tenimg = mysqli_fetch_assoc($getimg)['anhtieude'];
      $path = root."/mvc/assets/img/";
      $xoa = unlink($path.$tenimg);
      if($xoa){
        $imgmota = "SELECT img FROM hinhanh WHERE maloai = '$idphong'";
        $getimgmota = mysqli_query($conn, $imgmota);
        $motaarr = [];
        while ($row = $getimgmota->fetch_array()) {
          $motaarr[] = $row;
        }
        foreach($motaarr as $key =>$value){
          $path = root."/mvc/assets/imgmota/";
          $xoa = unlink($path.$value['img']);
        }
        $sql = "DELETE FROM loaiphong WHERE maloai = '$idphong'";
        $result = mysqli_query($conn, $sql);
      }
      return $result;
    }

    public function xoaimgphong($idphong){
      $conn = $this->connect();
      $img = "SELECT anhtieude FROM loaiphong WHERE maloai = '$idphong'";
      $getimg = mysqli_query($conn, $img);
      $tenimg = mysqli_fetch_assoc($getimg)['anhtieude'];
      $path = root."/mvc/assets/img/";
      $xoa = unlink($path.$tenimg);
      if($xoa){
        $imgmota = "SELECT img FROM hinhanh WHERE maloai = '$idphong'";
        $getimgmota = mysqli_query($conn, $imgmota);
        $motaarr = [];
        while ($row = $getimgmota->fetch_array()) {
          $motaarr[] = $row;
        }
        foreach($motaarr as $key =>$value){
          $path = root."/mvc/assets/imgmota/";
          $xoa = unlink($path.$value['img']);
        }
      }
      return $xoa;
    }

    function insertDatphong($mataikhoan, $maloai, $magia, $ngaynhan, $ngaytra ,$hoten, $email, $sdt, $thoigianden, $trangthai){
      $conn = $this->connect();
      $sql = "INSERT INTO phieudat (maphieudat, mataikhoan, maloai, magia, ngaynhan, ngaytra,
        hoten, email, sdt, thoigianden, trangthai) 
        VALUES(null, $mataikhoan, $maloai, $magia,'$ngaynhan', '$ngaytra' ,'$hoten',
        '$email', '$sdt', '$thoigianden', '$trangthai')";
      $result = mysqli_query($conn, $sql);
      if($result){
        return 'succes';
      }else{
        return 'fail';
      }
    }

    function checkdatphongcuaminh($maloai, $mataikhoan){
      $conn = $this->connect();
      $sql ="SELECT * FROM loaiphong as lp join danhmucloai as dml on lp.madm = dml.madm 
      join khachsan as ks on dml.makhachsan = ks.makhachsan WHERE ks.mataikhoan = $mataikhoan and lp.maloai = $maloai";
      $rs = mysqli_query($conn, $sql);
      if($rs){
        if(mysqli_num_rows($rs) == 0){
          return 'false';
        }else{
          return 'true';
        }
      }else{
        return 'null';
      }
    }

    function checkthichphong($maloai, $mataikhoan){
      $conn = $this->connect();
      $sql_check = "SELECT * FROM yeuthich where maloai = $maloai AND mataikhoan = $mataikhoan";
      $rs_check = mysqli_query($conn, $sql_check);
      if($rs_check){
        if(mysqli_num_rows($rs_check) == 0){
          return 'true';
        }else{
          return 'false';
        }
      }else{
        return 'null';
      }
    }

    function getdichvutheoidphong($maloai){
      $conn = $this->connect();
      $sql = "SELECT * FROM phieudv where maloai = $maloai";
      $result = mysqli_query($conn, $sql);
      $data = array();
      if($result){
          while($dv = mysqli_fetch_assoc($result)){
          array_push($data, $dv);
          }
      }
      return $data;
    }

    function insertThichphong($maloai, $mataikhoan){
      $conn = $this->connect();
      $sql_check = $this->checkthichphong($maloai, $mataikhoan);
      if($sql_check != 'null'){
        if($sql_check == 'true'){
            $sql = "INSERT INTO yeuthich (idyeuthich, maloai, mataikhoan) 
            VALUES(null,  $maloai, $mataikhoan)";
            $result = mysqli_query($conn, $sql);
            if($result){
              return 'succes_t';
            }else{
              return 'fail';
            }
        }else{
          $sql = "DELETE FROM yeuthich WHERE maloai = $maloai AND mataikhoan = $mataikhoan";
            $result = mysqli_query($conn, $sql);
            if($result){
              return 'succes_bt';
            }else{
              return 'fail';
            }
        }
      }else{
        return 'null';
      }
      
    }

    function updatePhong($idloai, $tenphong, $soluong, $sokhach, $mota ,$dtich, $renametieude){
      $conn = $this->connect();
      $sql = "UPDATE loaiphong SET tenloai = '$tenphong', soluong = '$soluong', anhtieude='$renametieude', sokhach='$sokhach', dientich='$dtich', mota='$mota' WHERE maloai =".$idloai;
      $result = mysqli_query($conn, $sql);
      return $result;
    }

    function checkTenPhong($iddm, $tenphong){
      $conn = $this->connect();
      $sqlname = "SELECT count(maloai) as n FROM loaiphong WHERE tenloai = '$tenphong' AND madm = $iddm";
      $resultname = mysqli_query($conn, $sqlname);
      if($resultname){
        $check = mysqli_fetch_assoc($resultname);
        if(!$check['n']){
          return "succes";
        }else{
          return "tenphong";
        }
      }else{
        return "fail";
      }
    }
    
    function checkTenPhongUpdate($iddm, $tenphong, $maloai){
      $conn = $this->connect();
      $sqlname = "SELECT count(maloai) as n FROM loaiphong WHERE tenloai = '$tenphong' AND madm = $iddm AND maloai != $maloai";
      $resultname = mysqli_query($conn, $sqlname);
      if($resultname){
        $check = mysqli_fetch_assoc($resultname);
        if(!$check['n']){
          return "succes";
        }else{
          return "tenphong";
        }
      }else{
        return "fail";
      }
    }

    function insertPhong($iddm, $tenphong, $soluong, $sokhach, $mota ,$dtich, $renametieude){
      $conn = $this->connect();
      $sql = "INSERT INTO loaiphong(maloai, madm, tenloai, soluong, anhtieude, mota, dientich, sokhach)
                  VALUES(null, $iddm, '$tenphong', $soluong, '$renametieude', '$mota', $dtich, $sokhach)";
      $result = mysqli_query($conn, $sql);
      if($result){
        $sqlm = "SELECT maloai FROM loaiphong ORDER BY maloai DESC LIMIT 1";
        $resultm = mysqli_query($conn, $sqlm);
        if($resultm){
          $loai = mysqli_fetch_assoc($resultm);
          return $loai['maloai'];
        }else{
          return "fail";
        }
      }else{
        return "fail";
      }
    }

    function getdichvu(){
      $conn = $this->connect();
      $sql = "SELECT * FROM dịchvu";
      $result = mysqli_query($conn, $sql);
      $data = array();
      if($result){
          while($dv = mysqli_fetch_assoc($result)){
          array_push($data, $dv);
          }
      }
      return $data;
    }
  }
?>