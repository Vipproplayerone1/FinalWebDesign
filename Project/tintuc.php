<?php include "headerquantri.php";
    include "function_tintuc.php";
    $tintuc = new tintuc(); 
    $rows = $tintuc->hienthi();
    $count= 1; 
?>

<div class="example">
        <div class="container">
            <div class="row">
                <h2 class="heading_admin">News Management </h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>News name</th>
                            <th>Group name</th>
                            <th>Poster's name</th>
                            <th>Post date</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0){
                        foreach ($rows as $row) { ?>
                            <tr>
                                <td>
                                    <?PHP echo $row["tentintuc"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["tennhom"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["tennguoidang"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["ngaydang"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["mota"] ?>
                                </td>
                                <td>
                                   <img src="./upload/<?php echo $row['img']?>"alt="" width="50">

                                </td>

                            </tr>
                           
                        <?PHP }
                         }   ?> 
                    </tbody>
                </table>
                <div class="link_admin-footer">
                        <a class="link_admin-btn" href="themtintuc.php" >Add News</a>
                </div>
            </div>
        </div>

    </div>