<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Desa lurah</h3>
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
                        <!-- <label for="int">Id Desalurah <?php echo form_error('id_desalurah') ?></label> -->
                        <input type="hidden" class="form-control" name="id_desalurah" id="id_desalurah"
                            placeholder="Id Desalurah" value="<?php echo $id_desalurah; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Nama Desa/lurah <?php echo form_error('nama_desalurah') ?></label>
                        <input type="text" class="form-control" name="nama_desalurah" id="nama_desalurah"
                            placeholder="Nama Desa/lurah" value="<?php echo $nama_desalurah; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="id_kecamatan" id="kecamatan" required>
                            <option value="">Pilih Kecamatan</option>
                            <?php foreach($kecamatan as $row):?>
                            <option value="<?php echo $row->id_kec;?>"><?php echo $row->nama_kecamatan;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('desalurah') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>