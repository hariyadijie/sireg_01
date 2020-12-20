<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box">
            <div class="box-header bg-olive">
                <h3 class="box-title"><?= $button;?> Biodata Penduduk</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo $action; ?>" method="post">

                    <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" name="id_biodatapenduduk" id="id_biodatapenduduk"
                            placeholder="Id Biodatapenduduk" value="<?php echo $id_biodatapenduduk; ?>" />
                        <label for="int">Nik <?php echo form_error('nik') ?></label>
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik"
                            value="<?php echo $nik; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="int">Nomor Kartu Keluarga<?php echo form_error('no_kk') ?></label>
                        <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk"
                            value="<?php echo $no_kk; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Nama Lengkap <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"
                            value="<?php echo $nama; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"
                            value="<?php echo $alamat; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="kecamatan" id="kecamatan"
                            required>
                            <option value="">Pilih Kecamatan</option>
                            <?php foreach($kecamatan as $row):?>
                            <option value="<?php echo $row->id_kec;?>"><?php echo $row->nama_kecamatan;?>
                            </option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Desa/KeLurahan <?php echo form_error('desa_lurah') ?></label>
                        <select class="form-control" name="listdesalurah" id="listdesalurah">
                            <option value="">Pilih Desa/Kelurahan</option>
                        </select>
                        <div id="loading" style="margin-top: 15px;">
                            <img src="assets/images/loading.gif" width="18"> <small>Loading...</small>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir"
                            value="<?php echo $tgl_lahir; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                            placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah"
                            value="<?php echo $nama_ayah; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu"
                            value="<?php echo $nama_ibu; ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="pekerjaan" id="pekerjaan"
                            required>
                            <option value="">Pilih Pekerjaan</option>
                            <?php foreach($pekerjaan as $row):?>
                            <option value="<?php echo $row->id_pekerjaan;?>"><?php echo $row->pekerjaan;?>
                            </option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Pendidikan <?php echo form_error('pendidikan') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="pendidikan" id="pendidikan"
                            required>
                            <option value="">Pilih Pendidikan</option>
                            <?php foreach($pendidikan as $row):?>
                            <option value="<?php echo $row->id_pendidikan;?>"><?php echo $row->pendidikan;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Golongan Darah <?php echo form_error('golongan_darah') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="golongan_darah"
                            id="golongan_darah" required>
                            <option value="">Pilih Golongan darah</option>
                            <?php foreach($goldarah as $row):?>
                            <option value="<?php echo $row->id_golongandarah;?>"><?php echo $row->golongan_darah;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Agama <?php echo form_error('agama') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="agama" id="agama" required>
                            <option value="">Pilih Agama</option>
                            <?php foreach($agama as $row):?>
                            <option value="<?php echo $row->id_agama;?>"><?php echo $row->agama;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Hubungan Dalam Keluarga
                            <?php echo form_error('hubungan_dalam_keluarga') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="hubungan_dalam_keluarga"
                            id="hubungan_dalam_keluarga" required>
                            <option value="">Pilih Hubungan Keluarga</option>
                            <?php foreach($hubkel as $row):?>
                            <option value="<?php echo $row->id_hubkel;?>"><?php echo $row->hubkeluarga;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Status Perkawinan <?php echo form_error('status_perkawinan') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="status_perkawinan"
                            id="status_perkawinan" required>
                            <option value="">Pilih Status Perkawinan</option>
                            <?php foreach($statuskawin as $row):?>
                            <option value="<?php echo $row->id_statuskawin;?>"><?php echo $row->statuskawin;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Pencatatan Perkawinan
                            <?php echo form_error('pencatatan_perkawinan') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="pencatatan_perkawinan"
                            id="pencatatan_perkawinan" required>
                            <option value="">Pilih pencatatan Perkawinan</option>
                            <?php foreach($pencatatan_perkawinan as $row):?>
                            <option value="<?php echo $row->id_pencatatanperkawinan;?>">
                                <?php echo $row->pencatatan_perkawinan;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="varchar">Disabilitas <?php echo form_error('disabilitas') ?></label>
                        <select class="form-control" style="text-transform: uppercase" name="disabilitas"
                            id="disabilitas" required>
                            <option value="">Pilih Status Disabilitas</option>
                            <?php foreach($disabilitas as $row):?>
                            <option value="<?php echo $row->id_disabilitas;?>"><?php echo $row->disabilitas;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <br>
                        <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                        <a href="<?php echo site_url('biodatapenduduk') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/jquery-3.2.1.min.js"); ?>" type="text/javascript"></script>
<!-- <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script> -->
<script>
$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    $("#kecamatan").change(function() { // Ketika user mengganti atau memilih data provinsi
        $("#desalurah").hide(); // Sembunyikan dulu combobox desa/lurah nya
        $("#loading").show(); // Tampilkan loadingnya

        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "<?php echo base_url("index.php/biodatapenduduk/listdesalurah"); ?>", // Isi dengan url/path file php yang dituju
            data: {
                id_kec: $("#kecamatan").val()
            }, // data yang akan dikirim ke file yang dituju
            dataType: "json",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#loading").hide(); // Sembunyikan loadingnya

                // set isi dari combobox desalurah
                // lalu munculkan kembali combobox desalurah
                $("#listdesalurah").html(response.listdesalurah).show();
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError); // Munculkan alert error
            }
        });
    });
});
</script>

<!-- <script>
function tampilKecamatan() {
    kdkab = document.getElementById("kecamatan_id").value;
    $.ajax({
        url: "<?php echo  base_url();?>biodatapenduduk/pilih_kecamatan/" + kdkab + "",
        success: function(response) {
            $("#kecamatan_id").html(response);
        },
        dataType: "html"
    });
    return false;
}

function tampildesalurah() {
    kdkec = document.getElementById("desalurah_id").value;
    $.ajax({
        url: "<?php echo  base_url();?>biodatapenduduk/pilih_desalurah/" + kdkec + "",
        success: function(response) {
            $("#desalurah_id").html(response);
        },
        dataType: "html"
    });
    return false;
}
</script> -->