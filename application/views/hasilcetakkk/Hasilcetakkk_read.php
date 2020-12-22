<div class="row">
  <div class="col-xs-12 col-md-12">
    <div class="box">
      <div class="box-header bg-olive">
        <h3 class="box-title">Detail Hasil Cetak Kartu Keluarga <strong><?php echo $nama; ?></strong></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-responsive">
          <tr>
            <td>Nik</td>
            <td><?php echo $nik; ?></td>
          </tr>
          <tr>
            <td>Nokk</td>
            <td><?php echo $nokk; ?></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td><?php echo $nama; ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><?php echo $alamat; ?></td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td><?php echo $kecamatan; ?></td>
          </tr>
          <tr>
            <td>Desalurah</td>
            <td><?php echo $desalurah; ?></td>
          </tr>
          <tr>
            <td>Tgl Cetak</td>
            <td><?php echo $tgl_cetak; ?></td>
          </tr>
          <tr>
            <td>Nama Register</td>
            <td><?php echo $nama_register; ?></td>
          </tr>
          <tr>
            <td>Nama Operator</td>
            <td><?php echo $nama_operator; ?></td>
          </tr>
          <tr>
            <td>Status Cetak</td>
            <td><?php echo $status_cetak; ?></td>
          </tr>
          <tr>
            <td>Alasan Cetak</td>
            <td><?php echo $alasan_cetak; ?></td>
          </tr>
          <tr>
            <td>Nama Pengurus</td>
            <td><?php echo $nama_pengurus; ?></td>
          </tr>
          <tr>
            <td>Ket</td>
            <td><?php echo $ket; ?></td>
          </tr>
          <tr>
            <td>Catatan</td>
            <td><?php echo $catatan; ?></td>
          </tr>
          <tr>
            <td><a href="<?php echo site_url('hasilcetakkk') ?>" class="btn bg-purple">Cancel</a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>