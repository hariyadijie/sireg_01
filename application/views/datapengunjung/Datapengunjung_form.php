<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Data Pengunjung Disdukcapil Kab. Bantaeng</h3>
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
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="int">Id Datapengunjung <?php echo form_error('id_datapengunjung') ?></label>
                        <input type="text" class="form-control" name="id_datapengunjung" id="id_datapengunjung"
                            placeholder="Id Datapengunjung" value="<?php echo $id_datapengunjung; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                            placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Desalurah <?php echo form_error('desalurah') ?></label>
                        <input type="text" class="form-control" name="desalurah" id="desalurah" placeholder="Desalurah"
                            value="<?php echo $desalurah; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"
                            value="<?php echo $alamat; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="jenis_pengurusan">Jenis Pengurusan
                            <?php echo form_error('jenis_pengurusan') ?></label>
                        <textarea class="form-control" rows="3" name="jenis_pengurusan" id="jenis_pengurusan"
                            placeholder="Jenis Pengurusan"><?php echo $jenis_pengurusan; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Tgl Input Resepsionis
                            <?php echo form_error('tgl_input_resepsionis') ?></label>
                        <input type="text" class="form-control" name="tgl_input_resepsionis" id="tgl_input_resepsionis"
                            placeholder="Tgl Input Resepsionis" value="<?php echo $tgl_input_resepsionis; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tgl Edit Operator <?php echo form_error('tgl_edit_operator') ?></label>
                        <input type="text" class="form-control" name="tgl_edit_operator" id="tgl_edit_operator"
                            placeholder="Tgl Edit Operator" value="<?php echo $tgl_edit_operator; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tgl Edit Registercetak
                            <?php echo form_error('tgl_edit_registercetak') ?></label>
                        <input type="text" class="form-control" name="tgl_edit_registercetak"
                            id="tgl_edit_registercetak" placeholder="Tgl Edit Registercetak"
                            value="<?php echo $tgl_edit_registercetak; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nomor Antrian <?php echo form_error('nomor_antrian') ?></label>
                        <input type="text" class="form-control" name="nomor_antrian" id="nomor_antrian"
                            placeholder="Nomor Antrian" value="<?php echo $nomor_antrian; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama Pengurus <?php echo form_error('nama_pengurus') ?></label>
                        <input type="text" class="form-control" name="nama_pengurus" id="nama_pengurus"
                            placeholder="Nama Pengurus" value="<?php echo $nama_pengurus; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Status Hub Pengurus <?php echo form_error('status_hub_pengurus') ?></label>
                        <input type="text" class="form-control" name="status_hub_pengurus" id="status_hub_pengurus"
                            placeholder="Status Hub Pengurus" value="<?php echo $status_hub_pengurus; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Status Berkas <?php echo form_error('status_berkas') ?></label>
                        <input type="text" class="form-control" name="status_berkas" id="status_berkas"
                            placeholder="Status Berkas" value="<?php echo $status_berkas; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nomor Kontak Pengunjung
                            <?php echo form_error('nomor_kontak_pengunjung') ?></label>
                        <input type="text" class="form-control" name="nomor_kontak_pengunjung"
                            id="nomor_kontak_pengunjung" placeholder="Nomor Kontak Pengunjung"
                            value="<?php echo $nomor_kontak_pengunjung; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama Pengambil Dokumen
                            <?php echo form_error('nama_pengambil_dokumen') ?></label>
                        <input type="text" class="form-control" name="nama_pengambil_dokumen"
                            id="nama_pengambil_dokumen" placeholder="Nama Pengambil Dokumen"
                            value="<?php echo $nama_pengambil_dokumen; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tgl Pengambilan <?php echo form_error('tgl_pengambilan') ?></label>
                        <input type="text" class="form-control" name="tgl_pengambilan" id="tgl_pengambilan"
                            placeholder="Tgl Pengambilan" value="<?php echo $tgl_pengambilan; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">User Resepsionis <?php echo form_error('user_resepsionis') ?></label>
                        <input type="text" class="form-control" name="user_resepsionis" id="user_resepsionis"
                            placeholder="User Resepsionis" value="<?php echo $user_resepsionis; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">User Operator <?php echo form_error('user_operator') ?></label>
                        <input type="text" class="form-control" name="user_operator" id="user_operator"
                            placeholder="User Operator" value="<?php echo $user_operator; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">User Cetak <?php echo form_error('user_cetak') ?></label>
                        <input type="text" class="form-control" name="user_cetak" id="user_cetak"
                            placeholder="User Cetak" value="<?php echo $user_cetak; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">User Pengambilan <?php echo form_error('user_pengambilan') ?></label>
                        <input type="text" class="form-control" name="user_pengambilan" id="user_pengambilan"
                            placeholder="User Pengambilan" value="<?php echo $user_pengambilan; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan"
                            placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
                    </div>
                    <input type="hidden" name="nik" value="<?php echo $nik; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('datapengunjung') ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>