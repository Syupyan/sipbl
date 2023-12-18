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
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                              title="Collapse">
                              <i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                              title="Remove">
                              <i class="fas fa-times"></i></button>
                              <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi"><i class="fas fa-fw fa-info"></i></button>
                      </div>
                  </div>
                  <div class="card-body">
                      <form action="<?= base_url('pengusul/Pengusul/ajukan_proyek') ?>" method="post" enctype="multipart/form-data">

                          <div class="row">

                              <div class="col-md-4">

                                  <div class="card">
                                      <div class="card-header bg-primary"><?= trim($title,'Tulis') ?></div>
                                      <div class="card-body">
                                          <input required="" id="id_pengguna"
                                              value="<?= $user_login_data['id_pengguna'] ?>" type="hidden" readonly
                                              name="id_pengguna" class="form-control"></input>
                                          <div class="form-group">
                                              <label for="n">Judul</label>
                                              <input required="" id="proyek_nama" placeholder="Judul"
                                                  name="proyek_nama" class="form-control"></input>
                                              <?= form_error('proyek_nama','<small class="text-danger">','</small>') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="n">Tanggal Pengajuan</label>
                                              <input required="" readonly type="text" id="proyek_pengajuan" placeholder="Tanggal Pengajuan"
                                                  name="proyek_pengajuan" value="<?= date("d-m-Y"); ?>" class="form-control"></input>
                                              <?= form_error('proyek_pengajuan','<small class="text-danger">','</small>') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="n">Batas Waktu Penyelesain</label>
                                              <input required="" type="date" value="<?= date("d-m-Y"); ?>" id="proyek_penyelesaian" placeholder="Batas Waktu Penyelesain"
                                                  name="proyek_penyelesaian" class="form-control"></input>
                                              <?= form_error('proyek_penyelesaian','<small class="text-danger">','</small>') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="id_pengguna">Pilih Matakuliah</label>
                                              <select name="matakuliah_id" class="form-control">
                                                  <?php foreach ($get_matkul as $matkul): ?>
                                                  <option value="<?= $matkul['id_matakuliah'] ?>">
                                                      <?= $matkul['matakuliah_nama'] ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                              <?= form_error('matakuliah_id','<small class="text-danger">','</small>') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="">Kompetensi</label>
                                              <textarea id="" required="" name="proyek_kompetensi"
                                                  placeholder="Kompetensi" class="form-control"></textarea>
                                              <?= form_error('proyek_kompetensi','<small class="text-danger">','</small>') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="n">Upload Lampiran</label>
                                              <input required="" type="file" id="proyek_file" placeholder="Upload Lampiran"
                                                  name="proyek_file" class="form-control"></input>
                                              <?= form_error('proyek_file','<small class="text-danger">','</small>') ?>
                                              <i>*PDF 3Mb</i>
                                          </div>
                                          <!--  -->
                                      </div>
                                  </div>

                              </div>
                              <div class="col-md-8">
                                  <div class="card">
                                      <div class="card-header bg-danger">Deskripsi</div>
                                      <div class="card-body">
                                          <div class="form-group">
                                              <textarea required="" rows="" id="ckeditor" name="proyek_deskripsi"
                                                  placeholder="deskripsi usulan" class="form-control"></textarea>
                                              <?= form_error('proyek_deskripsi','<small class="text-danger">','</small>') ?>
                                          </div>
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-danger col-md-4"><i
                                          class="fa fa-paper-plane"></i> KIRIM</button>
                              </div>

                          </div>
                          <?= get_csrf(); ?>
                  </div>
                  </form>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer-->
          </div>
          <!-- /.card -->

  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

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
            <li>Isi form dengan lengkap</li>
            <li>Upload file dengan format<b>.pdf</b></li>
            <li>Setelah selesai, klik tombol <b>Kirim</b> <i class="fa  fa-paper-plane" style="color: red"></i></b></li>
        </ol>
        <i>
            <b>Perhatian!</b> <br>
            <ul>
                <li>Judul proyek tidak boleh sama dengan proyek lain</li>
                <li>Deskripsi tidak boleh terlalu pendek</li>
                <li>Pdf Maksimal 3MB</li>
            </ul>
        </i>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
  