<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('layout/head_admin') ?>
	<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_admin') ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<h1>Data Stok Darah Rumah Sakit</h1>
					<table class="table-responsive table table-hover " id="myTable">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Kode RS</th>
								<th>Golongan</th>
								<th>Jumlah</th>
								<th><?=anchor('admin/Stok/create','Tambah',['class'=>'btn btn-primary']) ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($stok as $Stok): ?>
								<tr>
									<td><?=$Stok->kode?></td>
									<td><?=$Stok->kode_rs?></td>
									<td><?=$Stok->golongan?></td>
									<td><?=$Stok->jumlah?></td>
									<td>
										<?=anchor('admin/Stok/update/'.$Stok->kode,'Ubah',['class'=>'btn btn-info btn-md'])?>

										<?=anchor('admin/Stok/delete/'.$Stok->kode,'Hapus',['class'=>'btn btn-danger  btn-md','onclick'=>'return confirm(\'Are you sure to delete this item?\')'])?>
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
