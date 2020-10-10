<main>
    <title>Profile</title>
    <?php
        require '../basic/header.php';
    ?>

    <div class="header">
        <ul class="breadcrumbs">
            <li><a href="moHomeV.php">Home</a></li>
            <li>My Profile</li>
        </ul>
    </div>

    <div class="side-nav">
        <?php
            require '../medicalOfficer/moSideNavV.php';
        ?>
    </div>

    <div class="content">
        <div>
            <h3>My Profile</h3>
        </div>

        <div>
            <form action="../../controller/updateProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>" method="post">
                <label for="">Employee Id</label>
                <input type="text" name="empid" <?php echo 'value="'.$_SESSION['empid'].'"' ?> disabled> <br>
                <label for="">Initials of the name</label>
                <input type="text" name="initials" <?php echo 'value="'.$_SESSION['initials'].'"' ?> disabled> <br>
                <label for="">Surname</label>
                <input type="text" name="sname" <?php echo 'value="'.$_SESSION['sname'].'"' ?> disabled> <br>
                <label for="">Email</label>
                <input type="email" name="email" <?php echo 'value="'.$_SESSION['email'].'"' ?> disabled> <br>
                <label for="">Mobile Number</label>
                <input type="text" name="mobile" <?php echo 'value="'.$_SESSION['mobile'].'"' ?> disabled> <br>
                <label for="">Telephone Number</label>
                <input type="text" name="tp" <?php echo 'value="'.$_SESSION['tp'].'"' ?> disabled> <br>
                <label for="">Date of Birth</label>
                <input type="text" name="dob" <?php echo 'value="'.$_SESSION['dob'].'"' ?> disabled> <br>
                <label for="">Designation</label>
                <input type="text" name="designation" <?php echo 'value="'.$_SESSION['designation'].'"' ?> disabled> <br>
                <label for="">Appointment Date</label>
                <input type="text" name="appointment" <?php echo 'value="'.$_SESSION['appointment'].'"' ?> disabled> <br>                    
                <button type="submit" name="submit">Update Profile</button>
            </form>
        </div>
    </div>

    <div class="right-side-bar">
        <a href="../../controller/viewProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>"><button type="submit" name="" class="button">Profile</button></a>
    </div>

    <?php
        require '../basic/footer.php';
    ?>

</main>