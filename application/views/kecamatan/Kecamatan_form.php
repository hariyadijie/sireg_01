<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Kecamatan</h3>
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
            <label for="int">Id Kec <?php echo form_error('id_kec') ?></label>
            <input type="text" class="form-control" name="id_kec" id="id_kec" placeholder="Id Kec" value="<?php echo $id_kec; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kecamatan <?php echo form_error('nama_kecamatan') ?></label>
            <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kecamatan" value="<?php echo $nama_kecamatan; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kecamatan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>