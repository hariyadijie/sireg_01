<div class="row">
  <div class="col-xs-12 col-md-12">
    <div class="box">
      <div class="box-header bg-olive">
        <h3 class="box-title"><?= $button;?> Hasil Cetak/Register Kartu Keluarga</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
          <div class="form-group col-md-6">
            <label for="varchar">NIK <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">No Kartu Keluarga <?php echo form_error('nokk') ?></label>
            <input type="text" class="form-control" name="nokk" id="nokk" placeholder="Nokk"
              value="<?php echo $nokk; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="int">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"
              value="<?php echo $nama; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"
              value="<?php echo $alamat; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="int">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan"
              value="<?php echo $kecamatan; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="int">Desa/Lurah <?php echo form_error('desalurah') ?></label>
            <input type="text" class="form-control" name="desalurah" id="desalurah" placeholder="Desalurah"
              value="<?php echo $desalurah; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="date">Tanggal Cetak <?php echo form_error('tgl_cetak') ?></label>
            <input type="text" class="form-control" name="tgl_cetak" id="tgl_cetak" placeholder="Tgl Cetak"
              value="<?php echo $tgl_cetak; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Register <?php echo form_error('nama_register') ?></label>
            <input type="text" class="form-control" name="nama_register" id="nama_register" placeholder="Nama Register"
              value="<?php echo $nama_register; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Operator <?php echo form_error('nama_operator') ?></label>
            <input type="text" class="form-control" name="nama_operator" id="nama_operator" placeholder="Nama Operator"
              value="<?php echo $nama_operator; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Status Cetak <?php echo form_error('status_cetak') ?></label>
            <input type="text" class="form-control" name="status_cetak" id="status_cetak" placeholder="Status Cetak"
              value="<?php echo $status_cetak; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Alasan Cetak <?php echo form_error('alasan_cetak') ?></label>
            <input type="text" class="form-control" name="alasan_cetak" id="alasan_cetak" placeholder="Alasan Cetak"
              value="<?php echo $alasan_cetak; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Pengurus <?php echo form_error('nama_pengurus') ?></label>
            <input type="text" class="form-control" name="nama_pengurus" id="nama_pengurus" placeholder="Nama Pengurus"
              value="<?php echo $nama_pengurus; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="ket">Keterangan <?php echo form_error('ket') ?></label>
            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
          </div>
          <div class="form-group col-md-6">
            <label for="catatan">Catatan <?php echo form_error('catatan') ?></label>
            <textarea class="form-control" rows="3" name="catatan" id="catatan"
              placeholder="Catatan"><?php echo $catatan; ?></textarea>
          </div>
          <div class="form-group col-md-6">
            <input type="hidden" name="id_hasilcetakkk" value="<?php echo $id_hasilcetakkk; ?>" />
            <button type="submit" class="btn btn-success"><?php echo $button ?></button>
            <a href="<?php echo site_url('hasilcetakkk') ?>" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>