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
      <h1>Transfer A Server For: <?php echo \Fr\LS::userName();?></h1>
	  
      <form action="transferServer.php" method="POST">
      
		<?php
		$vals2 = \Fr\LS::getAvailServers();

		foreach ($vals2 as $val2)
{
?> 
<label>
<input type="radio" name="choice" value="<?php echo $val2['ip'] ?>"> <?php echo $val2['location']; ?>, Servers:<?php echo \Fr\Ls::virtualServerCount($val2['ip'])?> / <?php echo $val2['maxServers']?>
</label> 
<?php
}
		?>
		<input type="hidden" name="id" value="<?php echo \Fr\LS::getUserID(); ?>">
        <label>
          <button name="submit">Submit Request</button>
        </label>
      </form>
	  	
      <?php
      if( isset($_POST['submit']) ){
		$Choice = $_POST['choice'];
        if($Choice == ''){
            echo "<h2>Fields Left Blank</h2>", "<p>Some Fields were left blank. Please fill up all fields.</p>";
        }else{
          $createAccount = \Fr\LS::transferServer($Choice);
          if($createAccount === "portexists"){
            echo "<label>Port is already in use.</label>";
          } elseif($createAccount === "slot"){
            echo "<label>Over maximum slot amount of 512</label>";
          } elseif($createAccount === "server"){
            echo "<label>We only allow one generation per account</label>";
          }elseif($createAccount === "maxServer"){
            echo "<label>This server is currently running at max capacity, Please try a different server.</label>";
          }elseif($createAccount === true){
            echo "<label>Success Server Created.</label>";
          }
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
