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
    <h3 align="center">DATA Datapengunjung</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
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
		
            </tr><?php
            foreach ($datapengunjung_data as $datapengunjung)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
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