<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Biodatapenduduk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Biodatapenduduk</th>
		<th>Nik</th>
		<th>No Kk</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Kecamatan</th>
		<th>Desa Lurah</th>
		<th>Tgl Lahir</th>
		<th>Tempat Lahir</th>
		<th>Nama Ayah</th>
		<th>Nama Ibu</th>
		<th>Pekerjaan</th>
		<th>Pendidikan</th>
		<th>Golongan Darah</th>
		<th>Agama</th>
		<th>Hubungan Dalam Keluarga</th>
		<th>Status Perkawinan</th>
		<th>Disabilitas</th>
		
            </tr><?php
            foreach ($biodatapenduduk_data as $biodatapenduduk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $biodatapenduduk->id_biodatapenduduk ?></td>
		      <td><?php echo $biodatapenduduk->nik ?></td>
		      <td><?php echo $biodatapenduduk->no_kk ?></td>
		      <td><?php echo $biodatapenduduk->nama ?></td>
		      <td><?php echo $biodatapenduduk->alamat ?></td>
		      <td><?php echo $biodatapenduduk->kecamatan ?></td>
		      <td><?php echo $biodatapenduduk->desa_lurah ?></td>
		      <td><?php echo $biodatapenduduk->tgl_lahir ?></td>
		      <td><?php echo $biodatapenduduk->tempat_lahir ?></td>
		      <td><?php echo $biodatapenduduk->nama_ayah ?></td>
		      <td><?php echo $biodatapenduduk->nama_ibu ?></td>
		      <td><?php echo $biodatapenduduk->pekerjaan ?></td>
		      <td><?php echo $biodatapenduduk->pendidikan ?></td>
		      <td><?php echo $biodatapenduduk->golongan_darah ?></td>
		      <td><?php echo $biodatapenduduk->agama ?></td>
		      <td><?php echo $biodatapenduduk->hubungan_dalam_keluarga ?></td>
		      <td><?php echo $biodatapenduduk->status_perkawinan ?></td>
		      <td><?php echo $biodatapenduduk->disabilitas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>