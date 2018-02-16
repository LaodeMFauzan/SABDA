<nav  class="navbar navbar-default ">
	<div class="top">
		<div id="logo" class="navbar-header">
            <a class="navbar-brand" href="#">
            <img alt="Logo" src="<?php echo base_url(); ?>assets/logo-SABDA.png" width="65" height="65">
            </a>
        </div>
		<ul class="nav navbar-nav navbar-left">
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