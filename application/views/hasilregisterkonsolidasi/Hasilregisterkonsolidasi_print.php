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
    <h3 align="center">DATA Hasilregisterkonsolidasi</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Id</th>
		<th>Nik</th>
		<th>Nama Lengkap</th>
		<th>No Kk</th>
		<th>Kabkota</th>
		<th>Kecamatan</th>
		<th>Desalurah</th>
		<th>Permasalahan</th>
		<th>Status Dwh</th>
		<th>Tgl Register</th>
		<th>Nama Register</th>
		<th>Nama Resepsionis</th>
		<th>Nama Pengguna</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($hasilregisterkonsolidasi_data as $hasilregisterkonsolidasi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->no_id ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->nik ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->nama_lengkap ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->no_kk ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->kabkota ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->kecamatan ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->desalurah ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->permasalahan ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->status_dwh ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->tgl_register ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->nama_register ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->nama_resepsionis ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->nama_pengguna ?></td>
		      <td><?php echo $hasilregisterkonsolidasi->keterangan ?></td>	
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