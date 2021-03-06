<?php 
    require_once('../../model/mmModel/mmViewAttendanceModel.php');
    require_once('../../config/database.php');

    if (isset($_POST['fetchStudents-submit'])) {
    	session_start();
    	$records = mmModel::getStudents($connect);
        $_SESSION['student_indexes'] = '';

    	while ($record = mysqli_fetch_array($records)) {
            $_SESSION['student_indexes'] .= "<option value='".$record['index_no']."'>".$record['index_no']." </option>";
        }
        header('Location:../../view/mahapolaSchemeMaintainer/mmStudentWiseAttendanceV.php');
    }

    elseif (isset($_POST['filterStudent-submit'])) {
        session_start();
        $index_no = $_POST['index_no'];
        $_SESSION['index_no'] = $index_no;

        $student = mmModel::filterStudent($index_no, $connect);

        if (mysqli_num_rows($student) == 1) {
            $result = mysqli_fetch_assoc($student);
            $academic_year = $result['academic_year'];
            $semester = $result['semester'];
            $degree_id = $result['degree_id'];

            $records1 = mmModel::filterSubjects($academic_year, $semester, $degree_id, $connect);
            $records2 = mmModel::filterSessionTypes($connect);

            if ($records1 && $records2) {
                $_SESSION['subjectsList'] = '';
                $_SESSION['sessionTypes'] = '';

                while ($record = mysqli_fetch_array($records1)) {
                    $_SESSION['subjectsList'] .= "<option value='".$record['subject_name']."'>".$record['subject_name']."</option>";
                }

                while ($record = mysqli_fetch_array($records2)) {
                    $_SESSION['sessionTypes'] .= "<option value='".$record['sessionType']."'>".$record['sessionType']."</option>";
                }
                header('Location:../../view/mahapolaSchemeMaintainer/mmGetStdStdwiseAttendanceV.php');
            }
            else {
                header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubSessionAvailableV.php');
            }
        }       
    }

    elseif (isset($_POST['stdWise-submit'])) {
        session_start();
        $index_no = $_SESSION['index_no'];
        $subject_name = $_POST['subject_name'];
        $sessionType = $_POST['sessionType'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        if ($startDate > $endDate) {
            header('Location:../../view/mahapolaSchemeMaintainer/mmStartEndDateIssue.php');
        }
        else {
            $_SESSION['index_no'] = $index_no;
            $_SESSION['subject_name'] = $subject_name;
            $_SESSION['sessionType'] = $sessionType;
            $_SESSION['startDate'] = $startDate;
            $_SESSION['endDate'] = $endDate;

            $result_sessionTypeId = mmModel::getSessionTypeID($sessionType, $connect);
            $result2 = mysqli_fetch_assoc($result_sessionTypeId);

            $result_student_id = mmModel::filterStudent ($index_no, $connect);
            $result3 = mysqli_fetch_assoc($result_student_id);

            if ($result2 && $result3) {
                $sessionTypeId = $result2['sessionTypeId'];
                $std_id = $result3['std_id'];
                $degree_id = $result3['degree_id'];

                $result_subject_id = mmModel::getSubjectID($subject_name, $degree_id, $connect);
                $result1 = mysqli_fetch_assoc($result_subject_id);
                $subject_id = $result1['subject_id'];

                $attendance = mmModel::stdAttendance ($std_id, $subject_id, $sessionTypeId, $startDate, $endDate, $connect);

                $get_totDays = mmModel::getTotDays ($std_id, $subject_id, $sessionTypeId, $startDate, $endDate, $connect);
                $result_totDays = mysqli_fetch_assoc($get_totDays);
                $_SESSION['totalDays'] = $result_totDays['totalDays'];

                if ($_SESSION['totalDays'] == 0) {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmNoStdAttendanceV.php');
                }
                else {
                    $get_attendDays = mmModel::getAttendDays ($std_id, $subject_id, $sessionTypeId, $startDate, $endDate, $connect);
                    $result_attendDays = mysqli_fetch_assoc($get_attendDays);
                    $_SESSION['attendDays'] = $result_attendDays['attendDays'];

                    $get_attendPercentage = mmModel::getAttendPercentage ($std_id, $subject_id, $sessionTypeId, $startDate, $endDate, $connect);
                    $result_attendPercentage = mysqli_fetch_assoc($get_attendPercentage);
                    $_SESSION['attendPercentage'] = $result_attendPercentage['attendPercentage'];

                    if ($attendance && $result_totDays  && $result_attendDays && $result_attendPercentage) {
                        $_SESSION['stdAttendance_list'] = '';

                        while ($record = mysqli_fetch_assoc($attendance)) {
                            $_SESSION['stdAttendance_list'] .= "<tr>";
                            $_SESSION['stdAttendance_list'] .= "<td>{$record['date']}</td>";
                            $_SESSION['stdAttendance_list'] .= "<td>{$record['attendance']}</td>";
                            $_SESSION['stdAttendance_list'] .= "</tr>";
                        }

                        header('Location:../../view/mahapolaSchemeMaintainer/mmDisplayStdwiseAttendanceV.php');
                    }
                    else {
                        header('Location:../../view/mahapolaSchemeMaintainer/mmNoStdAttendanceV.php');
                    }
                }
            }
            else {
                header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubIDSessionID.php');
            }
        }
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    elseif (isset($_POST['fetchDegrees-submit'])) {
        session_start();
        $records = mmModel::getDegrees($connect);
        $_SESSION['degree_list'] = '';

        while ($record = mysqli_fetch_array($records)) {
            $_SESSION['degree_list'] .= "<option value='".$record['degree_name']."'>".$record['degree_name']." </option>";
        }
        header('Location:../../view/mahapolaSchemeMaintainer/mmMonthWiseAttendanceV.php');
    }

    elseif (isset($_POST['getSubjects-submit'])) {
        $calander_year = $_POST['calander_year'];
        $month = $_POST['month'];
        $degree_name = $_POST['degree_name'];
        $academic_year = $_POST['academic_year'];
        $semester = $_POST['semester'];

        if ($calander_year > date("Y")) {
            header('Location:../../view/mahapolaSchemeMaintainer/mmFutureYearMV.php');
        }
        elseif ($calander_year == date("Y") && $month > date("m")) {
            header('Location:../../view/mahapolaSchemeMaintainer/mmFutureMonthMV.php');
        }
        else {
            session_start();

            $get_degreeId = mmModel::getDegreeId ($degree_name, $connect);
            $result_degreeID = mysqli_fetch_assoc($get_degreeId);
            $degree_id = $result_degreeID['degree_id'];

            $attendance = mmModel::filterSubjects($academic_year, $semester, $degree_id, $connect);
            $_SESSION['subjects_list'] = '';
            while ($record = mysqli_fetch_array($attendance)) {
                $_SESSION['subjects_list'] .= "<option value='".$record['subject_name']."'>".$record['subject_name']." </option>";
            }

            $sessionTypes = mmModel::filterSessionTypes($connect);
            $_SESSION['sessionTypes_list'] = '';
            while ($record1 = mysqli_fetch_array($sessionTypes)) {
                $_SESSION['sessionTypes_list'] .= "<option value='".$record1['sessionType']."'>".$record1['sessionType']." </option>";
            }

            $_SESSION['calander_year'] = $calander_year;
            $_SESSION['month'] = $month;
            $_SESSION['degree_name'] = $degree_name;
            $_SESSION['academic_year'] = $academic_year;
            $_SESSION['semester'] = $semester;

            header('Location:../../view/mahapolaSchemeMaintainer/mmSeletcSubjectV.php');
        }
    }

    elseif (isset($_POST['monthWise-submit'])) {
        session_start();
        $calander_year = $_SESSION['calander_year'];
        $month = $_SESSION['month'];
        $degree_name = $_SESSION['degree_name'];
        $academic_year = $_SESSION['academic_year'];
        $semester = $_SESSION['semester'];
        $subject_name = $_POST['subject_name'];
        $sessionType = $_POST['sessionType'];
        $_SESSION['subject_name'] = $subject_name;
        $_SESSION['sessionType'] = $sessionType;

        $get_degreeId = mmModel::getDegreeId ($degree_name, $connect);
        $result_degreeID = mysqli_fetch_assoc($get_degreeId);

        if ($result_degreeID) {
            $degree_id = $result_degreeID['degree_id'];

            $result_subject_id = mmModel::getSubjectID($subject_name, $degree_id , $connect);
            $result1 = mysqli_fetch_assoc($result_subject_id);

            $result_sessionTypeId = mmModel::getSessionTypeID($sessionType, $connect);
            $result2 = mysqli_fetch_assoc($result_sessionTypeId);

            if ($result1 && $result2) {
                $subject_id = $result1['subject_id'];
                $sessionTypeId = $result2['sessionTypeId'];

                $get_monthDays = mmModel::getMonthDays($calander_year, $month, $subject_id, $sessionTypeId, $connect);
                $result_monthDays = mysqli_fetch_assoc($get_monthDays);
                $_SESSION['monthDays'] = $result_monthDays['monthDays'];

                if ($_SESSION['monthDays'] == 0) {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmNoMonthlyAttendance.php');
                }
                else {
                    $get_degreeId = mmModel::getDegreeId ($degree_name, $connect);
                    $result_degreeID = mysqli_fetch_assoc($get_degreeId);
                    $degree_id = $result_degreeID['degree_id'];

                    $get_stdCount = mmModel::getStdCount($academic_year, $semester, $degree_id, $connect);
                    $result_stdCount = mysqli_fetch_assoc($get_stdCount);
                    $_SESSION['stdCount'] = $result_stdCount['stdCount'];

                    $get_attendPercentage = mmModel::getMonthAttendPercentage($calander_year, $month, $degree_id, $subject_id, $sessionTypeId, $connect);
                    $result_attendPercentage = mysqli_fetch_assoc($get_attendPercentage);
                    $_SESSION['attendPercentage'] = $result_attendPercentage['attendPercentage'];
                    
                    $attendance = mmModel::monthAttendance ($calander_year, $month, $subject_id, $sessionTypeId, $connect);

                    if ($attendance && $result_monthDays && $result_stdCount && $result_attendPercentage) {
                        $_SESSION['monthAttendance_list'] = '';

                        while ($record = mysqli_fetch_assoc($attendance)) {
                            $std_id = $record['std_id'];
                            $get_student_index = mmModel::getStdIndex ($std_id, $connect);
                            $result_student_index = mysqli_fetch_assoc($get_student_index);

                            $_SESSION['monthAttendance_list'] .= "<tr>";
                            $_SESSION['monthAttendance_list'] .= "<td>{$result_student_index['index_no']}</td>";
                            $_SESSION['monthAttendance_list'] .= "<td>{$record['attendance']}</td>";
                            $_SESSION['monthAttendance_list'] .= "</tr>";
                        }

                        header('Location:../../view/mahapolaSchemeMaintainer/mmDisplayMonthlyAttendanceV.php');
                    }
                    else {
                        header('Location:../../view/mahapolaSchemeMaintainer/mmNoMonthlyAttendance.php');
                    }
                }
            }
            else {
                header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubIDSessionID_M.php');
            }
        }
        else {
            header('Location:../../view/mahapolaSchemeMaintainer/mmRequestDeniedV.php');
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////
    elseif (isset($_POST['fetchSubjects-submit'])) {
        $records1 = mmModel::fetchSubjects($connect);
        $records2 = mmModel::filterSessionTypes($connect);
        $records3 = mmModel::getDegrees($connect);

        if ($records1 && $records2 && $records3) {
            session_start();
            $_SESSION['subjectsList'] = '';
            $_SESSION['sessionTypes'] = '';
            $_SESSION['degreeList'] = '';

            while ($record = mysqli_fetch_array($records1)) {
                $_SESSION['subjectsList'] .= "<option value='".$record['subject_name']."'>".$record['subject_name']."</option>";
            }

            while ($record = mysqli_fetch_array($records2)) {
                $_SESSION['sessionTypes'] .= "<option value='".$record['sessionType']."'>".$record['sessionType']."</option>";
            }

            while ($record = mysqli_fetch_array($records3)) {
                $_SESSION['degreeList'] .= "<option value='".$record['degree_name']."'>".$record['degree_name']."</option>";
            }
            header('Location:../../view/mahapolaSchemeMaintainer/mmSubjectWiseAttendanceV.php');
        }
    }

    elseif (isset($_POST['subjectWise-submit'])) {
        $subject_name = $_POST['subject_name'];
        $sessionType = $_POST['sessionType'];
        $degree_name = $_POST['degree_name'];
        $batch_number = $_POST['batch_number'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        if ($startDate > $endDate) {
            header('Location:../../view/mahapolaSchemeMaintainer/mmStartEndDateIssueM.php');
        }

        else {
            $get_degreeId = mmModel::getDegreeId ($degree_name, $connect);
            $result_degreeID = mysqli_fetch_assoc($get_degreeId);
            $degree_id = $result_degreeID['degree_id'];


            $result_subject_id = mmModel::getSubjectID($subject_name, $degree_id, $connect);
            $result1 = mysqli_fetch_assoc($result_subject_id);

            $result_sessionTypeId = mmModel::getSessionTypeID($sessionType, $connect);
            $result2 = mysqli_fetch_assoc($result_sessionTypeId);

            if ($result1 && $result2) {
                session_start();
                $subject_id = $result1['subject_id'];
                $sessionTypeId = $result2['sessionTypeId'];

                $get_aySem = mmModel::getAySem($subject_name, $degree_id, $connect);
                $result_aySem = mysqli_fetch_assoc($get_aySem);
                $academic_year = $result_aySem['academic_year'];
                $semester = $result_aySem['semester'];

                $get_stdCount = mmModel::getStdCount($academic_year, $semester, $degree_id, $connect);
                $result_stdCount = mysqli_fetch_assoc($get_stdCount);

                $get_totSubDays = mmModel::getTotSubDays($degree_id, $subject_id, $sessionTypeId, $startDate, $endDate, $connect);
                $result_totSubDays = mysqli_fetch_assoc($get_totSubDays);

                if ($result_stdCount && $result_totSubDays) {
                    $_SESSION['stdCount'] = $result_stdCount['stdCount'];
                    $_SESSION['totSubDays'] = $result_totSubDays['totSubDays'];

                    if ($_SESSION['totSubDays'] == 0) {
                        header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubjectAttendance.php');
                    }
                    else {
                        $get_attendPercentage = mmModel::getSubjectAttendPercentage ($degree_id, $subject_id, $sessionTypeId, $startDate, $endDate, $connect);
                        $result_attendPercentage = mysqli_fetch_assoc($get_attendPercentage);

                        if ($result_attendPercentage) {
                            $_SESSION['attendPercentage'] = $result_attendPercentage['attendPercentage'];

                            $records = mmModel::fetchSubjectAttendance($degree_id, $subject_id, $sessionTypeId, $startDate, $endDate, $connect);
                            $records_check = mysqli_fetch_assoc($records);

                            if ($records_check) {
                                $_SESSION['subWise_attendance'] = '';

                                while ($record = mysqli_fetch_assoc($records)) {
                                    $get_index = mmModel::getStdIndex ($record['std_id'], $connect);
                                    $result_index = mysqli_fetch_assoc($get_index);
                                    $index_no = $result_index['index_no'];
                                    
                                    $_SESSION['subWise_attendance'] .= "<tr>";
                                    $_SESSION['subWise_attendance'] .= "<td>{$index_no}</td>";
                                    $_SESSION['subWise_attendance'] .= "<td>{$record['attendance']}</td>";
                                    $_SESSION['subWise_attendance'] .= "</tr>";
                                }

                                $_SESSION['subject_name'] = $subject_name;
                                $_SESSION['sessionType'] = $sessionType;
                                $_SESSION['degree_name'] = $degree_name;
                                $_SESSION['batch_number'] = $batch_number;
                                $_SESSION['startDate'] = $startDate;
                                $_SESSION['endDate'] = $endDate;

                                header('Location:../../view/mahapolaSchemeMaintainer/mmDisplaySubjectAttendanceV.php');
                            }
                            else {
                                header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubjectAttendance.php');
                            }
                        }
                        else {
                            header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubjectAttendance.php');
                        }
                    }
                }
                else {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubjectAttendance.php');
                }
            }
            else {
                header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubIDSessionID_S.php');
            }
        }
    }
    ////////////////////////////////////////////////////////////////////
    elseif (isset($_POST['getDegrees-submit'])) {
        $records1 = mmModel::getDegrees($connect);

        if ($records1) {
            session_start();
            $_SESSION['degreeList'] = '';

            while ($record = mysqli_fetch_array($records1)) {
                $_SESSION['degreeList'] .= "<option value='".$record['degree_name']."'>".$record['degree_name']."</option>";
            }
            header('Location:../../view/mahapolaSchemeMaintainer/mmBatchWiseAttendanceV.php');
        }
        else {
            header('Location:../../view/attendanceMaintainer/mmRequestDenied.php');
        }
    }

    elseif (isset($_POST['filterSubjects-submit'])) {
        session_start();
        $degree_name = $_POST['degree_name'];
        $academic_year = $_POST['academic_year'];
        $semester = $_POST['semester'];

        $get_degreeId = mmModel::getDegreeId ($degree_name, $connect);
            $result_degreeID = mysqli_fetch_assoc($get_degreeId);
            $degree_id = $result_degreeID['degree_id'];
        
        $records1 = mmModel::filterSubjects($academic_year, $semester, $degree_id, $connect);
        $records2 = mmModel::filterSessionTypes($connect);

        if ($records1 && $records2) {
            session_start();
            $_SESSION['subject_list'] = '';
            $_SESSION['sessionTypes'] = '';

            while ($record = mysqli_fetch_array($records1)) {
                $_SESSION['subject_list'] .= "<option value='".$record['subject_name']."'>".$record['subject_name']."</option>";
            }

            while ($record = mysqli_fetch_array($records2)) {
                $_SESSION['sessionTypes'] .= "<option value='".$record['sessionType']."'>".$record['sessionType']."</option>";
            }
            header('Location:../../view/mahapolaSchemeMaintainer/mmSelectSub_B.php');
        }
        else {
            header('Location:../../view/attendanceMaintainer/mmRequestDenied.php');
        }
    }

    elseif (isset($_POST['batchWise-submit'])) {
        session_start();
        $degree_id = $_SESSION['degree_id'];
        $batch_number = $_POST['batch_number'];
        $subject_name = $_POST['subject_name'];
        $sessionType = $_POST['sessionType'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        if ($startDate > $endDate) {
            header('Location:../../view/mahapolaSchemeMaintainer/mmStartEndDateIssueB.php');
        }
        else {
            $_SESSION['batch_number'] = $batch_number;
            $_SESSION['subject_name'] = $subject_name;
            $_SESSION['sessionType'] = $sessionType;
            $_SESSION['startDate'] = $startDate;
            $_SESSION['endDate'] = $endDate;

            $result_subject_id = mmModel::getSubjectID($subject_name, $degree_id, $connect);
            $result1 = mysqli_fetch_assoc($result_subject_id);

            $result_sessionTypeId = mmModel::getSessionTypeID($sessionType, $connect);
            $result2 = mysqli_fetch_assoc($result_sessionTypeId);

            if ($result1 && $result2) {
                $subject_id = $result1['subject_id'];
                $sessionTypeId = $result2['sessionTypeId'];

                $records1 = mmModel::batchAttendance($degree_id, $subject_id, $sessionTypeId, $batch_number, $startDate, $endDate, $connect);
                $records2 = mmModel::batchAttendancePercentage($degree_id, $subject_id, $sessionTypeId, $batch_number, $startDate, $endDate, $connect);
                $result_records2 = mysqli_fetch_assoc($records2);
                $attendPercentage = $result_records2['attendPercentage'];
                $stdCount = $result_records2['stdCount'];
                $numOfDays = $result_records2['numOfDays'];

                if ($records1 && $records2) {
                    if (mysqli_num_rows($records1) == 0) {
                        header('Location:../../view/mahapolaSchemeMaintainer/mmNoBatchAttendance.php');
                    }
                    else {
                        $_SESSION['batchWise_attendance'] = '';

                        while ($record = mysqli_fetch_assoc($records1)) {
                            $std_id = $record['std_id'];
                            $get_student_index = mmModel::getStdIndex ($std_id, $connect);
                            $result_student_index = mysqli_fetch_assoc($get_student_index);

                            $_SESSION['batchWise_attendance'] .= "<tr>";
                            $_SESSION['batchWise_attendance'] .= "<td>{$result_student_index['index_no']}</td>";
                            $_SESSION['batchWise_attendance'] .= "<td>{$record['attendance']}</td>";
                            $_SESSION['batchWise_attendance'] .= "</tr>";
                        }
                        $_SESSION['attendPercentage'] = $attendPercentage;
                        $_SESSION['stdCount'] = $stdCount;
                        $_SESSION['numOfDays'] = $numOfDays;
                        header('Location:../../view/mahapolaSchemeMaintainer/mmDisplayBatchAttendanceV.php');
                    }
                }
                else {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmNoBatchAttendance.php');
                }
            }
            else {
                header('Location:../../view/mahapolaSchemeMaintainer/mmNoSubIDSessionID_Batch.php');
            }
        }
    }

    elseif (isset($_POST['semesterAttendance-submit'])) {
        $calander_year = $_POST ['calander_year'];
        $semester = $_POST ['semester'];

        $getDates = mmModel::getSemesterDates ($calander_year, $semester, $connect);
        $getDates_result = mysqli_fetch_assoc($getDates);

        if ($getDates_result) {
            $start_date = $getDates_result['start_date'];
            $end_date = $getDates_result['end_date'];
            
            $records = mmModel::getSemesterAttendance ($start_date, $end_date, $connect);
        
            if (!($records)) {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmNoAttendanceSemester.php');
                }
            else {
                session_start();
                $_SESSION['semesterAttendance_list'] = '';

                while ($record = mysqli_fetch_assoc($records)) {
                    $subject_id = $record['subject_id'];
                    $get_subject_name = mmModel::getSubjectName ($subject_id, $connect);
                    $result_subject_name = mysqli_fetch_assoc($get_subject_name);

                    $sessionTypeId = $record['sessionTypeId'];
                    $get_sessionType = mmModel::get_sessionType ($sessionTypeId, $connect);
                    $result_sessionType = mysqli_fetch_assoc($get_sessionType);

                    $std_id = $record['std_id'];
                    $get_student_index = mmModel::getStdIndex ($std_id, $connect);
                    $result_student_index = mysqli_fetch_assoc($get_student_index);

                    $_SESSION['semesterAttendance_list'] .= "<tr>";
                    $_SESSION['semesterAttendance_list'] .= "<td>{$result_student_index['index_no']}</td>";
                    $_SESSION['semesterAttendance_list'] .= "<td>{$result_subject_name['subject_name']}</td>";
                    $_SESSION['semesterAttendance_list'] .= "<td>{$result_sessionType['sessionType']}</td>";
                    $_SESSION['semesterAttendance_list'] .= "<td>{$record['attendance']}</td>";
                    $_SESSION['semesterAttendance_list'] .= "</tr>";
                }

                $get_attDetails = mmModel::getSemDetails ($start_date, $end_date, $connect);
                $result_attDetails = mysqli_fetch_assoc($get_attDetails);
                if ($result_attDetails) {
                    $_SESSION['totdays'] = $result_attDetails['totdays'];
                    $_SESSION['attendPercentage'] = $result_attDetails['attendPercentage'];
                    $_SESSION['calander_year'] = $calander_year;
                    $_SESSION['semester'] = $semester;

                    header('Location:../../view/mahapolaSchemeMaintainer/mmDisplaySemesterAttendanceV.php');
                }
                else {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmNoAttendanceSemester.php');
                }
            }
        }
        else {
            header('Location:../../view/mahapolaSchemeMaintainer/mmRequestDeniedV.php');
        }
    }
?>