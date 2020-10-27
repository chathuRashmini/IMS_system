<main>
    <div class="contentForm">
        <form action="../../controller/memregisterMSControllerTwo.php?user_id=<?php echo $_SESSION['userId'] ?>" method="post">
            
            <div class="row">
                <div class="col-25">
                    <label>Employee ID</label>
                </div>
                <div class="col-75">
                    <input type="text" name="empid" <?php echo 'value="'.$_SESSION['empid'].'"' ?> disabled><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Your initials</label>
                </div>
                <div class="col-75">
                    <input type="text" name="initials" <?php echo 'value="'.$_SESSION['initials'].'"' ?> disabled/><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Your surname</label>
                </div>
                <div class="col-75">
                    <input type="text" name="sname" <?php echo 'value="'.$_SESSION['sname'].'"' ?> disabled/> <br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Your E-mail</label>
                </div>
                <div class="col-75">
                    <input type="email" name="email" <?php echo 'value="'.$_SESSION['email'].'"' ?> disabled/> <br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Designation</label>
                </div>
                <div class="col-75">
                    <input type="text" name="designation" <?php echo 'value="'.$_SESSION['designation'].'"' ?> disabled> <br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Enter department</label>
                </div>
                <div class="col-75">
                    <select name="department"required>
                        <option value="">Select department: </option>
                        <?php echo $_SESSION['deps'] ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Health condition</label>
                </div>
                <div class="col-75">
                    <input name="health_condition" type="text" required/> <br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Civil status</label>
                </div>
                <div class="col-75">
                    <select name="civil_status" required>
                        <option value="">...</option>
                        <option value="married">Married</option>
                        <option value="unmarried">Unmarried</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Medical Scheme Type</label>
                </div>
                <div class="col-75">
                    <select name="scheme_name" id="schemename" required>
                        <option value="">Select Scheme</option>
                        <?php echo $_SESSION['scheme'] ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Member Type</label>
                </div>
                <div class="col-75">
                    <select name="member_type" id="membertype" required>
                        <option value="">Select Type</option>
                        <?php echo $_SESSION['member_type'] ?>
                    </select>
                </div>
            </div>
            <button class="mainbtn" type="submit" name="registerMS-submit">Register</button>
        </form>
    </div>
</main>