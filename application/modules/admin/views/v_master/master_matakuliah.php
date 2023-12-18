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
                          <button title="Informasi" class="btn btn-warning" data-toggle="modal"
                              data-target="#modal-informasi"><i class="fas fa-fw fa-info"></i></button>
                              <?php
                            //   untuk menghilangkan tombol tambah ketika tidak ada data ruang
                              $data = $this->db->select('id_ruang')
                              ->from('tbl_ruangan')
                                ->get()->result();
                                $dataku = 0;
                                foreach($data as $data){
                                    $dataku = $data->id_ruang;
                                }
                              ?>
                              <?php if($dataku == 0): ?>
                                <?php else: ?>
                                <button title="Tambah Mata kuliah" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-fw fa-plus"></i> Tambah Data</button>
                              <?php endif ?>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-5 float-right">
                          </div>
                      </div>
                      <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Mata Kuliah</th>
                                      <th>Sks</th>
                                      <th>Tahun Ajaran</th>
                                      <th>Semester</th>
                                      <th>Prodi</th>
                                      <th>Jurusan</th>
                                      <th>Ruangan</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no=1; foreach ($matakuliah as $mt): ?>
                                  <tr>
                                      <th><?= $no++ ?></th>
                                      <td><?= $mt['matakuliah_nama'] ?></td>
                                      <td><?= $mt['matakuliah_sks'] ?></td>
                                      <td><?= $mt['matakuliah_tahunajaran'] ?></td>
                                      <td><?= $mt['matakuliah_semester'] ?></td>
                                      <td><?= $mt['prodi_nama'] ?></td>
                                      <td><?= $mt['jurusan'] ?></td>
                                      <td><?= $mt['ruangan_nama'] ?></td>
                                      <td>
                                          <button title="Edit Matakuliah" id="<?= $mt['id_matakuliah'] ?>"
                                              class="btn btn-primary btn-edit"><i
                                                  class="fas fa-fw fa-edit"></i></button>
                                          <?php             
                               $proyek= $this->db->select('*')
                                    ->from('tbl_proyek')
                                    ->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
                                    ->where('tbl_proyek.matakuliah_id',$mt['id_matakuliah'])
                                    ->get()->result();
                                    $matakuliah = 0;
                                    foreach($proyek as $prku){
                                        $matakuliah += $prku->matakuliah_id;
                                    }
                              ?>
                                          <?php if(isset($mt['id_matakuliah']) != $matakuliah){ ?>
                                          <a title="Hapus Mahasiswa"
                                              href="<?= base_url('admin/Master_Matakuliah/delete_matakuliah_nama/').$mt['id_matakuliah'] ?>"
                                              class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                                  class="fas fa-fw fa-trash"></i></a>

                                          <?php } else { ?>

                                          <?php } ?>
                                      </td>
                                  </tr>

                                  <?php endforeach; ?>

                              </tbody>
                          </table>
                      </div>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->


              <!-- /.card -->

          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->



      <!-- ###################################  MODAL matakuliah_nama   ################################ -->

      <!-- Tambah Data matakuliah_nama Modal -->
      <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="post" enctype="multipart/form-data"
                      action="<?= base_url('admin/Master_Matakuliah/add_matakuliah_nama') ?>">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="">Nama Mata kuliah</label>
                              <input type="text" required="" name="matakuliah_nama" placeholder="Nama Mata kuliah"
                                  class="form-control"></input>
                          </div>
                          <div class="form-group">
                              <label for="">Sks</label>
                              <input required="" name="matakuliah_sks" type="text" placeholder="Jumlah sks"
                                  class="form-control"></input>
                          </div>
                          <div class="form-group">
                              <label for="matakuliah_tahunajaran">Semester</label>
                              <select name="matakuliah_semester" class="form-control">
                                  <option value="semester 1">Semester 1</option>
                                  <option value="semester 2">Semester 2</option>
                                  <option value="semester 3">Semester 3</option>
                                  <option value="semester 4">Semester 4</option>
                                  <option value="semester 5">Semester 5</option>
                                  <option value="semester 6">Semester 6</option>
                                  <option value="semester 7">Semester 7</option>
                                  <option value="semester 8">Semester 8</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="matakuliah_tahunajaran">Tahun Ajaran</label>
                              <select name="matakuliah_tahunajaran" class="form-control">
                                  <option>2022</option>
                                  <option>2023</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_pengguna">Kategori Prodi</label>
                              <select name="prodi_id" class="form-control">
                                  <?php foreach ($get_prodi as $prodi): ?>
                                  <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['prodi_nama'] ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_pengguna">Kategori Ruangan</label>
                              <select name="ruang_id" class="form-control">
                                  <?php foreach ($get_ruang as $ruang): ?>
                                  <option value="<?= $ruang['id_ruang'] ?>"><?= $ruang['ruangan_nama'] ?></option>
                                  <?php endforeach; ?>
                              </select>
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


  <!-- Edit Data matakuliah_nama Modal -->
  <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" enctype="multipart/form-data"
                  action="<?= base_url('admin/Master_Matakuliah/update_matakuliah_nama') ?>">
                  <div class="modal-body">
                      <div class="form-group">
                          <input required="" id="id_matakuliah" name="id_matakuliah" type="hidden" readonly
                              class="form-control"></input>
                      </div>
                      <div class="form-group">
                          <label for="">Nama Mata kuliah</label>
                          <input required="" id="matakuliah_nama" name="matakuliah_nama" type="text"
                              class="form-control" placeholder="Nama Matakuliah"></input>
                      </div>
                      <div class="form-group">
                          <label for="">Sks</label>
                          <input required="" id="matakuliah_sks" name="matakuliah_sks" placeholder="Jumlah Sks"
                              class="form-control"></input>
                      </div>
                      <div class="form-group">
                          <label for="">Semester</label>
                          <select name="matakuliah_semester" id="matakuliah_semester" class="form-control">
                              <option value="semester 1">Semester 1</option>
                              <option value="semester 2">Semester 2</option>
                              <option value="semester 3">Semester 3</option>
                              <option value="semester 4">Semester 4</option>
                              <option value="semester 5">Semester 5</option>
                              <option value="semester 6">Semester 6</option>
                              <option value="semester 7">Semester 7</option>
                              <option value="semester 8">Semester 8</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="">Tahun Ajaran</label>
                          <select name="matakuliah_tahunajaran" id="matakuliah_tahunajaran" class="form-control">
                              <option>2022</option>
                              <option>2023</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="id_pengguna">Kategori Prodi</label>
                          <select name="prodi_id" class="form-control">
                              <?php foreach ($get_prodi as $prodi): ?>
                              <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['prodi_nama'] ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="id_pengguna">Kategori Ruangan</label>
                          <select name="ruang_id" class="form-control">
                              <?php foreach ($get_ruang as $ruang): ?>
                              <option value="<?= $ruang['id_ruang'] ?>"><?= $ruang['ruangan_nama'] ?></option>
                              <?php endforeach; ?>
                          </select>
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
  <!-- ##################################  MODAL matakuliah_nama   ################################ -->

  <!-- Informasi Data Modal -->
  <div class="modal fade" id="modal-informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
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
                          <li>Tombol <i class="fa  fa-plus" style="color: red"></i> berfungsi untuk tambah data mata
                              kuliah.</li>
                          <li>Tombol <i class="fa  fa-edit" style="color: red"></i> berfungsi untuk edit data mata
                              kuliah.</li>
                          <li>Tombol <i class="fa  fa-trash" style="color: red"></i> berfungsi untuk hapus data mata
                              kuliah.</li>
                      </ol>
                      <i>
                          <b>Perhatian!</b> <br>
                          <ul>
                              <li>Tombol hapus <i class="fa  fa-trash" style="color: red"></i> akan tidak bisa digunakan
                                  ketika data mata kuliah digunakan proyek.</li>
                                  <li>Tombol Tambah <i class="fa  fa-plus" style="color: red"></i> akan tampil ketika ada data ruang.</li>
                          </ul>
                      </i>
                  </div>
              </div>
              <div class="modal-footer">
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
$(document).ready(function() {
    $(".btn-edit").click(function() {
        let id_matakuliah = $(this).attr("id")
        $.get("<?= base_url('admin/Master_Matakuliah/show_matakuliah_nama/') ?>" + id_matakuliah,
            function(response) {
                let result = JSON.parse(response)
                $("#modal-edit").modal("show")
                console.log(result)
                $("#id_matakuliah").val(result.id_matakuliah)
                $("#matakuliah_nama").val(result.matakuliah_nama)
                $("#matakuliah_sks").val(result.matakuliah_sks)
                $("#matakuliah_tahunajaran").val(result.matakuliah_tahunajaran)
                $("#matakuliah_semester").val(result.matakuliah_semester)
            })
    })

})
  </script>