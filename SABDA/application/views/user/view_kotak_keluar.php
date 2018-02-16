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
						<h1>Permintaan Keluar</h1>
						<table class="table-responsive table table-bordered table-hover" id="myTableUser">
							<thead>
								<tr>
									<th>Nama Rumah Sakit</th>
									<th>Golongan</th>
									<th>Jumlah</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($kotak_keluar as $keluar): ?>
									<tr>
										<td><?=$keluar->nama?></td>
										<td><?=$keluar->golongan?></td>
										<td><?=$keluar->jumlah?></td>
										<td><?=$keluar->status?></td>
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
