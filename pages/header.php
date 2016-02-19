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
<div id="header-menu">
    <div class="wrap">
        <div id="nav">
            <ul>
                <li class="active">
                    <a href="home.php"><img src="img/home.png" alt=""><span class="nav-span">Home<br><sub>Your Dashboard</sub></span></a></li>
                <li class="active">
                    <a href="profile.php"><img src="img/profile.png" alt=""><span class="nav-span">My Profile<br><sub>Health Information</sub></span></a></li>
                <li class="active">
                    <a href="records.php"><img src="img/records.png" alt=""><span class="nav-span">My Medical Records<br><sub>Current and Past</sub></span></a></li>
                <li class="active">
                    <a href="conditions.php"><img src="img/condition.png" alt=""><span class="nav-span">Medical Conditions<br><sub>Important illnesses, etc..</sub></span></a></li>
                <li class="active">
                    <a href="contacts.php"><img src="img/profile.png" alt=""><span class="nav-span">My Medical Contacts<br><sub>Provider Information</sub></span></a></li>
            </ul>
        </div>
    </div>
</div>
