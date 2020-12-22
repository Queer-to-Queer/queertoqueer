<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($admin)) {
  redirect_to(url_for('/user/'));
}
?>

<label for="admin[first_name]">Nome</label>
<input type="text" name="admin[first_name]" value="<?php echo h($admin->first_name); ?>" />
<br>
<br>
<label for="admin[last_name]">Cognome</label>
<input type="text" name="admin[last_name]" value="<?php echo h($admin->last_name); ?>" />
<br>
<br>
<label for="admin[profile_image]">Immagine Profilo</label>
<input type="file" name="admin[profile_image]" id="profile_image" accept="image/png, .jpeg, .jpg, image/gif">
<br>
<br>
<label for="admin[email]">Email</label>
<input type="text" name="admin[email]" value="<?php echo h($admin->email); ?>" />
<br>
<br>
<label for="admin[username]">Username</label>
<input type="text" name="admin[username]" value="<?php echo h($admin->username); ?>" />
<br>
<br>
<label for="admin[password]">Password</label>
<input type="password" name="admin[password]" value="" />
<br>
<br>
<label for="admin[confirm_password]">Conferma Password</label>
<input type="password" name="admin[confirm_password]" value="" />
