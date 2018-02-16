<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('layout/head_admin') ?>
	<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_admin') ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<h1>Data Rumah Sakit Mitra</h1>
					<table class="table-responsive table table-hover " id="myTable">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Nama RS</th>
								<th>Alamat RS</th>
								<th>Gambar RS</th>
								<th><?=anchor('admin/RS/create','Tambah',['class'=>'btn btn-primary']) ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rs as $RS): ?>
								<tr>
									<td><?=$RS->kode?></td>
									<td><?=$RS->nama?></td>
									<td><?=$RS->alamat?></td>
									<td><?php
											$foto=['src'=>'uploads/'.$RS->foto,'width'=>250,'height'=>150];
											echo img($foto);
										?></td>
									<td>
										<?=anchor('admin/RS/update/'.$RS->kode,'Ubah',['class'=>'btn btn-info btn-sm btn-block'])?>

										<?=anchor('admin/RS/delete/'.$RS->kode,'Hapus',['class'=>'btn btn-danger  btn-block btn-sm','onclick'=>'return confirm(\'Are you sure to delete this item?\')'])?>
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
