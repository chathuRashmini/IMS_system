<?php 
    require_once('../../model/amModel/amViewAttendanceModel.php');
    require_once('../../config/database.php');

    if (isset($_POST['getDegrees-submit'])) {
        $records1 = amModel::getDegrees($connect);

        if ($records1) {
            session_start();
            $_SESSION['degreeList'] = '';

            while ($record = mysqli_fetch_array($records1)) {
                $_SESSION['degreeList'] .= "<option value='".$record['degree_name']."'>".$record['degree_name']."</option>";
            }
            header('Location:../../view/attendanceMaintainer/amBatchWiseAttendanceV.php');
        }
        else {
            header('Location:../../view/attendanceMaintainer/amRequestDenied.php');
        }
    }

    elseif (isset($_POST['filterSubjects-submit'])) {
        session_start();
        $degree_name = $_POST['degree_name'];
        $academic_year = $_POST['academic_year'];
        $semester = $_POST['semester'];
        $_SESSION['degree_name'] = $degree_name;

        $get_degreeId = amModel::getDegreeId ($degree_name, $connect);
        $result_degreeID = mysqli_fetch_assoc($get_degreeId);
        $degree_id = $result_degreeID['degree_id'];
        $_SESSION['degree_id'] = $degree_id;
        
        $records1 = amModel::filterSubjects($academic_year, $semester, $degree_id, $connect);
        $records2 = amModel::filterSessionTypes($connect);

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
            header('Location:../../view/attendanceMaintainer/amSelectSub_B.php');
        }
        else {
            header('Location:../../view/attendanceMaintainer/amRequestDenied.php');
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
            header('Location:../../view/attendanceMaintainer/amStartEndDateIssueB.php');
        }
        else {
            $_SESSION['batch_number'] = $batch_number;
            $_SESSION['subject_name'] = $subject_name;
            $_SESSION['sessionType'] = $sessionType;
            $_SESSION['startDate'] = $startDate;
            $_SESSION['endDate'] = $endDate;
            $_SESSION['degree_id'] = $degree_id;

            $result_subject_id = amModel::getSubjectID($subject_name, $degree_id, $connect);
            $result1 = mysqli_fetch_assoc($result_subject_id);

            $result_sessionTypeId = amModel::getSessionTypeID($sessionType, $connect);
            $result2 = mysqli_fetch_assoc($result_sessionTypeId);

            if ($result1 && $result2) {
                $subject_id = $result1['subject_id'];
                $_SESSION['subject_id'] = $subject_id;
                
                $sessionTypeId = $result2['sessionTypeId'];
                $_SESSION['sessionTypeId'] = $sessionTypeId;

                $records1 = amModel::batchAttendance($degree_id, $subject_id, $sessionTypeId, $batch_number, $startDate, $endDate, $connect);
                $records2 = amModel::batchAttendancePercentage($degree_id, $subject_id, $sessionTypeId, $batch_number, $startDate, $endDate, $connect);
                $records3 = amModel::batchStudents ($degree_id, $batch_number, $connect);

                $result_records2 = mysqli_fetch_assoc($records2);
                $attendPercentage = $result_records2['attendPercentage'];
                $numOfDays = $result_records2['numOfDays'];

                $result_records3 = mysqli_fetch_assoc($records3);
                $stdCount = $result_records3['stdCount'];

                if ($records1 && $records2 && $records3) {
                    if (mysqli_num_rows($records1) == 0) {
                        header('Location:../../view/attendanceMaintainer/amNoBatchAttendance.php');
                    }
                    else {
                        $_SESSION['batchWise_attendance'] = '';

                        while ($record = mysqli_fetch_assoc($records1)) {
                            $std_id = $record['std_id'];
                            $get_student_index = amModel::getStdIndex ($std_id, $connect);
                            $result_student_index = mysqli_fetch_assoc($get_student_index);

                            $_SESSION['batchWise_attendance'] .= "<tr>";
                            $_SESSION['batchWise_attendance'] .= "<td>{$result_student_index['index_no']}</td>";
                            $_SESSION['batchWise_attendance'] .= "<td>{$record['attendance']}</td>";
                            $_SESSION['batchWise_attendance'] .= "</tr>";
                        }
                        $_SESSION['attendPercentage'] = $attendPercentage;
                        $_SESSION['stdCount'] = $stdCount;
                        $_SESSION['numOfDays'] = $numOfDays;
                        header('Location:../../view/attendanceMaintainer/amDisplayBatchAttendanceV.php');
                    }
                }
                else {
                    header('Location:../../view/attendanceMaintainer/amNoBatchAttendance.php');
                }
            }
            else {
                header('Location:../../view/attendanceMaintainer/amNoSubIDSessionID_Batch.php');
            }
        }
    }

    elseif (isset($_POST['batchPdf'])) {
        session_start();

        require_once("../../FPDF/fpdf.php");
        
        class getPdf extends FPDF
        {
            function header () {
                $this -> SetFont('Arial', 'B', 20);
                $this -> Cell(276, 10, "Batch Attendance Details", 0, 1, 'C');
                $this -> Ln();
            }

            function footer () {
                $this -> SetY(-15);
                $this -> SetFont('Arial', '', 8);
                $this -> Cell(0, 10, 'Page Number '.$this->PageNo(), 0, 0, 'C');
            }

            function displayInfo($connect) {
                $degree_name = $_SESSION['degree_name'];
                $subject_name = $_SESSION['subject_name'];
                $sessionType = $_SESSION['sessionType'];
                $batch_number = $_SESSION['batch_number'];
                $startDate = $_SESSION['startDate'];
                $endDate = $_SESSION['endDate'];

                $attendPercentage = $_SESSION['attendPercentage'];
                $stdCount = $_SESSION['stdCount'];
                $numOfDays = $_SESSION['numOfDays'];

                $subject_id = $_SESSION['subject_id'];
                $sessionTypeId = $_SESSION['sessionTypeId'];
                $degree_id = $_SESSION['degree_id'];

                $this -> Cell(75, 10, "Degree", 1, 0);
                $this -> Cell(0, 10, $degree_name, 1, 1);

                $this -> Cell(75, 10, "Subject Name", 1, 0);
                $this -> Cell(0, 10, $subject_name, 1, 1);

                $this -> Cell(75, 10, "Session Type", 1, 0);
                $this -> Cell(0, 10, $sessionType, 1, 1);

                $this -> Cell(75, 10, "'Selected Batch'", 1, 0);
                $this -> Cell(0, 10, $batch_number, 1, 1);

                $this -> Cell(75, 10, "Start Date", 1, 0, 'B');
                $this -> Cell(0, 10, $startDate, 1, 1);

                $this -> Cell(75, 10, "End date", 1, 0, 'B');
                $this -> Cell(0, 10, $endDate, 1, 1);

                $this -> Cell(75, 10, "Total Number of days", 1, 0);
                $this -> Cell(0, 10, $numOfDays, 1, 1);

                $this -> Cell(75, 10, "Total Number of students", 1, 0);
                $this -> Cell(0, 10, $stdCount, 1, 1);

                $this -> Ln();

                $this -> SetFont('Arial', 'B', 16);
                $this -> Cell(75, 10, "Index Number", 1, 0, 'C');
                $this -> Cell(0, 10, "Attendance", 1, 0, 'C');
                $this -> Ln();

                $this -> SetFont('Arial', '', 14);
                $attendance = amModel::batchAttendance($degree_id, $subject_id, $sessionTypeId, $batch_number, $startDate, $endDate, $connect);
                while ($record = mysqli_fetch_assoc($attendance)) {
                    $std_id = $record['std_id'];
                    $get_student_index = amModel::getStdIndex ($std_id, $connect);
                    $result_student_index = mysqli_fetch_assoc($get_student_index);

                    $this -> Cell(75, 10, $result_student_index['index_no'], 1, 0);
                    $this -> Cell(0, 10, $record['attendance'], 1, 1);
                }
            }
        }

        $pdf = new getPdf();
        $pdf -> AddPage('L', 'A4', 0);
        $pdf -> SetFont("Arial", "", 14);
        $pdf -> displayInfo($connect);
        $pdf->output();
    }
?>