<?php include "headerquantri.php";
include "function_tintuc.php";
$nhomtintuc = new nhomtintuc();
$id = $_GET['id'];
$result = $nhomtintuc->hienthiid($id);
$row = mysqli_fetch_array($result);
if(isset($_POST['ok'])){
        $nhomtintuc->id=isset($_POST['id']) ? $_POST['id'] : '';
        $nhomtintuc->tennhom=isset($_POST['tennhom']) ? $_POST['tennhom'] : '';
        $nhomtintuc->ghichu=isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
    $nhomtintuc->update();
}?>


        <div class="container">
            <div class="account__form">
            <h2>Edit News Category</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">ID Category:</label>
                <input type="text" class="form-control" id="idd" name="idd"
                    value="<?php echo $row['id'] ?>" disabled >
                <input type="hidden" class="form-control" id="id" name="id"
                    value="<?php echo $row['id'] ?>" >
            </div>
            <div class="form-group">
                <label for="pwd">Category Name:</label>
                <input type="text" class="form-control" name="tennhom" value="<?php echo $row['tennhom'] ?> ">
            </div>
            <div class="form-group">
                <label for="email">Note:</label>
                <input type="text" class="form-control" name="ghichu" value="<?php echo $row['ghichu'] ?> ">
            </div>
           
            <button type="submit" class="btn btn-primary" name='ok'>Update</button>
            <a href="tintuc_nhom.php" class="btn btn-primary">Back</a>
        </form>

        <?php
    
        ?>

        </div>