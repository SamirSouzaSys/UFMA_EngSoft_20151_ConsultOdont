<?php
ob_start();
require_once 'system.php';
//require_once 'acesso.php';

?>
<div class="container">
</div>

<div class="container text-center box" style="max-width: 200px; min-height: 50px;">
    <b><a href="<?= $url_site ?>/pages/login.php">Login</a></b>
</div>

<?php
$pageMainContent = ob_get_contents();
ob_end_clean();
$subtitle = '';
$pageTitle = 'Consultório Sorriso Feliz';

include "./layout/masterLayout.php";
?>