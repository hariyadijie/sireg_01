<!-- Default box -->
<div class="row">
    <div class="col-md-4 col-xs-12">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img alt="User profile picture" class="profile-user-img img-responsive img-rounded"
                    src="<?= $this->ion_auth->user()->row()->image; ?> ">
                <h3 class="profile-username text-center">
                    <?= $this->ion_auth->user()->row()->first_name . " " . $this->ion_auth->user()->row()->last_name; ?>
                </h3>
                <p class="text-muted text-center"><?= $this->ion_auth->user()->row()->company; ?></p>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right"><?= $this->ion_auth->user()->row()->email; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Telepon</b> <a class="pull-right"><?= $this->ion_auth->user()->row()->phone; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Password</b> <a class="pull-right" href="<?= site_url('profile/gantipassword'); ?>">Ganti
                            Password</a>
                    </li>
                </ul>
                <a href="<?= base_url(); ?>auth/logout" class="btn bg-green btn-block"><b>Sign Out</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!--  box edit-->
    <div class="col-md-5 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Profil Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?= site_url('profile/actioneditprofile');?>" role="form">
                <div class="box-body">
                    <div id="infoMessage"><?php echo $message; ?></div>
                    <div class="form-group">
                        <label for="firstname">Nama Depan</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            value="<?= $user->first_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Nama Belakang</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                            value="<?= $user->last_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Company">Instansi</label>
                        <input type="text" class="form-control" id="company" name="company"
                            value="<?= $user->company; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Handphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->phone; ?>">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!--  / box edit-->
</div>