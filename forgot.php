// Forgot Password reset 
<?php
session_start();
$_SESSION
?>
<?php
// collecting data from the register page



//print_r($_POST);

$errorCount = 0;
$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$larst_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$designation = $_POST['designation'];
$department = $_POST['department'];

$errorArray = [];

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;


//verifying the data and validate
if($errorCount > 0){
    $_SESSION["error"] = "You have " . $errorCount . " Error(s) in your submission";
    header("Location: register.php");

    //header("Location: register.php?message=Something went wrong with your submission");

    for ($counter = 0; $counter < $countAllUsers; $counter++) { 

        $currentUser = $allUsers[$counter];
        if($currentUser == $email . ".json"){
            $_SESSION["error"] = "Registration failed, User already exist ";
            header("Location: register.php");
            die();

        }
            echo "$userObject <br>";

        }

    }else{

        //count all users
        $allUsers = scandir("C:\wamp64\www\SNH\db\users");

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

        


        file_put_contents("C:\wamp64\www\SNH\db\users" . $email . ".json", json_encode($userObject));
        $_SESSION["message"] = "Registration Successful, You can how login! $first_name";
            header("Location: login.php");
        die();

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