<!-- Static navbar -->
   <nav class="navbar navbar-default navbar-static-top">
	 <div class="container">
	   <div class="navbar-header">
		 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		   <span class="sr-only">Toggle navigation</span>
		   <span class="icon-bar"></span>
		   <span class="icon-bar"></span>
		   <span class="icon-bar"></span>
		 </button>
		 <a class="navbar-brand" href="#">Project name</a>
	   </div>
	   <div id="navbar" class="navbar-collapse collapse">
		 <ul class="nav navbar-nav navbar-right">
			<li>
				<?php echo $this->Html->link(__d('menu', 'หน้าหลัก'), '/');?>
			</li>
			<li>
			   <?php echo $this->Html->link(__d('menu', 'บอลวันนี้'), '/teams_competitions/today');?>
			</li>
			<li>
			   <?php echo $this->Html->link(__d('menu', 'สมัครสมาชิก'), '/users/register');?>
			</li>
			<li>
			   <?php echo $this->Html->link(__d('menu', 'กิจกรรมข่าวสาร'), '/events');?>
			</li>
			<li>
			   <?php echo $this->Html->link(__d('menu', 'ติดต่อเรา'), '/contacts');?>
			</li>
		 </ul>
	   </div><!--/.nav-collapse -->
	 </div>
   </nav>
