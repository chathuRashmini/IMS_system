<?php
    require '../basic/topnav.php';
?>

<main>
    <title>View Hall Allocation Schedule</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="asmHomeV.php">Home</a></li>
            <li>Hall Allocation Schedule</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'asmSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Hall Allocation Schedule</h2>
                </div>

                <div class="contentForm">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-25">
                              <label>Enter Date</label>
                            </div>
                            <div class="col-75">
                                <input type="date" id="" name="enterDate"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Or Enter Date Range</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                              <label>Enter Starting Date</label>
                            </div>
                            <div class="col-75">
                                <input type="date" id="" name="startDate" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Enter Ending Date</label>
                            </div>
                            <div class="col-75">
                                <input type="date" id="" name="endDate" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                              <label>Enter Hall</label>
                            </div>
                            <div class="col-75">
                                <input type="date" id="" name="enterDate"/>
                            </div>
                        </div>

                        <button class="subbtn" name="displayschedule-submit">
                            <a href="asmHallAllocationScheduleViewV.php">Display Schedule</a>
                        </button>
                        <button type="submit" class="cancelbtn">
                            <a href="asmHomeV.php">Cancel</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>