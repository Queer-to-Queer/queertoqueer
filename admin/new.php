<?php

require_once('../project_files/initialize.php');
require_login();
if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['admin'];
  // Carica foto profilo
  $args['profile_image'] = $_FILES["admin"]["name"]["profile_image"] ?? '';
  $targetFilePath = UPLOAD_PATH.$args['profile_image'];
  move_uploaded_file($_FILES["admin"]["tmp_name"]["profile_image"], $targetFilePath);
  //
  $admin = new Admin($args);
  $result = $admin->save();

  if($result === true) {
    $new_id = $admin->id;
    $session->message('The admin was created successfully.');
    redirect_to(url_for('/user/show?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $admin = new Admin;
}

$page_title = 'Create Admin';
include(PRIVATE_PATH . '/private_header.php'); 

?>



  <a class="back-link" href="<?php echo url_for('/user/'); ?>">&laquo; Back to List</a>

  
    <h1>Crea un nuovo user</h1>

    <?php echo display_errors($admin->errors); ?>
    <form action="<?php echo url_for('/user/new'); ?>" method="post" enctype="multipart/form-data">
      <?php include('form_fields.php'); ?>
        <input type="submit" value="Crea user" />
    </form>

  

<?php include(PRIVATE_PATH . '/private_footer.php'); ?>
