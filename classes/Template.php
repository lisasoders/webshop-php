<?php
require_once __DIR__ . '/User.php';
session_start();

class Template
{
    public static function header($title)
    {
        $is_logged_in = isset($_SESSION['user']);
        $logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
        $is_admin = $is_logged_in && $logged_in_user->role == 'admin';

        $cart_count = isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0;

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $title ?> - Shop</title>
            <link rel="stylesheet" href="/shop2/assets/style.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

        </head>

        <body>

            
            <nav class='nav'>
                <div class='nav-left'>
                <a href="/shop2">Start</a>
                <a href="/shop2/pages/products.php">Products</a>
                <a href="/shop2/pages/my-orders.php">My orders</a>
                
                <?php if (!$is_logged_in) : ?>
                    <a href="/shop2/pages/login.php" class="btn">Login</a>
                    <a href="/shop2/pages/register.php" class="btn">Register</a>
                <?php elseif ($is_admin) : ?>
                    <a href="/shop2/pages/admin.php">Admin Area</a>
                <?php endif; ?>
                </div>

                <div>
                <a href="/shop2" class='logo'>ShoeShop</a>
                </div>

                <div class='nav-right'>


                <?php if ($is_logged_in) : ?>
                <p class='nav-logged-in-as'>
                    <b>Logged in as:</b>
                    <?= $logged_in_user->username ?>
                <form action="/shop2/scripts/post-logout.php" method="post">
                    <input type="submit" value="Logout" class="btn btn-logout">
                </form>
                </p>
            <?php endif; ?>

            <a href="/shop2/pages/cart.php" class="material-symbols-outlined">shopping_cart <?= $cart_count ?></a>
            </div>


            </nav>

            <h1 class='title'><?= $title ?></h1>




        <?php }

    public static function footer()
    { ?>
            <footer>
                <p>&copy; ShoeShop 2025</p>
            </footer>

            <script src="/shop2/assets/script.js"></script>

        </body>

        </html>
<?php }
}
