<?php
include "headernguoidung.php";


// Database connection (ensure this uses MySQLi)
$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$tukhoa = $_POST['tukhoa'];
$sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$tukhoa%'";
$result = mysqli_query($mysqli, $sql);

?>

<!-- Your HTML content here -->
<div class="all-banner">
    <img src="assets/img/all.jpg" alt="all-banner" class="all-banner__img">
</div>
<div class="all-product">
    <div class="grid wide">
        <h3 class="product__heading">Search keywords : <?php echo htmlspecialchars($tukhoa); ?> </h3>
        <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col l-2-4">
                <div class="product__items">
                    <div class="product__items-wrap">
                        <a href="detail.php?masp=<?php echo htmlspecialchars($row["masp"]); ?>" class="product__items-wrap-link">
                            <img src="./upload/<?php echo htmlspecialchars($row["img"]); ?>" alt="" class="product__items-img">
                        </a>
                        <a href="#!" class="product__items-cart">
                            <i class="product__items-cart-icon fa-solid fa-cart-plus"></i>
                            <span class="product__items-more-cart"> Add to cart </span>
                        </a>
                    </div>
                    <div class="product__items-links">
                        <a href="detail.php?masp=<?php echo htmlspecialchars($row["masp"]); ?>" class="product__items-name"><?php echo htmlspecialchars($row["tensp"]); ?></a>
                    </div>
                    <div class="product__items-price">
                        <span class="product__items-price-old">140.000₫</span>
                        <span class="product__items-price-new"><?php echo htmlspecialchars($row["dongia"]); ?>₫</span>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>

<?php include "footernguoidung.php"; ?>

<?php
$mysqli->close();
?>
