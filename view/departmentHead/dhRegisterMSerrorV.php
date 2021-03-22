<?php
    require '../basic/topnav.php';
?>

<main>
    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="dhHomeV.php">Home</a></li>
            <li><a href="#">Register to the Medical scheme</a></li>
            <li class="active">Action Success!</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'dhSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div class="contentForm">
                    <div class="row">
                        <h2>Sorry! Yet you can't register to the Medical Scheme.</h2>
                    </div>

                    <button class="subbtn">
                        <a href="dhHomeV.php">Ok</a> 
                    </button>
                    <button class="cancelbtn">
                        <a href="dhHomeV.php">Exit</a> 
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>