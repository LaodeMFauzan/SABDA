<?php
	if(isset($permintaan)){
		$kode_p=$permintaan->kode_p;
		if($this->input->post('is_submitted')){
			$kode_asal=set_value('kode_asal');
			$kode_tujuan=set_value('kode_tujuan');
			$golongan=set_value('golongan');
			$jumlah=set_value('jumlah');
		}
		else{
			$kode_asal=$permintaan->kode_asal;
			$kode_tujuan=$permintaan->kode_tujuan;
			$golongan=$permintaan->golongan;
			$jumlah=$permintaan->jumlah;
		}
	}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/head_admin') ?>
<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_admin') ?>
			<row>
				<div class="col-md-2"></div>
				<div class="col-md-8 login">
				
					<?php if (isset($kode_p)) { 
							 echo form_open_multipart('admin/permintaan/update/'.$kode_p,['class'=>'form-horizontal form-singin']);
							 $title="Update Data Permintaan Darah";
							 $button="Update"; ?>
					<?php } else{ 
								echo form_open_multipart('admin/permintaan/create',['class'=>'form-horizontal form-singin']);
								$title="Tambah Data Permintaan Darah";
								$button="Tambah";
					 }?>

	       				<h2 class="form-signin-heading"><? echo $title; ?></h2>
	       				<div><?php echo validation_errors()?> </div>
  						<div><?=$this->session->flashdata('error') ?></div>
	       				<div class="form-login">
		        			<input type="text" name="kode_asal" id="inputText" class="form-control" placeholder="Kode Asal" required autofocus value="<?php if(isset($kode_asal)) echo $kode_asal ?>">
		        			<input type="text" name="kode_tujuan" id="inputText" class="form-control" placeholder="Kode Tujuan" required autofocus value="<?php if(isset($kode_tujuan)) echo $kode_tujuan ?>">
		        			<input type="text" name="golongan" id="inputText" class="form-control" placeholder="Golongan" required value="<?php if(isset($golongan)) echo ($golongan) ?>">
		        			<input type="text" name="jumlah" id="inputText" class="form-control" placeholder="Jumlah" required autofocus value="<?php if(isset($jumlah)) echo $jumlah ?>">
		        				<button class="btn btn-lg btn-primary " type="submit"><? echo $button; ?></button>
	        			</div>
	      			</form>
				</div>
				<div class="col-md-2"></div>
			</row>
		</div>
	</body>
</html>