<div class="row">
  <div class="col-xs-12 col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?= $button;?> Status DWH</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
          <div class="form-group">
            <label for="varchar">Status Dwh <?php echo form_error('status_dwh') ?></label>
            <input type="text" class="form-control" name="status_dwh" id="status_dwh" placeholder="Status Dwh"
              value="<?php echo $status_dwh; ?>" />
          </div>
          <input type="hidden" name="id_statusdwh" value="<?php echo $id_statusdwh; ?>" />
          <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
          <a href="<?php echo site_url('statusdwh') ?>" class="btn btn-default">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>