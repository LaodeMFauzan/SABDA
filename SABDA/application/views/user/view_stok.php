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
						<h1>Stok Darah Rumah Sakit</h1>
						<table class="table-responsive table table-bordered table-hover" id="myTableUser">
							<thead>
								<tr>
									<th>Golongan</th>
									<th>Jumlah</th>
									<th>Update Data Stok</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($stok as $Stok): ?>
									<tr>
										<td><?=$Stok->golongan?></td>
										<td><?=$Stok->jumlah?></td>
										<td>
											<?=anchor('Stok_Darah/update/'.$Stok->kode,'Ubah Jumlah',['class'=>'btn btn-info btn-md change'])?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</body>
</html>
