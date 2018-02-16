<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('layout/head_user') ?>
	<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_user') ?>
			<div class="row">
				<div class="main-frame-stok">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<h1>Permintaan Masuk</h1>
					<div><?php echo validation_errors()?> </div>
  					<div><?=$this->session->flashdata('error') ?></div>
						<table class="table-responsive table table-bordered table-hover" id="myTableUser">
							<thead>
								<tr>
									<th>Nama Rumah Sakit</th>
									<th>Golongan</th>
									<th>Jumlah</th>
									<th>Pilihan</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$inbox=$kotak_masuk;
									if (is_array($inbox) || is_object($inbox))
									{
										foreach ($kotak_masuk as $masuk): ?>
									<tr>
										<td><?=$masuk->nama?></td>
										<td><?=$masuk->golongan?></td>
										<td><?=$masuk->jumlah?></td>
										<td>
											<?=anchor('Permintaan_Darah/terima/'.$masuk->kode_p.'/'.$masuk->kode_asal.'/'.$masuk->jumlah.'/'.$masuk->golongan,'<i class="fa fa-check-circle" aria-hidden="true"></i> Terima
',['class'=>'btn btn-success btn-md change','onclick'=>'return confirm(\'Apakah yakin ingin menerima ?\')'])?>
											<?=anchor('Permintaan_Darah/tolak/'.$masuk->kode_p,'<i class="fa fa-times" aria-hidden="true"></i> Tolak
',['class'=>'btn btn-warning btn-md change','onclick'=>'return confirm(\'Apakah yakin ingin menolak ?\')'])?>
										</td>
									</tr>
									<?php endforeach;
									} ?>
							</tbody>
						</table>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</body>
</html>
