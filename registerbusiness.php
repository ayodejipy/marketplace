<?php


  include __DIR__ . '/config/config.php'; 
  include __DIR__ .'/config/paths.php';
  include __DIR__ . '/config/connect.php'; 
  

  
  // Define variables and initialize with empty values
  $firstname = $lastname = $username = $email = $phone = $password = $confirm_password = $bizname = $bizcat = $bizexp = $bizmail = $bizphone = "";
  $firstname_err = $lastname_err = $username_err = $email_err = $phone_err = $username_err = $password_err = $confirm_password_err = $bizname_err= $bizcat_err = $bizexp_err = $bizmail_err = $bizphone_err = "";
 
  // Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate business name 
    if(empty(trim($_POST["businessname"]))){
      $bizname_err = "Please enter your business name.";
    } else {
      // Prepare a select statement
      $sql = "SELECT id FROM members WHERE business_name = :businessname";
      
      if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":businessname", $param_businessname, PDO::PARAM_STR);
        
        // Set parameters
        $param_businessname = trim($_POST["businessname"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()) {
          $bizname = trim($_POST["businessname"]);
        } else {
          echo "Something went wrong. Please try again...";
        }
      }
      
      // Close statement
      // unset($stmt);
    }

    // Validate business category 
    if(empty(trim($_POST["businesscat"]))){
      $bizcat_err = "Please select one category";
    } else {
      // Prepare a select statement
      $sql = "SELECT id FROM members WHERE business_cat = :businesscat";
      
      if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":businesscat", $param_businesscat, PDO::PARAM_STR);
        
        // Set parameters
        $param_businesscat = trim($_POST["businesscat"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()) {
          $bizcat = trim($_POST["businesscat"]);
        } else {
          echo "Something went wrong. Please try again...";
        }
      }
      
      // Close statement
      // unset($stmt);
    }

    // Validate business expertise 
    if(empty(trim($_POST["expertise"]))){
      $bizexp_err = "Please select one category";
    } else {
      // Prepare a select statement
      $sql = "SELECT id FROM members WHERE business_exp = :expertise";
      
      if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":expertise", $param_businessexp, PDO::PARAM_STR);
        
        // Set parameters
        $param_businessexp = trim($_POST["expertise"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()) {
          $bizexp = trim($_POST["expertise"]);
        } else {
          echo "Something went wrong. Please try again...";
        }
      }
      
      // Close statement
      // unset($stmt);
    }



    // Validate Business Email
    if(empty(trim($_POST["businessmail"]))){
      $bizmail_err = "Please enter your email.";
    } else {
      
      // Prepare a select statement
      $sql = "SELECT id FROM members WHERE business_mail = :businessmail";
      
      if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":businessmail", $param_businessmail, PDO::PARAM_STR);
        
        // Set parameters
        $param_businessmail = trim($_POST["businessmail"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){

          if($stmt->rowCount() == 1){
            $bizmail_err = "This email is already taken.";
          } else {
            $bizmail = trim($_POST["businessmail"]);
          }

        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
      }
      
      // Close statement
      // unset($stmt);
    }


    // Validate Business Phone Number
    if(empty(trim($_POST["businessphone"]))){
      $bizphone_err = "Please enter a phone number.";
    } else{
      // Prepare a select statement
      $sql = "SELECT id FROM members WHERE business_phone = :businessphone";
      
      if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":businessphone", $param_businessphone, PDO::PARAM_STR);
        
        // Set parameters
        $param_businessphone = trim($_POST["businessphone"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
          if($stmt->rowCount() == 1){
            $bizphone_err = "This phone number is already in use.";
          } else {
            $bizphone = trim($_POST["businessphone"]);
          }
        } else{
          echo "Oops! Something went wrong. Please try again later.";
        }
      }
    }



  
    /**
     * VALIDATE PERSONAL INFORMATION COLLECTED
     */
    
    // Validate first name
    if(empty(trim($_POST["firstname"]))){
      $firstname_err = "Please enter your firstname.";
    } else {
      // Prepare a select statement
      $sql = "SELECT id FROM members WHERE f_name = :firstname";
      
      if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
        
        // Set parameters
        $param_firstname = trim($_POST["firstname"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()) {
          $firstname = trim($_POST["firstname"]);
        } else {
          echo "Something went wrong. Please try again...";
        }
      }
      
      // Close statement
      // unset($stmt);
    }
    
    // Validate lastname
    if(empty(trim($_POST["lastname"]))){
      $lastname_err = "Please enter your lastname.";
    } else{
      // Prepare a select statement
      $sql = "SELECT id FROM members WHERE l_name = :lastname";
      
      if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
        
        // Set parameters
        $param_lastname = trim($_POST["lastname"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()) {
          $lastname = trim($_POST["lastname"]);
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
    // if(empty(trim($_POST["email"]))){
    //   $email_err = "Please enter your email.";
    // } else {
      
    //   // Prepare a select statement
    //   $sql = "SELECT id FROM members WHERE email = :email";
      
    //   if($stmt = $pdo->prepare($sql)){
    //     // Bind variables to the prepared statement as parameters
    //     $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        
    //     // Set parameters
    //     $param_email = trim($_POST["email"]);
        
    //     // Attempt to execute the prepared statement
    //     if($stmt->execute()){

    //       if($stmt->rowCount() == 1){
    //         $email_err = "This email is already taken.";
    //       } else {
    //         $email = trim($_POST["email"]);
    //       }

    //     } else {
    //       echo "Oops! Something went wrong. Please try again later.";
    //     }
    //   }
      
      // Close statement
      // unset($stmt);
    //}

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
    if(empty(trim($_POST["confirm_pass"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_pass"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($username_err) && empty($phone_err) && empty($email_err)  && empty($password_err) && empty($confirm_password_err)){
        
      // Prepare an insert statement
      $sql = "INSERT INTO `members` (`firstname`, `lastname`, `username`, `passkey`, `business_name`, `business_cat`, `business_exp`, `business_mail`, `business_phone`, `phone`, `u_role`)
              VALUES (:firstname, :lastname, :username, :passkey, :businessname, :businesscat, :expertise, :businessmail, :businessphone, :phone, :u_role )";
      
      if($stmt = $pdo->prepare($sql)){
          // Bind variables to the prepared statement as parameters
          $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
          $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
          $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
          // $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
          $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);    
          $stmt->bindParam(":passkey", $param_password, PDO::PARAM_STR);
          $stmt->bindParam(":businessname", $param_businessname, PDO::PARAM_STR);
          $stmt->bindParam(":businesscat", $param_businesscat, PDO::PARAM_STR);
          $stmt->bindParam(":expertise", $param_businessexp, PDO::PARAM_STR);
          $stmt->bindParam(":businessmail", $param_businessmail, PDO::PARAM_STR);
          $stmt->bindParam(":businessphone", $param_businessphone, PDO::PARAM_STR);
          $stmt->bindParam(":u_role", $param_role, PDO::PARAM_STR);
          
          // Set parametersss
          $param_firstname = $firstname;
          $param_lastname = $lastname;
          $param_username = $username;
          $param_email = $email;
          $param_phone = $phone;
          $param_businessname = $bizname;
          $param_businesscat = $bizcat;
          $param_businessexp = $bizexp;
          $param_businessmail = $bizmail;
          $param_businessphone = $bizphone;
          $param_role = "artisan";
          $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
          
          
          // Attempt to execute the prepared statement
          if($stmt->execute()){
            // Redirect to login page
            header("location: login.php"); 
            exit;   
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


<?php include INC .'header.php'; ?>

<!-- #masthead -->
<section class="page-banner page-banner--layout-3 parallax" style="padding: 50px 0;">
  <div class="container">
    <div class="page-banner__container animated zoomIn">
      <div class="page-banner__textcontent t-center">
        <h2 class="page-banner__title c-white">Register Your Business</h2>
        <p class="page-banner__subtitle c-white">Present yourself to the world and get customers.</p>
      </div><!-- .page-banner__textcontent -->
    </div><!-- .page-banner__container -->
  </div><!-- .container -->
</section><!-- .page-banner -->


<section class="dream-places page-section dream-places--layout-1">
  <div class="container">
    <!-- <h2 class="page-section__title t-center">Popular Categories</h2> -->
    <p class="page-section__subtitle t-center c-boulder"><a href="login.html">Already have a business account? Login</a></p>

    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="on">
          
          <fieldset>
            <div class="form-group">
              <label for="businessName">Business Name</label>
              <input type="text" name="businessname" class="form-control" id="businessName" placeholder="Business Name" required="">
            </div>
            <div class="form-group">
              <label for="cat">Choose Category</label>
              <select class="custom-select" name="businesscat" required="">
                <option value="Automobile repair">Automobile Repair</option>
                <option value="1">Barbing</option>
                <option value="2">Event Management</option>
                <option value="3">Driving</option>
                <option value="3">Design & Tech</option>
              </select>
            </div>
            <div class="form-group">
              <label for="WhatIdo">Expertise/What do you do?</label>
              <input type="text" name="expertise" class="form-control" id="WhatIdo" placeholder="Mecedes Benz" required="">
            </div>
            <div class="form-group">
              <label for="artEmail">Business Email</label>
              <input type="email" name="businessmail" class="form-control" id="artEmail" aria-describedby="emailHelp" placeholder="Enter email" required="">
              
            </div>
            <div class="form-group">
              <label for="phoneNumber">Business Phone Number</label>
              <input type="tel" name="businessphone" class="form-control" id="WhatIdo" placeholder="Phone" required="">
            </div>
            
            <input type="button" id="next"  name="next" class=" btn btn-info" value="Next" />
          </fieldset>
          
          <fieldset style="display: none;">
            <h2> Personal Details</h2>
            <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" name="firstname" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="">
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" name="lastname" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required="">
            </div>
            <div class="form-group">
              <label for="first_name">Username</label>
              <input type="text" name="username" class="form-control" name="first_name" id="user_name" placeholder="Username" required="">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" name="phone" class="form-control" name="phone" id="" placeholder="Phone" required="">
            </div>
            <div class="form-group">
              <label class="text-bold" for="Password">Password</label>
              <input type="password" name="password" class="form-control" id="" placeholder="Password" required="">
            </div>
            <div class="form-group">
              <label class="text-bold" for="Password">Confirm password</label>
              <input type="password" name="confirm_pass" class="form-control" id="" placeholder="Password" required="">
            </div>


            <input type="button" id="prev" name="previous" class="btn btn-info" value="Previous" />
            <input type="submit" class=" btn btn-success" value="Become an Artisan" />
          </fieldset>

          
          <!-- <button type="submit" class="btn btn-gradient next action-button">Register</button> -->
        </form>

	
      </div>
    </div>
  </div><!-- .container -->
</section><!-- .categories -->



<?php include INC. 'footer.php'; ?>