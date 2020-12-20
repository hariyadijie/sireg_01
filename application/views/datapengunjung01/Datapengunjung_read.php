<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pengunjung Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>Id Datapengunjung</td>
                        <td><?php echo $id_datapengunjung; ?></td>
                    </tr>
                    <tr>
                        <td>Nik</td>
                        <td><?php echo $nik; ?></td>
                    </tr>
                    <tr>
                        <td>No Kk</td>
                        <td><?php echo $no_kk; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?php echo $nama_lengkap; ?></td>
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
                        <td>Alamat</td>
                        <td><?php echo $alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Pengurusan</td>
                        <td><?php echo $jenis_pengurusan; ?></td>
                    </tr>
                    <tr>
                        <td>Tgl Input Resepsionis</td>
                        <td><?php echo $tgl_input_resepsionis; ?></td>
                    </tr>
                    <tr>
                        <td>Tgl Edit Operator</td>
                        <td><?php echo $tgl_edit_operator; ?></td>
                    </tr>
                    <tr>
                        <td>Tgl Edit Registercetak</td>
                        <td><?php echo $tgl_edit_registercetak; ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Antrian</td>
                        <td><?php echo $nomor_antrian; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pengurus</td>
                        <td><?php echo $nama_pengurus; ?></td>
                    </tr>
                    <tr>
                        <td>Status Hub Pengurus</td>
                        <td><?php echo $status_hub_pengurus; ?></td>
                    </tr>
                    <tr>
                        <td>Status Berkas</td>
                        <td><?php echo $status_berkas; ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Kontak Pengunjung</td>
                        <td><?php echo $nomor_kontak_pengunjung; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pengambil Dokumen</td>
                        <td><?php echo $nama_pengambil_dokumen; ?></td>
                    </tr>
                    <tr>
                        <td>Tgl Pengambilan</td>
                        <td><?php echo $tgl_pengambilan; ?></td>
                    </tr>
                    <tr>
                        <td>User Resepsionis</td>
                        <td><?php echo $user_resepsionis; ?></td>
                    </tr>
                    <tr>
                        <td>User Operator</td>
                        <td><?php echo $user_operator; ?></td>
                    </tr>
                    <tr>
                        <td>User Pengambilan</td>
                        <td><?php echo $user_pengambilan; ?></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><?php echo $keterangan; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('datapengunjung') ?>" class="btn bg-red">Batal</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>