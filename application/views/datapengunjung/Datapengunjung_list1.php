<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pengunjung</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <?= form_open ("datapengunjung/cari");?>

                <form id="cari" method="post" onsubmit="return false"></form>
                <div class="input-group">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="yangdicari"
                                placeholder="Masukkan NIK Penduduk">
                        </div>
                        <button type="submit" value="cari" class="btn btn-success">Cari Data Penduduk</button>
                    </form>
                </div>
                <?= form_close ();?>

            </div>
        </div>
        <form method="post" action="<?= site_url('datapengunjung/deletebulk');?>" id="formbulk">
            <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                <tr>
                    <th style="width: 10px;"><input type="checkbox" name="selectall" /></th>
                    <th>Nik</th>
                    <th>Nomor Kartu Keluarga</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Desa/KeLurahan</th>
                    <th>Tanggal Lahir</th>
                    <th>Pekerjaan</th>
                    <th>Agama</th>
                    <th>Action</th>
                </tr><?php
            foreach ($datapengunjung_data as $datapenduduk)
            {
                ?>
                <tr>
                    <td style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id"
                            value="<?= $datapenduduk->nik;?>" />&nbsp;</td>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $datapenduduk->nik ?></td>
                    <td><?php echo $datapenduduk->no_kk ?></td>
                    <td><?php echo $datapenduduk->nama ?></td>
                    <td><?php echo $datapenduduk->alamat ?></td>
                    <td><?php echo $datapenduduk->kecamatan ?></td>
                    <td><?php echo $datapenduduk->desa_lurah ?></td>
                    <td><?php echo $datapenduduk->tgl_lahir ?></td>
                    <td><?php echo $datapenduduk->pekerjaan ?></td>
                    <td><?php echo $datapenduduk->agama ?></td>

                    <td style="text-align:center" width="200px">
                        <?php 
				echo anchor(site_url('datapengunjung/read/'.$datapenduduk->nik),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"'); 
				echo ' '; 
				echo anchor(site_url('datapengunjung/update/'.$datapenduduk->nik),' <i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"'); 
				echo ' '; 
				echo anchor(site_url('datapengunjung/delete/'.$datapenduduk->nik),' <i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javascript: return confirmdelete(\'datapengunjung/delete/'.$datapengunjung->nik.'\')"  data-toggle="tooltip" title="Delete" '); 
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


        <!-- <input type="text" class="form-control" placeholder=" Masukkan NIK Penduduk"
                    aria-describedby="basic-addon2">
                <span class="input-group-addon bg-green" id="basic-addon2">Cari Data Penduduk</span> -->

        <!-- <div class="box-body">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Cari Data Penduduk</button>
                            </span>
                            <input type="text" class="form-control" placeholder="Masukkan NIK Penduduk">
                        </div>
                    </div>
                </div> -->



        <!-- <form id="myform" method="post" onsubmit="return false">

                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-xs-12 col-md-4">
                            <?php echo anchor(site_url('datapengunjung/create'), '<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div style="margin-top: 4px" id="message">

                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 text-right">
                            <?php echo anchor(site_url('datapengunjung/excel'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-success"'); ?>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                                    <th>Id Datapengunjung</th>
                                    <th>Nik</th>
                                    <th>No Kk</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kecamatan</th>
                                    <th>Desalurah</th>
                                    <th>Alamat</th>
                                    <th>Jenis Pengurusan</th>
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
                                    <th>User Cetak</th>
                                    <th>User Pengambilan</th>
                                    <th>Keterangan</th>

                                    <th width="80px">Action</th>
                                </tr>
                            </thead>


                        </table>
                    </div>
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data
                        Terpilih</button>
                </form> -->

    </div>
</div>
</div>
</div>