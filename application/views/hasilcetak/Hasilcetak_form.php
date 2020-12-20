<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box">
            <div class="box-header bg-green">
                <h3 class="box-title"><?= $button;?> Register/Hasil Cetak KTP-El</h3>
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
                    <!-- <div class="form-group col-md-6">
                        <label for="int">Id Cetak <?php echo form_error('id_cetak') ?></label>
                    </div> -->
                    <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" name="id_cetak" id="id_cetak" placeholder="Id Cetak"
                            value="<?php echo $id_cetak; ?>" />
                        <label for="varchar">Nik <?php echo form_error('nik') ?></label>
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik"
                            value="<?php echo $nik; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Nama Lengkap <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" style="text-transform: uppercase" name="nama" id="nama"
                            placeholder="Nama" value="<?php echo $nama; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Kecamatan <?php echo form_error('kec') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="kec" id="kec" required>
                            <option value="">Pilih Kecamatan</option>
                            <?php foreach($kecamatan as $row):?>
                            <option value="<?php echo $row->nama_kecamatan;?>"><?php echo $row->nama_kecamatan;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date">Tanggal Cetak <?php echo form_error('tgl_cetak') ?></label>
                        <input type="date" class="form-control" name="tgl_cetak" id="tgl_cetak" placeholder="Tgl Cetak"
                            value="<?php echo $tgl_cetak; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Hasil Cetak <?php echo form_error('hasil_cetak') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="hasil_cetak"
                            id="hasil_cetak" required>
                            <option value="">Pilih Hasil Cetakan</option>
                            <?php foreach($hslcetak as $row):?>
                            <option value="<?php echo $row->hasilcetak;?>"><?php echo $row->hasilcetak;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Status Cetak <?php echo form_error('status_cetak') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="status_cetak"
                            id="status_cetak" required>
                            <option value="">Pilih Status Cetakan</option>
                            <?php foreach($statuscetak as $row):?>
                            <option value="<?php echo $row->statuscetak;?>"><?php echo $row->statuscetak;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Jenis Blanko <?php echo form_error('jns_blanko') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="jns_blanko" id="jns_blanko"
                            required>
                            <option value="">Pilih Jenis Blanko</option>
                            <?php foreach($jenisblanko as $row):?>
                            <option value="<?php echo $row->jenisblanko;?>"><?php echo $row->jenisblanko;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Alasan Cetak <?php echo form_error('alasan_cetak') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="alasan_cetak"
                            id="alasan_cetak" required>
                            <option value="">Pilih Alasan Cetak</option>
                            <?php foreach($alasancetak as $row):?>
                            <option value="<?php echo $row->alasancetak;?>"><?php echo $row->alasancetak;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Hasil Cetak Blanko <?php echo form_error('hsl_blanko') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="hsl_blanko" id="hsl_blanko"
                            required>
                            <option value="">Pilih Status Hasil Cetakan</option>
                            <?php foreach($statushasilktp as $row):?>
                            <option value="<?php echo $row->statushasilktp;?>"><?php echo $row->statushasilktp;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Keterangan <?php echo form_error('ket') ?></label>
                        <input type="text" class="form-control" style="text-transform: uppercase" name="ket" id="ket"
                            placeholder="Keterangan lain" value="<?php echo $ket; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Catatan Tambahan <?php echo form_error('catatan') ?></label>
                        <input type="text" class="form-control" style="text-transform: uppercase" name="catatan"
                            id="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <br>
                        <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                        <a href="<?php echo site_url('hasilcetak') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>