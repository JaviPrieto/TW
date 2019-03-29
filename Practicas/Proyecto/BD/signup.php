<?php
	require 'conf/config.php';

	if(isset($_POST['register'])){
		$errMsg = '';

		// Get data from the form
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$dni = $_POST['dni'];
		$phone = $_POST['phone'];
		$nacionality = $_POST['nacionality'];
		$dateofbirth = $_POST['dateofbirth'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];

		if($errMsg == ''){
			try{
				$my_query = $connect->prepare('INSERT INTO users_data (username, password, name, lastname, DNI, phone, nacionality, dateofbirth, gender, email)
																			 VALUES (:username, :password, :name, :lastname, :dni, :phone, :nacionality, :dateofbirth, :gender, :email)');
				$my_query->execute(array(
					':username' => $username,
					':password' => $password,
					':name' => $name,
					':lastname' => $lastname,
					':dni' => $dni,
					':phone' => $phone,
					':nacionality' => $nacionality,
					':dateofbirth' => $dateofbirth,
					':gender' => $gender,
					':email' => $email
				));
				header('Location: signup.php?action=joined');
				exit;
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="index.php">login</a>';
	}
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
		<link rel="icon" href="images/favicon.ico" type="image/png"/>
		<link href="css/style.css" rel="stylesheet"/>
		<title> Sign up | Fitness Factory </title>
	</head>
	<body>
		<header>
			<a href="index.php" id="logo"></a>
			<p id="sport_center"> Fitness Factory </p>
			<nav>
				<a href="#"> <img src="images/burger.png" alt="menu"  id="menu-icon"> </a>
				<ul>
					<li> <a href="activity.php"> Activities </a></li>
					<li> <a href="timetable.php"> Timetable </a></li>
					<li> <a href="coaches.php"> Coaches </a></li>
					<li> <a href="facilities.php"> Facilities </a> </li>
					<li> <a href="location.php"> Location </a> </li>
					<li> <a href="prices.php"> Prices </a> </li>
					<li> <a href="signup.php" id="selectedpage"> Sign up </a> </li>
					<li> <a href="forum.php"> Forum </a> </li>
					<li> <a href="account.php"> My account </a> </li>
				</ul>
			</nav>
			<?php
				if(isset($_SESSION['name'])){
					$name = $_SESSION['name'];
					echo '<p id="logged_p_menus"> Hello, '.$name.' <a href="logout.php"> (Logout) </a></p>';
				}
			?>
		</header>

		<section class="card signincard">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}

				if(isset($_SESSION['name'])){
					echo '<p style="margin-top:30%;"> YOU ARE ALREADY REGISTERED </p>';
				}
				else{
					echo '<p> Join Us! </p>
							<form class ="signin_form" action="" method="post">
								<label class="signin_form" id="signin_nametext"> Name: </label>
								<input type="text" id="signin_name" class ="signin_form" name="name" required>

								<label class="signin_form" id="signin_dobtext"> Date of birth: </label>
						    <input type="date" id="signin_dob" class="signin_form" name="dateofbirth" required><br>

								<label class="signin_form" id="signin_lastnametext"> Last name: </label>
								<input type="text" id="signin_lastname" class ="signin_form" name="lastname" required>

								<label class="signin_form" id="signin_gendertext"> Gender: </label>
								<input list="gender" id="signin_gender" class="signin_form" name="gender" required>
								<datalist id="gender">
									<option value="Male">
									<option value="Female">
									<option value="Prefer not to disclose">
								</datalist><br>

								<label class="signin_form" id="signin_dnitext"> DNI: </label>
								<input type="text" id="signin_dni" class ="signin_form" name="dni" required>

								<label class="signin_form" id="signin_emailtext"> Email: </label>
								<input type="email" id="signin_email" class="signin_form" name="email" required><br>

								<label class="signin_form" id="signin_phonetext"> Phone: </label>
								<input type="tel" id="signin_phone" class ="signin_form" name="phone" required>

								<label class="signin_form" id="signin_usertext"> Username: </label>
								<input type="text" id="signin_user" class="signin_form" name="username" required><br>

								<label class="signin_form" id="signin_nacionalitytext"> Nacionality: </label>
								<input list="nacionalities" id="signin_nacionality"class="signin_form" name="nacionality" required>
								<datalist id="nacionalities">
								  <option value="afghan">
								  <option value="albanian">
								  <option value="algerian">
								  <option value="american">
								  <option value="andorran">
								  <option value="angolan">
								  <option value="antiguans">
								  <option value="argentinean">
								  <option value="armenian">
								  <option value="australian">
								  <option value="austrian">
								  <option value="azerbaijani">
								  <option value="bahamian">
								  <option value="bahraini">
								  <option value="bangladeshi">
								  <option value="barbadian">
								  <option value="barbudans">
								  <option value="batswana">
								  <option value="belarusian">
								  <option value="belgian">
								  <option value="belizean">
								  <option value="beninese">
								  <option value="bhutanese">
								  <option value="bolivian">
								  <option value="bosnian">
								  <option value="brazilian">
								  <option value="british">
								  <option value="bruneian">
								  <option value="bulgarian">
								  <option value="burkinabe">
								  <option value="burmese">
								  <option value="burundian">
								  <option value="cambodian">
								  <option value="cameroonian">
								  <option value="canadian">
								  <option value="cape verdean">
								  <option value="central african">
								  <option value="chadian">
								  <option value="chilean">
								  <option value="chinese">
								  <option value="colombian">
								  <option value="comoran">
								  <option value="congolese">
								  <option value="costa rican">
								  <option value="croatian">
								  <option value="cuban">
								  <option value="cypriot">
								  <option value="czech">
								  <option value="danish">
								  <option value="djibouti">
								  <option value="dominican">
								  <option value="dutch">
								  <option value="east timorese">
								  <option value="ecuadorean">
								  <option value="egyptian">
								  <option value="emirian">
								  <option value="equatorial guinean">
								  <option value="eritrean">
								  <option value="estonian">
								  <option value="ethiopian">
								  <option value="fijian">
								  <option value="filipino">
								  <option value="finnish">
								  <option value="french">
								  <option value="gabonese">
								  <option value="gambian">
								  <option value="georgian">
								  <option value="german">
								  <option value="ghanaian">
								  <option value="greek">
								  <option value="grenadian">
								  <option value="guatemalan">
								  <option value="guinea-bissauan">
								  <option value="guinean">
								  <option value="guyanese">
								  <option value="haitian">
								  <option value="herzegovinian">
								  <option value="honduran">
								  <option value="hungarian">
								  <option value="icelander">
								  <option value="indian">
								  <option value="indonesian">
								  <option value="iranian">
								  <option value="iraqi">
								  <option value="irish">
								  <option value="israeli">
								  <option value="italian">
								  <option value="ivorian">
								  <option value="jamaican">
								  <option value="japanese">
								  <option value="jordanian">
								  <option value="kazakhstani">
								  <option value="kenyan">
								  <option value="kittian and nevisian">
								  <option value="kuwaiti">
								  <option value="kyrgyz">
								  <option value="laotian">
								  <option value="latvian">
								  <option value="lebanese">
								  <option value="liberian">
								  <option value="libyan">
								  <option value="liechtensteiner">
								  <option value="lithuanian">
								  <option value="luxembourger">
								  <option value="macedonian">
								  <option value="malagasy">
								  <option value="malawian">
								  <option value="malaysian">
								  <option value="maldivan">
								  <option value="malian">
								  <option value="maltese">
								  <option value="marshallese">
								  <option value="mauritanian">
								  <option value="mauritian">
								  <option value="mexican">
								  <option value="micronesian">
								  <option value="moldovan">
								  <option value="monacan">
								  <option value="mongolian">
								  <option value="moroccan">
								  <option value="mosotho">
								  <option value="motswana">
								  <option value="mozambican">
								  <option value="namibian">
								  <option value="nauruan">
								  <option value="nepalese">
								  <option value="new zealander">
								  <option value="ni-vanuatu">
								  <option value="nicaraguan">
								  <option value="nigerien">
								  <option value="north korean">
								  <option value="northern irish">
								  <option value="norwegian">
								  <option value="omani">
								  <option value="pakistani">
								  <option value="palauan">
								  <option value="panamanian">
								  <option value="papua new guinean">
								  <option value="paraguayan">
								  <option value="peruvian">
								  <option value="polish">
								  <option value="portuguese">
								  <option value="qatari">
								  <option value="romanian">
								  <option value="russian">
								  <option value="rwandan">
								  <option value="saint lucian">
								  <option value="salvadoran">
								  <option value="samoan">
								  <option value="san marinese">
								  <option value="sao tomean">
								  <option value="saudi">
								  <option value="scottish">
								  <option value="senegalese">
								  <option value="serbian">
								  <option value="seychellois">
								  <option value="sierra leonean">
								  <option value="singaporean">
								  <option value="slovakian">
								  <option value="slovenian">
								  <option value="solomon islander">
								  <option value="somali">
								  <option value="south african">
								  <option value="south korean">
								  <option value="spanish">
								  <option value="sri lankan">
								  <option value="sudanese">
								  <option value="surinamer">
								  <option value="swazi">
								  <option value="swedish">
								  <option value="swiss">
								  <option value="syrian">
								  <option value="taiwanese">
								  <option value="tajik">
								  <option value="tanzanian">
								  <option value="thai">
								  <option value="togolese">
								  <option value="tongan">
								  <option value="trinidadian or tobagonian">
								  <option value="tunisian">
								  <option value="turkish">
								  <option value="tuvaluan">
								  <option value="ugandan">
								  <option value="ukrainian">
								  <option value="uruguayan">
								  <option value="uzbekistani">
								  <option value="venezuelan">
								  <option value="vietnamese">
								  <option value="welsh">
								  <option value="yemenite">
								  <option value="zambian">
								  <option value="zimbabwean">
								</datalist>

								<label class="signin_form" id="signin_passtext"> Password: </label>
								<input type="password" id="signin_passw" class="signin_form" name="password" required><br>

								<input type="checkbox" name="check1" value="news" id="signin_news"/>
								<label for="signin_news" id="signin_newstext"> Check this box if you want to receive news and discount.</label> <br>

								<input type="checkbox" name="check2" value="remember" id="signin_remember"/>
								<label for="signin_remember" id="signin_remembertext"> Remember me.</label> <br>

								<p id="signin_termstext"> By creating an account you agree to our <a href="#" id="terms">Terms &amp; Privacy</a>. </p>

								<input type="submit" name="register" id="signin_button" value="Sign Up">

								<input type="reset" id="cancel_button" value="Reset">
							</form>';
					}
		?>
		</section>

		<footer>
			<p class="footer footerp">
				&copy; <a class="footer awhite" href="https://ixjosemi.me/" target="_blank"> Made by Josemi </a> |
			  	<a class="footer awhite" href="doc/como_se_hizo.pdf" target="_blank"> Documentation </a>
			</p>
		</footer>
	</body>
</html>
