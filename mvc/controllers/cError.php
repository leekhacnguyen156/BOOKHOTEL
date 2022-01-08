<?php
  class cError extends Controller{
    function v404(){
      $this->view("error","404",[]);
    }
  }
?>