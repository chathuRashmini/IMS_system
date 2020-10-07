<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Staff Member Home Page</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div class="container">

        <div class="header">
            <!-- <div class="nameLogo"> -->
            <img src="../img/ims.jpg" alt="ims" class="logo">
            <!-- </div> -->
            <div class="options">
                <a href="aHomeV.php">Home</a>
                <a href="#">Profile</a>
                <a href="#">Logout</a>
            </div>
        </div>

        <div class="header">breadcrums</div>

        <div class="side-nav">
            <a href="aManageUserRolesV.php"><button type="submit" name="" class="button">Manage User
                    Roles</button></a><br>
            <a href="aManageMedicalPoliciesV.php"><button type="submit" name="" class="button">Manage Medical
                    Policies</button></a><br>
            <a href="aManageDegreesV.php"><button type="submit" name="" class="button">Manage Degrees</button></a><br>
            <a href="aManageSessionsV.php"><button type="submit" name="" class="button">Manage Sessions</button></a><br>
            <a href="aManageSessionPerMonthV.php"><button type="submit" name="" class="button">Manage Sessions Per
                    Month</button></a><br>
            <a href="aManageSemestersV.php"><button type="submit" name="" class="button">Manage
                    Semesters</button></a><br>
            <a href="aManageHallsV.php"><button type="submit" name="" class="button">Manage Halls</button></a><br>
            <a href="aManageDepartmentV.php"><button type="submit" name="" class="button">Manage
                    Departments</button></a><br>
            <a href="aManageDesignationV.php"><button type="submit" name="" class="button">Manage
                    Designations</button></a><br>
            <a href="aViewHallDetailsV.php"><button type="submit" name="" class="button">View Hall
                    Details</button></a><br>
        </div>

        <div class="content">
            <div>
                <h3>Update/Remove Department</h3>
            </div>
            <div class="formStyle">
                <form action="aUpdateRemoveDepartment.php" method="post">
                    Department Name: <input type="text" name="departmentName" placeholder="Enter department name"
                        required><br>
                    Description: <input type="text" name="departmentDescriotion" placeholder="Description" required><br>
                    <button type="submit" name="updateDepartment-submit">Save Updates</button>
                    <button type="submit" name="removeDepartment-submit">Remove Department</button>
                </form>
            </div>
        </div>

        <div class="footer">
            <?php
                require_once('../include/footer.php');
            ?>
        </div>

    </div>
</body>

</html>