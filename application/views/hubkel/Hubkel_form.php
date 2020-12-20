<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Hubkel</h3>
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
            <label for="int">Id Hubkel <?php echo form_error('id_hubkel') ?></label>
            <input type="text" class="form-control" name="id_hubkel" id="id_hubkel" placeholder="Id Hubkel" value="<?php echo $id_hubkel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hubkeluarga <?php echo form_error('hubkeluarga') ?></label>
            <input type="text" class="form-control" name="hubkeluarga" id="hubkeluarga" placeholder="Hubkeluarga" value="<?php echo $hubkeluarga; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('hubkel') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>