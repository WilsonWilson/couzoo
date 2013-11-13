<?php
require_once("../includes/config.php");
?>

    <div class="sign-in-nav-container">
        
        <div id="sign-in-sign-up-menu">
            <ul>
                <li><a href="<?=SITE_LOC?>logout.php?return=index.php">Log Out</a></li>
                <li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
		  <li><a href="<?=SITE_LOC?>index.php">View Site</a></li>
                <li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
		  <li><a href="<?=SITE_LOC?><?=ADMIN_LOC?>index.php">Admin Home</a></li>
            </ul>
        </div>
    </div>
    <!-- END Sign-In Sign-Up Main Top Nav -->

    <div id="header">

        <div class="header-home-link-container"><a href="./index.php"><div class="header-home-link"></div></a></div>
        
    </div>
<!-- END Admin Header -->
