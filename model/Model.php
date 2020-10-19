<?php
	require_once('../config/database.php');
?>

<?php
	class Model {
		public static function getlogin($empid, $password, $connect)
		{	
			$query = "SELECT * FROM users WHERE empid ='{$empid}' AND password='{$password}' AND is_deleted=0" ;
			$result_set = mysqli_query($connect, $query);
            return $result_set;
		}

		public static function checkEmpid($empid, $connect) 
		{
			$query = "SELECT * FROM users WHERE empid ='{$empid}'" ;
			$result_set = mysqli_query($connect, $query);
            return $result_set;
		}

		public static function signup($empid, $initials, $sname, $email, $mobile, $tp, $dob, $designation, $appointment, $password, $connect) 
		{
			$query = "INSERT INTO users (empid, initials, sname, email, mobile, tp, dob, designation, appointment, password) VALUES('$empid', '$initials', '$sname', '$email', '$mobile', '$tp', '$dob', '$designation', '$appointment', '$password')";
			
			if($connect->query($query))
				return true;
		}

		public static function view($user_id, $connect)
		{
			$query = "SELECT * FROM users WHERE userId={$user_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function checkEmpidTwo($empid, $user_id, $connect)
		{
			$query = "SELECT * FROM users WHERE empid='{$empid}' AND userId!={$user_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function update($user_id, $empid, $initials, $sname, $email, $mobile, $tp, $dob, $designation, $appointment, $connect)
		{
			$query = "UPDATE users SET empid='{$empid}', initials='{$initials}', sname='{$sname}', email='{$email}', mobile='{$mobile}', tp='{$tp}', dob='{$dob}', designation='{$designation}', appointment='{$appointment}' WHERE userId={$user_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function updatePassword($empid, $hashed_password, $connect)
		{
			$query = "UPDATE users SET password = '{$hashed_password}' WHERE empid='{$empid}' LIMIT 1";

			$result = mysqli_query($connect, $query);

            return $result;
		}

		public static function setUserRole($empid, $userRole, $connect)
		{
			$query = "UPDATE users SET userRole = '{$userRole}' WHERE empid='{$empid}' LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function viewList($connect)
		{
			$query = "SELECT * FROM users WHERE is_deleted=0 ORDER BY empid";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function deleteUser($user_id , $connect)
		{
			$query = "UPDATE users SET is_deleted = 1 WHERE userId={$user_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function viewMember($user_id, $connect){ // for opd form & surgical form
			$query = "SELECT * FROM users WHERE userId={$user_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;

		}

		public static function checkEmpidThree($empid, $user_id, $connect){
			$query = "SELECT * FROM users WHERE empid='{$empid}' AND userId!={$user_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function fillOpdForm($user_id, $patient_name, $relationship , $doctor_name, $treatment_received_date, $bill_issued_date, $purpose, $bill_amount, $opd_form_flag, $surgical_form_flag,  $connect){
			$query = "INSERT INTO tbl_claimform (user_id, patient_name, relationship,  doctor_name, treatment_received_date, bill_issued_date, purpose, bill_amount, opd_form_flag, surgical_form_flag) VALUES ( $user_id ,  '$patient_name' ,'$relationship', '$doctor_name' , '$treatment_received_date' ,'$bill_issued_date', '$purpose' , '$bill_amount', 1, 0) ";

			$result = mysqli_query($connect, $query);
			return $result;
		}

		public static function fillSurgicalForm($user_id,  $address,  $patient_name, $relationship, $accident_date, $how_occured, $injuries, $nature_of_illness, $commence_date, $first_consult_date, $doctor_name, $doctor_address, $hospitalized_date, $discharged_date, $illness_before, $illness_before_years, $sick_injury, $insurer_claims, $nature_of, $opd_form_flag, $surgical_form_flag, $connect){
			$query = "INSERT INTO tbl_claimform (user_id, address, patient_name, relationship, accident_date, how_occured, injuries, nature_of_illness, commence_date, first_consult_date , doctor_name, doctor_address, hospitalized_date, discharged_date, illness_before, illness_before_years, sick_injury, insurer_claims, nature_of, opd_form_flag, surgical_form_flag) 
					  VALUES ( $user_id ,'$address','$patient_name','$relationship','$accident_date','$how_occured','$injuries','$nature_of_illness','$commence_date','$first_consult_date','$doctor_name','$doctor_address','$hospitalized_date','$discharged_date','$illness_before','$illness_before_years','$sick_injury','$insurer_claims','$nature_of', 0, 1)";
					  
			$result = mysqli_query($connect, $query);
			return $result;

		}

		public static function checkClaimFormNo($claim_form_no, $user_id, $connect){
			$query = "SELECT * FROM tbl_claimform WHERE claim_form_no={$claim_form_no} AND user_id={$user_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function checkWhetherOpd($claim_form_no,$user_id, $connect){
			$query = "SELECT * FROM tbl_claimform WHERE claim_form_no={$claim_form_no} AND user_id={$user_id} AND opd_form_flag= 1 LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
			
		}

		public static function checkWhetherSurgical($claim_form_no,$user_id, $connect){
			$query = "SELECT * FROM tbl_claimform WHERE claim_form_no={$claim_form_no} AND user_id={$user_id} AND surgical_form_flag= 1 LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
			
		}

		public static function hall($connect)
		{
			$query = "SELECT hall_name FROM tbl_hall";

			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
		}

		public static function checkHall($hall, $date, $startTime, $endTime, $connect)
		{
			$query = "SELECT * FROM tbl_booking WHERE hall_name='{$hall}' AND date='{$date}' AND start_time < '{$endTime}' AND end_time > '{$startTime}' AND is_deleted=0";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function book($user_id, $hall, $date, $startTime, $endTime, $reason, $connect) {
			$query = "INSERT INTO tbl_booking (date, start_time, end_time, reason, user_id, hall_name) VALUES('$date', '$startTime', '$endTime', '$reason', '$user_id', '$hall')";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function viewBookings($user_id, $connect) 
		{
			$query = "SELECT * FROM tbl_booking WHERE user_id='{$user_id}' AND is_deleted=0";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function viewABook($booking_id, $connect) 
		{
			$query = "SELECT * FROM tbl_booking WHERE booking_id={$booking_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function checkHallTwo($hall, $date, $startTime, $endTime, $booking_id, $connect)
		{
			$query = "SELECT * FROM tbl_booking WHERE hall_name='{$hall}' AND date='{$date}' AND start_time < '{$endTime}' AND end_time > '{$startTime}' AND booking_Id!={$booking_id} AND is_deleted=0 LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function updateBook($booking_id, $hall, $date, $startTime, $endTime, $reason, $connect)
		{
			$query = "UPDATE tbl_booking SET date='{$date}', start_time='{$startTime}', end_time='{$endTime}', reason='{$reason}', hall_name='{$hall}' WHERE booking_id={$booking_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function deleteBooking($booking_id, $connect)
		{
			$query = "UPDATE tbl_booking SET is_deleted = 1 WHERE booking_id={$booking_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function registerMS($user_id, $department, $health_condition, $civil_status, $scheme_name, $member_type, $connect)
		{
			$query = "INSERT INTO tbl_user_flag (user_id, department, healthcondition, civilstatus, schemename, member_type) VALUES('$user_id', '$department', '$health_condition', '$civil_status', '$scheme_name', '$member_type')";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function department($connect)
		{
			$query = "SELECT department FROM tbl_department";

			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
		}

		public static function scheme($connect)
		{
			$query = "SELECT schemename FROM tbl_medicalscheme";
			
			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
        }
        
        public static function membertype($connect)
		{
			$query = "SELECT member_type FROM tbl_member_type";
			
			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
		}

		public static function fetchmembers($scheme, $member_type, $connect)
		{
			$query = "SELECT * FROM users WHERE userId IN
				(SELECT user_id FROM tbl_user_flag WHERE schemename = '{$scheme}' AND member_type = '{$member_type}' AND membership_status=1) ORDER BY userId";

			$result_set = mysqli_query($connect, $query);
					
			return $result_set;
		}

		public static function getmemberdetails($userid, $connect)
		{
			$query = "SELECT * FROM users u,tbl_user_flag f WHERE u.userId = '{$userid}' AND f.user_id = '{$userid}'";

			$result_set = mysqli_query($connect, $query);
					
			return $result_set;
		}

		public static function enterSemester($semester, $academic_year, $start_date, $end_date, $connect)
		{
			$query = "INSERT INTO tbl_semester (semester, academic_year, start_date, end_date ) VALUES('$semester', '$academic_year', '$start_date', '$end_date')";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function viewSemesters($connect) 
		{
			$query = "SELECT * FROM tbl_semester WHERE is_deleted=0 ORDER BY sem_id";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
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

		public static function enterHall($hall_name, $hall_location, $seating_capacity, $ac, $connect)
		{
			$query = "INSERT INTO tbl_hall (hall_name, location, seating_capacity, AC ) VALUES('$hall_name', '$hall_location', $seating_capacity, $ac)";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function viewHalls($connect) 
		{
			$query = "SELECT * FROM tbl_hall WHERE is_deleted=0 ORDER BY hall_name";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function checkHallName($hall_name, $connect) 
		{	
			// echo $hall_name;
			$query = "SELECT * FROM tbl_hall WHERE hall_name ='{$hall_name}'" ;
			$result_set = mysqli_query($connect, $query);
            return $result_set;
		}

		public static function viewAHall ($hall_id, $connect) 
		{
			$query = "SELECT * FROM tbl_hall WHERE hall_id='{$hall_id}' LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function checkHallThree($hall_id, $hall_name, $connect)
		{
			$query = "SELECT * FROM tbl_hall WHERE hall_name='{$hall_name}' AND hall_id!={$hall_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;	
		}

		public static function updateHall($hall_id, $hall_name, $location, $seating_capacity, $ac, $connect)
		{
			$query = "UPDATE tbl_hall SET hall_name='{$hall_name}', location='{$location}', seating_capacity='{$seating_capacity}', AC={$ac} WHERE hall_id={$hall_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}	

		public static function deleteHall($hall_id, $connect)
		{
			$query = "UPDATE tbl_hall SET is_deleted = 1 WHERE hall_id={$hall_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		
		public static function checkDeptName($dept_name, $connect) 
		{	
			$query = "SELECT * FROM tbl_department WHERE department ='{$dept_name}'" ;
			$result_set = mysqli_query($connect, $query);
            return $result_set;
		}

		public static function enterDepartment($dept_name, $dept_head, $description, $connect)
		{
			$query = "INSERT INTO tbl_department (department, department_head, description) VALUES('$dept_name', '$dept_head' ,'$description')";

			$result = mysqli_query($connect, $query);

			return $result;
		}
		
		public static function viewDepartments($connect) 
		{
			$query = "SELECT * FROM tbl_department WHERE is_deleted=0 ORDER BY department_id";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function viewADept($dept_id, $connect)
		{
			$query = "SELECT * FROM tbl_department WHERE department_id='{$dept_id}' LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}
		
		public static function checkDeptThree($dept_id, $department, $connect)
		{
			$query = "SELECT * FROM tbl_department WHERE department='{$department}' AND department_id!={$dept_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;	
		}
		
		public static function updateDepartment($dept_id, $department, $department_head, $description, $connect)
		{
			$query = "UPDATE tbl_department SET department='{$department}', department_head='{$department_head}', description='{$description}' WHERE department_id={$dept_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}	
		
		public static function deleteDepartment($dept_id, $connect)
		{
			$query = "UPDATE tbl_department SET is_deleted = 1 WHERE department_id={$dept_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function checkDesignationName($designation, $connect) 
		{	
			$query = "SELECT * FROM tbl_designation WHERE designation_name ='{$designation}'" ;
			$result_set = mysqli_query($connect, $query);
            return $result_set;
		}
		
		public static function enterDesignation($designation, $description, $connect)
		{
			$query = "INSERT INTO tbl_designation (designation_name, description) VALUES('$designation','$description')";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function viewDesignations($connect)
		{
			$query = "SELECT * FROM tbl_designation WHERE is_deleted=0 ORDER BY designation_id";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}
		
		public static function viewADesign($designation_id, $connect)
		{
			$query = "SELECT * FROM tbl_designation WHERE designation_id={$designation_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function checkDesignThree($designation_id, $designation, $connect)
		{
			$query = "SELECT * FROM tbl_designation WHERE designation_name='{$designation}' AND designation_id!={$designation_id} LIMIT 1";

			$result_set = mysqli_query($connect, $query);

			return $result_set;	
		}

		public static function updateDesignation($designation_id, $designation, $description, $connect)
		{
			$query = "UPDATE tbl_designation SET designation_name='{$designation}', description='{$description}' WHERE designation_id={$designation_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}	
		
		public static function deleteDesignation($designation_id, $connect)
		{
			$query = "UPDATE tbl_designation SET is_deleted = 1 WHERE designation_id={$designation_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function userRoles($connect)
		{
			$query = "SELECT role_name FROM userroles WHERE is_deleted=0";

			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
		}

		public static function userList($connect)
		{
			$query = "SELECT empid FROM users WHERE is_deleted=0";

			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
		}
		
	}
?>