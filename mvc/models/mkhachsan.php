<?php
  class mkhachsan extends Database {
    public function getKhachSanId($iduser){
      $conn = $this->connect();
      $sql = "SELECT * FROM khachsan WHERE mataikhoan = $iduser";
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
      return $data;
    }

    public function getKhachsan(){
      $con = $this->connect();
        $query = "SELECT * FROM khachsan";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getKhachsanByKeyTinh($key){
      $con = $this->connect();
      $search_word = explode(" ", $key);
      $query = "SELECT k.*, t.tentinh FROM khachsan as k join tinh as t on k.matinh = t.matinh WHERE t.tentinh like '%$key%' ";
      if(count($search_word) > 1){
        $query = $query . "UNION SELECT k.*, t.tentinh FROM khachsan as k join tinh as t on k.matinh = t.matinh WHERE t.tentinh like '%$search_word[0]%' ";
        for($i = 1; $i < count($search_word); $i++){
          $query = $query . "or t.tentinh like '%$search_word[$i]%' ";
        }
      }
      $search_char = str_split(trim($key));
      $query = $query . "or t.tentinh like 'Tỉnh $search_char[0]%' ";
      $result = mysqli_query($con, $query);
      $data = [];
      while ($row = $result->fetch_array()) {
        $maloai = $row['makhachsan'];
        $queryyt = "SELECT count(y.maloai) as yt FROM yeuthich as y join loaiphong as l on y.maloai = l.maloai 
                  join danhmucloai as d on l.madm = d.madm WHERE d.makhachsan = $maloai";
        $resultyt = mysqli_query($con, $queryyt);
        $querydg = "SELECT AVG(dg.sosao) as s FROM danhgia as dg join loaiphong as l on dg.maloai = l.maloai 
                  join danhmucloai as d on l.madm = d.madm WHERE d.makhachsan = $maloai";
        $resultdg = mysqli_query($con, $querydg);
        $sao = mysqli_fetch_array($resultdg);
        $yt = mysqli_fetch_assoc($resultyt);
        $data[] = [
          "ss" => $sao['s'] ? $sao['s'] : 0,
          "yt" => $yt['yt'],
          "ks" => $row
        ];
      }
      return $data;
    }

    public function getKhachsanByMaTinh($matinh){
      $con = $this->connect();
      $query = "SELECT k.*, t.tentinh FROM khachsan as k join tinh as t on k.matinh = t.matinh WHERE t.matinh = '$matinh' ORDER BY k.makhachsan DESC";
      $result = mysqli_query($con, $query);
      $data = [];
      while ($row = $result->fetch_array()) {
          $maloai = $row['makhachsan'];
          $queryyt = "SELECT count(y.maloai) as yt FROM yeuthich as y join loaiphong as l on y.maloai = l.maloai 
                    join danhmucloai as d on l.madm = d.madm WHERE d.makhachsan = $maloai";
          $resultyt = mysqli_query($con, $queryyt);
          $querydg = "SELECT AVG(dg.sosao) as s FROM danhgia as dg join loaiphong as l on dg.maloai = l.maloai 
                    join danhmucloai as d on l.madm = d.madm WHERE d.makhachsan = $maloai";
          $resultdg = mysqli_query($con, $querydg);
          $sao = mysqli_fetch_array($resultdg);
          $yt = mysqli_fetch_assoc($resultyt);
          $data[] = [
            "ss" => $sao['s'] ? $sao['s'] : 0,
            "yt" => $yt['yt'],
            "ks" => $row
          ];
      }
      return $data;
    }

    public function check_ks_update($name, $sdt, $email, $web, $fb, $idus){
      $conn = $this->connect();
      $sqlname = "SELECT count(makhachsan) as n FROM khachsan WHERE tenkhachsan = '$name' AND mataikhoan != $idus";
      $resultname = mysqli_query($conn, $sqlname);
      if($resultname){
        if( !mysqli_fetch_assoc($resultname)['n'] ){
          $sqlsdt = "SELECT count(makhachsan) as n FROM khachsan WHERE phone = '$sdt' AND mataikhoan != $idus";
          $resultsdt = mysqli_query($conn, $sqlsdt);
          if($resultsdt){
            if( !mysqli_fetch_assoc($resultsdt)['n'] ){
              $sqlemail = "SELECT count(makhachsan) as n FROM khachsan WHERE email = '$email' AND mataikhoan != $idus";
              $resultemail = mysqli_query($conn, $sqlemail);
              if( $resultemail ){
                if( !mysqli_fetch_assoc($resultemail)['n'] ){
                  if($web){
                    $sqlweb = "SELECT count(makhachsan) as n FROM khachsan WHERE website = '$web' AND mataikhoan != $idus";
                    $resultweb = mysqli_query($conn, $sqlweb);
                    if( $resultweb ){
                      if( !mysqli_fetch_assoc($resultweb)['n'] ){
                        if($fb){
                          $sqlfb = "SELECT count(makhachsan) as n FROM khachsan WHERE facebook = '$fb' AND mataikhoan != $idus";
                          $resultfb = mysqli_query($conn, $sqlfb);
                          if( $resultfb ){
                            if( !mysqli_fetch_assoc($resultfb)['n'] ){
                              return "succes";
                            }else{
                              return "fb";
                            }
                          }else{
                            return "fail";
                          }
                        }else{
                          return "succes";
                        }
                      }else{
                        return "web";
                      }
                    }else{
                      return "fail";
                    }
                  }else{
                    return "succes";
                  }
                }else{
                  return "email";
                }
              }else{
                return "fail";
              }
            }else{
              return "sdt";
            }
          }else{
            return "fail";
          }
        }else{
          return "tenkhachsan";
        }
      }else{
        return "fail";
      }
      return $data;
    }

    public function updatehotel($iduser, $name, $mota, $tinh, $dchi, $Latitude, $Longitude, $sdt, $email, $web, $fb, $avt, $giayphep){
      $con = $this->connect();
      $sql = "UPDATE khachsan SET matinh = '$tinh', tenkhachsan = '$name', img = '$avt', mota = '$mota', diachi = '$dchi', phone = '$sdt', email = '$email',
            website = '$web', facebook = '$fb', giayphepkinhdoanh = '$giayphep', longitude = '$Longitude', latitude = '$Latitude' WHERE mataikhoan = $iduser";
      $query = mysqli_query($con, $sql);
      return $query;
    }
  }
?>