<main>

        <title>Display Report</title>
<?php
    require('../basic/header.php');
?>

        
            <div class="header">Breadcrumbs
                <!-- <ul class="breadcrumb">
                    <li><a href="mmHomeV.php">Home</a></li>
                    <li><a href="mmViewReportsMahapolaSchemeV.php">View Mahapola Scheme Reports</a></li>
                    <li>View Report</li>
                </ul> -->
            </div>

            <div class="side-nav">
                <?php 
                require('../mahapolaSchemeMaintainer/mmSideNavV.php');
                ?>
            </div>

            <div class="content">
                <div>
                    <h4>Report</h4>
                </div>
                    <!-- report eke generate kranna one -->
                <a href="mmViewReportsMahapolaSchemeV.php" ><button type="submit" name="" >OK</button></a><br>
            </div>

            <div class="right-side-bar">
                <a href="../../controller/viewProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>"><button type="submit" name="" class="button">Profile</button></a>
            </div>
            
            <?php
                require_once('../basic/footer.php');
            ?>
      

