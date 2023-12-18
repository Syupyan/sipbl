  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                    <!-- memanggil data title dari controller -->
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
                    <!-- memanggil data title dari controller -->
                      <h3 class="card-title"><?= $title; ?></h3>
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
                            //   variabel proyekku berasal dari data controller query builder
                            //     untuk memanggil data proyek yang dimana di filter sesuai pengusul yang login
                              $no = 1; foreach($proyekku as $proyek){ ?>
                              <tr>
                                  <td><?= $no ?></td>
                                  <!-- statement untuk foreach -->
                                  <td><?= $proyek->proyek_nama ?></td>
                                  <td><?= $proyek->proyek_pemilik ?></td>

                                  <td>
                                    <!-- ini untuk download data pdf, dimana dengan memanggil nama pdf tersebut melalui foreach -->
                                    <!-- tanda titik untuk menyambungkan data 1 ke data lain nya -->
                                      <center><a href="<?= base_url('asset/file/pdf_proyek/').$proyek->proyek_file ?>"
                                              class="badge badge-secondary">File Lampiran</a></center>
                                  </td>
                                  <td><?= $proyek->proyek_pengajuan ?></td>
                                  <td>
                                    <!-- untuk mencek status proyek -->
                                    <!-- ketika proyek_status *sama* -> (==) makan akan menampilkan data tersebut  -->
                                    <!-- Kata2 status berasal dari database, yang dimana kata2 tersebut berasal dari inputan, admin saat menetapkan, dan reviewer ketika merinma dan menolak -->
                                    <!-- fungsi utama untuk merubah warn status -->
                                  <?php if ($proyek->proyek_status == 'Menunggu menetapkan Mahasiswa dan Reviewer'): ?>
                                      <center><span class="badge badge-warning"><?= $proyek->proyek_status ?></span>
                                      </center>
                                      <?php elseif($proyek->proyek_status == 'Menunggu Tinjauan Proyek'): ?>
                                      <center><span class="badge badge-danger"><?= $proyek->proyek_status ?></span>
                                      </center>
                                      <?php elseif($proyek->proyek_status == 'Diterima oleh Reviewer'): ?>
                                      <center><span class="badge badge-success">Siap Dikerjakan</span>
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
                              <input required="" readonly value="<?= formatTanggal($proyek->proyek_penyelesaian) ?>"
                                  class="form-control"></input>
                          </div>
                          <hr>
                          <?php 

$mp = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_manajer_proyek')
->where('tbl_proyek.id_proyek',$proyek->id_proyek)
->get()->result();
?>
                          <?php $no = 1; foreach($mp as $mp){ ?>

                          <div class="form-group">
                              <label for="proyek_nama">Nama Proyek Manajer</label>
                              <input required="" readonly value="<?= $mp->nama?>" class="form-control"></input>
                          </div>
                          <?php } ?>
                          <?php 

$cpo = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_cpo')
->where('tbl_proyek.id_proyek',$proyek->id_proyek)
->get()->result();
?>
                          <?php $no = 1; foreach($cpo as $cpo){ ?>

                          <div class="form-group">
                              <label for="proyek_nama">Nama CPO</label>
                              <input required="" readonly value="<?= $cpo->nama?>" class="form-control"></input>
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


                          <div class="form-group">
                              <label for="proyek_nama">Status Proyek</label>
                              <input required="" readonly value="<?= $proyek->proyek_status?>" class="form-control"></input>
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
function formatTanggal($date){
 // ubah string menjadi format tanggal
 return date('d-m-Y', strtotime($date));
}
?>
