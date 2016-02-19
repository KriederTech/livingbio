<?php

echo('<span class="breadcrumbs">&larr; <a href="home.php">Back to Home</a></span>'."\n");
echo('        <h3>Medical Contacts</h3>'."\n");

$medicalcontacts = MedicalContactDB::getMedicalContacts($userId)->getMedicalContacts()->getMedicalContact();
$count = sizeof($medicalcontacts);

$_SESSION['add'] = null;
$_SESSION['edit']['doctor_id'] = array();
$_SESSION['edit']['first_name'] = array();
$_SESSION['edit']['last_name'] = array();
$_SESSION['edit']['doctor_type'] = array();

$_SESSION['edit']['address1'] = array();
$_SESSION['edit']['address2'] = array();
$_SESSION['edit']['city'] = array();
$_SESSION['edit']['state'] = array();
$_SESSION['edit']['zipCode'] = array();
$_SESSION['edit']['phone'] = array();

if ($count > 0)
{
    for ($i = 0; $i < $count; $i++)
    {
        $doctor_id = clean_input($medicalcontacts[$i]->getDoctor_id());
        $first_name = clean_input($medicalcontacts[$i]->getFirst_name());
        $last_name = clean_input($medicalcontacts[$i]->getLast_name());
        $doctor_type = clean_input($medicalcontacts[$i]->getDoctor_type());
        $name = 'Dr. '.$first_name.' '.$last_name;

        array_push($_SESSION['edit']['doctor_id'], $doctor_id);
        array_push($_SESSION['edit']['first_name'], $first_name);
        array_push($_SESSION['edit']['last_name'], $last_name);
        array_push($_SESSION['edit']['doctor_type'], $doctor_type);

        $address = $medicalcontacts[$i]->getAddress();
        $address1 = clean_input($address->getAddress1());
        $address2 = clean_input($address->getAddress2());
        $city = clean_input($address->getCity());
        $state = clean_input($address->getState());
        $zipCode = clean_input($address->getZipCode());
        $phone = clean_input($address->getPhone());

        array_push($_SESSION['edit']['address1'], $address1);
        array_push($_SESSION['edit']['address2'], $address2);
        array_push($_SESSION['edit']['city'], $city);
        array_push($_SESSION['edit']['state'], $state);
        array_push($_SESSION['edit']['zipCode'], $zipCode);
        array_push($_SESSION['edit']['phone'], $phone);

        $details = $address1.'<br>';
        if ($address2 != '')
        {
            $details .= $address2.'<br>';
        }
        $details .= $city.', '.$state.' '.$zipCode.'<br>';
        $details .= sprintf("(%s) %s-%s", substr($phone, 0, 3), substr($phone, 3, 3), substr($phone, 6));
        
        $appointment = '<span class="redbold">?</span>';

        contactBox($name, $details, $doctor_type, $appointment, $doctor_id);
    }
}

addBox();

function contactBox($name, $details, $doctor_type, $appointment, $doctor_id)
{
    echo('        <div class="info"> '."\n");
    echo('            <div class="gboxes">'."\n");
    echo('                <div class="gbox1-title">'."\n");
    echo('                    <strong>'.$name.'</strong>'."\n");
    echo('                    <sup><a href="contact_edit.php?id='.$doctor_id.'" onclick="return popup(this, \'Edit\')">Edit</a></sup>'."\n");
    echo('                </div>'."\n");
    echo('                <div class="gbox1">'."\n");
    echo('                    <strong>Details:</strong><br>'.$details."\n");
    echo('                    <p>'."\n");
    echo('                    <strong>Healthcare Professional:</strong><p>'."\n");
    echo('                    <form class="other">'."\n");
    echo('                        <select>'."\n");
    echo('                            <option>'.$doctor_type.'</option>'."\n");
    echo('                            <option>'.$doctor_type.'</option>'."\n");
    echo('                        </select>'."\n");
    echo('                    </form>'."\n");
    echo('                </div>'."\n");
    echo('            </div>'."\n");
    echo('            <div class="greysub">'."\n");
    //echo('                <span style="text-align: center">Upcoming Appointment '.$appointment.'</span>'."\n");
    echo('            </div>'."\n");
    echo('        </div>'."\n");
}

function addBox()
{
    echo('        <div class="info">'."\n");
    echo('            <div class="gboxes">'."\n");
    echo('                <div class="gbox1"> '."\n");
    echo('                    <p class="addfile">'."\n");
    echo('                        <img src="img/add.png" alt="Add"><br>'."\n");
    echo('                        <a href="contact_add.php" onclick="return popup(this, \'Add\')">Add Another Contact</a>'."\n");
    echo('                    </p>'."\n");
    echo('                </div>'."\n");
    echo('            </div>'."\n");
    echo('            <div class="greysub">'."\n");
    echo('                <a href="#"></a>'."\n");
    echo('            </div>'."\n");
    echo('        </div>'."\n");
}
?>
