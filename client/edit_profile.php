<?php 

	include __DIR__ . '../../config/config.php';
	include __DIR__ .'../../config/paths.php';
	include __DIR__ .'../../config/connect.php';
	include __DIR__ . '/checkLog.php';


	if($_SERVER["REQUEST_METHOD"] == "POST") {

		

		//Retrieve user input and save to a variable
		$id = $_SESSION['id'];
		$firstname = htmlspecialchars($_POST["firstname"]);
		$lastname = htmlspecialchars($_POST["lastname"]);
		$gender = htmlspecialchars($_POST["gender"]);
		$phone = htmlspecialchars($_POST["phone"]);
		$country = htmlspecialchars($_POST["country"]);
		$state = htmlspecialchars($_POST["state"]);
		$city = htmlspecialchars($_POST["city"]);
		$address = htmlspecialchars($_POST["address"]);

		// We either use an UPDATE or INSERT statement depending on whether or not
		// the user has added their address details before.

		
			
			// Prepare an update statement
			$sql = "UPDATE `members` SET `firstname`= :firstname, `lastname` = :lastname, `phone`= :phone, `gender`= :gender, `mem_country`= :country, `mem_state`= :state, `mem_city`= :city, 
			`mem_address`= :address WHERE `id`= :id ";
			// $sql = "UPDATE `members` SET `f_name`= $firstname, `l_name` = $lastname, `phone`= $phone, `gender`= $gender, `mem_country`= $country, `mem_state`= $state, `mem_city`= $city, 
			// `mem_address`= $address WHERE `id`= $id ";
			
			if($stmt = $pdo->prepare($sql)) {
				
				// Bind variables to the prepared statement as parameters
				$stmt->bindValue(":id", $id, PDO::PARAM_STR);
				$stmt->bindValue(":firstname", $firstname, PDO::PARAM_STR);
				$stmt->bindValue(":lastname", $lastname, PDO::PARAM_STR);
				$stmt->bindValue(":gender", $gender, PDO::PARAM_STR);
				$stmt->bindValue(":phone", $phone, PDO::PARAM_STR);
				$stmt->bindValue(":country", $country, PDO::PARAM_STR);
				$stmt->bindValue(":state", $state, PDO::PARAM_STR);
				$stmt->bindValue(":city", $city, PDO::PARAM_STR);
				$stmt->bindValue(":address", $address, PDO::PARAM_STR);
				
				
			}
		
			if (!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($gender) && !empty($country) && !empty($state) && !empty($city) && !empty($address)) {

		
				//Update user info by saving infos to database
				if ($stmt->execute()) {
					//Show a success message
					header("location: index.php?message=success");
					die;
				} else {
					//Show an error message
					header("location: index.php?message=error");
					exit;
				}
					
		
			} else {

				//Ask user to fill in their details
				header("location: index.php?message=warning");
				exit;
			}

	}	
													
?>		
					



        