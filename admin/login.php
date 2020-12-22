<?php
require_once('project_files/initialize.php');
$page_title="Log In";
include(PRIVATE_PATH.'/private_header.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Il campo Username non può essere vuoto.";
  }
  if(is_blank($password)) {
    $errors[] = "Il campo Password non può essere vuoto.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $admin = Admin::find_by_username($username);
    // test if admin found and password is correct
    if($admin != false && $admin->verify_password($password)) {
      // Mark admin as logged in
      $session->login($admin);
      redirect_to(url_for('/'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }

  }

}
?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php
include(PRIVATE_PATH.'/private_footer.php');
?>