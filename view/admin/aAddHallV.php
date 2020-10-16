<main>
    <title>Add a hall</title>
    <?php
        require '../basic/header.php';
    ?>

    <div class="header">
        <ul class="breadcrumbs">
            <li><a href="aHomeV.php">Home</a></li>
            <li>Add a new hall</li>
        </ul>
    </div>

    <div class="side-nav">
        <?php
            require '../admin/aSideNavV.php';
        ?>
    </div>
            
    <div class="content">
        <div>
            <h3>Add a new hall</h3>
        </div>
        <div>
            <form action="../../controller/aAddHallController.php" method="POST">
                <label for="">Hall Name</label>
                <input type="text" name="hall_name" placeholder="Enter hall name" required/><br>
                <label for="">Hall Location</label>
                <input type="text" name="hall_location" placeholder="Enter hall location" required/><br>
                <label for="">Seating Capacity</label>
                <input type="text" name="seating_capacity" placeholder="Enter seating capacity" required/><br>
                <label for="">AC availability</label>
                <select name="ac"required>
                    <option value="">Select AC availability: </option>
                    <option value="1">A/C</option>
                    <option value="0">Non A/C</option>
                </select>                       
                <button type="submit" name="addHall-submit">Add Semester</button>
            </form>
        </div>
    </div>

    <?php
        require '../basic/footer.php';
    ?>
</main>