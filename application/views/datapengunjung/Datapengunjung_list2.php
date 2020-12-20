<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Datapengunjung</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('datapengunjung/create'),'<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <?php echo anchor(site_url('datapengunjung/excel'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-success"'); ?>
                        <form action="<?php echo site_url('datapengunjung/index'); ?>" class="form-inline" method="get"
                            style="margin-top:10px">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('datapengunjung'); ?>"
                                        class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <form method="post" action="<?= site_url('datapengunjung/deletebulk');?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <th style="width: 10px;"><input type="checkbox" name="selectall" /></th>
                            <th>No</th>
                            <th>Id Datapengunjung</th>
                            <th>Nama Lengkap</th>
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
                            <th>Action</th>
                        </tr><?php
            foreach ($datapengunjung_data as $datapengunjung)
            {
                ?>
                        <tr>

                            <td style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id"
                                    value="<?= $datapengunjung->nik;?>" />&nbsp;</td>

                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $datapengunjung->id_datapengunjung ?></td>
                            <td><?php echo $datapengunjung->nama_lengkap ?></td>
                            <td><?php echo $datapengunjung->desalurah ?></td>
                            <td><?php echo $datapengunjung->alamat ?></td>
                            <td><?php echo $datapengunjung->jenis_pengurusan ?></td>
                            <td><?php echo $datapengunjung->tgl_input_resepsionis ?></td>
                            <td><?php echo $datapengunjung->tgl_edit_operator ?></td>
                            <td><?php echo $datapengunjung->tgl_edit_registercetak ?></td>
                            <td><?php echo $datapengunjung->nomor_antrian ?></td>
                            <td><?php echo $datapengunjung->nama_pengurus ?></td>
                            <td><?php echo $datapengunjung->status_hub_pengurus ?></td>
                            <td><?php echo $datapengunjung->status_berkas ?></td>
                            <td><?php echo $datapengunjung->nomor_kontak_pengunjung ?></td>
                            <td><?php echo $datapengunjung->nama_pengambil_dokumen ?></td>
                            <td><?php echo $datapengunjung->tgl_pengambilan ?></td>
                            <td><?php echo $datapengunjung->user_resepsionis ?></td>
                            <td><?php echo $datapengunjung->user_operator ?></td>
                            <td><?php echo $datapengunjung->user_cetak ?></td>
                            <td><?php echo $datapengunjung->user_pengambilan ?></td>
                            <td><?php echo $datapengunjung->keterangan ?></td>
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