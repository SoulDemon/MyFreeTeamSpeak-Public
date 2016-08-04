<?php
require "config.php";
if( isset($_POST['newName']) ){
	$_POST['newName'] = $_POST['newName'] == "" ? "Dude" : $_POST['newName'];
	\Fr\LS::updateUser(array(
		"name" => $_POST['newName']
	));
}
?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <div class="content">
      <h1>Generate a new token for: <?php echo \Fr\LS::userName();?>?</h1>
	  
      <form action="newtoken.php" method="POST">
              <label>
          <button name="submit">Submit Request</button>
        </label>
      </form>
	  	
      <?php
      if( isset($_POST['submit']) ){
          $createAccount = \Fr\LS::newToken();	
			if($createAccount === true){
            echo "<label>Success Server Created.</label>";
          }
		  else
		  {
			  echo "<label>Something went horribly fucking wrong...</label>";
		  }
        
      }
      ?>
      <style>
        label{
          display: block;
          margin-bottom: 5px;
        }
      </style>
    </div>
  </body>
</html>
