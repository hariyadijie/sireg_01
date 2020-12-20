<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Biodata Penduduk</h3>
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
                            <?php echo anchor(site_url('biodatapenduduk/create'), '<i class="fa fa-plus"></i> Input Baru', 'class="btn bg-blue"'); ?>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div style="margin-top: 4px" id="message">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 text-right">
                            <?php echo anchor(site_url('biodatapenduduk/printdoc'), '<i class="fa fa-print"></i> Print Preview', 'class="btn bg-maroon"'); ?>
                            <?php echo anchor(site_url('biodatapenduduk/excel'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-success"'); ?>
                            <?php echo anchor(site_url('biodatapenduduk/word'), '<i class="fa fa-file-word"></i> Word', 'class="btn btn-primary"'); ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width=""></th>
                                        <th width="10px">No</th>
                                        <th>Nik</th>
                                        <th>Nomor Kartu Keluarga</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <th>Kecamatan</th>
                                        <th>Desa/KeLurahan</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Pekerjaan</th>
                                        <th>Agama</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data
                        Terpilih</button>
                </form>
            </div>
        </div>
    </div>
</div>