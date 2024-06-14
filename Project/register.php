<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HN SHOP</title>
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="shortcut icon" href="assets/img/iconweb1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="main.js"></script>
    <link rel="stylesheet" href="styles.scss">
    <style>
        /* Button register */
        * {
            box-sizing: border-box;
            font-size: 62.5%;
            font-family: 'Roboto', sans-serif;
            line-height: 1.6rem;
            margin: 0 auto;
        }
        .relog-form__btn-link {
            width: 100%;
            border: none;
            cursor: pointer;
        }
        body {
            background-color: #508bfc;
        }
        .relog-form__btn-link {
            width: 100%;
            border: none;
            cursor: pointer;
        }

        /* relog */

        .relog-register {
            display: flex;
            padding: 100px 0 50px 0;
        }

        .relog-form {
            margin: auto;
            text-align: center;
            padding: 50px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
            position: relative;
        }

        .relog-form__heading {
            color: #000;
            font-size: 3.0rem;
            font-weight: 300;
            text-transform: uppercase;
            margin: 0;
        }

        .relog-form__title {
            font-size: 1.3rem;
            color: #979890;
            margin: 18px 0;
        }

        .relog-form__link {
            font-size: 1.3rem;
            text-decoration: none;
            color: #1c5b41;
        }

        .relog-form__gr {
            display: flex;
            margin: 16px 0;
        }

        .relog-form__gr-input {
            flex: 1;
            padding: 16px 20px;
            min-width: 320px;
            font-size: 1.3rem;
            border-radius: 10px;
            border: none;
            background-color: #ebebeb;
        }

        .relog-form__btn-link {
            display: block;
            padding: 12px 0;
            text-decoration: none;
            color: #fff;
            font-size: 1.3rem;
            border-radius: 10px;
            background-color: #1c5b41;
            transition: background-color ease-in .2s;
        }

        .relog-form__btn-link:hover {
            background-color: orange;
        }

        .relog-form__select-text {
            margin-top: 20px;
            color: var(--black-color);
            font-size: 1.3rem;
        }

        .relog-form__social {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .relog-form__social-text::before {
            content: "";
            display: block;
            position: absolute;
            right: 88px;
            top: 50%;
            transform: translateY(-50%);
            border-right: 1px solid #3a3a3a;
            height: 36px;
        }

        .relog-form__social-text {
            text-align: start;
            font-size: 1.2rem;
            margin: 0;
        }

        .relog-form__btn-forget {
            display: block;
            text-decoration: none;
            color: #1c5b41;
            font-weight: 300;
            font-size: 1.4rem;
            margin-top: 20px;
            transition: color ease-in .2s;
        }

        .relog-form__btn-forget:hover {
            color: orange;
        }
        .relog-form__checkbox {
            font-size: 1.5rem;
            font-weight: 500;
            color: #1c5b41;
            display: flex;
            justify-content: start;
            align-items: center;
            margin: 20px 0;
        }

        .relog-form__checkbox-miss {
            margin:0 4px 0 16px ;
            
        }

        .relog-form__back-icon {
            color: #1c5b41;
            font-size: 2.4rem;
            font-family: 'Roboto', sans-serif;
            position: absolute;
            top: 10px;
            left: 14px;
            text-decoration:none;
            transition:color ease-in .2s;
        }
        .relog-form__back-icon:hover {
            color:var(--primary-color);
        }
        
    </style>
</head>
<body>

    <?php include "function_taikhoan.php"; ?>
    <?php 
        $taikhoan = new taikhoan();
        if(isset($_POST['tbOk'])){
            $taikhoan->tendangnhap=isset($_POST['tendangnhap']) ? $_POST['tendangnhap'] : '';
            $taikhoan->matkhau=isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
            $taikhoan->hoten=isset($_POST['hoten']) ? $_POST['hoten'] : '';
            $taikhoan->email=isset($_POST['email']) ? $_POST['email'] : '';
            $taikhoan->enable=1;
            $taikhoan->insert();
         }
    ?>
        <form action="register.php" method="post" class="relog-register">
        <div class="relog-form">
            <h2 class="relog-form__heading">Register</h2>
            <p class="relog-form__title">Already have an account, log in <a href="login.php" class="relog-form__link"> HERE</a></p>
            <div class="relog-form__info">
                <div class="relog-form__gr">
                    <input type="text" name="email" class="relog-form__gr-input" placeholder="Email">
                </div>
                <div class="relog-form__gr">
                    <input type="text" name="hoten" class="relog-form__gr-input" placeholder="Full name">
                </div>
                <div class="relog-form__gr">
                    <input type="text" name="tendangnhap" class="relog-form__gr-input" placeholder="User name">
                </div>
                <div class="relog-form__gr">
                    <input type="text" name="matkhau" class="relog-form__gr-input" placeholder="Password">
                </div>
            </div>
                <span class="relog-form__checkbox">
                    <input type="checkbox" name="" id="" class="relog-form__checkbox-miss">
                    Remember password
                </span>      
            <div class="relog-form__btn">
                <button type="submit" name="tbOk" class="relog-form__btn-link">Register</button>
            </div>
            <a title="Quay trở về trang chủ" href="index_home.php" class="relog-form__back-icon">
                <i class=" fa-solid fa-arrow-left"></i>
                <span>Home page</span>
            </a>
        </div>
    </form>