<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SABDA</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet"> 
</head>
<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/top_menu') ?>
			<row>
				<div class="col-md-2"></div>
				<div class="col-md-8 login">
					<div><?php echo validation_errors()?> </div>
  					<div><?=$this->session->flashdata('error') ?></div>
					<?php echo form_open('login',['class'=>'form-horizontal form-signin']) ?>
	       				<h2 class="form-signin-heading">SABDA</h2>
	       				<p>Sistem Informasi Bank Darah</p>
	       				<div class="form-login">
		        			<label for="inputEmail" class="sr-only">Email address</label>
		        			<input type="email" name="email" id="inputText" class="form-control" placeholder="Email" required autofocus>
		        			<label for="inputPassword" class="sr-only">Password</label>
		        			<input type="password" name="password" id="inputText" class="form-control" placeholder="Password" required>
		        			<button class="btn btn-lg btn-primary " type="submit">Masuk</button>
	        			</div>
	        			<p>Tidak punya akun ? <?php echo anchor('register','Daftar'); ?> sekarang</p>
	      			</form>
				</div>
				<div class="col-md-2"></div>
			</row>
		</div>
	</body>
</html>