<?php
include "ketnoi.php";
class lienhe extends ketnoi{
        public $hoten;
        public $email;
        public $sdt;
        public $ghichu;
    function hienthi(){
        $sql = "SELECT * FROM `lienhe`";
        $result = mysqli_query($this->conn,$sql);
        return $result;
    }
    function hienthiid($id){
        $sql = "SELECT * FROM lienhe WHERE hoten = '$hoten'";
        $result = mysqli_query($this->conn,$sql);
        return $result;
    }
    function insert(){
        $sql = "INSERT INTO `lienhe`(`hoten`, `email`,`sdt`, `ghichu`) 
        VALUES ('".$this->hoten."','".$this->email."','".$this->sdt."','".$this->ghichu."')";
        $result = mysqli_query($this->conn,$sql);
           if($result){
            echo "<script>alert('Success')</script>";
            echo"<script>window.locaion='lienhe.php'</script>";
           }
           else{
               echo "<script>alert('Error')</script>";
           } 
        return $result;
    
    }
    function delete($hoten){
        $sql = "DELETE FROM `lienhe` WHERE hoten = '$hoten'";
        $result = mysqli_query($this->conn, $sql);
    
       if($result) {
        echo"<script>alert('Deleted successfully')</script>";
        echo "<script>window.history.back()</script>";
    }
    else
    {
        echo" <script>alert('Error')</script>";
    
    }
    }
};
?>