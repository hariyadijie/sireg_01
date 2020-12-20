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
                <div class="input-group">
                    <div class="col-xs-12 col-md-4">
                        <?php echo anchor(site_url('datapengunjung/create'),'<i class="fa fa-plus"></i> Input Baru', 'class="btn bg-blue"'); ?>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="input-group">
                        <div class="col-xs-12 col-md-12">
                            <form action="<?php echo site_url('datapengunjung/cari'); ?>" class="form-inline"
                                method="get">
                                <?= form_open ("datapengunjung/cari");?>
                                <form id="cari" method="post" onsubmit="return false"></form>
                                <div class="input-group">
                                    <form class="navbar-form navbar-left" role="search">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cari"
                                                placeholder="Masukkan NIK Penduduk">
                                        </div>
                                        <button type="submit" value="cari" class="btn btn-success">Cari Data
                                            Penduduk</button>
                                    </form>
                                </div>
                                <?= form_close ();?>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>