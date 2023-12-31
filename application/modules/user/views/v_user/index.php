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
          <style type="text/css">
            body { font-family: 'Times New Roman', Times, Serif; }
            p { font-family: 'Times New Roman', Times, Serif;}
            div {font-family: 'Times New Roman', Times, Serif;}
          </style>
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
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('asset/img/profile/').$user_login_data['foto_profil'] ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-nama text-center"><?= $user_login_data['nama'] ?></h3>

                <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul> -->

                <a href="<?= base_url('user/edit-profile') ?>" class="btn btn-primary btn-block"><b>Edit Akun</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                <p class="text-muted">
                  <?= $user_login_data['email'] ?>
                </p>

                <hr>

                <strong><i class="fas fa-calendar mr-1"></i> Diperbarui sejak</strong>

                <p class="text-muted"><?= $user_login_data['diperbaharui'] ?></p>

                <hr>

<strong><i class="fas fa-user mr-1"></i> Nik/Nip</strong>

<p class="text-muted"><?= $user_login_data['nik_nip'] ?></p>

<hr>

<strong><i class="fas fa-people mr-1"></i> Jenis Kelamin</strong>

<p class="text-muted"><?= $user_login_data['jk'] ?></p>
<hr>

<strong><i class="fas fa-location-dot mr-1"></i> Alamat</strong>

<p class="text-muted"><?= $user_login_data['alamat'] ?></p>

                <!-- <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->