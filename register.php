<?php
session_start();
//$_SESSION['TESTING'] = "Testing Session";
//print_r($_SESSION);
?>

<?php include_once ("lib/header.php"); ?>

<p><strong>Welcome, Please register</strong></p>
<p>All Feilds are required</p>


<form action="processlogin.php" method="POST">

<p>
      <?php
            if(isset($_SESSION['error'])&& !empty($_SESSION['error'])) {
                  echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                
                  session_destroy();
            }


      ?>
</p>

<p>
<label>First Name</label><br />
<input 

<?php
            if(isset($_SESSION['first_name'])) {
                  echo "value=" . $_SESSION['last_name'];
                  }
                  ?>

type="text" name="first_name" placeholder="First Name" />
</p>

<p>
<label>Last Name</label><br />
<input 

<?php
            if(isset($_SESSION['last_name'])) {
                  echo "value=" . $_SESSION['last_name'];
                  }
                  ?>

type="text" name="last_name" placeholder="Last Name" />
</p>

<p>
<label>E-mail</label><br />
<input 

<?php
      if(isset($_SESSION['email'])) {
            echo "value=" . $_SESSION['email'];
            }
            ?>

type="text" name="email" placeholder="Email" />
</p>

<p>
<label>password</label><br />
<input type="password" name="password" placeholder="Password" />
</p>


<p>
<label>Gender</label><br />
<select name="gender" >

<?php
            if(isset($_SESSION['gender'])) {
                  echo "value=" . $_SESSION['gender'];
                  }
                  ?>

<option value="">Select one</option>
<option
 <?php
            if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male') {
                  echo "selected";
                  }
      ?>
      >Male</option>
<option
<?php
            if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                  echo "selected";
                  }
      ?>
>Female</option>
</select>
</p>

<p>

<p>
<label>Designation</label><br />
<select name="designation" >

<?php
            if(isset($_SESSION['designation'])) {
                  echo "value=" . $_SESSION['designation'];
                  }
                  ?>

<option value="">Select one</option>
<option
 <?php
            if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team(MT)') {
                  echo "selected";
                  }
      ?>
      >Medical Team(MT)</option>
<option
<?php
            if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient') {
                  echo "selected";
                  }
      ?>
>Patient</option>
</select>
</p>

<p>
<p>
<label>Department</label><br />
<input 

<?php
      if(isset($_SESSION['department'])) {
            echo "value=" . $_SESSION['department'];
            }
            ?>

type="text" name="department" placeholder="department" />

</p>

<button type="submit">Register</button>
</form>
<?php include_once ("lib/footer.php"); ?>


