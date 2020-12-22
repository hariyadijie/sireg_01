<div class="row">
  <div class="col-xs-12 col-md-12">
    <div class="box">
      <div class="box-header bg-olive">
        <h3 class="box-title">Detail Hasil Cetak/Register <strong> <?= strtoupper($nama); ?></strong></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-responsive table-hover">
          <tr>
            <td>Nomor</td>
            <td><?php echo $id_cetak; ?></td>
          </tr>
          <tr>
            <td>Nomor Induk Kependudukan</td>
            <td><?php echo $nik; ?></td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td><?php echo $nama; ?></td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td><?php echo $kec; ?></td>
          </tr>
          <tr>
            <td>Tanggal Cetak</td>
            <td><?php echo $tgl_cetak; ?></td>
          </tr>
          <tr>
            <td>Hasil Cetak</td>
            <td><?php echo $hasil_cetak; ?></td>
          </tr>
          <tr>
            <td>Status Cetak</td>
            <td><?php echo $status_cetak; ?></td>
          </tr>
          <tr>
            <td>Jenis Blanko</td>
            <td><?php echo $jns_blanko; ?></td>
          </tr>
          <tr>
            <td>Alasan Cetak</td>
            <td><?php echo $alasan_cetak; ?></td>
          </tr>
          <tr>
            <td>Hasil Blanko</td>
            <td><?php echo $hsl_blanko; ?></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><?php echo $ket; ?></td>
          </tr>
          <tr>
            <td>Catatan Tambahan</td>
            <td><?php echo $catatan; ?></td>
          </tr>
          <tr>
            <td><a href="<?php echo site_url('hasilcetak') ?>" class="btn bg-red">Kembali</a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>