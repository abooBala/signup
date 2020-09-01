<?php 
$error = NULL;

if(isset($_POST['submit'])) {

	// Get form data 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$passwd = $_POST['passwd'];
	$rpasswd = $_POST['rpasswd'];

	// Verification Checks
	if(strlen($name) < 7 ) {
		$error = "<p>Your username must be at least 5 characters long</p>";
	} elseif ($passwd != $rpasswd) {
		$error .= "<p>Your passwords do not match. Please try again</p>";
	} else {

  $servername = "localhost";
  $username = "user-name";
  $password = "pass%^";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Sanitize the data 
  $name = $mysqli -> real_escape_string($name);
  $email = $mysqli -> real_escape_string($email);
  $passwd = $mysqli -> real_escape_string($passwd);

  // Verification key
  $verkey = md5(time().$name);

		// The form is valid. Connect to the database 
		$mysqli = NEW MYSQLi ('localhost', 'root', '', 'user_data');

		// Sanitize the data 
		$name = $mysqli -> real_escape_string($name);
		$email = $mysqli -> real_escape_string($email);
		$passwd = $mysqli -> real_escape_string($passwd);

		// Insert data into the table
		$passwd = md5($passwd);
		$insert = $mysqli-> query("INSERT INTO user_data (name, email, passwd, verkey) VALUES ('$name', '$email', '$passwd', '$verkey')");

		if($insert) {
			//Send Email
			$to = $email;
			$subject = "Email Verification";
			$message = "<p>Hi there! Thank you for signing up.</p>
			<a href='https://unicxchange.com/verify.php?verkey=$verkey'>Click here to verify your Email</a>";
			$headers = "From: mail@unicxchange.com \r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$mail ($to,$subject,$message,$headers);

			header ('location:verified.php');
		}else{
			echo $mysqli->$error;
		}
	}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Unic Xchange | Signup</title>
</head>

<body>

<!-- Main sign-up section starts -->
<section id="ourfaq" class="bglight position-relative padding">
  <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-8 col-sm-10 pr-0 whitebox">
            <div class="widget logincontainer">
               <h3 class="darkcolor bottom35">Create Your account </h3>
               <form class="getin_form border-form" id="login" method="POST" action="">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <label for="registerName" class="d-none"></label>
                           <input class="form-control" type="text" name="name" placeholder="Full Name:" required id="registerName">
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <label for="registerEmail" class="d-none"></label>
                           <input class="form-control" type="email" name="email" placeholder="Email:" required id="registerEmail">
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <label for="registerPass" class="d-none"></label>
                           <input class="form-control"  type="password" name="passwd" placeholder="Password:" required id="registerPass">
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <label for="registerPassConfirm" class="d-none"></label>
                           <input class="form-control" type="password" name="rpasswd"  placeholder="Confirm Password:" required id="registerPassConfirm">
                        </div>
                     </div>
                      <div class="col-md-12 col-sm-12">
                          <div class="form-group bottom35">
                              <div class="form-check text-left">
                                  <input class="form-check-input" checked type="checkbox" value="" id="rememberMe">
                                  <label class="form-check-label" for="rememberMe">
                                      Remember me on this device
                                  </label>
                              </div>
                          </div>
                      </div>
                     <div class="col-sm-12">
                        <button type="submit" class="button gradient-btn w-100">Register</button>
                        <p class="top20 log-meta"> Already have an account? <a href="signin.html">Sign In</a> </p>
                     </div>
                  </div>
               </form>


<!-- Error message if any exists -->

            </div>
         </div>
          <div class="col-lg-6 pl-0">
              <div class=" image login-image h-100">
                  <img src="images/login-section-3.jpg" alt="" class="w-100 h-100">
              </div>
          </div>
      </div>
   </div>
</section>


</body>
</html>
