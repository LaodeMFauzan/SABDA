<?php
	if(isset($rs)){
		$kode_rs=$rs->kode;
		if($this->input->post('is_submitted')){
			$nama=set_value('namaRS');
			$alamat=set_value('alamat');
		}
		else{
			$nama=$rs->nama;
			$alamat=$rs->alamat;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
 <?php $this->load->view('layout/head_user') ?>
<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_user') ?>
			<row>
				<div class="col-md-2"></div>
				<div class="col-md-8 login">

					<?php if (isset($kode_rs)) { 
							 echo form_open_multipart('Rumah_Sakit/update/'.$kode_rs,['class'=>'form-horizontal form-singin']);
							 $title="Update Data RS";
							 $button="Update";
					 }?>
				
	       				<h2 class="form-signin-heading"><? echo $title; ?></h2>
	       				<div><?php echo validation_errors()?> </div>
  						<div><?=$this->session->flashdata('error') ?></div>
	       				<div class="form-login">
		        			<input type="text" name="namaRS" id="inputText" class="form-control" placeholder="Nama Rumah Sakit" required autofocus value="<?php if(isset($nama)) echo $nama ?>">
		        			<input type="text" name="alamat" id="inputText" class="form-control" placeholder="Alamat Rumah Sakit" required autofocus value="<?php if(isset($alamat)) echo $alamat ?>">
		        			<p style="color: black; text-align: left; margin-left: 70px;" class="upload">Gambar Rumah Sakit</p>
			        		<input class="upload" type="file" name="userfile">
			        		<button class="btn btn-lg btn-primary " type="submit"><? echo $button; ?></button>
	        			</div>
	      			<?= form_close() ?>
				</div>
				<div class="col-md-2"></div>
			</row>
		</div>
	</body>
</html>