<?php include "headerquantri.php";?>
<?php include "function_taikhoan.php";
$taikhoan = new taikhoan();
$result = $taikhoan->hienthi();
$count= mysqli_num_rows($result);
?>


    <div class="example">
        <div class="container">
            <div class="row">
                <h2 class="heading_admin">Account Management</h2>
                <table class=" table table-bordered">
                    <thead>
                        <tr>
                            <th>User name</th>
                            <th>Password</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Enable</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0){
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?PHP echo $row["tendangnhap"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["matkhau"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["hoten"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["email"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["enable"] ?>
                                </td>
                                <td>
                                    <a class="link_admin link_admin-fix" href="suataikhoan.php?tendangnhap=<?PHP echo $row["tendangnhap"] ?>" style="text-decoration: none">Sửa</a>
                                    <a class="link_admin link_admin-delete" href="xoataikhoan.php?tendangnhap=<?PHP echo $row["tendangnhap"] ?>" style="text-decoration: none">Xóa</a>
                                </td>

                            </tr>
                           
                        <?PHP
                    }
                     } ?> 
                    </tbody>
                </table>
                <div class="link_admin-footer">
                        <a class="link_admin-btn" href="themtaikhoan.php" >Add account</a>
                    </div>
            </div>
        </div>

    </div>