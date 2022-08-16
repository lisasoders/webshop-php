<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';

$db = new UsersDatabase();

$user = $user = $_SESSION['user'];

Template::header("Update user");

if($user === null): ?>

<h2>No user</h2>

<?php else: ?>


<form action="/shop2/admin-scripts/post-edit-user.php?id=<?= $_GET["id"]?>" method="post">
    <input type="text" name="username" placeholder="Username" value="<?= $user->username?>"><br>
   <textarea name="role" placeholder="Role"><?= $user->role?></textarea><br>
    <input type="submit" value="Save">
</form>

<?php 

endif;

Template::footer();