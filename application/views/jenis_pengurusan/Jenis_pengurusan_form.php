<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Jenis_pengurusan</h3>
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
            <label for="int">Id Jenispengurusan <?php echo form_error('id_jenispengurusan') ?></label>
            <input type="text" class="form-control" name="id_jenispengurusan" id="id_jenispengurusan" placeholder="Id Jenispengurusan" value="<?php echo $id_jenispengurusan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Pengurusan <?php echo form_error('jenis_pengurusan') ?></label>
            <input type="text" class="form-control" name="jenis_pengurusan" id="jenis_pengurusan" placeholder="Jenis Pengurusan" value="<?php echo $jenis_pengurusan; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis_pengurusan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>