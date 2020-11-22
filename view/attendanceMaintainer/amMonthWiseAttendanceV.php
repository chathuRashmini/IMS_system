<?php
    require '../basic/topnav.php';
?>

<main>
    <title>View Month Wise Attendance</title>

    <ul class="breadcrumbs">
        <li><a href="amHomeV.php">Home</a></li>
        <li class="active">Monthwise Attendance</li>
    </ul>

    <div class="row" style="margin-bottom: 4%;" >
        <div class="col left20">
            <?php
                require 'amSideNavV.php';
            ?>
        </div>

        <div class="col right80">
            <div>
                <h2>Monthwise Attendance</h2>
            </div>
            <div class="contentForm">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-25">
                            <label>Enter calendar year</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="calander_year" placeholder="Calander Year" /> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Enter month</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="month" placeholder="Month" /> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Enter Degree</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="degree" placeholder="Degree" /> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Enter Academic Year</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="academic_year" placeholder="Academic Year" /> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Enter Subject</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="subject" placeholder="Subject" /> <br>
                        </div>
                    </div>

                    <button class="subbtn" type="submit" name="select-submit">
                        <a href="amDisplayMonthlyAttendanceV.php"> Display Attendance</a>
                    </button>
                    <button class="cancelbtn" type="submit" name="cancel-submit">
                        <a href="amHomeV.php">Cancel</a> 
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>