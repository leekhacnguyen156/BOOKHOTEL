<?php
class mphieudat extends Database
{
    public function getPhieudatbyUser($mataikhoan)
    {
        $con = $this->connect();
        $query = "SELECT loaiphong.tenloai, khachsan.tenkhachsan, gia.gia, phieudat.ngaynhan, phieudat.ngaytra, phieudat.thoigianden, phieudat.trangthai FROM phieudat, gia, loaiphong, danhmucloai, khachsan WHERE phieudat.mataikhoan = '$mataikhoan' AND phieudat.magia = gia.magia AND phieudat.maloai = loaiphong.maloai AND loaiphong.madm = danhmucloai.madm AND danhmucloai.makhachsan = khachsan.makhachsan ";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getPhieudatbyAdmin($mataikhoan, $start, $count){
        $con = $this->connect();
        $query = "SELECT pd.*, g.gia, tk.cmnd, lp.tenloai FROM phieudat as pd JOIN loaiphong as lp ON pd.maloai = lp.maloai JOIN gia as g on pd.magia = g.magia JOIN danhmucloai as dm on dm.madm = lp.madm join khachsan as ks on dm.makhachsan = ks.makhachsan join taikhoan as tk on tk.mataikhoan = pd.mataikhoan WHERE pd.maloai = lp.maloai and lp.madm = dm.madm and dm.makhachsan = ks.makhachsan and ks.mataikhoan = '$mataikhoan' ORDER BY maphieudat DESC LIMIT $start, $count";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function countphieudatAdmin($mataikhoan){
        $con = $this->connect();
        $query = "SELECT count(pd.maphieudat) as n FROM phieudat as pd JOIN loaiphong as lp ON pd.maloai = lp.maloai JOIN gia as g on pd.magia = g.magia JOIN danhmucloai as dm on dm.madm = lp.madm join khachsan as ks on dm.makhachsan = ks.makhachsan join taikhoan as tk on tk.mataikhoan = pd.mataikhoan WHERE pd.maloai = lp.maloai and lp.madm = dm.madm and dm.makhachsan = ks.makhachsan and ks.mataikhoan = '$mataikhoan'";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result)['n'];
        return $data;
    }

    public function getpdbyid($mataikhoan, $idpd){
        $con = $this->connect();
        $query = "SELECT pd.*, g.gia, tk.cmnd, lp.tenloai FROM phieudat as pd JOIN loaiphong as lp ON pd.maloai = lp.maloai JOIN gia as g on pd.magia = g.magia JOIN danhmucloai as dm on dm.madm = lp.madm join khachsan as ks on dm.makhachsan = ks.makhachsan join taikhoan as tk on tk.mataikhoan = pd.mataikhoan WHERE pd.maloai = lp.maloai and lp.madm = dm.madm and dm.makhachsan = ks.makhachsan and ks.mataikhoan = '$mataikhoan' and pd.maphieudat = '$idpd'";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function duyetphieudat($idpd){
        $con = $this->connect();
        $sql = "UPDATE thongbao SET trangthai = '1', trangthaiduyet = '1' WHERE maphieudat =".$idpd;
        $result = mysqli_query($con, $sql);
        $sql2 = "UPDATE phieudat SET trangthai = '1' WHERE maphieudat =".$idpd;
        $result2 = mysqli_query($con, $sql2);
        if($result2){
            $sql3 = "INSERT INTO thongbao (matb, maloaitb, maphieudat, trangthai, trangthaiduyet) VALUES(null, 2, '$idpd', 0, 1)";
            $result3 = mysqli_query($con, $sql3);
            if($result3){
                return "ok";
            }
        }
    }

    public function huyphieudat($idpd){
        $con = $this->connect();
        $sql = "UPDATE thongbao SET trangthai = '2', trangthaiduyet = '2' WHERE maphieudat =".$idpd;
        $result = mysqli_query($con, $sql);
        $sql2 = "UPDATE phieudat SET trangthai = '2' WHERE maphieudat =".$idpd;
        $result2 = mysqli_query($con, $sql2);
        if($result2){
            $sql3 = "INSERT INTO thongbao (matb, maloaitb, maphieudat, trangthai, trangthaiduyet) VALUES(null, 2, '$idpd', 0, 2)";
            $result3 = mysqli_query($con, $sql3);
            if($result3){
                return "ok";
            }
        }
    }
}
