<?php
ob_start(); // Start output buffering
include "headernguoidung.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

// Xóa tất cả
if (isset($_GET['delcart']) && ($_GET['delcart'] == 1)) unset($_SESSION['giohang']);
// Xóa sản phẩm trong giỏ hàng (xóa đơn xóa từng cái một)
if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
}

// Lấy dữ liệu từ form khi người dùng thêm sản phẩm vào giỏ hàng
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    $img = $_POST['img'];
    $tensp = $_POST['tensp'];
    $dongia = $_POST['dongia'];
    $soluong = $_POST['soluong'];

    // Kiểm tra sản phẩm có trong giỏ hàng hay không
    $fl = 0;

    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        if ($_SESSION['giohang'][$i][1] == $tensp) {
            $fl = 1;
            $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $soluongnew;
            break;
        }
    }

    if ($fl == 0) {
        // Thêm mới sản phẩm vào giỏ hàng
        $sp = [$img, $tensp, $dongia, $soluong];
        $_SESSION['giohang'][] = $sp;
    }
    
    // Thiết lập thông báo thành công
    $_SESSION['success'] = "The product has been successfully added to the cart!";
    header("Location: detail.php?masp=" . $_POST['masp'] . "&success=1");
    exit();
}

// Kiểm tra nếu có thông báo thành công
$success = isset($_GET['success']) ? $_GET['success'] : 0;

include "thuvien.php";

// Unset giỏ hàng session chỉ khi ấn nút dongydathang
if (isset($_POST['dongydathang'])) {
    // Set giỏ hàng về rỗng
    // Lưu trữ giỏ hàng vào biến tạm thời
    $cartBackup = $_SESSION['giohang'];
    unset($_SESSION['giohang']);
    $_SESSION['order_success'] = true;
}
?>

<div class="cart">
    <div class="grid wide">
        <div class="row">
            <div class="col l-12">
                <?php if ($success == 1): ?>
                    <div class="success-message">
                        Sản phẩm đã được thêm vào giỏ hàng thành công!
                        <br>
                        <a href="index_home.php">Về trang chủ</a> | <a href="cart.php">Xem giỏ hàng</a>
                    </div>
                <?php endif; ?>

                <form action="bill.php" method="post">
                    <div class="cart__fill">
                        <h3 class="product__heading">Delivery information</h3>
                        <div class="cart__info l-o-1">
                            <div class="cart__info-gr">
                                <span class="cart__info-text">Full name</span>
                                <input type="text" name="hoten" class="cart__info-input">
                            </div>
                            <div class="cart__info-gr">
                                <span class="cart__info-text">Address</span>
                                <input type="text" name="diachi" class="cart__info-input">
                            </div>
                            <div class="cart__info-gr">
                                <span class="cart__info-text">Phone</span>
                                <input type="text" name="dienthoai" class="cart__info-input">
                            </div>
                            <div class="cart__info-gr">
                                <span class="cart__info-text">Email</span>
                                <input type="text" name="email" class="cart__info-input">
                            </div>
                        </div>
                    </div>

                    <div class="cart__product">
                        <h3 class="product__heading">Cart</h3>
                        <table class="cart__table">
                            <thead>
                                <th>STT</th>
                                <th>Images</th>
                                <th>Product's name</th>
                                <th>Unit price</th>
                                <th>Quantity</th>
                                <th>into money</th>
                                <th>Function</th>
                            </thead>
                            <tbody>
                                <?php echo showgiohang(); ?>
                            </tbody>
                        </table>
                        <div class="cart__table-btn">
                            <button class="cart__table-btn-agree" type="submit" name="dongydathang">Agree to order</button>
                            <a href="cart.php?delcart=1" class="cart__table-btn-delete">Delete cart</a>
                            <a href="index_home.php" class="cart__table-btn-home">Continue ordering</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footernguoidung.php";?>

<style>
.success-message {
    padding: 10px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    margin-bottom: 20px;
}
</style>
