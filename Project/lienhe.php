<?php include "headerquantri.php"; 
      include "function_lienhe.php"; 
      $lienhe = new lienhe(); 
      $result = $lienhe->hienthi();
      $count= mysqli_num_rows($result); 
?>

    <div class="container">
    <h2 class="heading_admin">Contact Management</h2>
        <div class="account__form">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Content</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($count > 0){
                while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["hoten"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["sdt"] ?></td>
                            <td><?php echo $row["ghichu"] ?></td>
                            <td>
                                <a href="xoalienhe.php?hoten=<?PHP echo $row["hoten"] ?>" style="text-decoration: none">Delete</a>
                            </td>   
                        </tr>
                    <?php 
                }
                } ?>
                </tbody>
            </table>
        </div>
    </div>