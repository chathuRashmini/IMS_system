<?php
    require '../basic/topnav.php';
?>

<main>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="amHomeV.php">Home</a></li>
        <li><a href="amMonthWiseAttendanceV.php">Monthwise Attendance</a></li>
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
                    <form action="../../controller/amControllers/amViewMonthlyAttendanceC.php" method="post">
                        <div class="row">
                            <div class="col-25">
                                <label>Selected calendar year</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="calander_year" disabled <?php echo 'value="'.$_SESSION['calander_year'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Selected Month</label>
                            </div>
                            <div class="col-75">
                                <input type="number" name="month" disabled <?php echo 'value="'.$_SESSION['month'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Selected Degree</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="degree_name" disabled <?php echo 'value="'.$_SESSION['degree_name'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Selected subject</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="subject_name" disabled <?php echo 'value="'.$_SESSION['subject_name'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Selected session type</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="sessionType" disabled <?php echo 'value="'.$_SESSION['sessionType'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Total number of days</label>
                            </div>
                            <div class="col-75">
                                <input type="number" name="monthDays" disabled <?php echo 'value="'.$_SESSION['monthDays'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Total number of students</label>
                            </div>
                            <div class="col-75">
                                <input type="number" name="stdCount" disabled <?php echo 'value="'.$_SESSION['stdCount'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Attendance Percentage</label>
                            </div>
                            <div class="col-75">
                                <input type="number" name="attendPercentage" disabled <?php echo 'value="'.$_SESSION['attendPercentage'].'"' ?> /><br>
                            </div>
                        </div>

                        <button class="subbtn" type="submit" name="monthPdf">Genrate a pdf
                        </button>
                        <button class="cancelbtn" type="submit" name="cancel-submit">
                            <a href="amHomeV.php">Exit</a> 
                        </button>
                    </form>
                </div>

                <table id="tableStyle" class="mytable" style="margin-left: 30%;" >
                    <tr>
                        <th>Index Number</th>
                        <th>Attendance</th>
                    </tr>
                    <?php echo $_SESSION['monthAttendance_list']; ?>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>