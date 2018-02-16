<?php
	if(isset($rs)){
		$kode_tujuan=$rs->kode;
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

					<?php  echo form_open_multipart('Permintaan_Darah/request/'.$kode_tujuan,['class'=>'form-horizontal form-singin']);
							 $title="Request Kantung Darah";
							 $button="Kirim"; ?>

	       				<h2 class="form-signin-heading"><? echo $title; ?></h2>
	       				<div><?php echo validation_errors()?> </div>
  						<div><?=$this->session->flashdata('error') ?></div>
	       				<div class="form-login">
		        			<input type="text" name="golongan" id="inputText" class="form-control" placeholder="Golongan Darah" required autofocus value="">
		        			<input type="text" name="jumlah" id="inputText" class="form-control" placeholder="Jumlah Kantung" required autofocus value="">
		        			<button class="btn btn-lg btn-primary " type="submit"><? echo $button; ?></button>
	        			</div>
	      			<?= form_close() ?>
				</div>
				<div class="col-md-2"></div>
			</row>
		</div>
	</body>
</html>