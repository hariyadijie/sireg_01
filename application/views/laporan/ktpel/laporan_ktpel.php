<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header bg-blue-active">
                <h3 class="box-title">Laporan Hasil Cetak/Register KTP Elektronik</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <!-- row satu  -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <br>
                        <strong>Filter</strong> Laporan
                        <!--id formfilter adalah nama form untuk filter-->
                        <form id="formfilter">
                            <div class="card-body card-block">
                                <input name="valnilai" type="hidden">
                                <div class="row form-group">
                                    <div id="form-tanggal" class="col col-md-5"><label for="select"
                                            class=" form-control-label">Pilih
                                            Periode Laporan Berdasarkan</label></div>
                                    <div class="col-6 col-md-6">
                                        <select name="periode" id="periode" class="form-control form-control-user"
                                            title="Pilih Periode Laporan">
                                            <option value="">-- PILIH --</option>
                                            <option value="tanggal">Tanggal</option>
                                            <option value="bulan">Bulan</option>
                                            <option value="tahun">Tahun</option>
                                        </select>
                                        <small class="help-block form-text"></small>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card-footer">
                                <!--ketika di klik tombol Proses, maka akan mengeksekusi fungsi javascript prosesPeriode() , untuk menampilkan form-->
                                <button id="btnproses" type="button" onclick="prosesPeriode()"
                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Proses</button>
                                <!--ketika di klik tombol Reset, maka akan mengeksekusi fungsi javascript prosesReset() , untuk menyembunyikan form-->
                                <button onclick="prosesReset()" type="button" class="btn btn-sm btn-danger"><i
                                        class="fa fa-ban"></i>
                                    Reset</button>
                            </div>
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <!-- row dua  -->
                <div class="col-lg-8">
                    <div class="card" id="tanggalfilter">
                        <div class="card-header">
                            <h4><strong>LAPORAN BERDASARKAN TANGGAL</strong></h4>
                        </div>
                        <br>
                        <form action="<?php echo base_url(); ?>Laporanktpel/filter" method="POST" target="_blank">
                            <input type="hidden" name="nilaifilter" value="1">
                            <input name="valnilai" type="hidden">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Dari tanggal</label>
                                    </div>
                                    <div class="col col-md-3">
                                        <input name="tanggalawal" value="" type="date" class="form-control"
                                            placeholder="Inputkan tgl awal" id="tanggalawal" required="">
                                    </div>
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Sampai tanggal</label>
                                    </div>
                                    <div class="col col-md-3">
                                        <input name="tanggalakhir" value="" type="date" class="form-control"
                                            placeholder="Inputkan Jenis Bayar" id="tanggalakhir" required="">
                                    </div>
                                    <small class="help-block form-text"></small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i>
                                    Cetak Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <!-- row ketiga  -->
                <div class="col-lg-6">
                    <div class="card" id="bulanfilter">
                        <div class="card-header">
                            <h4><strong>LAPORAN BERDASARKAN BULAN</strong></h4>
                        </div>
                        <form id="formbulan" action="<?php echo base_url(); ?>Laporanktpel/filter" method="POST"
                            target="_blank">
                            <div class="card-body card-block">
                                <input type="hidden" name="nilaifilter" value="2">
                                <input name="valnilai" type="hidden">
                                <div class="row form-group">
                                    <div id="form-tanggal" class="col col-md-2"><label for="select"
                                            class=" form-control-label">Pilih Tahun</label>
                                    </div>
                                    <div class="col col-md-3">
                                        <select name="tahun1" id="tahun1" class="form-control form-control-user"
                                            title="Pilih Tahun">
                                            <option value="">-PILIH-</option>
                                            <?php foreach($tahun as $thn): ?>
                                            <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="help-block form-text"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Dari Bulan</label>
                                    </div>
                                    <div class="col col-md-3">
                                        <select name="bulanawal" id="bulanawal" class="form-control form-control-user"
                                            title="Pilih Bulan">
                                            <option value="">-PILIH-</option>
                                            <option value="1">JANUARI</option>
                                            <option value="2">FEBRUARI</option>
                                            <option value="3">MARET</option>
                                            <option value="4">APRIL</option>
                                            <option value="5">MEI</option>
                                            <option value="6">JUNI</option>
                                            <option value="7">JULI</option>
                                            <option value="8">AGUSTUS</option>
                                            <option value="9">SEPTEMBER</option>
                                            <option value="10">OKTOBER</option>
                                            <option value="11">NOVEMBER</option>
                                            <option value="12">DESEMBER</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Sampai Bulan</label>
                                    </div>
                                    <div class="col col-md-3">
                                        <select name="bulanakhir" id="bulanakhir" class="form-control form-control-user"
                                            title="Pilih Bulan">
                                            <option value="">-PILIH-</option>
                                            <option value="1">JANUARI</option>
                                            <option value="2">FEBRUARI</option>
                                            <option value="3">MARET</option>
                                            <option value="4">APRIL</option>
                                            <option value="5">MEI</option>
                                            <option value="6">JUNI</option>
                                            <option value="7">JULI</option>
                                            <option value="8">AGUSTUS</option>
                                            <option value="9">SEPTEMBER</option>
                                            <option value="10">OKTOBER</option>
                                            <option value="11">NOVEMBER</option>
                                            <option value="12">DESEMBER</option>
                                        </select>
                                    </div>
                                    <small class="help-block form-text"></small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i>
                                    Cetak Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <!-- row ketiga  -->
                <div class="col-lg-6">
                    <div class="card" id="tahunfilter">
                        <div class="card-header">
                            <h4><strong>LAPORAN BERDASARKAN TAHUN</strong></h4>
                        </div>
                        <form id="formtahun" action="<?php echo base_url(); ?>Laporanktpel/filter" method="POST"
                            target="_blank">
                            <input name="valnilai" type="hidden">
                            <div class="card-body card-block">
                                <input type="hidden" name="nilaifilter" value="3">
                                <div class="row form-group">
                                    <div id="form-tanggal" class="col col-md-2"><label for="select"
                                            class=" form-control-label">Pilih Tahun</label></div>
                                    <div class="col col-md-6">
                                        <select name="tahun2" id="tahun2" class="form-control form-control-user"
                                            title="Pilih Tahun">
                                            <option value="">-PILIH-</option>
                                            <?php foreach($tahun as $thn): ?>
                                            <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="help-block form-text"></small>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i>
                                    Cetak Laporan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a> -->


