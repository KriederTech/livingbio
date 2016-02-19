<?php
require_once(dirname(__FILE__).'/../db/medicalrecordDB.php');
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../util/authenticate.php');
require_once(dirname(__FILE__).'/../util/utils.php');

$userId = null;
if (isset($_SESSION['userid']))
{
    $userId = clean_input($_SESSION['userid']);
}

$fields = array('doc_name', 'doc_caption', 'doc_file');

foreach ($fields as $field)
{
    $$field = null;
    if (isset($_REQUEST[$field]))
    {
        $$field = clean_input($_REQUEST[$field]);
        $_SESSION['add'][$field] = $$field;
    }
}

$error = '000000';
if ($doc_name == '')                     $error[0] = 1;
else if (!ctype_print($doc_name))        $error[0] = 2;
if ($doc_caption == '')                  $error[1] = 1;
else if (!ctype_print($doc_caption))     $error[1] = 2;
if ($_FILES['doc_file']['error'] == '4') $error[2] = 1;
else
{
    if (eregi('image/', $_FILES['doc_file']['type']))
    {
        $imageinfo = getimagesize($_FILES['doc_file']['tmp_name']);
        if (!eregi('image/', $imageinfo['mime']))                $error[3] = 2;

        $filename = strtolower($_FILES['doc_file']['name']);
        $whitelist = array('bmp', 'gif', 'jpeg', 'jpe', 'jpg', 'png', 'tif', 'tiff');
        if (!in_array(end(explode('.', $filename)), $whitelist)) $error[4] = 2;
    }
    else
    {
        $whitelist = array('application/pdf',
                           'application/msword',
                           'text/xml');
        if (!in_array($_FILES['doc_file']['type'], $whitelist)) $error[5] = 2;
    }
}

if ($error == '000000')
{
    $doc_file = $_FILES['doc_file']['name'];
    $doc_tmpfile = $_FILES['doc_file']['tmp_name'];

    $output = MedicalRecordDB::insertMedicalRecord($userId, $doc_file, $doc_tmpfile, $doc_name, $doc_caption);

    $response = $output->getResponse();

    if ($response == 'SUCCESS INSERTED MEDICAL RECORD RECORDS FOR THE USER '.$userId)
    {
?>
        <script>
        var page = opener.location.href.split('/').pop();
        if (page == 'home.php')
        {
            opener.location.href = "records.php";
            self.close();
        }
        else
        {
            opener.location.reload();
            self.close();
        }
        </script>
<?php
    }
    else
    {
        header('Location: record_add.php?error=A');
        include('record_add.php');
        return;
    }
}
else
{
    header('Location: record_add.php?error='.$error);
    include('record_add.php');
    return;
}
?>
