<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Assign monthly sessions</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="aHomeV.php">Home</a></li>
            <li>Assign monthly sessions</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'aSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Assign monthly sessions to subjects</h2>
                </div>

                <div class="contentForm">
                    <form action="../../controller/adminControllers/manageMonthlySessionsC.php" method="post">
                        <div class="row">
                            <div class="col-25">
                              <label>Enter subject</label>
                            </div>
                            <div class="col-75">
                              <input type="text" name="subject" placeholder="Subject" required/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                              <label>Enter month</label>
                            </div>
                            <div class="col-75">
                              <input type="text" name="month" placeholder="Month"><br>
                            </div>
                        </div>

                        <button class="mainbtn" type="submit" name="viewSSession-submit">View sessions</button>
                    </form>
                    <form>
                        <button class="subbtn" type="submit" name="">
                            <a href="../../controller/adminControllers/manageMonthlySessionController.php">View Subjects List</a>
                        </button>
                        <button type="submit" class="cancelbtn">
                            <a href="aHomeV.php">Cancel</a>
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