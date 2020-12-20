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
    <h3 align="center">DATA Hasilcetak</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Cetak</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Kec</th>
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
		      <td><?php echo $hasilcetak->kec ?></td>
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
<script type="text/javascript">
      window.print()
    </script>
</html>