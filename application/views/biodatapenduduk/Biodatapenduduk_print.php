<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
          -webkit-print-color-adjust:exact;
        border: 1px solid;

                padding-top: 11px;
    padding-bottom: 11px;
    background-color: #a29bfe;
      }
   table td{
        border: 1px solid;

   }
        </style>
</head>
<body>
    <h3 align="center">DATA Biodatapenduduk</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
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
<script type="text/javascript">
      window.print()
    </script>
</html>