<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Pencatatan_perkawinan</h3>
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
            <label for="int">Id Pencatatanperkawinan <?php echo form_error('id_pencatatanperkawinan') ?></label>
            <input type="text" class="form-control" name="id_pencatatanperkawinan" id="id_pencatatanperkawinan" placeholder="Id Pencatatanperkawinan" value="<?php echo $id_pencatatanperkawinan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pencatatan Perkawinan <?php echo form_error('pencatatan_perkawinan') ?></label>
            <input type="text" class="form-control" name="pencatatan_perkawinan" id="pencatatan_perkawinan" placeholder="Pencatatan Perkawinan" value="<?php echo $pencatatan_perkawinan; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pencatatan_perkawinan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>