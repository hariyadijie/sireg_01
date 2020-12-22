<div class="row">
  <div class="col-xs-12 col-md-6">
    <div class="box">
      <div class="box-header bg-green">
        <h3 class="box-title"> Detail Hasil Register Konsolidasi <strong> <?= strtoupper($nama_lengkap); ?></strong>
        </h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table">
          <tr>
            <td>Nomor ID</td>
            <td><strong>
                <?php echo $no_id; ?></strong></strong></td>
          </tr>
          <tr>
            <td>Nomor Induk Kependudukan</td>
            <td><strong><?php echo $nik; ?></strong></td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td><strong><?php echo $nama_lengkap; ?></strong></td>
          </tr>
          <tr>
            <td>Nomor Kartu Keluarga</td>
            <td><strong><?php echo $no_kk; ?></strong></td>
          </tr>
          <tr>
            <td>Kabupaten/Kota</td>
            <td><strong><?php echo $kabkota; ?></strong></td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td><strong><?php echo $kecamatan; ?></strong></td>
          </tr>
          <tr>
            <td>Desa/Lurah</td>
            <td><strong><?php echo $desalurah; ?></strong></td>
          </tr>
          <tr>
            <td>Permasalahan</td>
            <td><strong><?php echo $permasalahan; ?></strong></td>
          </tr>
          <tr>
            <td>Status DWH</td>
            <td><strong><?php echo $status_dwh; ?></strong></td>
          </tr>
          <tr>
            <td>Tanggal Register</td>
            <td><strong><?php echo $tgl_register; ?></strong></td>
          </tr>
          <tr>
            <td>Nama Register</td>
            <td><strong><?php echo $nama_register; ?></strong></td>
          </tr>
          <tr>
            <td>Nama Resepsionis</td>
            <td><strong><?php echo $nama_resepsionis; ?></strong></td>
          </tr>
          <tr>
            <td>Nama Pengguna</td>
            <td><strong><?php echo $nama_pengguna; ?></strong></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><strong><?php echo $keterangan; ?></strong></td>
          </tr>
          <tr>
            <td><br><a href="<?php echo site_url('hasilregisterkonsolidasi') ?>" class="btn bg-purple">Kembali</a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>