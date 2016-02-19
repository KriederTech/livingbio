<?php
require_once(dirname(__FILE__).'/../db/medicalrecordDB.php');
require_once(dirname(__FILE__).'/../util/authenticate.php');
require_once(dirname(__FILE__).'/../util/utils.php');

$userId = null;
if (isset($_SESSION['userid']))
{
        $userId = clean_input($_SESSION['userid']);
}

$error = null;
if (isset($_REQUEST['error']))
{
        $error = clean_input($_REQUEST['error']);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Medical Record</title>
<link href="css/popup.css" rel="stylesheet" type="text/css">
<script>
function addMedicalRecord()
{
    var frm = eval("document.addRecordForm");
    frm.action = "record_add_action.php";
    frm.submit();
}
</script>
</head>
<body>
<div id="top">
    <h2>Add Medical Record</h2>
</div>
<div id="edit">
    <div id="container">
        <?php if ($error == 'A' || $error[3] == 2 || $error[4] == 2 || $error[5] == 2) echo('<span class="redbold">Error: Add Failure</span><br><br>'); ?>
        <form name="addRecordForm" method="post" enctype="multipart/form-data">
            What's the file name? *
            <?php if (substr($error, 0, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 0, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="doc_name" value="<?php echo(clean_input($_SESSION['add']['doc_name'])); ?>"><br>
            What's the file caption? *
            <?php if (substr($error, 1, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 1, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="doc_caption" value="<?php echo(clean_input($_SESSION['add']['doc_caption'])); ?>"><br>
            Select a file to upload. *
            <?php if (substr($error, 2, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 2, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="file" name="doc_file"><br>
            * <small>Required field</small><br>

            <div class="button-wrap">
                <div class="cancel-btn"><a href="javascript: self.close()">Cancel</a></div>
                <div class="update-btn"><a href="javascript: addMedicalRecord()">Add Medical Record</a></div>
            </div>
        </form>
    </div>
</div>
</bodY>
</html>
