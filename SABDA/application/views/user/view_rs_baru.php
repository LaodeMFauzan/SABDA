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
						<h1>Data Rumah Sakit Bersangkutan Belum Lengkap,Harap cari rumah sakit lain</h1>
						<?=anchor('Rumah_Sakit/','Cari RS Lain',['class'=>'btn btn-primary btn-md'])?>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</body>
</html>
