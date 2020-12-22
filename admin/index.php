<?php 
require_once('../project_files/initialize.php'); 
require_login();

$act_admin = Admin::find_by_id($_SESSION['admin_id']);


$current_page = $_GET['page'] ?? 1;
$per_page = 5;
$total_count = Admin::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

$sql = "SELECT * FROM admins ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$admins = Admin::find_by_sql($sql);

$page_title = 'Users';
include(PRIVATE_PATH . '/private_header.php'); 
?>


<h1>Users</h1>


<p><a href="<?php echo url_for('/user/new'); ?>">Aggiungi un nuovo utente</a></p>



<div class="list">
    <?php foreach($admins as $admin) { ?>
    <fieldset class="single">
        <legend><div class="user_name"><p><?php echo h($admin->username); ?></p></div></legend>
    <div class="single user">
        <div class="user_pic">
            
            <?php if(UPLOAD_PATH.h($admin->profile_image) != UPLOAD_PATH){?>
                <img src="<?php echo UPLOAD_PATH.h($admin->profile_image);?>" alt="">
            <?php } else { ?>
                <div class="user_no_pic"><?php echo $admin->first_name[0].$admin->last_name[0]; ?></div>
            <?php } ?>
        </div>
        <div class="user_fullname">
            <h1><?php echo h($admin->first_name); ?> <?php echo h($admin->last_name); ?></h1>
        </div>
        <div class="user_email">
            <p>email: <?php echo h($admin->email); ?></p>
        </div>


        <div class="options">
            <a href="<?php echo url_for('/user/show?id=' . h(u($admin->id))); ?>">View</a>
            <?php if(check_type($opt=["admin"])){?>
            <a href="<?php echo url_for('/user/edit?id=' . h(u($admin->id))); ?>">Edit</a>
            <a href="<?php echo url_for('/user/delete?id=' . h(u($admin->id))); ?>">Delete</a>
            <?php } ?>
        </div>
    </div>
    </fieldset>
    <?php } ?>
</div>
<?php
$url = url_for('/user/');
echo $pagination->page_links($url);
?>


<?php include(PRIVATE_PATH . '/private_footer.php'); ?>