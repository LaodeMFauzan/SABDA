<!DOCTYPE html>
<html>
	<?php $this->load->view('layout/head_user') ?>
<body class="full-frame">
	<div class="container-fluid">
		<?php $this->load->view('layout/menu_user') ?>
		<div class="row">
			<div class="main-frame">
				<h1 style="margin-top: 5px;">Permintaan Darah</h1>
				<h2></h2>
				<p style="text-align: left">Halaman ini bukan digunakan untuk melakukan permintaan kantung darah.
					jika ingin melakukan permintaan darah silahkan klik menu Mitra Sabda di menubar
					atau melalui halaman Home SABDA. Bacalah ketentuan di bawah sebelum pergi ke halaman selanjutnya.
				</p>
				<ul style="text-align: left">
					<li> Anda bisa menerima permintaan kantung darah jika jumlah kantung darah anda setelah dikurangi dengan permintaan berjumlah lebih besar atau sama dengan 5. Selain itu tidak bisa.</li>
					<li>Berhati-hati dalam melakukan penolakan ataupun penerimaan permintan kantung darah</li>
				</ul>
				<?=anchor('Permintaan_Darah/get_kotak_masuk','<span class="glyphicon glyphicon-inbox"></span> Kotak Masuk',['class'=>'btn btn-info choice'])?>
				<?=anchor('Permintaan_Darah/get_kotak_keluar','<span class="glyphicon glyphicon-envelope"></span> Kotak Keluar',['class'=>'btn btn-success choice'])?>
			</div>
		</div>
	</div>
</body>
</html>