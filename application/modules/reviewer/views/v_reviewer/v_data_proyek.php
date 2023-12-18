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
                      <div class="card-tools">
                              <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi"><i class="fas fa-fw fa-info"></i></button>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Judul</th>
                                  <th>Pengusul</th>
                                  <th>File</th>
                                  <th>Tanggal Mengajukan</th>
                                  <th>Status Proyek</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1; foreach($proyekku1 as $proyek){ ?>
                              <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $proyek->proyek_nama ?></td>
                                  <td><?= $proyek->proyek_pemilik ?></td>

                                  <td>
                                      <center><a href="<?= base_url('asset/file/pdf_proyek/').$proyek->proyek_file ?>"
                                              class="badge badge-secondary">File Lampiran</a></center>
                                  </td>
                                  <td><?= $proyek->proyek_pengajuan ?></td>
                                  <td><?php if ($proyek->proyek_status == 'Menunggu Tinjauan Proyek'): ?>
                                      <center><span class="badge badge-danger"><?= $proyek->proyek_status ?></span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                                  <td>
                                      <button  title="Terima dan Tolak Proyek"  class="btn btn-primary" data-toggle="modal"
                                          data-target="#modal-tambah1<?= $proyek->id_proyek ?>"><i
                                              class="fas fa-fw fa-plus"></i></button>
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
                              <?php $no = 1; foreach($proyekku2 as $proyek){ ?>
  <!-- Edit Data Modal -->
  <div class="modal fade" id="modal-tambah1<?= $proyek->id_proyek ?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tinjauan Proyek</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?= base_url('reviewer/Data_Proyek/update_usulan') ?>">
                  <div class="modal-body">


                      <input required="" type="hidden" value="<?= $proyek->id_proyek ?>" name="id_proyek" type="text"
                          class="form-control"></input>

                      <div class="form-group">
                          <label for="proyek_nama">Judul Proyek</label>
                          <input required="" readonly value="<?= $proyek->proyek_nama ?>" class="form-control"></input>
                      </div>
                      <div class="form-group">
                          <label for="proyek_nama">Mata kuliah</label>
                          <input required="" readonly value="<?= $proyek->matakuliah_nama ?>" class="form-control"></input>
                      </div>
                      <div class="card">
                          <div class="card-header">
                            <label for="">Deskripsi Proyek</label>
                          </div>
                          <div class="card-body">
                              <p class="card-text"><?= $proyek->proyek_deskripsi ?></p>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header">
                          <label for="">Kompetensi Proyek</label>
                          </div>
                          <div class="card-body">
                              <p class="card-text"><?= $proyek->proyek_kompetensi ?></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="proyek_nama">Pengusul Proyek</label>
                          <input required="" readonly value="<?= $proyek->proyek_pemilik ?>" class="form-control"></input>
                      </div>
                      <div class="form-group">
                          <label for="proyek_nama">Pengajuan Proyek</label>
                          <input required="" readonly value="<?= $proyek->proyek_pengajuan ?>" class="form-control"></input>
                      </div>
                      <div class="form-group">
                          <label for="proyek_nama">Penyelesaian Proyek</label>
                          <input required=""readonly  value="<?= $proyek->proyek_penyelesaian ?>"
                              class="form-control"></input>
                      </div>
                      <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_mahasiswa', 'tbl_mahasiswa.proyek_id=tbl_proyek.id_proyek')
->where('tbl_mahasiswa.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                            <label for="">Tim Mahasiswa</label>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nim</th> 
        <th>Nama</th> 
      </tr>
    </thead>
    <tbody>
    <?php $no = 1; foreach($proyekku as $proyek){ ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $proyek->mahasiswa_nim?></td>
        <td><?= $proyek->mahasiswa_nama?></td>
      </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
                
                      <hr>
                      <div class="form-group">
                          <label for="id_pengguna">Pilih PM</label>
                          <select name="pengguna_id_manajer_proyek" class="form-control">
                            <option value="0">Pilih Data</option>
                              <?php foreach ($dosenku as $dosen): ?>
                              <option value="<?= $dosen['id_pengguna'] ?>"><?= $dosen['nama'] ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                          <div class="form-group">
                              <label for="id_pengguna">Pilih CPO</label>
                              <select name="pengguna_id_cpo" class="form-control">
                              <option value="0">Pilih Data</option>
                                  <?php foreach ($dosenku1 as $dosen): ?>
                                  <option value="<?= $dosen['id_pengguna'] ?>"><?= $dosen['nama'] ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="">Komentar</label>
                                              <textarea required="" rows="" name="proyek_komentar"
                                                placeholder="komentar" class="form-control" ><?= $proyek->proyek_komentar ?></textarea>
                                          </div>
                      <div class="form-group">
                          <label for="id_pengguna">Status Proyek</label>
                          <select name="proyek_status" class="form-control">
                              <option value="Diterima oleh Reviewer">Diterima</option>
                              <option value="Ditolak oleh Reviewer">Ditolak</option>
                          </select>
                      </div>


                  </div>
                  <?= get_csrf() ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Tinjau</button>
              </form>
          </div>
      </div>
  </div>
  </div>
  <?php $no++; } ?>

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
            <li>Tombol  <i class="fa  fa-plus" style="color: red"></i> berfungsi untuk menerima dan menolak proyek yang diajukan.</li>
        </ol>
        <i>
            <b>Perhatian!</b> <br>
            <ul>
                <li>Diharapkan ketika menolak proyek, tidak perlu mengisi data proyek manajer dan cpo.</li>
            </ul>
        </i>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
