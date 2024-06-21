<?php include "headerquantri.php";?>
<?php
    include "function_sanpham.php";
    $sanpham = new sanpham(); 
    $result = $sanpham->hienthi();
    $count= mysqli_num_rows($result);  
?>
    <!-- Thông qua -->
    <div class="example">
        <div class="container">
            <div class="row">
                <h2 class="heading_admin">Product Management </h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Category</th>
                            <th>Product's name</th>
                            <th>Describe</th>
                            <th>Unit price</th>
                            <th>Old Unit price</th>
                            <th>Quantity</th>
                            <th>Image </th>
                            <th>Enable</th>
                            <th>Note</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0){
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?PHP echo $row["masp"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["tennhom"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["tensp"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["mota"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["dongia"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["dongiaold"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["soluong"] ?>
                                </td>
                                <td>
                                   <img src="./upload/<?php echo $row['img']?>"alt="" width="50">

                                </td>
                                <td>
                                    <?PHP echo ($row['enable']==1) ?>
                                </td>
                                 <td>
                                    <?PHP echo $row["ghichu"] ?>
                                </td>
                                <td>
                                    <a class="link_admin link_admin-fix" href="suasanpham.php?masp=<?PHP echo $row["masp"] ?>" style="text-decoration: none">Edit</a>
                                    <a class="link_admin link_admin-delete" href="xoasanpham.php?masp=<?PHP echo $row["masp"] ?>" style="text-decoration: none">Delete</a>
                                </td>

                            </tr>
                           
                        <?PHP }
                         }   ?> 
                    </tbody>
                </table>
                    <div class="link_admin-footer">
                        <a class="link_admin-btn" href="themsanpham.php" >Add Products</a>
                    </div>
            </div>
        </div>

    </div>
</body>

</html>