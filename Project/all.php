<?php
include "headernguoidung.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalwebdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "SELECT * FROM sanpham";
$result = $conn->query($sql);
?>

<div class="all">
    <div class="all-banner">
        <img src="assets/img/allHN.jpg" alt="all-banner" class="all-banner__img">
    </div>
    <div class="all-product">
        <div class="grid wide">
            <h3 class="product__heading">All products</h3>
            <div class="row">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col l-2-4">
                        <div class="product__items">
                            <div class="product__items-wrap">
                                <a href="detail.php?masp=<?php echo htmlspecialchars($row["masp"]); ?>" class="product__items-wrap-link">
                                    <img src="./upload/<?php echo htmlspecialchars($row["img"]); ?>" alt="Product Image" class="product__items-img">
                                </a>
                                <form action="cart.php" method="post" class="product__items-cart">
                                    <i class="product__items-cart-icon fa-solid fa-cart-plus"></i>
                                    <input type="submit" value="Thêm vào giỏ hàng" name="addcart" class="product__items-more-cart">
                                    <input type="hidden" name="soluong" value="1">
                                    <input type="hidden" name="tensp" value="<?php echo htmlspecialchars($row["tensp"]); ?>">
                                    <input type="hidden" name="dongia" value="<?php echo htmlspecialchars($row["dongia"]); ?>₫">
                                    <input type="hidden" name="img" value="<?php echo htmlspecialchars($row["img"]); ?>">
                                </form>
                            </div>
                            <div class="product__items-links">
                                <a href="detail.php?masp=<?php echo htmlspecialchars($row["masp"]); ?>" class="product__items-name"><?php echo htmlspecialchars($row["tensp"]); ?></a>
                            </div>
                            <div class="product__items-price">
                                <span class="product__items-price-old"><?php echo htmlspecialchars($row["dongiaold"]); ?>₫</span>
                                <span class="product__items-price-new"><?php echo htmlspecialchars($row["dongia"]); ?>₫</span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include "footernguoidung.php"; ?>
