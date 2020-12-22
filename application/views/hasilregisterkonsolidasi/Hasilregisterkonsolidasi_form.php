<div class="row">
  <div class="col-xs-12 col-md-12">
    <div class="box">
      <div class="box-header bg-olive">
        <h3 class="box-title"><?= $button;?> Hasil Register Konsolidasi</h3>
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
            <label for="varchar">No ID <?php echo form_error('no_id') ?></label>
            <input type="text" class="form-control" name="no_id" id="no_id" placeholder="No Id" value="DWH-000" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">NIK <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"
              value="<?php echo $nama_lengkap; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">No Kartu Keluarga <?php echo form_error('no_kk') ?></label>
            <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk"
              value="<?php echo $no_kk; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Kabupaten/Kota <?php echo form_error('kabkota') ?></label>
            <input type="text" class="form-control" name="kabkota" id="kabkota" placeholder="Kabkota" value="Bantaeng"
              readonly />
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
            <label for="permasalahan">Permasalahan <?php echo form_error('permasalahan') ?></label>
            <textarea class="form-control" rows="3" name="permasalahan" id="permasalahan"
              placeholder="Permasalahan"><?php echo $permasalahan; ?></textarea>
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Status DWH <?php echo form_error('status_dwh') ?></label>
            <input type="text" class="form-control" name="status_dwh" id="status_dwh" placeholder="Status Dwh"
              value="<?php echo $status_dwh; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="date">Tanggal Register <?php echo form_error('tgl_register') ?></label>
            <input type="date" class="form-control" name="tgl_register" id="tgl_register" placeholder="Tgl Register"
              value="<?php echo $tgl_register; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Register <?php echo form_error('nama_register') ?></label>
            <input type="text" class="form-control" name="nama_register" id="nama_register" placeholder="Nama Register"
              value="<?php echo $nama_register; ?>" />
          </div>
          <div class="form-group col-md-6">
            <label for="varchar">Nama Resepsionis <?php echo form_error('nama_resepsionis') ?></label>
            <input type="text" class="form-control" name="nama_resepsionis" id="nama_resepsionis"
              placeholder="Nama Resepsionis" value="<?php echo $nama_resepsionis; ?>" />
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
          <input type="hidden" name="id_konsolidasi" value="<?php echo $id_konsolidasi; ?>" />
          <button type="submit" class="btn btn-success"><?php echo $button ?></button>
          <a href="<?php echo site_url('hasilregisterkonsolidasi') ?>" class="btn btn-danger">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>