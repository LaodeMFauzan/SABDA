<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('layout/head_admin') ?>
	<body class="full-frame">
		<div class="container-fluid">
			<?php $this->load->view('layout/menu_admin') ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<h1>Data User SABDA</h1>
					<table class="table-responsive table table-hover " id="myTable">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama RS</th>
								<th>Email RS</th>
								<th>Password</th>
								<th>Kode RS</th>
								<th><?=anchor('admin/Users/create','Tambah',['class'=>'btn btn-primary']) ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($user as $User): ?>
								<tr>
									<td><?=$User->id?></td>
									<td><?=$User->nama?></td>
									<td><?=$User->email?></td>
									<td><?=$User->password?></td>
									<td><?=$User->kode_rs?></td>
									<td>
										<?=anchor('admin/Users/update/'.$User->id,'Ubah',['class'=>'btn btn-info btn-md'])?>

										<?=anchor('admin/Users/delete/'.$User->id,'Hapus',['class'=>'btn btn-danger btn-md','onclick'=>'return confirm(\'Are you sure to delete this item?\')'])?>
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
