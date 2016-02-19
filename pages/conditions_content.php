<?php

echo('<span class="breadcrumbs">&larr; <a href="home.php">Back to Home</a></span>'."\n");
echo('        <h3>Medical Conditions</h3>'."\n");

$medicalconditions = MedicalConditionDB::getMedicalConditions($userId)->getMedicalConditions()->getMedicalCondition();
$count = sizeof($medicalconditions);

$_SESSION['add'] = null;
$_SESSION['edit']['condition'] = array();
$_SESSION['edit']['status'] = array();
$_SESSION['edit']['onset'] = array();
$_SESSION['edit']['details'] = array();
$_SESSION['edit']['id'] = array();

if ($count > 0)
{
    for ($i = 0; $i < $count; $i++)
    {
        $condition = clean_input($medicalconditions[$i]->getCondition());
        $status = clean_input($medicalconditions[$i]->getStatus());
        $onset = clean_input($medicalconditions[$i]->getOnset());
        $details = clean_input($medicalconditions[$i]->getDetails());
        $id = clean_input($medicalconditions[$i]->getId());

        array_push($_SESSION['edit']['condition'], $condition);
        array_push($_SESSION['edit']['status'], $status);
        array_push($_SESSION['edit']['onset'], $onset);
        array_push($_SESSION['edit']['details'], $details);
        array_push($_SESSION['edit']['id'], $id);

        conditionBox($condition, $status, $onset, $details, $id);
    }
}

addBox();

function conditionBox($condition, $status, $onset, $details, $id)
{
    echo('        <div class="info">'."\n");
    echo('            <div class="gboxes">'."\n");
    echo('                <div class="gbox1-title">'."\n");
    echo('                    <strong>'.$condition.'</strong>'."\n");
    echo('                    <sup><a href="condition_edit.php?id='.$id.'" onclick="return popup(this, \'Edit\')">Edit</a></sup>'."\n");
    echo('                </div>'."\n");
    echo('                <div class="gbox1">'."\n");
    echo('                    <strong>Status:</strong><br>'.$status.'<p></p>'."\n");
    echo('                    <strong>Onset:</strong><br>'.formatDate($onset).'<p></p>'."\n");
    echo('                    <strong>Details:</strong><br>'.$details.'<p></p>'."\n");
    echo('                </div>'."\n");
    echo('            </div>'."\n");
    echo('            <div class="greysub">'."\n");
    echo('                <a href="#">+ MORE INFO</a>'."\n");
    echo('            </div>'."\n");
    echo('        </div>'."\n");
}

function addBox()
{
    echo('        <div class="info">'."\n");
    echo('            <div class="gboxes">'."\n");
    echo('                <div class="gbox1">'."\n");
    echo('                    <p class="addfile">'."\n");
    echo('                        <img src="img/add.png" alt="Add"><br>'."\n");
    echo('                        <a href="condition_add.php" onclick="return popup(this, \'Add\')">Add Another Condition</a>'."\n");
    echo('                    </p>'."\n");
    echo('                </div>'."\n");
    echo('            </div>'."\n");
    echo('            <div class="greysub"> '."\n");
    echo('                <a href="#"></a>'."\n");
    echo('            </div>'."\n");
    echo('        </div>'."\n");
}
?>
