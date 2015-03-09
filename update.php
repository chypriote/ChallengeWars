<!DOCTYPE html>
<html>
<?php
    include("Controller/Website.php");
    include("Controller/Update.php");
    include("View/Website/Header.php");
?>
<body>
<?php
    getNavBar();
    if (file_exists("View/".$_PAGENAME_."/Featured.php")){include("View/".$_PAGENAME_."/Featured.php");}
?>
<div class="page-outer-wrap">
    <div class="page-inner-wrap"  style="margin-top: 39px">
        <div class="widget-container">
            <div>
            <?php 
                cleanEntries();echo "<hr />";
                cleanComments();echo "<hr />";
                cleanFriends();echo "<hr />";
                refreshUsers();echo "<hr />";
                refreshChallenges();echo "<hr />";
                cleanChallenges();echo "<hr />";

            ?>
            </div>
        </div>
    </div>
</div>
<?php include('View/Website/Footer.php'); ?>
</body>
</html>