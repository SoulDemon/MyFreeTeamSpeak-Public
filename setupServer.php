<?php
require "config.php";

?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <div class="content">
      <h1>Process A Server For: <?php echo \Fr\LS::userName();?></h1>
	  
      <form action="setupServer.php" method="POST">
        <label>
          <input name="Server_Name" placeholder="Server Name" />
        </label>
        <label>
          <input type="number" name="Slots" min="2" max="512" placeholder="Slots" />
        </label>
		<?php
		$vals2 = \Fr\LS::getAvailServers();

		foreach ($vals2 as $val2)
{
?> 
<label>
<input type="radio" name="choice" value="<?php echo $val2['ip'] ?>"> <?php echo $val2['location']; ?>
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
        $servername = $_POST['Server_Name'];
        $Slots = $_POST['Slots'];
		$Choice = $_POST['choice'];
		$id = $_POST['id'];
        if( $servername == "" || $Slots == '' || $Choice == ''){
            echo "<h2>Fields Left Blank</h2>", "<p>Some Fields were left blank. Please fill up all fields.</p>";
        }else{
          $createAccount = \Fr\LS::registerServer($servername, $Slots, $Choice, $id);
          if($createAccount === "portexists"){
            echo "<label>Port is already in use.</label>";
          } elseif($createAccount === "slot"){
            echo "<label>Over maximum slot amount of 512</label>";
          } elseif($createAccount === "server"){
            echo "<label>We only allow one generation per account</label>";
          }elseif($createAccount === true){
            echo "<label>Success Server Created, return to home.php for more information</label>";
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
