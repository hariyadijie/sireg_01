<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Goldarah</h3>
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
            <label for="int">Id Golongandarah <?php echo form_error('id_golongandarah') ?></label>
            <input type="text" class="form-control" name="id_golongandarah" id="id_golongandarah" placeholder="Id Golongandarah" value="<?php echo $id_golongandarah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Golongan Darah <?php echo form_error('golongan_darah') ?></label>
            <input type="text" class="form-control" name="golongan_darah" id="golongan_darah" placeholder="Golongan Darah" value="<?php echo $golongan_darah; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('goldarah') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>