<?php
class cphieudat extends Controller
{
    protected $phieudat;
    function __construct()
    {
        $this->phieudat = parent::setModel('mphieudat', $this->phieudat);
    }

    public function getPhieudatbyUser()
    {
        $data = $this->phieudat->getPhieudatbyUser($_SESSION['mataikhoan']);
        echo json_encode($data);
    }

    public function countphieudatAdmin(){
        $data = $this->phieudat->countphieudatAdmin($_SESSION['mataikhoan']);
        echo json_encode($data);
    }

    public function getPhieudatbyAdmin()
    {
        $start = $_POST['start'];
        $count = $_POST['count'];
        $data = $this->phieudat->getPhieudatbyAdmin($_SESSION['mataikhoan'], $start, $count);
        echo json_encode($data);
    }

    public function getpdbyid()
    {
        $data = $this->phieudat->getpdbyid($_SESSION['mataikhoan'], $_POST['idpd']);
        echo json_encode($data);
    }

    public function duyetphieudat(){
        if(isset($_POST['idpd'])){
            $duyet = $this->phieudat->duyetphieudat($_POST['idpd']);
            echo json_encode($duyet);
        }else{
            echo json_encode("Null");
        }
    }

    public function huyphieudat(){
        if(isset($_POST['idpd'])){
            $duyet = $this->phieudat->huyphieudat($_POST['idpd']);
            echo json_encode($duyet);
        }else{
            echo json_encode("Null");
        }
    }
}
