<main>
    <title>Claim Details</title>

<?php
    require('../basic/header.php');
    
?>

        
            <div class="header">Breadcrumbs
                <!-- <ul class="breadcrumb">
                    <li><a href="memHomeV.php">Home</a></li>
                    <li><a href="memGetClaimDetailsV.php">Enter Year</a></li>
                    <li>Claim Details</li>
                </ul> -->
            </div>

            <div class="side-nav">
                <?php 
                    require('../medicalSchemeMember/memSideNavV.php');
                ?>
            </div>

            <div class="content">
                <div>
                    <h4>Claim Details</h4>
                </div>
                <!-- memberge year eke claim details pdf ekak wiidyat show kranna one -->

                <a href="memGetClaimDetailsV.php"><button type="submit" name="">OK</button></a><br>

            </div>
           
            <div class="right-side-bar">
                <a href="../../controller/viewProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>"><button type="submit" name="" class="button">Profile</button></a>
            </div>
            
            <?php
                require_once('../basic/footer.php');
            ?>
      

</main>




