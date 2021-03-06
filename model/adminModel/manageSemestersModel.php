<?php

    class adminModel {
        public static function enterSemester($semester, $academic_year, $digit, $start_date, $end_date, $connect)
		{
			$query = "INSERT INTO tbl_semester (semester, academic_year, semesterDigit, start_date, end_date ) VALUES('$semester', '$academic_year', '$digit', '$start_date', '$end_date')";

			$result = mysqli_query($connect, $query);

			return $result;
        }
        
        public static function viewSemesters($connect) 
		{
			$query = "SELECT * FROM tbl_semester WHERE is_deleted=0 ORDER BY sem_id";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
        }
        
        public static function isEmptySem($connect)
		{
			$query = "SELECT COUNT(sem_id) FROM tbl_semester";

			$result = mysqli_query($connect, $query);

			return $result;
        }
        
        public static function viewASem ($sem_id, $connect) 
		{
			$query = "SELECT * FROM tbl_semester WHERE sem_id={$sem_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
        }
        
        public static function updateSemester($sem_id, $semester, $academic_year, $start_date, $end_date, $connect)
		{
			$query = "UPDATE tbl_semester SET semester='{$semester}', academic_year='{$academic_year}', start_date='{$start_date}', end_date='{$end_date}' WHERE sem_id={$sem_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
        }
        
        public static function deleteSemester($sem_id, $connect)
		{
			$query = "UPDATE tbl_semester SET is_deleted = 1 WHERE sem_id={$sem_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
        }
        
        public static function semYear($connect)
		{
			$query = "SELECT academic_year FROM tbl_semester WHERE is_deleted=0";

			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
        }
        
        public static function semName($connect)
		{
			$query = "SELECT semester FROM tbl_semester WHERE is_deleted=0";

			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
        }
        
        public static function viewASemUsingName($academic_year, $semester, $connect)
		{
			$query = "SELECT * FROM tbl_semester WHERE semester='{$semester}' AND academic_year='{$academic_year}' LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
        }
        
        public static function deleteSemUsingName($academic_year, $semester, $connect)
		{
			$query = "UPDATE tbl_semester SET is_deleted = 1 WHERE semester='{$semester}' AND academic_year='{$academic_year}' LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function getSemAndYr($connect)
		{
			$query = "SELECT * FROM tbl_students WHERE is_std=0";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function deleteStudent($stu_id,$connect)
		{
			$query = "UPDATE tbl_students SET is_std = 1 WHERE std_id={$stu_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function updateStudent($stu_id, $semester, $academic_year, $connect)
		{
			$query = "UPDATE tbl_students SET academic_year = '{$academic_year}', semester='{$semester}' WHERE std_id={$stu_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}
    }

?>