<?php
	if(isset($stok)){
		$kode=$stok->kode;
		if($this->input->post('is_submitted')){
			$kode_rs=set_value('kode_rs');
			$golongan=set_value('golongan');
			$jumlah=set_value('jumlah');
		}
		else{
			$kode_rs=$stok->kode_rs;
			$golongan=$stok->golongan;
			$jumlah=$stok->jumlah;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/head_admin') ?>
<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_admin') ?>
			<row>
				<div class="col-md-2"></div>
				<div class="col-md-8 login">

					<?php if (isset($kode)) { 
							 echo form_open_multipart('admin/Stok/update/'.$kode,['class'=>'form-horizontal form-singin']);
							 $title="Update Data Stok Darah";
							 $button="Update"; ?>
					<?php } else{ 
								echo form_open_multipart('admin/Stok/create',['class'=>'form-horizontal form-singin']);
								$title="Tambah Data Stok Darah";
								$button="Tambah";
					 }?>
				
	       				<h2 class="form-signin-heading"><? echo $title; ?></h2>
	       				<div><?php echo validation_errors()?> </div>
  						<div><?=$this->session->flashdata('error') ?></div>
	       				<div class="form-login">
		        			<input type="text" name="kode_rs" id="inputText" class="form-control" placeholder="Kode Rumah Sakit" required autofocus value="<?php if(isset($kode_rs)) echo $kode_rs ?>">
		        			<input type="text" name="golongan" id="inputText" class="form-control" placeholder="Golongan Darah" required autofocus value="<?php if(isset($golongan)) echo $golongan ?>">
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