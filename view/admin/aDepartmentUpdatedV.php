<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Updated a Department</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="aHomeV.php">Home</a></li>
            <li><a href="aUpdateDepartmentV.php">Update Department</a></li>
            <li class="active">Action was success!</li>
        </ul>
    
        <div class="row">
            <div class="col left20">
                <?php
                    require 'aSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div class="contentForm">
                    <div class="row">
                        <h2>The Department is updated successfully!</h2>
                    </div>

                    <button class="subbtn" type="submit">
                        <a href="../../controller/adminControllers/aViewDepartmentController.php">Departments List</a>
                    </button>
                    <button class="cancelbtn" type="submit">
                        <a href="aHomeV.php">Exit</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
</main>

<?php
    require '../basic/footer.php';
?>