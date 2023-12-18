  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $title; ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          
          <div class="row">
            
            <div class="col-md-5">
              <div style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="<?= base_url('asset/img/profile/').$user_login_data['foto_profil'] ?>" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fas fa-user"></i> <?= $user_login_data['nama'] ?></h5>
                      <p class="card-text"><i class="fas fa-envelope"></i> <?= $user_login_data['email'] ?></p>
                      <p class="card-text"><small class="text-muted">Diperbarui sejak <?= date('d-M-Y',strtotime($user_login_data['diperbaharui'])) ?></small></p>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <div class="col-md-5">
              <form method="post" enctype="multipart/form-data" action="<?= base_url('user/User/edit_profile') ?>">
                <div class="form-group">
                  <input type="hidden" class="form-control" readonly="" value="<?= $user_login_data['id_pengguna'] ?>" name="id_pengguna"></input>
                </div>
                <div class="form-group">
                <label for="">Email</label>
                  <input type="" class="form-control" readonly="" value="<?= $user_login_data['email'] ?>" name="email"></input>
                </div>
                <div class="form-group">
                <label for="">Nik/Nip</label>
                  <input required="" type="" class="form-control" value="<?= $user_login_data['nik_nip'] ?>" name="nik_nip"></input>
                </div>
                <div class="form-group">
                <label for="">Nama</label>
                  <input required="" type="" class="form-control" value="<?= $user_login_data['nama'] ?>" name="nama"></input>
                </div>
                <div class="form-group">
                <div class="form-group">
          <label for="id_pengguna">Jenis Kelamin</label>
          <select value="<?= $user_login_data['jk'] ?>"  name="jk" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
                <div class="form-group">
                <label for="">Alamat</label>
                  <textarea required="" type="text" class="form-control" name="alamat"><?= $user_login_data['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                <label for="">Foto Profil</label>
                  <input type="hidden" class="form-control" value="<?= $user_login_data['foto_profil'] ?>" name="old_img"></input>
                </div>
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <small class="text-muted">masukan gambar jika akan merubah foto profil</small>
                </div>
                <?= get_csrf(); ?>
                <button type="submit" class="btn btn-primary">KONFIRMASI</button>
              </form>
            </div>

          </div>

        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->