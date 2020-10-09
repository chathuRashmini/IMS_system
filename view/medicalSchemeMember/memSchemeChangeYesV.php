<main>
    <title>Scheme Change</title>

<?php
    require('../basic/header.php');
    
?>

        
            <div class="header">Breadcrumbs
                <!-- <ul class="breadcrumb">
                    <li><a href="memHomeV.php">Home</a></li>
                    <li><a href="memRenewMembershipV.php">Renew Membership</a></li>
                    <li>Scheme Changed</li>
                </ul> -->
            </div>

            <div class="side-nav">
                <?php 
                    require('../medicalSchemeMember/memSideNavV.php');
                ?>
            </div>

            <div class="content">
                <div>
                    <p>You are assigned to scheme 3.</p>
                </div>

                <a href="memCurrentMemberDetailsV.php"><button type="submit" name="">OK</button></a><br>
            </div>
           
            <div class="right-side-bar">
                <a href="../../controller/viewProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>"><button type="submit" name="" class="button">Profile</button></a>
            </div>
            
            <?php
                require_once('../basic/footer.php');
            ?>
      

</main>


