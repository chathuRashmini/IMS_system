<main>
    <title>Scheme Details</title>

    <?php
        require('../basic/header.php');
    ?>
        
    <div class="header">
        <ul class="breadcrumbs">
            <li><a href="memHomeV.php">Home</a></li>
            <li>View Scheme Details</li>
        </ul>
    </div>

    <div class="side-nav">
        <?php 
            require('../medicalSchemeMember/memSideNavV.php');
        ?>
    </div>

    <?php
        require '../basic/viewClaimDetails.php';
    ?>
    
    <div class="right-side-bar">
        <a href="../../controller/viewProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>"><button type="submit" name="" class="button">Profile</button></a>
    </div>
    
    <?php
        require_once('../basic/footer.php');
    ?>
</main>