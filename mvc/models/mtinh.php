<?php
class mtinh extends Database
{
    public function getTinhCoKhachSan()
    {
        $con = $this->connect();
        $query = "SELECT tinh.matinh, tinh.tentinh, tinh.imageTinh, COUNT(*) as soluong FROM tinh, khachsan WHERE khachsan.matinh = tinh.matinh GROUP BY khachsan.matinh";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getTopTinh()
    {
        $con = $this->connect();
        $query = "SELECT tinh.matinh, tinh.tentinh, tinh.imageTinh, COUNT(*) as soluong FROM tinh, khachsan WHERE khachsan.matinh = tinh.matinh GROUP BY khachsan.matinh ORDER BY soluong DESC LIMIT 5";
        $result = mysqli_query($con, $query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }
}
