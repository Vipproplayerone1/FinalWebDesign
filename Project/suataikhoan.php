<?php include "headerquantri.php";
include "function_taikhoan.php";
$taikhoan = new taikhoan();
$tendangnhap = $_GET['tendangnhap'];
$result = $taikhoan->hienthiid($tendangnhap);

$row = mysqli_fetch_array($result);
if(isset($_POST['ok'])){
    $taikhoan->tendangnhap  = isset($_POST['tendangnhap']) ? $_POST['tendangnhap'] : '';
    $taikhoan->matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
    $taikhoan->hoten = isset($_POST['hoten']) ? $_POST['hoten'] : '';
    $taikhoan->email= isset($_POST['email']) ? $_POST['email'] : '';
    $taikhoan->enable = isset($_POST['enable']) ? $_POST['enable'] : 0;
    $taikhoan->update();
}
?>
<!DOCTYPE html>
<html lang="en">


<body>
  
    <div class="container">
        <h2>Edit Account</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">User name:</label>
                <input type="text" class="form-control" id="tenn" name="ten"
                    value="<?php echo $row['tendangnhap'] ?>" disabled >
                <input type="hidden" class="form-control" id="tendn" name="tendangnhap"
                    value="<?php echo $row['tendangnhap'] ?>" >
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="matkhau" value="<?php echo $row['matkhau'] ?> "
                    required>
            </div>
            <div class="form-group">
                <label for="email">Full name:</label>
                <input type="text" class="form-control" name="hoten" value="<?php echo $row['hoten'] ?> ">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?> ">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label" style="margin-right: 30px; "> Activated </label>
                <input class="form-check-input" type="checkbox" name="enable" value="1" <?php if ($row['enable'] == 1)
                        echo "checked" ?> />
            </div>
            <button type="submit" class="btn btn-primary" name='ok'>Updatet</button>
            <a href="taikhoan.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>

</html>