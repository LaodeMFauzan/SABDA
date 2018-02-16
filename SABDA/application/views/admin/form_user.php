<?php
	if(isset($user)){
		$id=$user->id;
		if($this->input->post('is_submitted')){
			$nama=set_value('nama');
			$email=set_value('alamat');
			$password=set_value('password');
			$kode_rs=set_value('kode_rs');
		}
		else{
			$nama=$user->nama;
			$email=$user->email;
			$password=$user->password;
			$kode_rs=$user->kode_rs;
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
				<div class="col-md-8 add">
				
					<?php if (isset($id)) { 
							 echo form_open_multipart('admin/users/update/'.$id,['class'=>'form-horizontal form-singin']);
							 $title="Update Data User";
							 $button="Update"; ?>
					<?php } else{ 
								echo form_open_multipart('admin/users/create',['class'=>'form-horizontal form-singin']);
								$title="Tambah Data User";
								$button="Tambah";
					 }?>

	       				<h2 class="form-signin-heading"><? echo $title; ?></h2>
	       				<div><?php echo validation_errors()?> </div>
  						<div><?=$this->session->flashdata('error') ?></div>
	       				<div class="form-login">
	       					<label for="inputEmail" class="sr-only">Nama Lengkap</label>
		        			<input type="text" name="name" id="inputText" class="form-control" placeholder="Nama Lengkap" required autofocus value="<?php if(isset($nama)) echo $nama ?>">
		        			<label for="inputEmail" class="sr-only">Email address</label>
		        			<input type="email" name="email" id="inputText" class="form-control" placeholder="Email" required autofocus value="<?php if(isset($email)) echo $email ?>">
		        			<label for="inputPassword" class="sr-only">Password</label>
		        			<input type="password" name="password" id="inputText" class="form-control" placeholder="Password" required value="<?php if(isset($password)) echo md5($password) ?>">
		        			<label for="inputPassword" class="sr-only">Password Confirmation</label>
		        			<input type="password" name="passwordconf" id="inputText" class="form-control" placeholder="Password Confirmation" required >
		        			<label for="inputEmail" class="sr-only">Kode Rumah Sakit</label>
		        			<input type="text" name="kode_rs" id="inputText" class="form-control" placeholder="Kode Rumah Sakit" required autofocus value="<?php if(isset($kode_rs)) echo $kode_rs ?>">
		        				<button class="btn btn-lg btn-primary " type="submit"><? echo $button; ?></button>
	        			</div>
	      			</form>
				</div>
				<div class="col-md-2"></div>
			</row>
		</div>
	</body>
</html>