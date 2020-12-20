<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Data Pengunjung</h3>
                <!-- <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-header bg-olive">
                <h3 class="box-title"> Data Pribadi</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" name="id_datapengunjung" id="id_datapengunjung"
                            placeholder="Id Datapengunjung" value="<?php echo $id_datapengunjung; ?>" />
                        <div>
                            <label for="text">Nik <?php echo form_error('nik') ?></label>
                        </div>
                        <div class="col-md-10 pull-left">
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik"
                                value="<?php echo $nik; ?>" />
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-block" id="btn-search">Cari</button>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="text">Nomor Kartu Keluarga <?php echo form_error('no_kk') ?></label>
                        <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk"
                            value="<?php echo $no_kk; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="text">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                        <div class="col-md-12 pull-left">
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="text">Alamat <?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"
                            value="<?php echo $alamat; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="text">Kecamatan <?php echo form_error('kecamatan') ?></label>
                        <div class="col-md-12 pull-left">
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan"
                                placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="text">Desa/Kelurahan <?php echo form_error('desalurah') ?></label>
                        <input type="text" class="form-control" name="desalurah" id="desalurah" placeholder="Desalurah"
                            value="<?php echo $desalurah; ?>" />
                    </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header bg-olive">
                <h3 class="box-title"> Data Pelayanan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group  col-md-6">
                    <label for="text">Jenis Pengurusan <?php echo form_error('jenis_pengurusan') ?></label>
                    <select class="form-control selectpicker" multiple="multiple" data-placeholder="Pilih Pengurusan"
                        style="width: 100%;" name="jenis_pengurusan" id="jenis_pengurusan" data-live-search="true"
                        data-selected="1,2" onchange="getval(this)">
                        <?php 
                            foreach ($pengurusan as $key => $val) {
                                echo "<option value=\"$val->id_jenispengurusan\">$val->jenis_pengurusan</option>";
                            }
                            ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="jenis_pengurusan" id="jenis_pengurusan"
                        placeholder="Jenis Pengurusan" value="<?php echo $jenis_pengurusan; ?>" /> -->
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Tanggal Input Resepsionis
                        <?php echo form_error('tgl_input_resepsionis') ?></label>
                    <input class="form-control" name="tgl_input_resepsionis" id="tgl_input_resepsionis"
                        placeholder="Tgl Input Resepsionis" value="<?php echo date("d-m-Y"); ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Tanggal Edit Operator <?php echo form_error('tgl_edit_operator') ?></label>
                    <input type="date" class="form-control" name="tgl_edit_operator" id="tgl_edit_operator"
                        placeholder="Tgl Edit Operator" value="<?php echo $tgl_edit_operator; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Tanggal Edit Register Cetak
                        <?php echo form_error('tgl_edit_registercetak') ?></label>
                    <input type="date" class="form-control" name="tgl_edit_registercetak" id="tgl_edit_registercetak"
                        placeholder="Tgl Edit Registercetak" value="<?php echo $tgl_edit_registercetak; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Nomor Antrian <?php echo form_error('nomor_antrian') ?></label>
                    <input type="text" class="form-control" name="nomor_antrian" id="nomor_antrian"
                        placeholder="Nomor Antrian" value="<?php echo $nomor_antrian; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Nama Pengurus <?php echo form_error('nama_pengurus') ?></label>
                    <input type="text" class="form-control" name="nama_pengurus" id="nama_pengurus"
                        placeholder="Nama Pengurus" value="<?php echo $nama_pengurus; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Status Hub Pengurus
                        <?php echo form_error('status_hub_pengurus') ?></label>
                    <select class="form-control" style="text-transform: uppercase" name="status_hub_pengurus"
                        id="status_hub_pengurus" required>
                        <option value="">Pilih status hub pengurus</option>
                        <?php foreach($statushubpengurus as $row):?>
                        <option value="<?php echo $row->id_statushubpengurus;?>">
                            <?php echo $row->status_hub_pengurus;?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Status Berkas <?php echo form_error('status_berkas') ?></label>
                    <select class="form-control" style="text-transform: uppercase" name="status_berkas"
                        id="status_berkas" required>
                        <option value="">Pilih status Berkas</option>
                        <?php foreach($statusdokumen as $row):?>
                        <option value="<?php echo $row->id_statusdokumen;?>"><?php echo $row->statusdokumen;?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Nomor Kontak Pengunjung
                        <?php echo form_error('nomor_kontak_pengunjung') ?></label>
                    <input type="text" class="form-control" name="nomor_kontak_pengunjung" id="nomor_kontak_pengunjung"
                        placeholder="Nomor Kontak Pengunjung" value="<?php echo $nomor_kontak_pengunjung; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Nama Pengambil Dokumen
                        <?php echo form_error('nama_pengambil_dokumen') ?></label>
                    <input type="text" class="form-control" name="nama_pengambil_dokumen" id="nama_pengambil_dokumen"
                        placeholder="Nama Pengambil Dokumen" value="<?php echo $nama_pengambil_dokumen; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Tanggal Pengambilan <?php echo form_error('tgl_pengambilan') ?></label>
                    <input type="date" class="form-control" name="tgl_pengambilan" id="tgl_pengambilan"
                        placeholder="Tgl Pengambilan" value="<?php echo $tgl_pengambilan; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Petugas Resepsionis <?php echo form_error('user_resepsionis') ?></label>
                    <input type="text" class="form-control" name="user_resepsionis" id="user_resepsionis"
                        placeholder="Nama Petugas Resepsionis" value="<?php echo $user_resepsionis; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Petugas Operator <?php echo form_error('user_operator') ?></label>
                    <input type="text" class="form-control" name="user_operator" id="user_operator"
                        placeholder="Nama Petugas Operator" value="<?php echo $user_operator; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Petugas Pengambilan <?php echo form_error('user_pengambilan') ?></label>
                    <input type="text" class="form-control" name="user_pengambilan" id="user_pengambilan"
                        placeholder="Nama Petugas Pengambilan" value="<?php echo $user_pengambilan; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"
                        value="<?php echo $keterangan; ?>" />
                </div>
                <!-- <br>
                <br>
                <br>
                <br> -->
                <div class="form-group col-md-6">
                    <br>
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                    <a href="<?php echo site_url('datapengunjung') ?>" class="btn btn-danger">Batal</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>