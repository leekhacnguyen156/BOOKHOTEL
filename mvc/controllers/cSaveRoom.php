<?php
class cSaveRoom extends Controller
{
    protected $phongluu;
    function __construct()
    {
        $this->phongluu = parent::setModel('mphongdaluu', $this->phongluu);
    }

    public function getSaveRoom()
    {
        $data = $this->phongluu->getPhongLuu($_SESSION['mataikhoan']);
        echo json_encode($data);
    }
}
?>