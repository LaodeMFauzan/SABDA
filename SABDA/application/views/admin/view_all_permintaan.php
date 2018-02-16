<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('layout/head_admin') ?>
	<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_admin') ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<h1>Data Transaksi Darah SABDA</h1>
					<table class="table-responsive table table-hover " id="myTable">
						<thead>
							<tr>
								<th>Kode Permintaan</th>
								<th>Kode RS Asal</th>
								<th>Kode RS Tujuan</th>
								<th>Golongan Darah</th>
								<th>Jumlah</th>
								<th>Status</th>
								<th><?=anchor('admin/Permintaan/create','Tambah',['class'=>'btn btn-primary']) ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($permintaan as $pd): ?>
								<tr>
									<td><?=$pd->kode_p?></td>
									<td><?=$pd->kode_asal?></td>
									<td><?=$pd->kode_tujuan?></td>
									<td><?=$pd->golongan?></td>
									<td><?=$pd->jumlah?></td>
									<td><?=$pd->status?></td>
									<td>
										<?=anchor('admin/Permintaan/update/'.$pd->kode_p,'Ubah',['class'=>'btn btn-info btn-md'])?>
										<?=anchor('admin/Permintaan/delete/'.$pd->kode_p,'Hapus',['class'=>'btn btn-danger btn-md','onclick'=>'return confirm(\'Are you sure to delete this request?\')'])?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</body>
</html>
