<?php
    session_start();
    require_once('../../model/basicModel/manageProfileModel.php');
    require_once('../../config/database.php');

?>

<?php

    $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
    $result_set = basicModel::view($user_id, $connect);
    // echo $user_id;
    if ($result_set) {
        if (mysqli_num_rows($result_set)==1) {
            $result = mysqli_fetch_assoc($result_set);

            $_SESSION['userId'] = $result['userId'];
            // $_SESSION['empid'] = $result['empid'];
            // $_SESSION['initials'] = $result['initials'];
            // $_SESSION['sname'] = $result['sname'];
            // $_SESSION['email'] = $result['email'];
            // $_SESSION['mobile'] = $result['mobile'];
            // $_SESSION['tp'] = $result['tp'];
            // $_SESSION['dob'] = $result['dob'];
            // $_SESSION['designation'] = $result['designation'];
            // $_SESSION['appointment'] = $result['appointment'];

            if ($result['userRole'] == "admin") {
                header('Location:../../view/admin/aUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "academicStaffMemb") {
                header('Location:../../view/academicStaffMember/asmUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "nonAcademicStaffMemb") {
                header('Location:../../view/nonAcademicStaffMember/nasmUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "attendanceMain") {
                header('Location:../../view/attendanceMaintainer/amUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "hallAllocationMain") {
                header('Location:../../view/hallAllocationMaintainer/hamUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "mahapolaSchemeMain") {
                header('Location:../../view/mahapolaSchemeMaintainer/mmUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "medicalSchemeMain") {
                header('Location:../../view/medicalSchemeMaintainer/msmUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "medicalSchemeMemb") {
                header('Location:../../view/medicalSchemeMember/memUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "recordsViewer") {
                header('Location:../../view/reportViewer/rvUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "departmentHead") {
                header('Location:../../view/departmentHead/dhUpdatePasswordV.php');
            }
            else if ($result['userRole'] == "medicalOfficer") {
                header('Location:../../view/medicalOfficer/moUpdatePasswordV.php');
            }
            else {
                echo "USER";
            }
        }
    }

?>