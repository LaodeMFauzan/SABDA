<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('layout/head_user') ?>
	<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_user') ?>
			<div class="row">
				<div class="main-frame-data-rs">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div>
							 <?php $stok=$rs;
							 if (is_array($stok) || is_object($stok))
								{
							 foreach ((array)$rs as $rs): ?> 
								<?=img([
					          'src' => 'uploads/'.$rs->foto,
					          'style'=>'height:200px; width:300px;']) ?>	
					          <h1><?=$rs->nama ?></h1>
					          <p><?=$rs->alamat ?></p>
					           <div class="line"></div>
					           <?php break; endforeach;  ?> 
						</div>
						<h2>Stok Darah <?=$rs->nama ?></h2>
						<table class="table-responsive table table-bordered table-hover" id="myTableUser">
							<thead>
								<tr>
									<th>Golongan</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($stok as $Stok):?> 
									<tr>
										<td><?=$Stok->golongan?></td>
										<td><?=$Stok->jumlah?></td> 
									</tr>
								<?php endforeach; ?> 
							</tbody>
						</table>
						<?=anchor('Rumah_Sakit/','Cari RS Lain',['class'=>'btn btn-primary btn-md'])?>
						<?=anchor('Permintaan_Darah/request/'.$Stok->kode_rs,'Minta Stok Darah',['class'=>'btn btn-info btn-md'])?>
						<?php } 
							else
							{ ?>
							<h1>Data rumah sakit bersangkutan belum lengkap,harap cari rumah sakit lain</h1>
							<?=anchor('Rumah_Sakit/','Cari RS Lain',['class'=>'btn btn-primary btn-lg'])?>
						<?php } ?> 
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</body>
</html>
