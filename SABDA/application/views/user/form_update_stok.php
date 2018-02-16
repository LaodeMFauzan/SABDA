<?php
	if(isset($stok)){
		$kode=$stok->kode;
		if($this->input->post('is_submitted')){
			$jumlah=set_value('jumlah');
		}
		else{
			$jumlah=$stok->jumlah;
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

					<?php if (isset($kode)) { 
							 echo form_open_multipart('Stok_Darah/update/'.$kode,['class'=>'form-horizontal form-singin']);
							 $title="Update Data Stok Darah";
							 $button="Update";} ?>

	       				<h2 class="form-signin-heading"><? echo $title; ?></h2>
	       				<div><?php echo validation_errors()?> </div>
  						<div><?=$this->session->flashdata('error') ?></div>
	       				<div class="form-login">
		        			<input type="text" name="jumlah" id="inputText" class="form-control" placeholder="Jumlah Kantung" required autofocus value="<?php if(isset($jumlah)) echo $jumlah ?>">
		        			<button class="btn btn-lg btn-primary " type="submit"><? echo $button; ?></button>
	        			</div>
	      			<?= form_close() ?>
				</div>
				<div class="col-md-2"></div>
			</row>
		</div>
	</body>
</html>