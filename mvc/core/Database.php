<?php
  class Database{
    protected $conn = null;
    function connect(){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bookhotel";
      $this->conn = mysqli_connect($servername, $username, $password, $dbname);
      mysqli_query($this->conn, "SET NAMES 'utf8'");
      return $this->conn;
    }
  }
?>