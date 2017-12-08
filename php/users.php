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

function rfidExists($rfid) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM user WHERE rfid = '$rfid'";

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

	$rfid = $_POST['rfid'];
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pin = $_POST['pin'];
	$phone = $_POST['phone'];
	$salt = salt(32);
	$newPassword = makePassword($password, $salt);

	if($newPassword) {
		$sql = "INSERT INTO user (email, password, rfid, full_name, pin, phone, salt) VALUES ('$email', '$password', '$rfid', '$full_name', '$pin', '$phone', '$salt')";
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

function addCard() {

	global $connect;

	$card_num = $_POST['card_num'];
	$exp_month = $_POST['exp_month'];
	$exp_year = $_POST['exp_year'];
	$cvc = $_POST['cvc'];
  	$id = $_SESSION['id'];

	//$sql = "
	//INSERT INTO user (card_num, exp_month, exp_year, cvc) 
	//VALUES ('$card_num', '$exp_month', '$exp_year', '$cvc') 
	//WHERE id = '$id'";


	$sql = "UPDATE user SET card_num = '$card_num',
		exp_month = '$exp_month',
		exp_year = '$exp_year',
		cvc = '$cvc'
		WHERE id = '$id'";

	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
} // register user funtion


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

function updateInfo() {

	global $connect;

  	$pin = $_POST['pin'];
  	$phone = $_POST['phone'];
  	$id = $_SESSION['id'];

	$sql = "UPDATE user SET phone = '$phone', pin = '$pin' WHERE id = '$id'";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function login($email, $password) {
	global $connect;
	$userdata = userdata($email);

	if($userdata) {
		$makePassword = makePassword($password, $userdata['salt']);
		$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
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

function getUserDataByUserId($id) {
	global $connect;

	$sql = "SELECT * FROM user WHERE id = $id";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
}

function users_exists_by_email($id) {
	global $connect;

	$sql = "SELECT * FROM user WHERE id = '$id'";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}



function updateCard($id) {
	global $connect;

	$card_num = $_POST['card_num'];
	$exp_month = $_POST['exp_month'];
	$exp_year = $_POST['$exp_year'];
	$cvc = $_POST['cvc'];

	$sql = "UPDATE credentials SET card_num = '$card_num', exp_month = '$exp_month', exp_year = '$exp_year', cvc = '$cvc' WHERE email = $email";
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
	}
}


function passwordMatch($id, $password) {
	global $connect;

	$userdata = getUserDataByUserId($id);

	$makePassword = makePassword($password, $userdata['salt']);

	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();
}

function changePassword($id, $password) {
	global $connect;

	$salt = salt(32);
	$makePassword = makePassword($password, $salt);

	$sql = "UPDATE users SET password = '$makePassword', salt = '$salt' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
} 