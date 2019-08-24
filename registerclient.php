<?php

  include __DIR__ . '/config/config.php';
  include __DIR__ .'/config/paths.php';
  include INC .'header.php'; 
  include __DIR__ . '/config/connect.php'; 


// Define variables and initialize with empty values
$firstname = $lastname = $username = $email = $phone = $password = $confirm_password = "";
$firstname_err = $lastname_err = $username_err = $email_err = $phone_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Validate first name
  if(empty(trim($_POST["first_name"]))){
    $username_err = "Please enter your firstname.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM members WHERE f_name = :firstname";
    
    if($stmt = $pdo->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
      
      // Set parameters
      $param_firstname = trim($_POST["first_name"]);
      
      // Attempt to execute the prepared statement
      if($stmt->execute()) {
        $firstname = trim($_POST["first_name"]);
      } else {
        echo "Something went wrong. Please try again...";
      }
    }
     
    // Close statement
    // unset($stmt);
  }
  
  // Validate lastname
  if(empty(trim($_POST["last_name"]))){
    $lastname_err = "Please enter your lastname.";
  } else{
    // Prepare a select statement
    $sql = "SELECT id FROM members WHERE l_name = :lastname";
    
    if($stmt = $pdo->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
      
      // Set parameters
      $param_lastname = trim($_POST["last_name"]);
      
      // Attempt to execute the prepared statement
      if($stmt->execute()) {
        $lastname = trim($_POST["last_name"]);
      } else {
        echo "Something went wrong. Please try again...";
      }
    }
     
  }
  
  // Validate username
  if(empty(trim($_POST["username"]))){
    $username_err = "Please enter a username.";
  } else{
    // Prepare a select statement
    $sql = "SELECT id FROM members WHERE username = :username";
    
    if($stmt = $pdo->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      
      // Set parameters
      $param_username = trim($_POST["username"]);
      
      // Attempt to execute the prepared statement
      if($stmt->execute()){
        if($stmt->rowCount() == 1){
          $username_err = "This username is already taken.";
        } else{
          $username = trim($_POST["username"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
     
    // Close statement
    // unset($stmt);
  }
    
  // Validate Email
  if(empty(trim($_POST["email"]))){
    $email_err = "Please enter your email.";
  } else {
    
    // Prepare a select statement
    $sql = "SELECT id FROM members WHERE email = :email";
    
    if($stmt = $pdo->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      
      // Set parameters
      $param_email = trim($_POST["email"]);
      
      // Attempt to execute the prepared statement
      if($stmt->execute()){

        if($stmt->rowCount() == 1){
          $email_err = "This email is already taken.";
        } else {
          $email = trim($_POST["email"]);
        }

      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
     
    // Close statement
    // unset($stmt);
  }

  // Validate Phone Number
  if(empty(trim($_POST["phone"]))){
    $phone_err = "Please enter a phone number.";
  } else{
    // Prepare a select statement
    $sql = "SELECT id FROM members WHERE phone = :phone";
    
    if($stmt = $pdo->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
      
      // Set parameters
      $param_phone = trim($_POST["phone"]);
      
      // Attempt to execute the prepared statement
      if($stmt->execute()){
        if($stmt->rowCount() == 1){
            $phone_err = "This phone number is already in use.";
        } else{
            $phone = trim($_POST["phone"]);
        }
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
     
    // Close statement
    // unset($stmt);
  }


  // Validate password
  if(empty(trim($_POST["password"]))){
      $password_err = "Please enter a password.";     
  } elseif(strlen(trim($_POST["password"])) < 6){
      $password_err = "Password must have atleast 6 characters.";
  } else{
      $password = trim($_POST["password"]);
  }
  
  // Validate confirm password
  if(empty(trim($_POST["confirm_password"]))){
      $confirm_password_err = "Please confirm password.";     
  } else{
      $confirm_password = trim($_POST["confirm_password"]);
      if(empty($password_err) && ($password != $confirm_password)){
          $confirm_password_err = "Password did not match.";
      }
  }
    
  // Check input errors before inserting in database
  if(empty($firstname_err) && empty($lastname_err) && empty($username_err) && empty($phone_err) && empty($email_err)  && empty($password_err) && empty($confirm_password_err)){
      
    // Prepare an insert statement
    $sql = "INSERT INTO `members` (`f_name`, `l_name`, `username`, `email`, `passkey`, `phone`, `u_role`)
            VALUES (:firstname, :lastname, :username, :email, :passkey, :phone, :u_role )";
     
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
        $stmt->bindParam(":passkey", $param_password, PDO::PARAM_STR);
        $stmt->bindParam(":u_role", $param_role, PDO::PARAM_STR);
        
        // Set parameters
        $param_firstname = $firstname;
        $param_lastname = $lastname;
        $param_username = $username;
        $param_email = $email;
        $param_phone = $phone;
        $param_role = "client";
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
          // Redirect to login page
          header("location: login2.php");
          // var_dump($stmt);
        } else {
          echo "Something went wrong. Please try again later.";
        }
    }
       
    // Close statement
    unset($stmt);
  }
    
  // Close connection
  unset($pdo);
}

?>

<!-- #masthead -->
<section class="page-banner page-banner--layout-3 parallax" style="padding: 50px 0;">
  <div class="container">
    <div class="page-banner__container animated zoomIn">
      <div class="page-banner__textcontent t-center">
        <h2 class="page-banner__title c-white">Become a member </h2>
        <p class="page-banner__subtitle c-white">Get your projects done by skilled professionals.</p>
      </div><!-- .page-banner__textcontent -->
    </div><!-- .page-banner__container -->
  </div><!-- .container -->
</section><!-- .page-banner -->


<section class="dream-places page-section dream-places--layout-1">
  <div class="container">
    <p class="page-section__subtitle t-center c-boulder"><a href="login.html">Already have a account? Login</a></p>

    <div class="row mt-4">
      <div class="col-md-6 offset-md-3">

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="form-row my-2">
              
            <div class="col-sm-6">
              <label for="clientName">First Name</label>
              <input type="text" name="first_name" class="form-control" id="frstName" placeholder="Enter Your First Name..." required>
            </div>
            <div class="col-sm-6">
              <label for="clientName">Last Name</label>
              <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Enter Your Last Name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="WhatIdo">Username</label>
            <input type="text" name="username" class="form-control" id="user" placeholder="Kokokashoes..." required>
          </div>
          <div class="form-group">
            <label for="merchEmail">Email</label>
            <input type="email" name="email" class="form-control" id="merchEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" name="phone" class="form-control" id="" placeholder="Phone" required>
          </div>            
          <div class="form-group">
            <label class="text-bold" for="Password">Password</label>
            <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required>
          </div>

          <div class="form-group">
            <label class="text-bold" for="password">Confirm password</label>
            <input type="password" name="confirm_password" class="form-control" id="conf_password" placeholder="Confirm password" required>
          </div>

          <input type="submit" class="btn btn-primary" value="Become a member"> 
          
        </form>

	
      </div>
    </div>
  </div><!-- .container -->
</section><!-- .categories -->


<?php include INC . 'footer.php'; ?>
