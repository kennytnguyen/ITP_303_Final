<?php 

function userExists($email) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM user WHERE email = '$email'";

	$query = $connect->query($sql);

	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function registerUser() {

	global $connect;

	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pin = $_POST['pin'];
	$phone = $_POST['phone'];
	$rfid = $_POST['rfid'];
	
	$salt = salt(32);
	$newPassword = makePassword($password, $salt);
	if($newPassword) {
		$sql = "INSERT INTO user (email, password, rfid, full_name, pin, phone) VALUES ('$email', '$password', '$rfid' '$full_name', '$pin', '$phone')";
		$query = $connect->query($sql);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} // /if

	$connect->close();
	// close the database connection
} // register user funtion

function salt($length) {
	return mcrypt_create_iv($length);
}

function makePassword($password, $salt) {
	return hash('sha256', $password.$salt);
}



function userdata($email) {

	global $connect;

	$sql = "SELECT * FROM user WHERE email = '$email'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function login($email, $password, $pin) {
	global $connect;
	$userdata = userdata($email);

	if($userdata) {
		$makePassword = makePassword($password, $userdata['salt']);
		$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$makePassword' AND pin = '$pin'";
		$query = $connect->query($sql);

		if($query->num_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	$connect->close();
	// close the database connection
}

function getUserDataByUserEmail($email) {
	global $connect;

	$sql = "SELECT * FROM users WHERE email = $email";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
}

function users_exists_by_email($email) {
	global $connect;

	$sql = "SELECT * FROM user WHERE email = '$email'";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

function updateInfo($email) {
	global $connect;

	$full_name = $_POST['full_name'];
	$phone = $_POST['phone'];

	$sql = "UPDATE user SET full_name = '$full_name', phone = '$phone' WHERE email = $email";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

function updateCard($email) {
	global $connect;

	$full_name = $_POST['full_name'];
	$card_num = $_POST['card_num'];
	$exp_month = $_POST['exp_month'];
	$exp_year = $_POST['$exp_year'];
	$cvc = $_POST['cvc'];

	$sql = "UPDATE credentials SET full_name = '$full_name', card_num = '$card_num', exp_month = '$exp_month', exp_year = '$exp_year', cvc = '$cvc' WHERE email = $email";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

function logged_in() {
	if(isset($_SESSION['id'])) {
		return true;
	} else {
		return false;
	}
}

function not_logged_in() {
	if(isset($_SESSION['id']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

function logout() {
	if(logged_in() === TRUE){
		// remove all session variable
		session_unset();

		// destroy the session
		session_destroy();

		header('location: login.php');
	}
}

/*
function passwordMatch($email, $password) {
	global $connect;

	$userdata = getUserDataByUserId($email);

	$makePassword = makePassword($password, $userdata['salt']);

	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();
}

function changePassword($email, $password) {
	global $connect;

	$salt = salt(32);
	$makePassword = makePassword($password, $salt);

	$sql = "UPDATE users SET password = '$makePassword', salt = '$salt' WHERE email = $email";
	$query = $connect->query($sql);

	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
} */