<?php
    require '../basic/topnav.php';
?>

<main>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="amHomeV.php">Home</a></li>
        <li><a href="amStudentWiseAttendanceV.php">Studentwise Attendance</a></li>
        <li class="active">Studentwise Attendance</li>
        </ul>

        <div class="row" style="margin-bottom: 4%;" >
            <div class="col left20">
                <?php
                    require 'amSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Studentwise Attendance</h2>
                </div>

                <div class="contentForm">
                    <form action="../../controller/amControllers/amViewStudentAttendanceC.php" method="post">
                        <div class="row">
                            <div class="col-25">
                                <label>Selected student</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="index_no" disabled <?php echo 'value="'.$_SESSION['index_no'].'"' ?> /><br>
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
                                <label>Start date</label>
                            </div>
                            <div class="col-75">
                                <input type="date" name="startDate" disabled <?php echo 'value="'.$_SESSION['startDate'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>End date</label>
                            </div>
                            <div class="col-75">
                                <input type="date" name="endDate" disabled <?php echo 'value="'.$_SESSION['endDate'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Total number of days</label>
                            </div>
                            <div class="col-75">
                                <input type="number" name="totalDays" disabled <?php echo 'value="'.$_SESSION['totalDays'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Attended number of days</label>
                            </div>
                            <div class="col-75">
                                <input type="number" name="attendDays" disabled <?php echo 'value="'.$_SESSION['attendDays'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Student's Attendance percentage</label>
                            </div>
                            <div class="col-75">
                                <input type="number" name="attendPercentage" disabled <?php echo 'value="'.$_SESSION['attendPercentage'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Total Attendance percentage</label>
                            </div>
                            <div class="col-75">
                                <input type="number" name="totalAvgAttendance" disabled <?php echo 'value="'.$_SESSION['totalAvgAttendance'].'"' ?> /><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Student's Attendance approval status</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="approval" disabled <?php echo 'value="'.$_SESSION['approval'].'"' ?> /><br>
                            </div>
                        </div>

                        <button class="subbtn" name="stdPDF">Generate pdf
                        </button>
                        <button class="cancelbtn" type="submit" name="cancel-submit">
                            <a href="amHomeV.php">Exit</a> 
                        </button>
                        
                    </form>
                </div>

                <table id="tableStyle" class="mytable"  style="margin-left: 30%;" >
                    <tr>
                        <th>Date</th>
                        <th>Attendance</th>
                    </tr>
                    <?php echo $_SESSION['stdAttendance_list']; ?>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>