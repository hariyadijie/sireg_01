<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pengunjung Disdukcapil Kab. Bantaeng</h3>
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
                            <?php echo anchor(site_url('datapengunjung/create'), '<i class="fa fa-plus"></i> Input Data Pengunjung', 'class="btn bg-green"'); ?>
                        </div>
                        <div class="div navbar-form navbar-right">
                            <?= form_open('datapengunjung/search2')?>
                            <input type="text" name="keyword" class="form-control" placeholder="cari nomor NIK">
                            <button type="submit" class="btn btn-success">Cari</button>
                            <?= form_close()?>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div style="margin-top: 4px" id="message">
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
                                    <!-- <!-- <th>Id Datapengunjung</th> -->
                                    <th>Nik</th>
                                    <th>No Kk</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kecamatan</th>
                                    <th>Desalurah</th>
                                    <th>Alamat</th>
                                    <!-- <th>Jenis Pengurusan</th>
                                    <th>Tgl Input Resepsionis</th>
                                    <th>Tgl Edit Operator</th>
                                    <th>Tgl Edit Registercetak</th>
                                    <th>Nomor Antrian</th>
                                    <th>Nama Pengurus</th>
                                    <th>Status Hub Pengurus</th>
                                    <th>Status Berkas</th>
                                    <th>Nomor Kontak Pengunjung</th>
                                    <th>Nama Pengambil Dokumen</th>
                                    <th>Tgl Pengambilan</th>
                                    <th>User Resepsionis</th>
                                    <th>User Operator</th>
                                    <th>User Pengambilan</th>
                                    <th>Keterangan</th> -->

                                    <th width="80px">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data
                        Terpilih</button>
                </form>

            </div>
        </div>
    </div>
</div>