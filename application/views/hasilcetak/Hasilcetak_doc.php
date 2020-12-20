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
        <h2>Hasilcetak List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Cetak</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Kecamatan</th>
		<th>Tgl Cetak</th>
		<th>Hasil Cetak</th>
		<th>Status Cetak</th>
		<th>Jns Blanko</th>
		<th>Alasan Cetak</th>
		<th>Hsl Blanko</th>
		<th>Ket</th>
		<th>Catatan</th>
		
            </tr><?php
            foreach ($hasilcetak_data as $hasilcetak)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $hasilcetak->id_cetak ?></td>
		      <td><?php echo $hasilcetak->nik ?></td>
		      <td><?php echo $hasilcetak->nama ?></td>
		      <td><?php echo $hasilcetak->kecamatan ?></td>
		      <td><?php echo $hasilcetak->tgl_cetak ?></td>
		      <td><?php echo $hasilcetak->hasil_cetak ?></td>
		      <td><?php echo $hasilcetak->status_cetak ?></td>
		      <td><?php echo $hasilcetak->jns_blanko ?></td>
		      <td><?php echo $hasilcetak->alasan_cetak ?></td>
		      <td><?php echo $hasilcetak->hsl_blanko ?></td>
		      <td><?php echo $hasilcetak->ket ?></td>
		      <td><?php echo $hasilcetak->catatan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>