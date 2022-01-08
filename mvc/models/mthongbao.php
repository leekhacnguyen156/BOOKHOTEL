<?php
class mthongbao extends Database{

    public function themthongbaoad(){
        $con = $this->connect();
        $getpd = "SELECT MAX(maphieudat) FROM phieudat";
        $query_getpd = mysqli_query($con, $getpd);
        $mapd = mysqli_fetch_assoc($query_getpd)["MAX(maphieudat)"];
        $sql = "INSERT INTO thongbao (matb, maloaitb, maphieudat, trangthai, trangthaiduyet) VALUES (null, '1', '$mapd', '0', '0')";
        $query = mysqli_query($con, $sql);
        if($query){
            return "succes";
        }else{
            return "fail";
        }
    }

    public function getsotb($mataikhoan){
        $con = $this->connect();
        $getsotb = "SELECT count(pd.maphieudat) FROM phieudat as pd JOIN loaiphong as lp ON pd.maloai = lp.maloai JOIN danhmucloai as dm on dm.madm = lp.madm join khachsan as ks on dm.makhachsan = ks.makhachsan join taikhoan as tk on tk.mataikhoan = pd.mataikhoan WHERE pd.maloai = lp.maloai and lp.madm = dm.madm and dm.makhachsan = ks.makhachsan and ks.mataikhoan = '$mataikhoan' and pd.trangthai = 0";
        $query = mysqli_query($con, $getsotb);
        $sotb = mysqli_fetch_assoc($query)["count(pd.maphieudat)"];
        if($query){
            return $sotb;
        }else{
            return "fail";
        }
    }

    public function gettb($mataikhoan){
        $con = $this->connect();
        $query = "SELECT pd.* FROM phieudat as pd JOIN loaiphong as lp ON pd.maloai = lp.maloai JOIN gia as g on pd.magia = g.magia JOIN danhmucloai as dm on dm.madm = lp.madm join khachsan as ks on dm.makhachsan = ks.makhachsan join taikhoan as tk on tk.mataikhoan = pd.mataikhoan WHERE pd.maloai = lp.maloai and lp.madm = dm.madm and dm.makhachsan = ks.makhachsan and ks.mataikhoan = '$mataikhoan' ORDER BY pd.trangthai ASC LIMIT 0,5";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function gettbchuaxn($mataikhoan){
        $con = $this->connect();
        $query = "SELECT pd.* FROM phieudat as pd JOIN loaiphong as lp ON pd.maloai = lp.maloai JOIN gia as g on pd.magia = g.magia JOIN danhmucloai as dm on dm.madm = lp.madm join khachsan as ks on dm.makhachsan = ks.makhachsan join taikhoan as tk on tk.mataikhoan = pd.mataikhoan WHERE pd.maloai = lp.maloai and lp.madm = dm.madm and dm.makhachsan = ks.makhachsan and ks.mataikhoan = '$mataikhoan' and pd.trangthai = 0";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getsotb_user($mataikhoan){
        $con = $this->connect();
        $getsotb = "SELECT count(p.maphieudat) FROM phieudat as p JOIN thongbao as t on p.maphieudat = t.maphieudat WHERE p.mataikhoan = '$mataikhoan' and p.trangthai != 0 and t.maloaitb = 2 and t.trangthai = 0";
        $query = mysqli_query($con, $getsotb);
        $sotb = mysqli_fetch_assoc($query)["count(p.maphieudat)"];
        if($query){
            return $sotb;
        }else{
            return "fail";
        }
    }

    public function gettb_user($mataikhoan){
        $con = $this->connect();
        $getsotb = "SELECT p.*, ks.tenkhachsan FROM phieudat as p JOIN thongbao as t on p.maphieudat = t.maphieudat JOIN loaiphong as lp on lp.maloai = p.maloai JOIN danhmucloai as dm on dm.madm = lp.madm Join khachsan as ks on dm.makhachsan = ks.makhachsan WHERE p.mataikhoan = '$mataikhoan' and p.trangthai != 0 and t.maloaitb = 2 ORDER BY t.trangthai ASC limit 0,5";
        $query = mysqli_query($con, $getsotb);
        $data = array();
        if($query){
            while($tb = mysqli_fetch_assoc($query)){
            array_push($data, $tb);
            }
        }
        return $data;
    }

    public function gettbhuy_user($mataikhoan){
        $con = $this->connect();
        $getsotb = "SELECT p.*, ks.tenkhachsan FROM phieudat as p JOIN thongbao as t on p.maphieudat = t.maphieudat JOIN loaiphong as lp on lp.maloai = p.maloai JOIN danhmucloai as dm on dm.madm = lp.madm Join khachsan as ks on dm.makhachsan = ks.makhachsan WHERE p.mataikhoan = '$mataikhoan' and p.trangthai != 0 and t.maloaitb = 2 and t.trangthaiduyet = 2 limit 0,5";
        $query = mysqli_query($con, $getsotb);
        $data = array();
        if($query){
            while($tb = mysqli_fetch_assoc($query)){
            array_push($data, $tb);
            }
        }
        return $data;
    }

    public function gettchuaxem_user($mataikhoan){
        $con = $this->connect();
        $getsotb = "SELECT p.*, ks.tenkhachsan FROM phieudat as p JOIN thongbao as t on p.maphieudat = t.maphieudat JOIN loaiphong as lp on lp.maloai = p.maloai JOIN danhmucloai as dm on dm.madm = lp.madm Join khachsan as ks on dm.makhachsan = ks.makhachsan WHERE p.mataikhoan = '$mataikhoan' and p.trangthai != 0 and t.maloaitb = 2 and t.trangthai = 0 limit 0,5";
        $query = mysqli_query($con, $getsotb);
        $data = array();
        if($query){
            while($tb = mysqli_fetch_assoc($query)){
            array_push($data, $tb);
            }
        }
        return $data;
    }

    public function update_tbus($maphieudat){
        $con = $this->connect();
        $sql = "UPDATE thongbao SET trangthai = 1 WHERE maphieudat = '$maphieudat' and maloaitb = 2";
        $result = mysqli_query($con, $sql);
        return $result;
    }
}
