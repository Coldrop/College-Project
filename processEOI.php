<?php
	function sanitise_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	
	require_once ("settings.php"); //connection info
	
	$conn = @mysqli_connect($host, // Tries to connect to sql host
		$user,
		$pwd,
		$sql_db
	);
	
	// Collecting values part 1
	$refnum = sanitise_input($_POST["reference"]);
	$firstname = sanitise_input($_POST["given_name"]);
	$lastname = sanitise_input($_POST["family_name"]);
	// $dateofbirth = trim($_POST["dob"]);
	// $gender = trim($_POST["gender"]);
	$street = sanitise_input($_POST["street_address"]);
	$subtown = sanitise_input($_POST["suburb"]);
	$state = sanitise_input($_POST["state"]);
	$postcode = sanitise_input($_POST["postcode"]);
	$email = sanitise_input($_POST["email"]);
	$phone = sanitise_input($_POST["phone_number"]);
	// $skill1 = sanitise_input($_POST["skill1"]);
	// $skill2 = sanitise_input($_POST["skill2"]);
	// $skill3 = sanitise_input($_POST["skill3"]);
	$otherskills = sanitise_input($_POST["otherskill"]);
	if (!empty($_POST["skill1"])){
        $skill1 = sanitise_input($_POST["skill1"]);
    }
    if (!empty($_POST["skill2"])){
        $skill2 = sanitise_input($_POST["skill2"]);
    }
    if (!empty($_POST["skill3"])){
        $skill3 = sanitise_input($_POST["skill3"]);
    }

	if (empty($skill1)){
        $skill1 = "-";
    }
    if (empty($skill2)){
        $skill2 = "-";
    }
    if (empty($skill3)){
        $skill3 = "-";
    }
	// Collecting inputted skills
	// if (isset($_POST["skills"])){
	// 	$skills = $_POST["skills"];
	// 	$skills_string=implode(' ',$skills);
	// }
	// else {
	// 	$skills_string="";
	// }
	
	//$sql_table = "jobdetails";
	
	// Creates sql table if it doesn't already exist
	// $sqlString = "CREATE TABLE eoi(
	// 	job_id AUTO_INCREMENT PRIMARY KEY,
	// 	reference_number VARCHAR(5),
	// 	first_name VARCHAR(20),
	// 	last_name VARCHAR(20),
	// 	-- dob DATE,
	// 	-- gender CHAR,
	// 	street VARCHAR(40),
	// 	suburb_town VARCHAR(40),
	// 	state CHAR(3),
	// 	postcode CHAR(4),
	// 	email VARCHAR(40),
	// 	phone VARCHAR(12),
	// 	skills VARCHAR(60),
	// 	other_skills VARCHAR(400))";
	// $resulttable = mysqli_query($conn, $sqlString);
	// // Tests for successful connection

	// CREATE TABLE eoi(
			// job_id AUTO_INCREMENT PRIMARY KEY,
			// reference_number VARCHAR(5),
			// first_name VARCHAR(20),
			// last_name VARCHAR(20),
			// street VARCHAR(40),
			// suburb_town VARCHAR(40),
			// state CHAR(3),
			// postcode CHAR(4),
			// email VARCHAR(40),
			// phone VARCHAR(12),
			// skills VARCHAR(60),
			// other_skills VARCHAR(400))";
	
	if ($conn) {
		$query = "INSERT INTO 
			eoi (reference_number, first_name, last_name, street, suburb_town, state, postcode, email, phone, skill1, skill2, skill3, other_skills)
			values ('$refnum', '$firstname', '$lastname', '$street', '$subtown', '$state', '$postcode', '$email','$phone', '$skill1',' $skill2', '$skill3', '$otherskills')";
		// echo "Query: $query"; 
		
		$result = mysqli_query($conn, $query); // Checks for successful connection
		if ($result) { 
			$search = "select * from eoi where FirstName like '$firstname' and JobReferencenumber like '$refnum'";
			$result = mysqli_query($conn, $search);
			// $row = mysqli_fetch_assoc($result);
			// $eoi = $row["EOInumber"];
			echo "<p>Thank you for applying! We will be in touch with you shortly.</p>";
			echo "<p> $eoi is your unique application ID.</p>";
			echo "<p>Insert operation successful.</p>";
		}
		else { 
			$query = "EOInumber AUTO_INCREMENT PRIMARY KEY,
			reference_number VARCHAR(5),
			first_name VARCHAR(20),
			last_name VARCHAR(20),
			street VARCHAR(40),
			suburb_town VARCHAR(40),
			state CHAR(3),
			postcode CHAR(4),
			email VARCHAR(40),
			phone VARCHAR(12),
			skill1 VARCHAR(60),
			skill2 VARCHAR(60),
			skill3 VARCHAR(60)
			other_skills VARCHAR(400))";
			
			// echo "<p>Insert operation unsuccessful.</p>"; 
		} 
		mysqli_close($conn); 
			
	} else {
	echo "<p>Connection has failed. Please try again.</p>";
	}
?>