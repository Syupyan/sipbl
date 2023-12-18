  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <style type="text/css">
            body { font-family: 'Times New Roman', Times, Serif; }
            p { font-family: 'Times New Roman', Times, Serif;}
            div {font-family: 'Times New Roman', Times, Serif;}
          </style>
            <h1 class="font-small m-0 text-dark"><?= $title; ?></h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $total_user; ?></h3>
                <p>Pengguna</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="<?= base_url('admin/master-pengguna') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?= $total_mahasiswa; ?></h3>

                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="<?= base_url('admin/master-mahasiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?= $total_ruangan; ?></h3>

                <p>Ruangan</p>
              </div>
              <div class="icon">
                <i class="fas fa-home"></i>
              </div>
              <a href="<?= base_url('admin/master-ruangan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <h3><?= $total_proyek; ?></h3>

                <p>Proyek</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard"></i>
              </div>
              <a href="<?= base_url('pengusul') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->