    <?php
    class mdanhgia extends Database{
        public function getdanhgiatheoidphong($idp){
            $conn = $this->connect();
            $sql = "SELECT COUNT(madanhgia) as c FROM danhgia as dg JOIN loaiphong as lp on dg.maloai = lp.maloai WHERE dg.maloai = $idp";
            $rs = mysqli_query($conn,$sql);
            $sql_diem = "SELECT AVG(dg.sosao) as a FROM danhgia as dg JOIN loaiphong as lp on dg.maloai = lp.maloai WHERE dg.maloai = $idp";
            $rsd = mysqli_query($conn,$sql_diem);
            if($rs AND $rsd){
                $sodanhgia = mysqli_fetch_assoc($rs);
                $diem = mysqli_fetch_assoc($rsd);
                $data = ['sodanhgia' => $sodanhgia['c'], 'diem' => round($diem['a'], 1)];
            }else{
                $data = 0.0;
            }
            return $data;
        }

        public function getalldanhgia($maloai){
            $conn = $this->connect();
            $sql = "SELECT * FROM danhgia where maloai = $maloai";
            $rs = mysqli_query($conn,$sql);
            $data = array();
            if($rs){
                while($dt = mysqli_fetch_assoc($rs)){
                array_push($data, $dt);
                }
            }
            return $data;
        }

        public function addDanhgia($sosao, $maloai, $noidung, $thoigian, $mataikhoan){
            $conn = $this->connect();
            $sql = "INSERT danhgia (madanhgia, mataikhoan, maloai, sosao, noidung, thoigian) 
                    VALUES (null, $mataikhoan, $maloai, $sosao, '$noidung', '$thoigian')";
            $rs = mysqli_query($conn,$sql);
            if($rs){
                return true;
            }
        }

        public function checkTrungPhongDG($maloai, $mataikhoan){
            $conn = $this->connect();
            $sql = "SELECT count(tk.mataikhoan) as n FROM taikhoan as tk join khachsan as ks on tk.mataikhoan = ks.mataikhoan 
                    join danhmucloai as dm on dm.makhachsan = ks.makhachsan join loaiphong as lp on
                    lp.madm = dm.madm WHERE tk.mataikhoan = $mataikhoan and lp.maloai = $maloai";
            $rs = mysqli_query($conn,$sql);
            if($rs){
                $data = mysqli_fetch_assoc($rs);
                if($data['n'] > 0){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
?>