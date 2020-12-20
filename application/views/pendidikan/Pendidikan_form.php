<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Pendidikan</h3>
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
            <label for="int">Id Pendidikan <?php echo form_error('id_pendidikan') ?></label>
            <input type="text" class="form-control" name="id_pendidikan" id="id_pendidikan" placeholder="Id Pendidikan" value="<?php echo $id_pendidikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pendidikan <?php echo form_error('pendidikan') ?></label>
            <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="<?php echo $pendidikan; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendidikan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>