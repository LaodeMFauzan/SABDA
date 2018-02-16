<!DOCTYPE html>
<html>
	<?php $this->load->view('layout/head_user') ?>
<body class="full-frame">
	<div class="container-fluid">
		<?php $this->load->view('layout/menu_user') ?>
		<div class="row">
			<div class="main-frame">
				<h1 id="title-home">SABDA</h1>
				<h2>Sistem Informasi Bank Darah</h2>
				<?=anchor('Stok_Darah/','<i class="fa fa-tint" aria-hidden="true"></i>
 Stok Darah',['class'=>'btn btn-primary choice'])?>
				<?=anchor('Rumah_Sakit/','<i class="fa fa-plus-square" aria-hidden="true"></i>
 Butuh Darah',['class'=>'btn btn-info choice'])?>
			</div>
		</div>
	</div>
</body>
</html>