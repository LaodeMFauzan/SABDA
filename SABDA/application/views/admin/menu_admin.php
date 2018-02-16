<nav  class="navbar navbar-default ">
	<div class="top">
		<div class="navbar-header">
			
		</div>
		<ul class="nav navbar-nav navbar-left">
            <img id="logo" alt="Logo" src="http://bloodbankkhargone.com/background/logo.png" width="45" height="45">
            <li><?php echo anchor('admin/Users','User'); ?></li>
      		<li><?php echo anchor('admin/RS','Mitra Sabda'); ?></li>
            <li><?php echo anchor('admin/Stok','Stok Darah'); ?></li>
        	<li><?php echo anchor('admin/Permintaan','Permintaan Darah'); ?></li>
        </ul>
        <ul  class="nav navbar-nav navbar-right">
        	<li>
        	<div style="line-height: 50px">
          		<?php echo 'Logged in as '.$this->session->userdata('nama');?>    
        	</div>      
        	</li>
        	<li>
          		<?php echo anchor('logout','Logout'); ?>         
        	</li>
        </ul>
	</div>
</nav>