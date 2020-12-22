<?php

function require_login($opt=[])
{
    global $session;
    $user = Admin::find_by_id($_SESSION['admin_id']);
    if (!$session->is_logged_in()) {
        redirect_to(url_for('/login'));
    } else {
        if ($opt!='') {
            foreach ($opt as $type) {
                if ($user->user_type == $type) {
                    return true;
                } else {
                    redirect_to(url_for('/'));
                }
            }
        }
    }
}

function check_type($opt=[]){
  $act_admin = Admin::find_by_id($_SESSION['admin_id']);
  foreach($opt as $type){
    if($act_admin->user_type == $type){
      return true;
    }
  }
}


function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Controlla i seguenti errori e prova a sistemarli:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}




?>
