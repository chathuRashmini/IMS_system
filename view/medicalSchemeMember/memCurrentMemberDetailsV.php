<?php
    require "../basic/topnav.php";
?>

<main>
    <title>Member Details</title>
        <div class="sanssrif">
            
                <ul class="breadcrumbs">
                    <li><a href="memHomeV.php">Home</a></li>
                    <li><a href="memRenewMembershipV.php?user_id=<?php echo $_SESSION['userId'] ?>">Renew Membership</a></li>
                    <li class="active">Current Member Details</li>
                </ul>
            

            <div class="col left20">
                <?php 
                    require('memSideNavV.php');
                ?>
            </div>

            <div class="row" style="margin-bottom: 4%;">
                <div class="col right80">
                    <div>
                        <h2>Current Member Details</h2>
                    </div>

                    <div class="contentForm">
                        <form action="../../controller/memControllers/currentMemberDetailsControllerTwo.php?user_id=<?php echo $_SESSION['userId'] ?>" method="post">
                            
                            <div class="row" >
                                <div class="col-25">
                                    <label>Name</label>
                                </div>
                                <div class="col-75">
                                    <input name="name" type="text" <?php echo 'value="'.$_SESSION['name'].'"' ?> readonly>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-25">
                                    <label>Health condition</label>
                                </div>
                                <div class="col-75">
                                    <input name="health_condition" type="text" <?php echo 'value="'.$_SESSION['health_condition'].'"' ?> required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label>Civil status</label>
                                </div>
                                <div class="col-75">
                                    <select name="married" id="married" required>
                                        <option >Select option</option>
                                        <option value="1">Married</option>
                                        <option value="0">Unmarried</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label>Medical Scheme Type</label>
                                </div>
                                <div class="col-75">
                                    <input name="scheme" type="text" <?php echo 'value="'.$_SESSION['scheme'].'"' ?> readonly>
                                </div>
                            </div>
                            <br>

                            <button class="subbtn" type="submit" name="mem-det-submit">Update Details</button>
                            <button type="submit" class="cancelbtn">
                                <a href="memHomeV.php">Cancel</a>
                            </button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
</main>

<?php
    require_once('../basic/footer.php');
?>


