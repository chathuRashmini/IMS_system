<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Update Profile</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="memHomeV.php">Home</a></li>
            <li><a href="../../controller/viewProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>">My Profile</a></li>
            <li class="active">Update Profile</li>
        </ul>

        <div class="row" style="margin-bottom: 4%;">
            <div class="col left20">
                <?php
                    require 'memSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Update Profile</h2>
                </div>

                <div class="signupForm">
                    <form action="../../controller/updateProfileControllerTwo.php?user_id=<?php echo $_SESSION['userId'] ?>" method="post">
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Username</label>
	                        </div>
	                        <div class="col-75">
	                            <input type="text" name="empid" <?php echo 'value="'.$_SESSION['empid'].'"' ?> required> <br>
	                        </div>
	                    </div>
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Initials of the name</label>
	                        </div>
	                        <div class="col-75">
	                            <input type="text" name="initials" <?php echo 'value="'.$_SESSION['initials'].'"' ?> required> <br>
	                        </div>
	                    </div>
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Surname</label>
	                        </div>
	                        <div class="col-75">
	                            <input type="text" name="sname" <?php echo 'value="'.$_SESSION['sname'].'"' ?> required> <br>
	                        </div>
	                    </div>
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Email</label>
	                        </div>
	                        <div class="col-75">
	                            <input type="email" name="email" <?php echo 'value="'.$_SESSION['email'].'"' ?> required> <br>
	                        </div>
	                    </div>
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Mobile Number</label>
	                        </div>
	                        <div class="col-75">
	                            <input type="text" name="mobile" <?php echo 'value="'.$_SESSION['mobile'].'"' ?> required> <br>
	                        </div>
	                    </div>
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Telephone Number</label>
	                        </div>
	                        <div class="col-75">
	                            <input type="text" name="tp" <?php echo 'value="'.$_SESSION['tp'].'"' ?> required> <br>
	                        </div>
	                    </div>
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Date of Birth</label>
	                        </div>
	                        <div class="col-75">
	                            <input type="text" name="dob" <?php echo 'value="'.$_SESSION['dob'].'"' ?> required> <br>
	                        </div>
	                    </div>
                        <div class="row">
							<div class="col-25">
								<label>Enter designation</label>
							</div>
							<div class="col-75">
								<select name="designation" required>
									<option value="<?php echo $_SESSION['designation'] ?>"><?php echo $_SESSION['designation'] ?></option>
									<?php echo $_SESSION['design'] ?>
								</select>
							</div>
						</div>
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Appointment Date</label>
	                        </div>
	                        <div class="col-75">
	                            <input type="text" name="appointment" <?php echo 'value="'.$_SESSION['appointment'].'"' ?> required> <br>
	                        </div>
	                    </div>
                        <div class="row">
	                        <div class="col-25">
	                            <label for="">Password: </label>
	                        </div>
	                        <div class="col-75">
	                            <br><span>******</span> | <a href="../../controller/updatePasswordController.php?user_id=<?php echo $_SESSION['userId'] ?>">Change Password</a> <br>
	                        </div>
	                    </div>
                        
						<button type="submit" name="submit" class="subbtn">Save Updates</button>
                        
					</form>
					<button type="submit" class="cancelbtn">
                            <a href="memHomeV.php">Cancel</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require "../basic/footer.php";
?>