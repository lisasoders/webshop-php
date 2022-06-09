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

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $title ?> - Shop</title>
            <link rel="stylesheet" href="/shop2/assets/style.css">

        </head>

        <body>
            <h1><?= $title ?></h1>
            <nav>
                <a href="/shop2">Start</a>
                <a href="/shop2/pages/products.php">Products</a>
                <?php if (!$is_logged_in) : ?>
                    <a href="/shop2/pages/login.php">Login</a>
                    <a href="/shop2/pages/register.php">Register</a>
                <?php elseif ($is_admin) : ?>
                    <a href="/shop2/pages/admin.php">Admin Area</a>
                <?php endif; ?>


            </nav>

            <?php if ($is_logged_in) : ?>
                <p>
                    <b>Logged in as:</b>
                    <?= $logged_in_user->username ?>
                <form action="/shop2/scripts/post-logout.php" method="post">
                    <input type="submit" value="Logout">
                </form>
                </p>
            <?php endif; ?>


        <?php }

    public static function footer()
    { ?>
            <footer>
                <p>&copy; Lisa Söderberg 2022</p>
            </footer>

        </body>

        </html>
<?php }
}
