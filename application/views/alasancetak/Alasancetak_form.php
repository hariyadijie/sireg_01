<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Alasan Cetak</h3>
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
                        <label for="int">Id Alasancetak <?php echo form_error('id_alasancetak') ?></label>
                        <input type="text" class="form-control" name="id_alasancetak" id="id_alasancetak"
                            placeholder="Id Alasancetak" value="<?php echo $id_alasancetak; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Alasancetak <?php echo form_error('alasancetak') ?></label>
                        <input type="text" class="form-control" name="alasancetak" id="alasancetak"
                            placeholder="Alasancetak" value="<?php echo $alasancetak; ?>" />
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('alasancetak') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>