<div class="row">
  <div class="col-xs-12 col-md-6">
    <div class="box">
      <div class="box-header bg-olive">
        <h3 class="box-title">Detail Hasil Cetak KIA <strong><?php echo $nama_anak; ?></strong></h3>
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
            <td>Nik</td>
            <td><?php echo $nik; ?></td>
          </tr>
          <tr>
            <td>Nama Anak</td>
            <td><?php echo $nama_anak; ?></td>
          </tr>
          <tr>
            <td>Nama Ayah</td>
            <td><?php echo $nama_ayah; ?></td>
          </tr>
          <tr>
            <td>Nama Ibu</td>
            <td><?php echo $nama_ibu; ?></td>
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
            <td>Petugas Resepsionis</td>
            <td><?php echo $petugas_resepsionis; ?></td>
          </tr>
          <tr>
            <td>Petugas Operator</td>
            <td><?php echo $petugas_operator; ?></td>
          </tr>
          <tr>
            <td>Petugas Register</td>
            <td><?php echo $petugas_register; ?></td>
          </tr>
          <tr>
            <td>Nama Pengguna</td>
            <td><?php echo $nama_pengguna; ?></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><?php echo $keterangan; ?></td>
          </tr>
          <tr>
            <td><a href="<?php echo site_url('hasilcetakkia') ?>" class="btn bg-purple">Cancel</a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>