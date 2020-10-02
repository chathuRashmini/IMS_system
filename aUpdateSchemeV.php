<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            require "header.php";
        ?>
        <ul class="breadcrumb">
            <li><a href="homePageV.php">Home</a></li>
            <li><a href="adminV.php">Admin Page</a></li>
            <li>Update Policies of a scheme</li>
        </ul>
        <?php
            require "aSideNavV.php";
        ?>

        <div class="formStyle">
        <form action="aUpdateScheme.php" method="post"> 
            <input type="text" name="scheme" placeholder="Enter Scheme Number" required>
            <input type="text" name="description" placeholder="Update its Policies" required>
            <button type="submit" name="scheme-submit">Save updates</button>
        </form>
    </div>

        <?php
            require "footer.php";
        ?>
    </body>
</html>