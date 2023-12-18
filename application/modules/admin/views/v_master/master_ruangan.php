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
        
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?></h3>
              <div class="float-right">
              <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi"><i class="fas fa-fw fa-info"></i></button>
                <button title="Tambah Ruangan" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-fw fa-plus"></i> Tambah Data</button>
              </div>
            </div>
            <!-- /.card-header -->
                  <div class="card-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Ruangan</th>
                                  <th>Nama Gedung</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1; foreach($ruangan as $ruangan1){ ?>
                              <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $ruangan1->ruangan_nama ?></td>
                                  <td><?= $ruangan1->nama_gedung ?></td>
                                  <td>
                                      <button title="Lihat Ruangan" class="btn btn-danger" data-toggle="modal"
                                          data-target="#modal-lihat1<?= $ruangan1->id_ruang ?>"><i
                                              class="fas fa-fw fa-eye"></i></button>
                                     <button title="Edit Ruangan" class="btn btn-primary" data-toggle="modal"
                                          data-target="#modal-edit1<?= $ruangan1->id_ruang ?>"><i
                                              class="fas fa-fw fa-edit"></i></button>
                    <a title="Hapus Ruangan" href="<?= base_url('admin/Master_Ruangan/delete_ruang/').$ruangan1->id_ruang ?>" class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i class="fas fa-fw fa-trash"></i></a>
                                  </td>
                              </tr>
                              <?php $no++;
                                    } ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div><!-- /.container-fluid -->
      </section>

                              <?php $no = 1; foreach($ruangan as $ruangan1){ ?>
  <!-- lihat Data Modal -->
  <div class="modal fade" id="modal-lihat1<?= $ruangan1->id_ruang ?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form>
                  <div class="modal-body">

                      <div class="form-group">
                          <label for="proyek_nama">Nama Ruangan</label>
                          <input required="" readonly value="<?= $ruangan1->ruangan_nama ?>" class="form-control"></input>
                      </div>
                      <div class="form-group">
                          <label for="proyek_nama">Nama Gedung</label>
                          <input required="" readonly value="<?= $ruangan1->nama_gedung ?>" class="form-control"></input>
                      </div>
                      <div class="card">
                          <div class="card-header">
                          <label for="proyek_nama">Fasilitas</label>
                          </div>
                          <div class="card-body">
                              <p class="card-text"><?= $ruangan1->ruangan_fasilitas ?></p>
                          </div>
                      </div>

                  </div>
                  <?= get_csrf() ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </form>
          </div>
      </div>
  </div>
  </div>
  <!-- Edit Data ruangan Modal -->
  <div class="modal fade" id="modal-edit1<?= $ruangan1->id_ruang ?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Ruangan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Master_Ruangan/update_ruang') ?>">
                  <div class="modal-body">


                      <input required="" type="hidden" value="<?= $ruangan1->id_ruang ?>" name="id_ruang" type="text"
                          class="form-control"></input>

                      <div class="form-group">
                          <label for="proyek_nama">Nama Ruang</label>
                          <input required="" name="ruangan_nama"  value="<?= $ruangan1->ruangan_nama ?>" class="form-control"></input>
                      </div>
                      <div class="form-group">
                          <label for="proyek_nama">Nama Gedung</label>
                          <input required="" name="nama_gedung"  value="<?= $ruangan1->nama_gedung ?>" class="form-control"></input>
                      </div>
                      <div class="form-group">
                      <label for="proyek_nama">Fasilitas</label>
                                              <textarea required="" rows="" name="ruangan_fasilitas"
                                                  placeholder="Fasilitas Ruangan" class="ckeditor1 form-control"><?= $ruangan1->ruangan_fasilitas ?></textarea>
                                          </div>


                  </div>
                  <?= get_csrf() ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div>
      </div>
  </div>
  </div>
  <?php $no++; } ?>
  <!-- Tambah Data ruangan Modal -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Master_Ruangan/add_ruang') ?>">
      <div class="modal-body">
        <div class="form-group">
        <label for="proyek_nama">Nama Ruang</label>
          <input type="text" required="" name="ruangan_nama" placeholder="Nama Ruang" class="form-control"></input>
        </div>
        <div class="form-group">
        <label for="proyek_nama">Nama Gedung</label>
          <input required="" name="nama_gedung" placeholder="Nama Gedung"  class="form-control" placeholder=""></input>
        </div>
        <div class="form-group">
                      <label for="proyek_nama">Fasilitas</label>
                                              <textarea required="" rows="" name="ruangan_fasilitas"
                                                  placeholder="Fasilitas Ruangan" class="ckeditor form-control">Ruangan Fasilitas:</textarea>
                                          </div>
        </div>
      <?= get_csrf() ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>

  <!-- Informasi Data Modal -->
  <div class="modal fade" id="modal-informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <ol>
            <li>Tombol  <i class="fa fa-eye" style="color: red"></i> berfungsi untuk detail data ruangan.</li>
            <li>Tombol  <i class="fa fa-plus" style="color: red"></i> berfungsi untuk tambah data ruangan.</li>
            <li>Tombol  <i class="fa fa-edit" style="color: red"></i> berfungsi untuk edit data ruangan.</li>
            <li>Tombol  <i class="fa fa-trash" style="color: red"></i> berfungsi untuk hapus data ruangan.</li>
        </ol>
        <i>
            <b>Perhatian!</b> <br>
            <ul>
                <li>Tombol hapus <i class="fa fa-trash" style="color: red"></i> akan tidak bisa digunakan ketika data ruangan digunakan proyek </li>
            </ul>
        </i>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
