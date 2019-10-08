<?php

// We use ouput buffering here because we want to modify the headers after
// sending the content when we redirect the user to the login page.
ob_start();

if(isset($_SESSION['username'])){

    $users = $pdo->prepare(
        'SELECT id, firstname, lastname, CONCAT(firstname, SPACE(2) , lastname) AS fullname, username, email, gender, phone, mem_address, mem_city, mem_state, 
        mem_country, u_role AS role, created_at 
        FROM 
            members 
        WHERE 
            username = "'.$_SESSION['username'].'" 
    ');
        
    
    $users->execute();
    $user = $users->fetchObject();

} else {
    header("location: ../login.php");
    exit;
}



// Flush the output buffering cache.
ob_flush();