<script type="text/javascript">
/*digunakan untuk menyembunyikan form tanggal, bulan dan tahun saat halaman di load */
$(document).ready(function() {

    $("#tanggalfilter").hide();
    $("#tahunfilter").hide();
    $("#bulanfilter").hide();
    $("#cardbayar").hide();

});

/*digunakan untuk menampilkan form tanggal, bulan dan tahun*/

function prosesPeriode() {
    var periode = $("[name='periode']").val();

    if (periode == "tanggal") {
        $("#btnproses").hide();
        $("#tanggalfilter").show();
        $("[name='valnilai']").val('tanggal');

    } else if (periode == "bulan") {
        $("#btnproses").hide();
        $("[name='valnilai']").val('bulan');
        $("#bulanfilter").show();

    } else if (periode == "tahun") {
        $("#btnproses").hide();
        $("[name='valnilai']").val('tahun');
        $("#tahunfilter").show();
    }
}

/*digunakan untuk menyembunyikan form tanggal, bulan dan tahun*/
function prosesReset() {
    $("#btnproses").show();

    $("#tanggalfilter").hide();
    $("#tahunfilter").hide();
    $("#bulanfilter").hide();
    $("#cardbayar").hide();

    $("#periode").val('');
    $("#tanggalawal").val('');
    $("#tanggalakhir").val('');
    $("#tahun1").val('');
    $("#bulanawal").val('');
    $("#bulanakhir").val('');
    $("#tahun2").val('');
    $("#targetbayar").empty();

}
</script>