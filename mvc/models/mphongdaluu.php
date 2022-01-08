<?php
class mphongdaluu extends Database
{
    public function getPhongLuu($mataikhoan)
    {
        $conn = $this->connect();
        $query = "SELECT loaiphong.maloai, loaiphong.tenloai, loaiphong.anhtieude, gia.gia, loaiphong.soluong, loaiphong.sokhach FROM loaiphong, gia, yeuthich WHERE yeuthich.mataikhoan = '$mataikhoan' AND yeuthich.maloai = loaiphong.maloai AND gia.maloai = loaiphong.maloai";
        $result = mysqli_query($conn, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }
}

?>