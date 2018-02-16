<!DOCTYPE html>
<html>
  <?php $this->load->view('layout/head_user') ?>
<body class="full-frame">
  <div class="container-fluid">
    <?php $this->load->view('layout/menu_user') ?>
    <div class="row frame-rs">
    <?php foreach ($rs as $rumah_sakit): 
    if($rumah_sakit->kode==$this->session->userdata('kode_rs'))continue; ?>
       <div class="col-md-4">
        <div class="thumbnail">
          <h3 align="center" style="min-height: 10px;"><?=$rumah_sakit->nama ?></h3>
          <?=img([
          'src' => 'uploads/'.$rumah_sakit->foto,
          'style'=>'max-width:100%; max-height:100%; height:150px;']) ?>
          <div class="caption">
            <!-- h3 style="min-height: 20px;"><?=$product->name ?></h3-->
            <p><?= $rumah_sakit->alamat ?></p>
            <p>
           
            <?=anchor('Rumah_Sakit/get_profile/'.$rumah_sakit->kode,'Lihat Profil',['class'=>'btn btn-primary',
            		'role'=> 'button']) ?>
           <?=anchor('Permintaan_Darah/request/'.$rumah_sakit->kode,'Minta Kantung Darah',['class'=>'btn btn-info btn-md'])?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  <!--end loop-->
</div>
</body>
</html>