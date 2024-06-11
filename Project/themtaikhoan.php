<?php include "headerquantri.php";
include "function_taikhoan.php";
$taikhoan = new taikhoan();
if(isset($_POST['tbOk'])){
   $taikhoan->tendangnhap=isset($_POST['tendangnhap']) ? $_POST['tendangnhap'] : '';
   $taikhoan->matkhau=isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
   $taikhoan->hoten=isset($_POST['hoten']) ? $_POST['hoten'] : '';
   $taikhoan->email=isset($_POST['email']) ? $_POST['email'] : '';
   $taikhoan->enable=isset($_POST['enable']) ? $_POST['enable'] : 0 ;
   $taikhoan->insert();
}
?>

<div class="container" >
    <h2>More account</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">User name:</label>
            <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" required>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control"  name="matkhau" required>
        </div>
        <div class="form-group">
            <label for="email">Full name:</label>
            <input type="text" class="form-control" name="hoten" >
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" >
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="enable" checked> Activated </label>
        </div>
        <button type="submit" class="btn btn-primary" name="tbOk">Accept</button>
    </form>
</div>

