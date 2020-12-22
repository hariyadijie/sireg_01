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
    <h3 align="center">DATA Hasilcetakkia</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nik</th>
		<th>Nama Anak</th>
		<th>Nama Ayah</th>
		<th>Nama Ibu</th>
		<th>Kecamatan</th>
		<th>Desalurah</th>
		<th>Tgl Cetak</th>
		<th>Petugas Resepsionis</th>
		<th>Petugas Operator</th>
		<th>Petugas Register</th>
		<th>Nama Pengguna</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($hasilcetakkia_data as $hasilcetakkia)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $hasilcetakkia->nik ?></td>
		      <td><?php echo $hasilcetakkia->nama_anak ?></td>
		      <td><?php echo $hasilcetakkia->nama_ayah ?></td>
		      <td><?php echo $hasilcetakkia->nama_ibu ?></td>
		      <td><?php echo $hasilcetakkia->kecamatan ?></td>
		      <td><?php echo $hasilcetakkia->desalurah ?></td>
		      <td><?php echo $hasilcetakkia->tgl_cetak ?></td>
		      <td><?php echo $hasilcetakkia->petugas_resepsionis ?></td>
		      <td><?php echo $hasilcetakkia->petugas_operator ?></td>
		      <td><?php echo $hasilcetakkia->petugas_register ?></td>
		      <td><?php echo $hasilcetakkia->nama_pengguna ?></td>
		      <td><?php echo $hasilcetakkia->keterangan ?></td>	
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