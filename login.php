<?php
session_start();

include_once('lib/header.php');
?>


<p>
      <?php
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                  echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
                  session_destroy();
            }
      ?>
</p>


Login from Here

<form action="" method="POST">
<p>


<p>
<label>E-mail</label><br />
<input type="text" name="email" placeholder="Email"/>
</p>

<p>
<label>password</label><br />
<input type="text" name="password" placeholder="Password"/>
</p>



<button type="submit">Login</button>
</form>

<?php
include_once('lib/footer.php');
?>