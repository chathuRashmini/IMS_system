<?php
	class amModel {
        public static function getsubjects($connect)
        {
			$query = "SELECT subject_code, subject_name FROM tbl_subject WHERE is_deleted = 0 ORDER BY subject_code";

            $result = mysqli_query($connect, $query);
            
			return $result;
        }

        public static function getSession($date, $subject, $connect)
        {
            $query = "SELECT subject_session_id FROM tbl_subject_has_session WHERE subject_code='{$subject}' AND date='{$date}'";

            $result = mysqli_query($connect, $query);
            
			return $result;
        }
        
        public static function fetchstudents($sessionid, $connect)
        {
            $query = "SELECT s.index_no, s.initials, s.last_name FROM tbl_students s INNER JOIN tbl_student_has_attendance sa ON s.index_no = sa.student_index WHERE sa.subject_session_id='{$sessionid}'";

            $result = mysqli_query($connect, $query);
            
			return $result;
        }
        
        public static function setallstudents($sessionid, $date, $index_no, $connect)
        {
            $query = "INSERT INTO tbl_attendance(student_index, subject_session_id, date) VALUES ('{$index_no}','{$sessionid}','{$date}')";

            $result = mysqli_query($connect, $query);
            
			return $result;
        }
        
        public static function addstudentattendance($index_no, $connect)
        {
            $query = "UPDATE tbl_attendance SET attendance=1 WHERE student_index='{$index_no}'";

            $result = mysqli_query($connect, $query);
            
			return $result;
        }

        public static function getpresence($index_no, $date, $sessionId, $connect)
        {
            $query = "SELECT attendance FROM tbl_attendance WHERE student_index='{$index_no}' AND subject_session_id='{$sessionId}' AND date='{$date}'";

            $result = mysqli_query($connect, $query);
            
			return $result;
        }
	}
?>