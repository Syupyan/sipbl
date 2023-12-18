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
                              <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_pengusul')
->where('pengguna_id_pengusul',$user_login_data['id_pengguna'])
->get()->result();
?>
                              <?php $no = 1; foreach($proyekku as $proyek){ ?>
                              <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $proyek->proyek_nama ?></td>
                                  <td><?= $proyek->proyek_pemilik ?></td>

                                  <td>
                                      <center><a href="<?= base_url('asset/file/pdf_proyek/').$proyek->proyek_file ?>"
                                              class="badge badge-secondary">File Lampiran</a></center>
                                  </td>
                                  <td><?= $proyek->proyek_pengajuan ?></td>
                                  <td><?php if ($proyek->proyek_status == 'Menunggu menetapkan Mahasiswa dan Reviewer'): ?>
                                      <center><span class="badge badge-warning"><?= $proyek->proyek_status ?></span>
                                      </center>
                                      <?php elseif($proyek->proyek_status == 'Menunggu Tinjauan Proyek'): ?>
                                      <center><span class="badge badge-danger"><?= $proyek->proyek_status ?></span>
                                      </center>
                                      <?php elseif($proyek->proyek_status == 'Diterima oleh Reviewer'): ?>
                                      <center><span class="badge badge-success"><?= $proyek->proyek_status ?></span>
                                      </center>
                                      <?php elseif ($proyek->proyek_status == 'Ditolak oleh Reviewer'): ?>
                                      <center><span class="badge badge-dark"><?= $proyek->proyek_status ?></span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                                  <td>
                                      <button title="Detail Proyek" class="btn btn-success" data-toggle="modal"
                                          data-target="#modal-lihat1<?= $proyek->id_proyek ?>"><i
                                              class="fas fa-fw fa-eye"></i></button>
                                              <!-- misalkan proyek ditolak -->
                                              <?php if ($proyek->proyek_status == 'Ditolak oleh Reviewer'): ?>
                                                <!-- menampilkan tombol edit/revisi proyek -->
                                                <!-- dimana data tersebut akan dikirim ke reviewer yang menolak data tersebut -->
                                      <button title="Edit Proyek" class="btn btn-primary" data-toggle="modal"
                                          data-target="#modal-edit1<?= $proyek->id_proyek ?>"><i
                                              class="fas fa-fw fa-edit"></i></button>
                                              <button title="Reset Mahasiswa dan Reviewer" class="btn btn-warning" data-toggle="modal"
                                          data-target="#modal-reset1<?= $proyek->id_proyek ?>"><i
                                              class="fas fa-fw fa-refresh"></i>
                                            </button>
                                              <?php endif ?>
                                              <?php if ($proyek->pengguna_id_reviewer == 0): ?>
                                                <!-- tanda titik berarti mengambil id proyek -->
                                                <a title="Hapus Proyek"
                                          href="<?= base_url('pengusul/Pengusul/deleteusulan/').$proyek->id_proyek ?>"
                                          class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                              class="fas fa-fw fa-trash"></i></a>
                                              <?php elseif($proyek->proyek_status == 'Diterima oleh Reviewer'): ?>
                                              <?php else: ?>
                                              <?php endif ?>
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
      <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_pengusul')
->where('pengguna_id_pengusul',$user_login_data['id_pengguna'])
->get()->result();
?>
      <?php $no = 1; foreach($proyekku as $proyek){ ?>
      <!-- Edit Data Modal -->
      <div class="modal fade" id="modal-lihat1<?= $proyek->id_proyek ?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Proyek</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                      <div class="modal-body">


                          <input required="" type="hidden" value="<?= $proyek->id_proyek ?>" name="id_proyek"
                              type="text" class="form-control"></input>

                          <div class="form-group">
                              <label for="proyek_nama">Judul Proyek</label>
                              <input required="" readonly value="<?= $proyek->proyek_nama ?>"
                                  class="form-control"></input>
                          </div>
                          <div class="form-group">
                              <label for="proyek_nama">Mata kuliah</label>
                              <input required="" readonly value="<?= $proyek->matakuliah_nama ?>"
                                  class="form-control"></input>
                          </div>
                          <div class="card">
                              <div class="card-header">
                                  Kompetensi Proyek
                              </div>
                              <div class="card-body">
                                  <p class="card-text"><?= $proyek->proyek_kompetensi ?></p>
                              </div>
                          </div>
                          <div class="card">
                              <div class="card-header">
                                  Deskripsi Proyek
                              </div>
                              <div class="card-body">
                                  <p class="card-text"><?= $proyek->proyek_deskripsi ?></p>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="proyek_nama">Pengusul Proyek</label>
                              <input required="" readonly value="<?= $proyek->proyek_pemilik ?>"
                                  class="form-control"></input>
                          </div>
                          <div class="form-group">
                              <label for="proyek_nama">Pengajuan Proyek</label>
                              <input required="" readonly value="<?= $proyek->proyek_pengajuan ?>"
                                  class="form-control"></input>
                          </div>
                          <div class="form-group">
                              <label for="proyek_nama">Penyelesaian Proyek</label>
                              <input required="" readonly value="<?= $proyek->proyek_penyelesaian ?>"
                                  class="form-control"></input>
                          </div>
                          <hr>
                          <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_manajer_proyek')
->where('tbl_proyek.id_proyek',$proyek->id_proyek)
->get()->result();
?>
                          <?php $no = 1; foreach($proyekku as $proyek){ ?>

                          <div class="form-group">
                              <label for="proyek_nama">Nama Proyek Manajer</label>
                              <input required="" readonly value="<?= $proyek->nama?>" class="form-control"></input>
                          </div>
                          <?php } ?>
                          <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_cpo')
->where('tbl_proyek.id_proyek',$proyek->id_proyek)
->get()->result();
?>
                          <?php $no = 1; foreach($proyekku as $proyek){ ?>

                          <div class="form-group">
                              <label for="proyek_nama">Nama CPO</label>
                              <input required="" readonly value="<?= $proyek->nama?>" class="form-control"></input>
                          </div>
                          <?php } ?>
                          <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_mahasiswa', 'tbl_mahasiswa.proyek_id=tbl_proyek.id_proyek')
->join('tbl_prodi', 'tbl_mahasiswa.prodi_id=tbl_prodi.id_prodi')
->where('tbl_mahasiswa.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                          <label>Tim Mahasiswa</label>
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nim</th>
                                      <th>Nama</th>
                                      <th>Prodi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no = 1; foreach($proyekku as $proyek){ ?>
                                  <tr>
                                      <td><?= $no ?></td>
                                      <td><?= $proyek->mahasiswa_nim?></td>
                                      <td><?= $proyek->mahasiswa_nama?></td>
                                      <td><?= $proyek->prodi_nama?></td>
                                  </tr>
                                  <?php $no++; } ?>
                              </tbody>
                          </table>

                          <div class="card">
                              <div class="card-header">
                                  <label for="">Komentar Proyek</label>
                              </div>
                              <div class="card-body">
                                  <p class="card-text"><?= $proyek->proyek_komentar ?></p>
                              </div>
                          </div>


                      </div>
                      <?= get_csrf() ?>
                      <div class="modal-footer">
              </div>
          </div>
      </div>
  </div>
  <?php } ?>
  <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_pengusul')
->where('pengguna_id_pengusul',$user_login_data['id_pengguna'])
->get()->result();
?>
  <?php $no = 1; foreach($proyekku as $proyek){ ?>
  <div class="modal fade" id="modal-edit1<?= $proyek->id_proyek ?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Revisi Proyek</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?= base_url('pengusul/Pengusul/revisi') ?>" enctype="multipart/form-data">
                  <div class="modal-body">


                      <input required="" type="hidden" value="<?= $proyek->id_proyek ?>" name="id_proyek" type="text"
                          class="form-control"></input>

                      <div class="form-group">
                          <label>Judul Proyek</label>
                          <input required="" id="proyek_nama" name="proyek_nama" value="<?= $proyek->proyek_nama ?>"
                              class="form-control"></input>
                              <?= form_error('proyek_nama','<small class="text-danger">','</small>') ?>

                      </div>
                      <div class="form-group">
                          <label for="n">Batas Waktu Penyelesain</label>
                          <input required="" type="date" value="<?= $proyek->proyek_penyelesaian ?>"
                              id="proyek_penyelesaian" placeholder="Batas Waktu Penyelesain" name="proyek_penyelesaian"
                              class="form-control"></input>
                          <?= form_error('proyek_nama','<small class="text-danger">','</small>') ?>
                      </div>
                      <?php 
                                       $get_matkul= $this->db->select('*')
                                       ->from('tbl_matakuliah')
                                       ->where('prodi_id',$user_login_data['prodi_id'])
                                       ->get()->result_array();
                                           ?>
                      <div class="form-group">
                          <label for="id_pengguna">Pilih Matakuliah</label>
                          <select id="<?= $proyek->matakuliah_nama ?>" name="matakuliah_id" class="form-control">
                              <?php foreach ($get_matkul as $matkul): ?>
                              <option value="<?= $matkul['id_matakuliah'] ?>">
                                  <?= $matkul['matakuliah_nama'] ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="proyek_nama">Kompetensi Proyek</label>
                          <textarea required="" name="proyek_kompetensi"
                              class="form-control"><?= $proyek->proyek_kompetensi ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="proyek_nama">Deskripsi Proyek</label>
                          <textarea required="" id="ckeditor1" name="proyek_deskripsi"
                              class="ckeditor1 form-control"><?= $proyek->proyek_deskripsi ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="n">Upload Lampiran</label>
                          <input required="" type="file" placeholder="Upload Lampiran" name="proyek_file"
                              class="form-control"></input>
                          <?= form_error('proyek_nama','<small class="text-danger">','</small>') ?>
                      </div>
                  </div>
                  <?= get_csrf() ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Revisi</button>
              </form>
          </div>
      </div>
  </div>
  </div>

  </div>
  <?php } ?>
  <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_pengusul')
->where('pengguna_id_pengusul',$user_login_data['id_pengguna'])
->get()->result();
?>
      <?php $no = 1; foreach($proyekku as $proyek){ ?>
      <!-- Edit Data Modal -->
      <div class="modal fade" id="modal-reset1<?= $proyek->id_proyek ?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Reset Mahasiswa dan Reviewer</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="post" action="<?= base_url('pengusul/Pengusul/reset_mr') ?>">
                      <div class="modal-body">


                          <input required="" type="hidden" value="<?= $proyek->id_proyek ?>" name="proyek_id"
                              type="text" class="form-control"></input>
                          <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_mahasiswa', 'tbl_mahasiswa.proyek_id=tbl_proyek.id_proyek')
->join('tbl_prodi', 'tbl_mahasiswa.prodi_id=tbl_prodi.id_prodi')
->where('tbl_mahasiswa.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                          <label>Tim Mahasiswa</label>
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nim</th>
                                      <th>Nama</th>
                                      <th>Prodi</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php $no = 1; foreach($proyekku as $proyek){ ?>

                                  <tr>
                                      <td><?= $no ?></td>
                                      <td><?= $proyek->mahasiswa_nim?></td>
                                      <td><?= $proyek->mahasiswa_nama?></td>
                                      <td><?= $proyek->prodi_nama?></td>
                                  </tr>
                          <?php $no++; } ?>
                                  <input required="" type="hidden" value="<?= $proyek->id_mahasiswa ?>" name="id_mahasiswa[]"
                              type="text" class="form-control"></input>
                              </tbody>
                          </table>
                          <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_reviewer')
->where('tbl_proyek.id_proyek',$proyek->id_proyek)
->get()->result();
?>
                         <?php $no = 1; foreach($proyekku as $proyek){ ?>
                            <div class="form-group">
        <label for="">Nama Reviewer</label>
          <input required="" readonly id="nama" value="<?= $proyek->nama ?>" placeholder="Nama Reviewer" class="form-control"></input>
        </div>
        <?php } ?>


                      </div>
                      <?= get_csrf() ?>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary">Reset</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <?php } ?>
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
            <li>Tombol  <i class="fa  fa-eye" style="color: red"></i> berfungsi untuk melihat detail proyek.</li>
            <li>Tombol  <i class="fa  fa-edit" style="color: red"></i> berfungsi untuk revisi proyek, ketika reviewer tolak proyek yang diajukan.</li>
            <li>Tombol  <i class="fa  fa-refresh" style="color: red"></i> berfungsi untuk reset data mahasiswa dan reviewer pada proyek.</li>
            <li>Tombol  <i class="fa  fa-trash" style="color: red"></i> berfungsi untuk hapus proyek.</li>
        </ol>
        <i>
            <b>Perhatian!</b> <br>
            <ul>
                <li>Untuk menampilkan Tombol  <i class="fa  fa-trash" style="color: red"></i> anda harus melakukan reset <i class="fa  fa-refresh" style="color: red"></i></li>
                <li>ketika melakukan reset <i class="fa  fa-refresh" style="color: red"></i> maka tombol revisi <i class="fa  fa-edit" style="color: red"></i> akan hilang dan juga sebaliknya</i></li>
            </ul>
        </i>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>