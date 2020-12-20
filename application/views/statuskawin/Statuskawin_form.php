<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Statuskawin</h3>
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
            <label for="int">Id Statuskawin <?php echo form_error('id_statuskawin') ?></label>
            <input type="text" class="form-control" name="id_statuskawin" id="id_statuskawin" placeholder="Id Statuskawin" value="<?php echo $id_statuskawin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Statuskawin <?php echo form_error('statuskawin') ?></label>
            <input type="text" class="form-control" name="statuskawin" id="statuskawin" placeholder="Statuskawin" value="<?php echo $statuskawin; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('statuskawin') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>