<nav  class="navbar navbar-default ">
	<div class="top">
		<div id="logo" class="navbar-header">
            <a class="navbar-brand" href="#">
            <img alt="Logo" src="<?php echo base_url(); ?>assets/logo-SABDA.png" width="65" height="65">
            </a>
        </div>
        <?php
            $id=$this->session->userdata('id');
            $kode_rs=$this->session->userdata('kode_rs');
        ?>
		<ul class="nav navbar-nav navbar-left">
            <li><?php echo anchor('user/','<i class="fa fa-home" aria-hidden="true"></i>
 Home'); ?></li>
      		<li><?php echo anchor('user/get_user_profile/'.$id.'/'.$kode_rs,'<i class="fa fa-user-circle" aria-hidden="true"></i>
 Profil'); ?></li>
            <li><?php echo anchor('Rumah_Sakit/','<i class="fa fa-hospital-o" aria-hidden="true"></i>
 Mitra Sabda'); ?></li>
        	<li><?php echo anchor('Permintaan_Darah/','<i class="fa fa-ambulance" aria-hidden="true"></i>
 Permintaan Darah'); ?></li>
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