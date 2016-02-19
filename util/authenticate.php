<?Php

require_once(dirname(__FILE__).'/session.php');

if (!isLoggedIn())
{
    header('Location: ../index.php');
    include('../index.php');
    return;
}
?>
