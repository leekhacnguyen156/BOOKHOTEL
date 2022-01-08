<?php
class ctinh extends Controller
{

    protected $tinh;

    function __construct()
    {
        $this->tinh = parent::setModel('mtinh', $this->tinh);
    }
    function getTinhCoKhachSan()
    {
        $tinh = $this->tinh->getTinhCoKhachSan();
        echo json_encode($tinh);
    }
    function getTopTinh()
    {
        $tinh = $this->tinh->getTopTinh();
        echo json_encode($tinh);
    }
}
