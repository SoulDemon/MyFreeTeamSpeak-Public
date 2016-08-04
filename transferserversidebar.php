
						<!-- Generates server -->
						<div class="modal fade" id="myTransfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Transfer A Server For: <?php echo \Fr\LS::userName();?></h4>
						      </div>
						      <div class="modal-body">
						<div id="login-form">
						<form action="transferServer.php" method="post">
						<table align="center" width="30%" border="0">
						<tr>
						
		<?php
		$vals2 = \Fr\LS::getAvailServers();

		foreach ($vals2 as $val2)
{
?> 
<label>
<tr><td><input type="radio" name="choice" value="<?php echo $val2['ip'] ?>"> <?php echo $val2['location']; ?></td></tr>
</label> 
<?php
}
		?>		
		</tr>
						<tr>
						</tr>
						</table>
						
						</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								 <button name="submit" class="btn btn-primaery">Submit Request</button>
								</form>
						      </div>
						    </div>
						  </div>
						</div>      				
      				</div><!-- /showback -->


<!-- End Generation of Server -->