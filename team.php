<?php
require_once('./project_files/initialize.php');

$page_title="Il Team";

include(PUBLIC_PATH.'header.php');

?>

<script src="<?php echo url_for('/assets/js/loadTeam.js');?>" async></script>

<div class="inside">
    <h1 class="title">Il team</h1>

    <div class="list team">
        
    </div>
</div>

<?php
include(PUBLIC_PATH.'footer.php');
?>