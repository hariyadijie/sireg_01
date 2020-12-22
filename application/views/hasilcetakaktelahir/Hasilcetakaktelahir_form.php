<div class="row">
  <div class="col-xs-12 col-md-12">
    <div class="box">
      <div class="box-header bg-olive">
        <h3 class="box-title"><?= $button;?> Hasil Cetak Akte Kelahiran</h3>
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
            <label for="varchar">Nama Lengkap Anak <?php echo form_error('nama_anak') ?></label>
            <input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak"
              value="<?php echo $nama_anak; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah"
              value="<?php echo $nama_ayah; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu"
              value="<?php echo $nama_ibu; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan"
              value="<?php echo $kecamatan; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Desa/Lurah <?php echo form_error('desalurah') ?></label>
            <input type="text" class="form-control" name="desalurah" id="desalurah" placeholder="Desalurah"
              value="<?php echo $desalurah; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nomor Akte Lahir <?php echo form_error('no_aktelahir') ?></label>
            <input type="text" class="form-control" name="no_aktelahir" id="no_aktelahir" placeholder="No Aktelahir"
              value="<?php echo $no_aktelahir; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="date">Tanggal Cetak <?php echo form_error('tgl_cetak') ?></label>
            <input type="text" class="form-control" name="tgl_cetak" id="tgl_cetak" placeholder="Tgl Cetak"
              value="<?php echo $tgl_cetak; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Petugas Resepsionis <?php echo form_error('petugas_resepsionis') ?></label>
            <input type="text" class="form-control" name="petugas_resepsionis" id="petugas_resepsionis"
              placeholder="Petugas Resepsionis" value="<?php echo $petugas_resepsionis; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Petugas Operator <?php echo form_error('petugas_operator') ?></label>
            <input type="text" class="form-control" name="petugas_operator" id="petugas_operator"
              placeholder="Petugas Operator" value="<?php echo $petugas_operator; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Petugas Register <?php echo form_error('petugas_register') ?></label>
            <input type="text" class="form-control" name="petugas_register" id="petugas_register"
              placeholder="Petugas Register" value="<?php echo $petugas_register; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Pengguna <?php echo form_error('nama_pengguna') ?></label>
            <input type="text" class="form-control" name="nama_pengguna" id="nama_pengguna" placeholder="Nama Pengguna"
              value="<?php echo $nama_pengguna; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"
              value="<?php echo $keterangan; ?>" />
          </div>
          <div class="form-group col-md-6">
            <br>
            <input type="hidden" name="id_aktalahir" value="<?php echo $id_aktalahir; ?>" />
            <button type="submit" class="btn btn-success"><?php echo $button ?></button>
            <a href="<?php echo site_url('hasilcetakaktelahir') ?>" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>