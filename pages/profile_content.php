<?php

echo('<span class="breadcrumbs">&larr; <a href="home.php">Back to Home</a></span>'."\n");
echo('        <h3>My Profile</h3>'."\n");
echo('        <div id="profile-wrap">'."\n");
echo('            <div class="l-profile">'."\n");

$username = clean_input($user->getUsername());
$type = clean_input($user->getType());

$_SESSION['username'] = $username;
$_SESSION['type'] = $type;

$firstName = clean_input($user->getPersonalinfo()->getFirsName());
$lastName = clean_input($user->getPersonalinfo()->getLastName());
$height = clean_input($user->getPersonalinfo()->getHeight());
$weight = clean_input($user->getPersonalinfo()->getWeight());
$age = clean_input($user->getPersonalinfo()->getAge());
$phonenumber = clean_input($user->getPersonalinfo()->getPhonenumber());
$email = clean_input($user->getPersonalinfo()->getEmail());
$website = clean_input($user->getPersonalinfo()->getWebsite());
$birthdate = clean_input($user->getPersonalinfo()->getBirthdate());
$gender = clean_input($user->getPersonalinfo()->getGender());

$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['height'] = $height;
$_SESSION['weight'] = $weight;
$_SESSION['age'] = $age;
$_SESSION['phonenumber'] = $phonenumber;
$_SESSION['email'] = $email;
$_SESSION['website'] = $website;
$_SESSION['birthdate'] = $birthdate;
$_SESSION['gender'] = $gender;

profileCell($name, $age, $username, $userId, $gender, $birthdate);

/*$title = 'Upcoming Appointments';
$detail = '<span class="redbold">?</span>';

smallBoxL($title, $detail);*/

echo('            </div>'."\n");
echo('            <div class="profile-edit"><a href="profile_edit.php" onclick="return popup(this, \'Edit\')">Edit</a></div>'."\n");
echo('            <div class="r-profile">'."\n");

$address = $user->getAddressInfo()->getAddress();
$city = $user->getAddressInfo()->getCity();
$province = $user->getAddressInfo()->getProvince();
$country = $user->getAddressInfo()->getCountry();

$_SESSION['address'] = $address;
$_SESSION['city'] = $city;
$_SESSION['province'] = $province;
$_SESSION['country'] = $country;

$phoneFormatted = formatPhone($phonenumber);

$title = 'Contact Information';
$detail = $address.'<br>'.$city.', '.$province.'<br>'.$country.'<br>'.$phoneFormatted.'<br>'.$email;

smallBoxR($title, $detail);

smallBoxR_blank();

/*$title = 'Emergency Contact';
$detail = '<span class="redbold">?</span>';

smallBoxR($title, $detail);*/

/*$title = 'Employee Information';
$detail = '<span class="redbold">?</span>';

smallBoxR($title, $detail);*/

/*$title = 'Insurance Information';
$detail = '<span class="redbold">?</span>';

smallBoxR($title, $detail);*/

echo('                <div class="edit-profile-btn">'."\n");
echo('                    <a href="profile_edit.php" onclick="return popup(this, \'Edit\')">Edit Profile</a>'."\n");
echo('                </div>'."\n");
echo('            </div>'."\n");
echo('        </div>'."\n");

function profileCell($name, $age, $username, $userId, $gender, $birthdate)
{
    if ($age != 0)
    {
        $name_age = $name.', '.$age;
    }
    else
    {
        $name_age = $name;
    }

    echo('                <div class="blank-profile-cell">'."\n");
    echo('                    <div class="user-info">'."\n");
    echo('                        <div class="title">'.$name_age.'</div>'."\n");
    echo('                        <p>'."\n");
    echo('                        <strong>Username:</strong><br>'."\n");
    echo('                        '.$username."\n");
    echo('                        <p>'."\n");
    echo('                        <strong>Account Number:</strong><br>'."\n");
    echo('                        '.$userId."\n");
    echo('                        <p>'."\n");
    echo('                        <strong>Gender:</strong><br>'."\n");
    echo('                        '.$gender."\n");
    echo('                        <p>'."\n");
    echo('                        <strong>Birthdate:</strong><br>'."\n");
    echo('                        '.formatDate($birthdate)."\n");
    echo('                    </div>'."\n");
    echo('                </div>'."\n");
}

function smallBoxL($title, $detail)
{
    echo('                <div class="profile-cell">'."\n");
    echo('                    <div class="small-title">'.$title.':</div>'."\n");
    echo('                    '.$detail."\n");
    echo('                </div>'."\n");
}

function smallBoxR($title, $detail)
{
    echo('                <div class="r-profile-cell">'."\n");
    echo('                    <div class="small-title">'.$title.':</div>'."\n");
    echo('                    '.$detail."\n");
    echo('                </div>'."\n");
}

function smallBoxR_blank()
{
    echo('                <div class="r-profile-cell">'."\n");
    echo('                    <div class="small-title"></div>'."\n");
    echo('                </div>'."\n");
}
?>
