<?php
session_start();
?>
<?php
// collecting data from the register page



//print_r($_POST);

$errorCount = 0;

//verifying the data, validation

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] : $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;





$errorArray = [];

//verifying the data and validate
if($errorCount > 0){
    $_SESSION["error"] = "You have " . $errorCount . " Error(s) in your submission";
    header("Location: register.php");

    //header("Location: register.php?message=Something went wrong with your submission");
}else{

    //count all users
    $allUsers = scandir('db/users/');
    $countAllUsers = count($allUsers);

    $newUserId = ($countAllUsers-1);

    //echo "Registration Successful";  
    //save in the database
    $userObject = [
        'id'=>$newUserId,
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'password'=> password_hash($password, PASSWORD_DEFAULT),
        'gender'=>$gender,
        'designation'=>$designation,
        'department'=>$department,
    ];
//check if the user alredy exist
//Assign ID th the users
//.***.Count all users

for ($counter = 0; $counter < $countAllUsers; $counter++) { 

    $currentUser = $allUsers[$counter];
    if($currentUser == $email . ".json"){
        $_SESSION["error"] = "Registration failed, User already exist ";
    header("Location: register.php");
    die();

    }
    echo "The number is: $counter <br>";
}


    file_put_contents("C:\wamp64\www\SNH\db\users". $email . ".json", json_encode($userObject));
    $_SESSION["message"] = "Registration Successful, You can how login! $first_name";
    header("Location: login.php");
    

    }


/* 
 if($first_name == "") {
    $errorArray = "First Name cannot be blank";
}

if($last_name == "") {
    $errorArray = "Last Name cannot be blank";
    
}

*/

//saving data

//return back to the page
?>
