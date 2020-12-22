<?php

require_once('../project_files/initialize.php');
require_login($opt=["admin"]);


if(!isset($_GET['id'])) {
  redirect_to(url_for('/user/'));
}
$id = $_GET['id'];
$admin = Admin::find_by_id($id);
if($admin == false) {
  redirect_to(url_for('/user/'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['admin'];
  // Carica foto profilo
  $args['profile_image'] = $_FILES["admin"]["name"]["profile_image"] ?? '';
  $targetFilePath = UPLOAD_PATH.$args['profile_image'];
  move_uploaded_file($_FILES["admin"]["tmp_name"]["profile_image"], $targetFilePath);
  //
  $admin->merge_attributes($args);
  $result = $admin->save();

  if($result === true) {
    $session->message('The admin was updated successfully.');
    redirect_to(url_for('/user/show?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(PRIVATE_PATH . '/private_header.php'); ?>



  <a class="back-link" href="<?php echo url_for('/user/'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Modifica utente</h1>

    <?php echo display_errors($admin->errors); ?>

    <form action="<?php echo url_for('/user/edit?id=' . h(u($id))); ?>" method="post" enctype="multipart/form-data">
      <?php include('form_fields.php'); ?>
      <input type="submit" value="Modifica" />
    </form>

  </div>


<?php include(PRIVATE_PATH . '/private_footer.php'); ?>
