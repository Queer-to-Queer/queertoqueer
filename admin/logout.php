<?php
require_once('project_files/initialize.php');

// Log out the admin
$session->logout();

redirect_to(url_for('/login'));

?>

