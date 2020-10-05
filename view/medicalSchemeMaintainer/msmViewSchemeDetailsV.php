<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheme Details</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- <div class="nameLogo"> -->
            <img src="../img/ims.jpg" alt="ims" class="logo">
            <!-- </div> -->
            <div class="options">
                <a href="msmHomeV.php">Home</a>
                <a href="msmProfileV.php">Profile</a>
                <a href="#">Logout</a>
            </div>
        </div>
        <div class="header">breadcrums</div>
        <div class="side-nav"> 
            

            <!-- <div> -->
                <a href="msmViewMedicalMemberListV.php"><button type="submit" name="" class="button">View Medical Member List</button></a><br>
                <a href="msmRemoveMemberV.php"><button type="submit" name="" class="button">Remove Member</button></a><br>
                <a href="msmViewClaimDetailsV.php"><button type="submit" name="" class="button">View Claim Details</button></a><br>
                <a href="msmViewFormsV.php"><button type="submit" name="" class="button">View Forms of the Medical Scheme</button></a><br>
                <a href="msmViewSchemeDetailsV.php"><button type="submit" name="" class="button">View Medical Scheme Details</button></a><br>
                <a href="msmRegisterToMedicalSchemeV.php"><button type="submit" name="" class="button">Register to the Staff Medical Scheme</button></a><br>
            <!-- </div> -->
        </div>
        <div class="banner">
            <div>
                <h2>Medical Scheme Maintainer</h2>
            </div>
        </div>
        <div class="content">
                        <div>
                        <h3>Scheme Details</h3>
                    </div>
                    <h4>Scheme 1 : </h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius, voluptas cupiditate tenetur incidunt
                    ab autem maiores optio inventore sunt dolor. Voluptate tenetur totam similique molestias labore ipsum 
                    architecto eius amet.</p>

                    <h4>Scheme 2 : </h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius, voluptas cupiditate tenetur incidunt
                    ab autem maiores optio inventore sunt dolor. Voluptate tenetur totam similique molestias labore ipsum 
                    architecto eius amet.</p>

                    <h4>Scheme 3 : </h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius, voluptas cupiditate tenetur incidunt
                    ab autem maiores optio inventore sunt dolor. Voluptate tenetur totam similique molestias labore ipsum 
                    architecto eius amet.</p>

                    <a href="msmHomeV.php"><button type="submit" name="">OK</button></a>
        </div>
        <div class="footer">
            <?php
                require_once('../include/footer.php');
            ?>
        </div>
    </div>
</body>
</html>