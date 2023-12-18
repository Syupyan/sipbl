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
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_cpo')
->order_by('id_proyek','DESC')
->where('pengguna_id_cpo',$user_login_data['id_pengguna'])
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
                                  <td>
                                    <?php if ($proyek->proyek_status == 'Diterima oleh Reviewer'): ?>
                                      <center><span class="badge badge-success">Siap Dikerjakan</span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                                  <td>
                                  <a  title="Kelola Proyek" href="<?= base_url('cpo/kelola-proyek/' .$proyek->id_proyek); ?>"><button class="btn btn-primary"><i class="fa fa-tasks"></i></button></a>
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
