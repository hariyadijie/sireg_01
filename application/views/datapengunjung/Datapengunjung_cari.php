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
                            <form action="<?php echo site_url('datapengunjung/index'); ?>" class="form-inline"
                                method="get">
                                <?= form_open ("datapengunjung/cari");?>
                                <form id="cari" method="post" onsubmit="return false"></form>
                                <div class="input-group">
                                    <form class="navbar-form navbar-left" role="search">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="yangdicari"
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
                <form method="post" action="<?= site_url('datapengunjung/deletebulk');?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <th style="width: 10px;"><input type="checkbox" name="selectall" /></th>
                            <th>No</th>
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
                        </tr><?php
            foreach ($datapenduduk as $datapengunjung)
            {
                ?>
                        <tr>
                            <td style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id"
                                    value="<?= $datapengunjung->nik;?>" />&nbsp;</td>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $datapengunjung->no_kk ?></td>
                            <td><?php echo $datapengunjung->nama ?></td>
                            <td><?php echo $datapengunjung->alamat ?></td>
                            <td><?php echo $datapengunjung->desa_lurah ?></td>
                            <td><?php echo $datapengunjung->tgl_lahir ?></td>
                            <td><?php echo $datapengunjung->pekerjaan ?></td>
                            <td><?php echo $datapengunjung->agama ?></td>

                            <td style="text-align:center" width="200px">
                                <?php 
				echo anchor(site_url('datapengunjung/read/'.$datapengunjung->nik),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"'); 
				echo ' '; 
				echo anchor(site_url('datapengunjung/update/'.$datapengunjung->nik),' <i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"'); 
				echo ' '; 
				echo anchor(site_url('datapengunjung/delete/'.$datapengunjung->nik),' <i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirmdelete(\'datapengunjung/delete/'.$datapengunjung->nik.'\')"  data-toggle="tooltip" title="Delete" '); 
				?>
                            </td>
                        </tr>
                        <?php
            }
            ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data
                                Terpilih</button> <a href="#" class="btn bg-yellow">Total Record :
                                <?php echo $total_rows ?></a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>