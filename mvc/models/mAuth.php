<?php
  class mAuth extends Database{

    function checkLogin($username, $password){
      $conn = $this->connect();
			$stringQuery = "SELECT count(mataikhoan) AS stk FROM taikhoan WHERE tentaikhoan = '$username'";
			$result = mysqli_query($conn, $stringQuery);
      if($result){
        if(mysqli_fetch_assoc($result)['stk'] == 1){
          $stringQuery = "SELECT matkhau FROM taikhoan WHERE tentaikhoan = '$username'";
          $result = mysqli_query($conn, $stringQuery);
          $matkhau = mysqli_fetch_assoc($result)['matkhau'];
          if($result){
            if(password_verify($password, $matkhau)){
              $stringQuery = "SELECT mataikhoan FROM taikhoan WHERE tentaikhoan = '$username'";
              $result = mysqli_query($conn, $stringQuery);
              return [
                'mataikhoan'=> mysqli_fetch_assoc($result)['mataikhoan'],
                'message'=> "succes"
              ];
            }else{
              return [
                'mataikhoan'=> null,
                'message'=> "password"
              ];
            }
          }else{
            return [
              'mataikhoan'=> null,
              'message'=> "fail"
            ];
          }
        }else{
          return [
            'mataikhoan'=> null,
            'message'=> "username"
          ];
        }
      }else{
        return [
          'mataikhoan'=> null,
          'message'=> "fail"
        ];
      }
    }

    public function check_registerhotel($name, $sdt, $email){
      $con = $this->connect();
      $id = $_SESSION['mataikhoan'];
      $query = "SELECT mataikhoan FROM khachsan WHERE mataikhoan = '$id'";
      $result = mysqli_query($con, $query);
      if($result){
        if(mysqli_num_rows($result) == 0){
          $sql = "SELECT tenkhachsan FROM khachsan WHERE tenkhachsan = '$name'";
          $result = mysqli_query($con, $sql);
          if($result){
            if(mysqli_num_rows($result) == 0){
              $sql = "SELECT phone FROM khachsan WHERE phone = '$sdt'";
              $result = mysqli_query($con, $sql);
              if($result){
                if(mysqli_num_rows($result) == 0){
                  $sql = "SELECT email FROM khachsan WHERE email = '$email'";
                  $result = mysqli_query($con, $sql);
                  if($result){
                    if(mysqli_num_rows($result) == 0){
                      return [
                        'makhachsan'=> null,
                        'khachsan'=> "succes"
                      ];
                    }else{
                      return [
                        'mataikhoan'=> null,
                        'khachsan'=> "email"
                      ];
                    }
                  }else{
                    return [
                      'mataikhoan'=> null,
                      'khachsan'=> "fail"
                    ];
                  }
                }else{
                  return [
                    'mataikhoan'=> null,
                    'khachsan'=> "phone"
                  ];
                }
              }else{
                return [
                  'mataikhoan'=> null,
                  'khachsan'=> "fail"
                ];
              }
            }else{
              return [
                'mataikhoan'=> null,
                'khachsan'=> "name"
              ];
            }
          }else{
            return [
              'mataikhoan'=> null,
              'khachsan'=> "fail"
            ];
          }
        }else{
          return [
            'mataikhoan'=> null,
            'khachsan'=> "taikhoan"
          ];
        }
      }
    }

    public function check_register($name, $cmnd, $sdt, $email, $pass, $repass){
      $con = $this->connect();
      $sql = "SELECT tentaikhoan FROM taikhoan WHERE tentaikhoan = '$name'";
      $result = mysqli_query($con, $sql);
      if($result){
        if(mysqli_num_rows($result) == 0){
          $sql = "SELECT cmnd FROM taikhoan WHERE cmnd = '$cmnd'";
          $result = mysqli_query($con, $sql);
          if($result){
            if(mysqli_num_rows($result) == 0){
              $sql = "SELECT sdt FROM taikhoan WHERE sdt = '$sdt'";
              $result = mysqli_query($con, $sql);
              if($result){
                if(mysqli_num_rows($result) == 0){
                  $sql = "SELECT email FROM taikhoan WHERE email = '$email'";
                  $result = mysqli_query($con, $sql);
                  if($result){
                    if(mysqli_num_rows($result) == 0){
                      if($pass == $repass){
                        return [
                          'mataikhoan'=> null,
                          'user'=> "succes"
                        ];
                      }else{
                        return [
                          'mataikhoan'=> null,
                          'user'=> "pass"
                        ];
                      }
                    }else{
                      return [
                        'mataikhoan'=> null,
                        'user'=> "email"
                      ];
                    }
                  }else{
                    return [
                      'mataikhoan'=> null,
                      'user'=> "fail"
                    ];
                  }
                }else{
                  return [
                    'mataikhoan'=> null,
                    'user'=> "sdt"
                  ];
                }
              }else{
                return [
                  'mataikhoan'=> null,
                  'user'=> "fail"
                ];
              }
            }else{
              return [
                'mataikhoan'=> null,
                'user'=> "cmnd"
              ];
            }
          }else{
            return [
              'mataikhoan'=> null,
              'user'=> "fail"
            ];
          }
        }else{
          return [
            'mataikhoan'=> null,
            'user'=> "name"
          ];
        }
      }else{
        return [
          'mataikhoan'=> null,
          'user'=> "fail"
        ];
      }
    }

    //check hotel
    public function checkhotel($id){
      $con = $this->connect();
      $sql = "SELECT mataikhoan FROM khachsan WHERE mataikhoan = '$id'";
      $query = mysqli_query($con, $sql);
      if($query){
        if(mysqli_num_rows($query) == 1){
          return [
            "trangthai" =>"co",
          ];
        }else{
          return [
            "trangthai" =>"chua",
          ];
        }
      }
    }

    //check thông tin update tài khoản
    public function check_updateaccount($userid, $user, $cmnd, $email, $sdt){
      $con = $this->connect();
      $sql = "SELECT tentaikhoan FROM taikhoan WHERE tentaikhoan = '$user' and mataikhoan != $userid";
      $result = mysqli_query($con, $sql);
      if($result){
        if(mysqli_num_rows($result) == 0){
          $sql = "SELECT cmnd FROM taikhoan WHERE cmnd = '$cmnd' and mataikhoan != $userid";
          $result = mysqli_query($con, $sql);
          if($result){
            if(mysqli_num_rows($result) == 0){
              $sql = "SELECT sdt FROM taikhoan WHERE sdt = '$sdt' and mataikhoan != $userid";
              $result = mysqli_query($con, $sql);
              if($result){
                if(mysqli_num_rows($result) == 0){
                  $sql = "SELECT email FROM taikhoan WHERE email = '$email' and mataikhoan != $userid";
                  $result = mysqli_query($con, $sql);
                  if($result){
                    if(mysqli_num_rows($result) == 0){
                      return 'succes';
                    }else{
                      return 'email';
                    }
                  }else{
                    return 'fail';
                  }
                }else{
                  return 'sdt';
                }
              }else{
                return 'fail';
              }
            }else{
              return "cmnd";
            }
          }else{
            return "fail";
          }
        }else{
          return "user";
        }
      }else{
        return "fail";
      }
    }

    //thêm tài khoản
    public function InsertUser($name, $cmnd, $dob, $gt, $email, $sdt, $user, $pass ){
        $con = $this->connect();
        $sql = "INSERT INTO taikhoan (mataikhoan, tentaikhoan, matkhau, ten, dob, gioitinh, sdt, email, cmnd) VALUES(null, '$user', '$pass', '$name', '$dob', '$gt', '$sdt', '$email', '$cmnd')";
        $query = mysqli_query($con, $sql);
    }

    //update tài khoản
    public function updateuser($userid, $user, $name, $ngaysinh, $email, $sdt, $gtinh, $cmnd){
      $con = $this->connect();
      $sql = "UPDATE taikhoan SET tentaikhoan ='$user', ten = '$name', dob = '$ngaysinh', email = '$email', sdt = '$sdt', gioitinh = '$gtinh', cmnd = '$cmnd' WHERE mataikhoan = $userid";
      $query = mysqli_query($con, $sql);
      return $query;
  }

    //lấy user và check xem có khách sạn hay chưa
    public function getUserById($iduser){
      $con = $this->connect();
      $sql = "SELECT avt, ten FROM taikhoan WHERE mataikhoan = " . $iduser;
      $sql2 = "SELECT mataikhoan FROM khachsan WHERE mataikhoan = " . $iduser;
      $query = mysqli_query($con, $sql);
      $query2 = mysqli_query($con, $sql2);
      $result = mysqli_fetch_assoc($query);
      if(mysqli_num_rows($query2) == 0){
        return [
          "avt" => $result['avt'],
          "ten" => $result['ten'],
          "trangthai" =>"chua"
        ];
      }else{
        return [
          "avt" => $result['avt'],
          "ten" => $result['ten'],
          "trangthai" =>"co"
        ];
      }
    }

    //Đếm số bản ghi
    public function num_rows_username($user){
        $con = $this->connect();
        $sql ="SELECT tentaikhoan FROM taikhoan where tentaikhoan = '$user'";
        $kq = mysqli_query($con, $sql);
        if($kq){
            $num = mysqli_num_rows($kq);
        }else{
            $num = 0;
        }
        return $num;
    }

    public function num_rows_sdt($sdt){
        $con = $this->connect();
        $sql ="SELECT sdt FROM taikhoan where sdt = '$sdt'";
        $kq = mysqli_query($con, $sql);
        if($kq){
            $num = mysqli_num_rows($kq);
        }else{
            $num = 0;
        }
        return $num;
    }

    public function gettinh(){
      $con = $this->connect();
      $sql = "SELECT * FROM tinh";
      $query = mysqli_query($con, $sql);
      $data = array();
      if($query){
        while($result = mysqli_fetch_assoc($query)){
          array_push($data, $result);
        }
      }
      return $data;
    }

    //thêm khách sạn
    public function addhotel($id, $name, $mota, $tinh, $dchi, $Latitude, $Longitude, $sdt, $email, $giayphep){
      $con = $this->connect();
      $sql = "INSERT INTO khachsan (makhachsan, mataikhoan, matinh, tenkhachsan, mota, diachi, phone, email, giayphepkinhdoanh, longitude, latitude) VALUES(null, '$id', '$tinh', '$name', '$mota', '$dchi', '$sdt', '$email', '$giayphep', '$Longitude', '$Latitude')";
      $query = mysqli_query($con, $sql);
      return $query;
    }
  }
?>