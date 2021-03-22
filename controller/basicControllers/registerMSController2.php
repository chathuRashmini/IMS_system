<?php
    session_start();
	require_once('../../config/database.php');
    require_once('../../model/basicModel/registerMSModel.php');

    $errors = array();
    $loguser = mysqli_real_escape_string($connect, $_GET['loguser']);
    $userdetails = basicModel::view($loguser, $connect);
    $schemedetails = basicModel::getschemedetails($connect);

    $scheme_1_details = basicModel::getscheme('Scheme 1', $connect);
    $scheme_2_details = basicModel::getscheme('Scheme 2', $connect);
    $scheme_3_details = basicModel::getscheme('Scheme 3', $connect);
    
    $_SESSION['department_id'] = '';
    $_SESSION['member_id'] = '';
    $_SESSION['health_condition'] = '';
    $_SESSION['civil_status'] = '';
    $_SESSION['schemename'] = '';
    $_SESSION['permanent_months'] = '';
    $_SESSION['contract_months'] = '';
    $_SESSION['temporary_months'] = '';
    $_SESSION['scheme_options'] = '';
    $_SESSION['children'] = '';

    if (isset($_POST['registerNext-submit'])) {
        
        $department_id = mysqli_real_escape_string($connect, $_POST['department']);
        $member_id = mysqli_real_escape_string($connect, $_POST['member_type']);
        $health_condition = mysqli_real_escape_string($connect, $_POST['health_condition']);
        $civil_status = mysqli_real_escape_string($connect, $_POST['civil_status']);

        $_SESSION['department_id'] = $department_id;
        $_SESSION['member_id'] = $member_id;
        $_SESSION['health_condition'] = $health_condition;
        $_SESSION['civil_status'] = $civil_status;

        if (mysqli_num_rows($userdetails) == 1 && $schemedetails) {

            $ud = mysqli_fetch_assoc($userdetails);

            $date_diff = basicModel::getservicemonths($loguser, $connect);
            $submit_diff = mysqli_fetch_array($date_diff);
            $months = (int)$submit_diff[0]/30;
            echo $months;

            if ($_SESSION['member_id'] == 1) {

                $temp_months = basicModel::gettempMonths($connect);
                while ($tm = mysqli_fetch_array($temp_months)) {
                    if ($months >= $tm['temporaryStaff']) {
                        echo $tm['scheme_id'];
                        $_SESSION['scheme_options'] .= "<option value='".$tm['scheme_id']."'>".$tm['schemeName']."</option>";
                    } else {
                        if ($ud['userRole'] == "admin") {
                            header('Location:../../view/admin/aRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "academicStaffMemb") {
                            header('Location:../../view/academicStaffMember/asmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "nonAcademicStaffMemb") {
                            header('Location:../../view/nonAcademicStaffMember/nasmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "attendanceMain") {
                            header('Location:../../view/attendanceMaintainer/amRegisterMSerrorVhp');
                        } else if ($ud['userRole'] == "hallAllocationMain") {
                            header('Location:../../view/hallAllocationMaintainer/hamRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "mahapolaSchemeMain") {
                            header('Location:../../view/mahapolaSchemeMaintainer/mmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "medicalSchemeMain") {
                            header('Location:../../view/medicalSchemeMaintainer/msmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "recordsViewer") {
                            header('Location:../../view/reportViewer/rvRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "department_Head") {
                            header('Location:../../view/department_Head/dhRegisterMSerrorVhp');
                        } 
                    }
                }

            } elseif ($_SESSION['member_id'] == 2) {

                $perm_months = basicModel::getpermMonths($connect);
                while ($pm = mysqli_fetch_array($perm_months)) {
                    if ($months >= $pm['permanentStaff']) {
                        echo $pm['scheme_id'];
                        $_SESSION['scheme_options'] .= "<option value='".$pm['scheme_id']."'>".$pm['schemeName']."</option>";
                    } else {
                        if ($ud['userRole'] == "admin") {
                            header('Location:../../view/admin/aRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "academicStaffMemb") {
                            header('Location:../../view/academicStaffMember/asmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "nonAcademicStaffMemb") {
                            header('Location:../../view/nonAcademicStaffMember/nasmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "attendanceMain") {
                            header('Location:../../view/attendanceMaintainer/amRegisterMSerrorVhp');
                        } else if ($ud['userRole'] == "hallAllocationMain") {
                            header('Location:../../view/hallAllocationMaintainer/hamRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "mahapolaSchemeMain") {
                            header('Location:../../view/mahapolaSchemeMaintainer/mmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "medicalSchemeMain") {
                            header('Location:../../view/medicalSchemeMaintainer/msmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "recordsViewer") {
                            header('Location:../../view/reportViewer/rvRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "department_Head") {
                            header('Location:../../view/department_Head/dhRegisterMSerrorVhp');
                        }
                    }
                }

            } elseif ($_SESSION['member_id'] == 3) {

                $cont_months = basicModel::getcontMonths($connect);
                while ($cm = mysqli_fetch_array($cont_months)) {
                    if ($months >= $cm['contractStaff']) {
                        echo $cm['scheme_id'];
                        $_SESSION['scheme_options'] .= "<option value='".$cm['scheme_id']."'>".$cm['schemeName']."</option>";
                    } else {
                        if ($ud['userRole'] == "admin") {
                            header('Location:../../view/admin/aRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "academicStaffMemb") {
                            header('Location:../../view/academicStaffMember/asmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "nonAcademicStaffMemb") {
                            header('Location:../../view/nonAcademicStaffMember/nasmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "attendanceMain") {
                            header('Location:../../view/attendanceMaintainer/amRegisterMSerrorVhp');
                        } else if ($ud['userRole'] == "hallAllocationMain") {
                            header('Location:../../view/hallAllocationMaintainer/hamRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "mahapolaSchemeMain") {
                            header('Location:../../view/mahapolaSchemeMaintainer/mmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "medicalSchemeMain") {
                            header('Location:../../view/medicalSchemeMaintainer/msmRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "recordsViewer") {
                            header('Location:../../view/reportViewer/rvRegisterMSerrorV.php');
                        } else if ($ud['userRole'] == "department_Head") {
                            header('Location:../../view/department_Head/dhRegisterMSerrorVhp');
                        } 
                    }
                }

            } else {

                if ($ud['userRole'] == "admin") {
                    header('Location:../../view/admin/aNewSchemePolicyV.php');
                } else if ($ud['userRole'] == "academicStaffMemb") {
                    header('Location:../../view/academicStaffMember/asmNewSchemePolicyV.php');
                } else if ($ud['userRole'] == "nonAcademicStaffMemb") {
                    header('Location:../../view/nonAcademicStaffMember/nasmNewSchemePolicyV.php');
                } else if ($ud['userRole'] == "attendanceMain") {
                    header('Location:../../view/attendanceMaintainer/amNewSchemePolicyVhp');
                } else if ($ud['userRole'] == "hallAllocationMain") {
                    header('Location:../../view/hallAllocationMaintainer/hamNewSchemePolicyV.php');
                } else if ($ud['userRole'] == "mahapolaSchemeMain") {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmNewSchemePolicyV.php');
                } else if ($ud['userRole'] == "medicalSchemeMain") {
                    header('Location:../../view/medicalSchemeMaintainer/msmNewSchemePolicyV.php');
                } else if ($ud['userRole'] == "recordsViewer") {
                    header('Location:../../view/reportViewer/rvNewSchemePolicyV.php');
                } else if ($ud['userRole'] == "department_Head") {
                    header('Location:../../view/department_Head/dhNewSchemePolicyVhp');
                }

            }

            if ($ud['userRole'] == "admin") {
                header('Location:../../view/admin/aRegisterToMedicalSchemeP2V.php');
            } else if ($ud['userRole'] == "academicStaffMemb") {
                header('Location:../../view/academicStaffMember/asmRegisterToMedicalSchemeP2V.php');
            } else if ($ud['userRole'] == "nonAcademicStaffMemb") {
                header('Location:../../view/nonAcademicStaffMember/nasmRegisterToMedicalSchemeP2V.php');
            } else if ($ud['userRole'] == "attendanceMain") {
                header('Location:../../view/attendanceMaintainer/amRegisterMedicalSchemep2V.php');
            } else if ($ud['userRole'] == "hallAllocationMain") {
                header('Location:../../view/hallAllocationMaintainer/hamRegisterToMedicalSchemeP2V.php');
            } else if ($ud['userRole'] == "mahapolaSchemeMain") {
                header('Location:../../view/mahapolaSchemeMaintainer/mmRegisterToMedicalSchemeP2V.php');
            } else if ($ud['userRole'] == "medicalSchemeMain") {
                header('Location:../../view/medicalSchemeMaintainer/msmRegisterToMedicalSchemeP2V.php');
            } else if ($ud['userRole'] == "recordsViewer") {
                header('Location:../../view/reportViewer/rvRegisterToMedicalSchemeP2V.php');
            } else if ($ud['userRole'] == "departmentHead") {
                echo "0 ";
                // header('Location:../../view/departmentHead/dhRegisterToMedicalSchemeP2V.php');
            }
        }
    }
?>