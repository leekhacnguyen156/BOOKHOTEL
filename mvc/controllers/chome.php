<?php
class cHome extends Controller
{
  public function home()
  {
    $this->view("home", "home", []);
  }

  public function header()
  {
    $this->view("main", "header", []);
  }
}
