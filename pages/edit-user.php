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
<select name="role" id="">
    <option value="" disabled selected hidden><?= $user->role ?></option>
  <option value="admin">Admin</option>
  <option value="customer">Customer</option>
</select>
<input type="submit" value="Save">
</form>



<?php 

endif;

Template::footer();