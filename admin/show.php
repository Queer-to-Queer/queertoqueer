<?php 
require_once('../project_files/initialize.php'); 
require_login();
$id = $_GET['id'] ?? '1';
$admin = Admin::find_by_id($id);$page_title = 'User: ' . h($admin->full_name());
include(PRIVATE_PATH . '/private_header.php'); 
?>



  <a class="back-link" href="<?php echo url_for('/user/'); ?>">&laquo; Back to List</a>

  
    <h1>User: <?php echo h($admin->full_name()); ?></h1>

    
    <img src="<?php echo UPLOAD_PATH.h($admin->profile_image);?>" alt="">
      <dl>
        <dt>First name</dt>
        <dd><?php echo h($admin->first_name); ?></dd>
      </dl>
      <dl>
        <dt>Last name</dt>
        <dd><?php echo h($admin->last_name); ?></dd>
      </dl>

      <dl>
        <dt>Email</dt>
        <dd><?php echo h($admin->email); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($admin->username); ?></dd>
      </dl>


<?php include(PRIVATE_PATH . '/private_footer.php');?>