<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Agama</h3>
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
                        <label for="int">Id Agama <?php echo form_error('id_agama') ?></label>
                        <input type="text" class="form-control" name="id_agama" id="id_agama" placeholder="Id Agama"
                            value="<?php echo $id_agama; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Agama <?php echo form_error('agama') ?></label>
                        <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama"
                            value="<?php echo $agama; ?>" />
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('agama') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>