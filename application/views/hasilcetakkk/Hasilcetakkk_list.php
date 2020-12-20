<div class="row">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">List Hasilcetakkk</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
              <i class="fa fa-refresh"></i></button>
          </div>
      </div>

      <div class="box-body">
     
        <form id="myform" method="post" onsubmit="return false">

           <div class="row" style="margin-bottom: 10px">
            <div class="col-xs-12 col-md-4">
                <?php echo anchor(site_url('hasilcetakkk/create'), '<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    
                </div>
            </div>
            <div class="col-xs-12 col-md-4 text-right">
	    
         </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
            <thead>
                <tr>
                    <th width=""></th>
                    <th width="10px">No</th>
		    <th>Nik</th>
		    <th>Nokk</th>
		    <th>Nama</th>
		    <th>Alamat</th>
		    <th>Kecamatan</th>
		    <th>Desalurah</th>
		    <th>Tgl Cetak</th>
		    <th>Nama Register</th>
		    <th>Nama Operator</th>
		    <th>Status Cetak</th>
		    <th>Alasan Cetak</th>
		    <th>Nama Pengurus</th>
		    <th>Ket</th>
		    <th>Catatan</th>
		 
                    <th width="80px">Action</th>   
                </tr>
            </thead>
	

        </table>
         </div>
        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data Terpilih</button>
        </form>

      </div>
    </div>
  </div>
</div>