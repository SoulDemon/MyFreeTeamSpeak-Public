
	  <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo \Fr\LS::userName();?></h5>
              	  	
                  <li class="mt">
                      <a href="home.php"  class="active">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>My Server</span>
                      </a>
                      <ul class="sub">
					  <?php 
					  $isMade = \Fr\LS::isRegisterServer();
					  
					  if ($isMade == 0){
						  
					  ?>
                          <!--<li><a  href="setupServer.php">Setup Server</a></li> -->
						  <li><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myGeneration">
						  Setup Server
						</button></li>
					  <?php }
					  
					  else if ($isMade == 1){
						  ?>
						<!-- <li><a  href="transferServer.php">Transfer Server</a></li> -->
						<li><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myTransfer">
						  Transfer Server
						</button></li>
					  <?php } ?>
						 <li><a  href="online-clients.php">Online Clients</a></li>
						 <li><a  href="newtoken.php">Generate Token</a></li>
						 <li><a  href="backupServer.php">Backup My Server</a></li>
						 <li><a  href="restoreServer.php">Restore My Server</a></li>
						 <!--<li>		<form action="home.php" method="POST">
						 <input type="submit" name="action_token" />
									</form></li> -->
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>My Account</span>
                      </a>
                      <ul class="sub">
						 <li><a  href="verifyServer.php">Verify Email</a></li>
                      </ul>
                  </li>
				  <!--
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
		  		  								       <?php
	   include './generateserversidebar.php';
	   include './transferserversidebar.php';
	   ?>	
      </aside>
      <!--sidebar end-->