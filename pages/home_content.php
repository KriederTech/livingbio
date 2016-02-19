<div>
    <h1>
        Welcome, <?php echo($name); ?>!
    </h1>
</div>

<div class="wel-wrap"> 
    <div class="inner-1">
        <div class="title">Take Control of Your Health</div>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In interdum fermentum diam a tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque pretium magna vel neque placerat. 
    </div>
    <div class="inner-2"> 
        <a href="records.php"><img src="img/home_mRecords.png" alt="My Medical Records"><div style="text-align: center"><p class="blocktext">My Medical Records</p></div></a>
    </div>
    <div class="inner-4"> 
        <a href="<?php echo(SOCIAL_LINK); ?>"><img src="img/home_socGo.png" alt="Social Go"><div style="text-align: center"><p class="blocktext">Social Go</p></div></a>
    </div>
    <div class="inner-5"> 
        <a href="record_add.php" onclick="return popup(this, 'Add')"><img src="img/home_Upload.png" alt="Upload File"><div style="text-align: center"><p class="blocktext">Upload File</p></div></a>
    </div>
</div>

<div id="dash-wrap">
    <div class="myDash">
    </div>

    <div class="myHealth"> 
        <h3>My Health</h3>
        <div id="boxes">
            <div class="box1"> 
                <a href="profile.php"><p class="blocktext">PROFILES</p><img src="img/arrow-btn-rt.png" alt=""></a>
            </div>
            <div class="box4">
                <a href="conditions.php"><p class="blocktext">MEDICAL<br>CONDITIONS</p><img src="img/arrow-btn-rt.png" alt=""></a>
            </div>
            <div class="box5">
                <a href="contacts.php"><p class="blocktext">MEDICAL CONTACTS</p><img src="img/arrow-btn-rt.png" alt=""></a>
            </div>	
        </div>	
    </div>
</div>
