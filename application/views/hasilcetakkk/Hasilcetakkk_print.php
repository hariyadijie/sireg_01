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
    <h3 align="center">DATA Hasilcetakkk</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
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
		
            </tr><?php
            foreach ($hasilcetakkk_data as $hasilcetakkk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $hasilcetakkk->nik ?></td>
		      <td><?php echo $hasilcetakkk->nokk ?></td>
		      <td><?php echo $hasilcetakkk->nama ?></td>
		      <td><?php echo $hasilcetakkk->alamat ?></td>
		      <td><?php echo $hasilcetakkk->kecamatan ?></td>
		      <td><?php echo $hasilcetakkk->desalurah ?></td>
		      <td><?php echo $hasilcetakkk->tgl_cetak ?></td>
		      <td><?php echo $hasilcetakkk->nama_register ?></td>
		      <td><?php echo $hasilcetakkk->nama_operator ?></td>
		      <td><?php echo $hasilcetakkk->status_cetak ?></td>
		      <td><?php echo $hasilcetakkk->alasan_cetak ?></td>
		      <td><?php echo $hasilcetakkk->nama_pengurus ?></td>
		      <td><?php echo $hasilcetakkk->ket ?></td>
		      <td><?php echo $hasilcetakkk->catatan ?></td>	
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