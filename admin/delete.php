<?php

require_once('../project_files/initialize.php');
require_login();


if(!isset($_GET['id'])) {
  redirect_to(url_for('/user/'));
}
$id = $_GET['id'];
$admin = Admin::find_by_id($id);
if($admin == false) {
  redirect_to(url_for('/user/'));
}

if(is_post_request()) {

  // Delete admin
  $result = $admin->delete();
  $session->message('The admin was deleted successfully.');
  redirect_to(url_for('/user/'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Admin'; ?>
<?php include(PRIVATE_PATH . '/private_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/user/'); ?>">&laquo; Back to List</a>

  <div class="admin delete">
    <h1>Delete Admin</h1>
    <p>Are you sure you want to delete this admin?</p>
    <p class="item"><?php echo h($admin->full_name()); ?></p>

    <form action="<?php echo url_for('/user/delete?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Admin" />
      </div>
    </form>
  </div>

</div>

<?php include(PRIVATE_PATH . '/private_footer.php'); ?>
