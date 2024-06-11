<?php include "headerquantri.php";?>
<?php
    include "function_hoadon.php";
    $hoadon = new hoadon(); 
    $result = $hoadon->hienthi();
    $count= mysqli_num_rows($result);  
?>
    <!-- Thông qua -->
    <div class="example">
        <div class="container">
            <div class="row">
                <h2 class="heading_admin">Bill management</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Buyer Name</th>
                            <th>Address</th>
                            <th>Phone number</th>
                            <th>Email</th>
                            <th>Total money</th>
                            
                            <!-- <th>Pttt</th> -->
                            <!-- <th>Người dùng</th> -->

                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0){
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?PHP echo $row["id"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["name"] ?>
                                </td>
                                <td>
                                <?PHP echo $row["address"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["tel"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["email"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["total"] ?>
                                </td>
                                
                                <!-- <td>
                                    <?PHP echo $row["pttt"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["user"] ?>
                                </td> -->

                                <td>
                                    <a class="link_admin link_admin-delete" href="xoahoadon.php?id=<?PHP echo $row["id"] ?>" style="text-decoration: none">Xóa</a>
                                </td>

                            </tr>
                           
                        <?PHP }
                         }   ?> 
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>