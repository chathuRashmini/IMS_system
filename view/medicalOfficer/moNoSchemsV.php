<?php
    require '../basic/topnav.php';
?>

<main>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="moHomeV.php">Home</a></li>
            <li class="active">Request Failed!</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'moSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <div>
                        <h2>Sorry!
                            No schemes are availabl in the system right now.
                        </h2>
                    </div>

                    <button class="mainbtn">
                        <a href="moHomeV.php">Ok</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>