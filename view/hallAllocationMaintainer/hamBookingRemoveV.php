<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Remove a booking</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="hamHomeV.php">Home</a></li>
            <li class="active">Remove a booking</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'hamSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div class="contentForm">
                    <form>
                        <h3>Your booking has been removed successfully.</h3>

                        <a href="hamUpdateBookingV.php"><button class="mainbtn" type="submit" name="bookingRemoveSuccess-submit">OK</button></a><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>