<?php
// BEGIN T02
// Shared navigation for all public/ and public/admin/ pages.
// Admin pages set $admin_nav=true before including this partial.
$prefix = !empty($admin_nav) ? '../' : '';
// Member is looked up by session ID: fresh first_name and role from MySQL.
$nav_member = current_member();
$nav_can_edit_birds = $nav_member !== null &&
in_array($nav_member->role, ['member', 'admin'], true);
$nav_is_admin = $nav_member !== null && $nav_member->role === 'admin';
?>
<nav>
  <a href="<?php print $prefix; ?>index.php">Home</a> |
  <a href="<?php print $prefix; ?>birds.php">Birds</a>
  <?php if ($nav_can_edit_birds) { ?>
  | <a href="<?php print $prefix; ?>bird_new.php">Create Bird</a>
  <?php } ?>
  <?php if ($nav_is_admin) { ?>
  | <a href="<?php print $prefix; ?>admin/index.php">Manage Members</a>
  <?php } ?>
  <?php if ($nav_member !== null) { ?>
  | <a href="<?php print $prefix; ?>logout.php">Logout</a>, <?php print h($nav_member->first_name); ?>
  <?php } else { ?>
  | <a href="<?php print $prefix; ?>login.php">Login</a>
  | <a href="<?php print $prefix; ?>signup.php">Register</a>
  <?php } ?>
</nav>
<hr>
<?php
// END T02
?>
