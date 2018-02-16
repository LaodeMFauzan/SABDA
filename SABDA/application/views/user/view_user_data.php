<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('layout/head_user') ?>
	<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_user') ?>
			<div class="row">
				<div class="main-frame-data-rs">
					<h1 id="title-profil">Profil User</h1>
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
								 <?php $rs=$user;
								 if (is_array($user) || is_object($user))
									{
								 foreach ((array)$user as $user): ?> 
								<?=anchor('User/update/'.$user->id,'Ubah Profil',['class'=>'btn btn-primary update-btn'])?>
								<table class="table table-bordered table-hover tabel-data">
								<tr>
						          <td><h4>Nama</h4> </td> 
						          <td><h4><?=$user->nama ?></h4></td>
						      	</tr>
						         <tr>
						          <td><h4>Email</h4> </td> 
						          <td><h4><?=$user->email ?></h4></td>
						      	</tr>
						      	<tr>
						          <td><h4>Password</h4> </td> 
						          <td><h4><?php echo(str_repeat('*', strlen ($user->password)));?></h4></td>
						      	</tr>
						      	 <?php break; endforeach;  ?> 
						      	  <?php } ?>
								</table>  
								 
						</div>
						<div class="row">
							<h1 id="title-profil">Profil Instansi</h1>
							<?php foreach ((array)$rs as $rs): ?> 
						          <?=anchor('Rumah_Sakit/update/'.$user->kode_rs,'Ubah Profil RS',['class'=>'btn btn-primary update-btn'])?>
								<table class="table table-bordered table-hover tabel-data">
								<tr>
						          <td><h4>Foto</h4> </td> 
						          <td><h4><?php
											$foto=['src'=>'uploads/'.$user->foto,'width'=>250,'height'=>150];
											echo img($foto);
										?></h4></td>
						      	</tr>
								<tr>
						          <td><h4>Nama Rumah Sakit</h4> </td> 
						          <td><h4><?=$user->nama_rs ?></h4></td>
						      	</tr>
						      	 <tr>
						          <td><h4>Alamat</h4> </td> 
						          <td><h5><?=$user->alamat ?></h5></td>
						      	</tr>
						      	  <?php break; endforeach;  ?> 
						      	</table>	
						  
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</body>
</html>
