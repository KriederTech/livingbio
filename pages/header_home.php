<?php
require_once(dirname(__FILE__).'/../db/userprofileDB.php');

$userId = null;
if (isset($_SESSION['userid']))
{
    $userId = $_SESSION['userid'];
}

$user = UserProfileDB::getUserProfile($userId);
$name = $user->getPersonalinfo()->getFirsName().' '.$user->getPersonalinfo()->getLastName();
?>
<div id="header">
    <div class="wrap">
        <div class="logo2"><img src="img/<?php echo(LOGO); ?>" height="50" alt=""></div>
        <div class="logout"><a href="../index.php"><img src="img/logout.png" alt="">Logout</a></div>
        <div class="member-id"> 
            <a href="#"><?php echo($name); ?></a><br><sub> <span>Member ID# <?php echo($userId); ?></span></sub>
        </div>
    </div>
</div>
