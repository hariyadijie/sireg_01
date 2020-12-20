<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Tugas_pokok</h3>
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
            <label for="int">Id Tugaspokok <?php echo form_error('id_tugaspokok') ?></label>
            <input type="text" class="form-control" name="id_tugaspokok" id="id_tugaspokok" placeholder="Id Tugaspokok" value="<?php echo $id_tugaspokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tugas Pokok <?php echo form_error('tugas_pokok') ?></label>
            <input type="text" class="form-control" name="tugas_pokok" id="tugas_pokok" placeholder="Tugas Pokok" value="<?php echo $tugas_pokok; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tugas_pokok') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>