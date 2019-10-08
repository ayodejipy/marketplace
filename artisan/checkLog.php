<?php

// We use ouput buffering here because we want to modify the headers after
// sending the content when we redirect the user to the login page.
ob_start();

if(isset($_SESSION['username'])){

    $users = $pdo->prepare(
        'SELECT id, firstname, lastname, CONCAT(firstname, lastname) AS fullname, username, phone, mem_address, mem_city, mem_state, 
        mem_country, business_name, business_cat, business_exp, business_phone, business_mail, business_city, business_state, business_addr, status, u_role AS role, created_at 
        FROM 
            members 
        WHERE 
            username = "'.$_SESSION['username'].'" ');
        
    
    $users->execute();
    $user = $users->fetchObject();

} else {
    header("location: ../login.php");
    exit;
}

// if(isset($_SESSION['username'])){
//     $id = $_SESSION['id'];
//     $count = count($id);
// } else {
//     $count = 0;
// }



// Flush the output buffering cache.
ob_flush();
