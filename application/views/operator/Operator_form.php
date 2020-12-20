<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box">
            <div class="box-header bg-green">
                <h3 class="box-title"><?= $button;?> Operator</h3>
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
                    <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" name="id_operator" id="id_operator"
                            placeholder="Id Operator" value="<?php echo $id_operator; ?>" />
                        <label for="varchar">Nik <?php echo form_error('nik') ?></label>
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik"
                            value="<?php echo $nik; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Nama Lengkap<?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"
                            value="<?php echo $nama; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Nomor Kontak <?php echo form_error('no_kontak') ?></label>
                        <input type="text" class="form-control" name="no_kontak" id="no_kontak" placeholder="No Kontak"
                            value="<?php echo $no_kontak; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Email <?php echo form_error('email') ?></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                            value="<?php echo $email; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Tugas Pokok <?php echo form_error('tugas_pokok') ?></label>
                        <input type="text" class="form-control" name="tugas_pokok" id="tugas_pokok"
                            placeholder="Tugas Pokok" value="<?php echo $tugas_pokok; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Foto/Gambar <?php echo form_error('image') ?></label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="Image"
                            value="<?php echo $image; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                        <a href="<?php echo site_url('operator') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>