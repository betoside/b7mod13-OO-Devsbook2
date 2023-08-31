<?php
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">

<?php
// echo '<pre>';
// print_r($userInfo);
?>
    <div class="row">
        <div class="column pr-5">
        
            <?php require 'partials/feed-editor.php'; ?>

        </div>
        <div class="column side pl-5">
            222
        </div>
    </div>

</section>
<?php
require 'partials/footer.php';
?>