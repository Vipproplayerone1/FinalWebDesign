<?php
session_start();

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

$sql_nhom = "SELECT * FROM `sanpham_nhom`";
$result_nhom = $conn->query($sql_nhom);

$addToCartClicked = isset($_POST['addcart']);

if ($addToCartClicked && !isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HNSHop Fashion</title>
    <meta name="description" content="Shop the latest fashion trends at HNSHop. Explore our collection of clothing, accessories, and more.">
    <meta name="keywords" content="HNSHop, fashion, clothing, accessories, shop">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="shortcut icon" href="assets/img/iconweb1.png" type="image/x-icon">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"></noscript>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Image */
        .product__items-img {
            height: 210px;
        }

        /* Tin Tức */
        .news-items__img {
            width: 100%;
            height: 256px;
            border-radius: 20px;
        }

        .news-items__msg {
            color: #afa5a8;
            font-size: 1.4rem;
            line-height: 1.8rem;
            max-height: 3.6rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .news-items__permission-date::before {
            display: none;
        }

        /* Nút Liên Hệ */
        .contact__btn-link {
            padding: 12px 21px;
            border: none;
            cursor: pointer;
        }

        /* News_detail */
        .news-items__img {
            margin-top: 20px;
        }

        .news-items__msg-full {
            display: block;
            max-height: unset;
            line-height: 2.4rem;
            color: var(--black-color);
            font-size: 1.8rem;
            font-weight: 500;
            text-align: left;
        }

        .news-items__title-strong {
            font-size: 3.2rem;
            font-weight: 600;
            margin-bottom: 0;
        }

        .news-items__permission-strong {
            font-size: 1.6rem;
            font-weight: 500;
        }

        /* Login */
        .relog-form__btn-link {
            width: 100%;
            border: none;
            cursor: pointer;
        }

        /* In - Out Header */
        .header-top__join-in {
            color: white;
            font-size: 1.4rem;
            font-weight: 300;
            user-select: none;
            cursor: pointer;
        }

        .header-top__join-out {
            text-decoration: none;
            color: #000;
            font-size: 1.4rem;
            font-weight: 400;
            border-left: 2px solid white;
            header: 18px;
        }

        /* Search btn */
        .header-top__search-icon {
            border: none;
            cursor: pointer;
        }

        /* Button add-cart */
        .detail-items__btn {
            margin-top: 0;
        }

        .detail-items__btn-cart {
            width: 100%;
            cursor: pointer;
        }

        .detail-items__quantity-num {
            font-size: 1.6rem;
            margin: 20px 0;
        }

        /* Cart */
        .cart__info {
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 80%;
            padding: 21px;
        }

        .cart__info-gr {
            margin: 10px auto;
            display: flex;
            align-items: center;
            width: 80%;
        }

        .cart__info-text {
            min-width: 80px;
            font-size: 1.4rem;
        }

        .cart__info-input {
            flex: 1;
            padding: 12px 8px;
            border-radius: 2px;
            border: 1px solid #ccc;
        }

        .cart__table-num {
            text-align: center;
        }

        .cart__table {
            border: 1px solid #000;
            border-collapse: collapse;
            width: 100%;
            font-size: 1.4rem;
        }

        thead th {
            width: 15%;
            border: 1px solid #000;
        }

        tbody td {
            text-align: center;
            border: 1px solid #000;
            height: 120px;
        }

        .cart__table-img {
            width: 60%;
            height: 80%;
        }

        .cart__table-money {
            background-color: #99989a;
            height: 40px;
        }

        .cart__table-money-text {
            border-right: 2px solid #fff;
        }

        .cart__table-btn {
            margin-top: 10px;
            display: flex;
        }

        .cart__table-btn-agree,
        .cart__table-btn-delete,
        .cart__table-btn-home {
            text-decoration: none;
            min-width: 160px;
            padding: 12px;
            border-radius: 10px;
            outline: none;
            border: none;
            font-size: 1.3rem;
            color: var(--white-color);
            background-color: var(--green-color);
            cursor: pointer;
            transition: background-color ease-in .2s;
        }

        .cart__table-btn-delete,
        .cart__table-btn-home {
            min-width: 160px;
            text-align: center;
            margin-left: 5px;
        }

        .cart__table-btn-agree:hover,
        .cart__table-btn-delete:hover,
        .cart__table-btn-home:hover {
            background-color: var(--primary-color);
        }

        /* More cart - trang chủ */
        .product__items-more-cart {
            border: none;
            color: var(--white-color);
            background-color: transparent;
            cursor: pointer;
        }

        /* Detail form */
        .detail-items__quantity {
            display: block;
        }

        /* Header-top_join */
        .header-top__join-wrap {
            display: flex;
            align-items: center;
            position: relative;
        }

        .header-top__join-menu {
            z-index: 1;
            position: absolute;
            width: 140px;
            background-color: #fff;
            right: 4px;
            top: 20px;
            list-style: none;
            padding: 0;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 2px;
            display: none;
            animation: growth ease-in .3s;
            transform-origin: calc(100% - 5px) top;
        }

        .header-top__join-menu-items {
            font-size: 1.4rem;
            display: block;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color linear .2s;
        }

        .header-top__join-menu-items:hover {
            background-color: #f5f5f5;
        }

        .header-top__join-menu::before {
            content: "";
            display: block;
            position: absolute;
            border-width: 10px 13px;
            border-style: solid;
            border-color: transparent transparent #fff transparent;
            top: -19px;
            right: 7px;
            cursor: pointer;
        }

        .header-top__join-wrap::after {
            content: "";
            display: block;
            position: absolute;
            width: 52px;
            height: 20px;
            cursor: pointer;
            background-color: transparent;
            top: 15px;
            right: -3px;
            cursor: pointer;
        }

        .header-top__join-wrap:hover .header-top__join-menu {
            display: block;
        }

        .header-top__join-login-icon {
            cursor: pointer;
        }

        /* Button cart */
        .cart__table-delete-hi {
            text-decoration: none;
            color: #000;
            transition: color ease-in .2s;
        }

        .cart__table-delete-hi:hover {
            color: orange;
        }

        /* Mua ngay detail1 */
        .detail-items__btn-buy {
            color: var(--white-color);
            background-color: #1c5b41;
            width: 100%;
            border: none;
            cursor: pointer;
        }

        /* Chữ Kho Hàng */
        .detail-items__warehouse-remaining {
            font-size: 1.6rem;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="wrapper">
        <header class="header">
            <div class="grid wide">
                <div class="header-top">
                    <div class="header-top__gr">
                        <img src="assets/img/Logo_header3.png" alt="Logo" class="header-top__logo">
                        <form action="search.php" method="POST" class="header-top__search" role="search">
                            <input type="text" name="tukhoa" class="header-top__search-input" placeholder="Find the product you want" value="<?php echo isset($_POST['tukhoa']) ? htmlspecialchars($_POST['tukhoa']) : ''; ?>" aria-label="Search for products">
                            <button type="submit" name="timkiem" class="header-top__search-icon" aria-label="Search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <div class="header-top__tools">
                            <div class="header-top__join">
                                <?php if (isset($_SESSION['user'])) { ?>
                                    <i class="header-top__join-login-icon fa-solid fa-user" aria-hidden="true"></i>
                                    <div class="header-top__join-wrap">
                                        <span title="Thông tin" class="header-top__join-in"><?php echo htmlspecialchars($_SESSION['user']); ?></span>
                                        <ul class="header-top__join-menu">
                                            <li class="header-top__join-menu-items"><a class="header-top__join-out" href="info_product.php">Order</a></li>
                                            <li class="header-top__join-menu-items"><a class="header-top__join-out" href="contact.php">Contact</a></li>
                                            <li class="header-top__join-menu-items"><a class="header-top__join-out" href="logout.php">Log out</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="header-top__cart">
                                    <a href="cart.php" class="header-top__cart-link" aria-label="View cart">
                                        <i class="fa-solid fa-cart-plus" aria-hidden="true"></i>
                                    </a>
                                    <span class="header-top__cart-notify-num"><?php echo isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0; ?></span>
                                    <div class="header-top__cart-notify">
                                        <span class="header-top__no-notify-text">There are no products in your shopping cart</span>
                                        <ul class="header-top__cart-notify-list">
                                            <?php
                                            if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
                                                foreach ($_SESSION['giohang'] as $key => $product) {
                                                    echo '<li class="header-top__cart-notify-items">
                                                            <div class="header-top__has-cart-notify">
                                                                <img src="upload/' . htmlspecialchars($product[0]) . '" alt="Product Image" class="header-top__has-cart-img">
                                                                <div class="header-top__has-cart-wrap">
                                                                    <div class="header-top__has-cart-info">
                                                                        <a href="#!" class="header-top__has-cart-title">' . htmlspecialchars($product[1]) . '</a>
                                                                        <a href="cart.php?delid=' . $key . '" class="header-top__has-cart-delete">Remove</a>
                                                                    </div>
                                                                    <div class="header-top__has-cart-gr">
                                                                        <div class="header-top__has-cart-quantity">
                                                                            <span class="header-top__has-cart-text">Quantity:</span>
                                                                            <span>' . htmlspecialchars($product[3]) . '</span>
                                                                        </div>
                                                                        <div class="header-top__has-cart-price">
                                                                            <span class="header-top__price-new">' . htmlspecialchars($product[2]) . '</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>';
                                                }
                                            } else {
                                                echo '<span class="header-top__no-notify-text">No products in your cart</span>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php } else { ?>
                                    <a href="login.php" class="header-top__join-login">Log in <span>/</span></a>
                                    <a href="register.php" class="header-top__join-register">Register</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="grid wide">
                        <div class="header-bottom__gr">
                            <nav>
                                <ul class="header-bottom__list">
                                    <li class="header-bottom__items"><a href="index_home.php" class="header-bottom__items-link">Home page</a></li>
                                    <li class="header-bottom__items">
                                        <a href="all.php" class="header-bottom__items-link">
                                            Product <i class="fa-solid fa-circle-chevron-down"></i>
                                        </a>
                                        <div class="header-bottom__product-list">
                                            <?php while ($row_nhom = $result_nhom->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <a class="header-bottom__product-links" href="cat.php?nhom_id=<?php echo $row_nhom['id']; ?>"><?php echo htmlspecialchars($row_nhom['tennhom']); ?></a>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li class="header-bottom__items"><a href="index_news.php" class="header-bottom__items-link">News</a></li>
                                    <li class="header-bottom__items"><a href="contact.php" class="header-bottom__items-link">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="header-bottom__call">
                                <span class="header-bottom__call-msg">
                                    <i class="fa-solid fa-phone-volume" aria-hidden="true"></i>
                                    <span class="header-bottom__call-msg-text">
                                        Phone number:
                                        <a href="tel:0931 937 000" class="header-bottom__call-msg-num">0931 937 000</a>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Rest of the body content -->
    </div>
    <script src="assets/js/main.js" async></script>
</body>
</html>
