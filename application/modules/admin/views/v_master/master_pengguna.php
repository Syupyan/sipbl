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
                          <button title="Tambah Pengguna" class="btn btn-primary" data-toggle="modal"
                              data-target="#modal-tambah"><i class="fas fa-fw fa-plus"></i> Tambah Data</button>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                      <div class="row">
                          <div class="col-md-5 float-right">
                          </div>
                      </div>
                      <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Profil</th>
                                      <th>Nama</th>
                                      <th>Email</th>
                                      <th>Status Akun</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>

                                  <?php $no=1; foreach ($pengguna as $user): ?>
                                  <tr>
                                      <th><?= $no++ ?></th>
                                      <td><img src="<?= base_url('asset/img/profile/').$user['foto_profil'] ?>"
                                              width="40"></td>
                                      <td><?= $user['nama'] ?></td>
                                      <td><?= $user['email'] ?></td>
                                      <td>
                                          <?php if ($user['pengguna_status']==1){
                        $status="checked=checked";
                      }else{
                        $status="";
                      }
                    ?>
                                          <div class="custom-control custom-switch">
                                              <input <?=  $status; ?> type="checkbox"
                                                  value="<?= $user['pengguna_status'] ?>"
                                                  class="custom-control-input btn-switch-user"
                                                  id="<?= $user['id_pengguna'] ?>">
                                              <label class="custom-control-label"
                                                  for="<?= $user['id_pengguna'] ?>"></label>
                                          </div>
                                      </td>
                                      <td>
                                          <a title="Ubah Hak Akses"
                                              onclick="return confirm('Apakah Anda yakin mengubah hak akses ?')"
                                              href="<?= base_url('admin/Access_Manager/role_access/').$user['id_pengguna'] ?>"
                                              class="btn btn-success"><i class="fas fa-fw fa-handshake"></i></a>
                                          <button title="Edit Pengguna" id="<?= $user['id_pengguna'] ?>"
                                              class="btn btn-primary btn-edit"><i
                                                  class="fas fa-fw fa-edit"></i></button>
                                          <?php 
$proyekku = $this->db->select('pengguna_id_cpo')
->from('tbl_proyek')
->get()->result();
$data = 0;
foreach($proyekku as $p){
  $data = $p->pengguna_id_cpo;
}
$proyekku = $this->db->select('pengguna_id_reviewer')
->from('tbl_proyek')
->get()->result();
$data1 = 0;
foreach($proyekku as $p){
  $data1 = $p->pengguna_id_reviewer;
}
$proyekku = $this->db->select('pengguna_id_manajer_proyek')
->from('tbl_proyek')
->get()->result();
$data2 = 0;
foreach($proyekku as $p){
  $data2 = $p->pengguna_id_manajer_proyek;
}
$proyekku = $this->db->select('pengguna_id_pengusul')
->from('tbl_proyek')
->get()->result();
$data3 = 0;
foreach($proyekku as $p){
  $data3 = $p->pengguna_id_pengusul;
}
?>
                                          <?php if($data == $user['id_pengguna']): ?>
                                          <?php else: ?>
                                          <?php if($data1 == $user['id_pengguna']): ?>
                                          <?php else: ?>
                                          <?php if($data2 == $user['id_pengguna']): ?>
                                          <?php else: ?>
                                          <?php if($data3 == $user['id_pengguna']): ?>
                                          <?php else: ?>
                                          <?php if($user['id_pengguna'] == 1 || $user['id_pengguna'] == 2 || $user['id_pengguna'] == 3 || $user['id_pengguna'] == 4 || $user['id_pengguna'] == 5 || $user['id_pengguna'] == 6 || $user['id_pengguna'] == 7 || $user['id_pengguna'] == 8): ?>
                                          <?php else: ?>
                                          <a title="Hapus Pengguna"
                                              href="<?= base_url('admin/Master_Pengguna/delete_user/').$user['id_pengguna'] ?>"
                                              class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                                  class="fas fa-fw fa-trash"></i></a>
                                          <?php endif ?>
                                          <?php endif ?>
                                          <?php endif ?>
                                          <?php endif ?>
                                          <?php endif ?>
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

          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->


      <!-- Tambah Data Modal -->
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
                  <form method="post" action="<?= base_url('admin/Master_Pengguna/add_user') ?>">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="">Nama</label>
                              <input required="" name="nama" placeholder="nama" class="form-control"></input>
                          </div>
                          <div class="form-group">
                              <label for="">Email</label>
                              <input required="" name="email" type="email" placeholder="email"
                                  class="form-control"></input>
                          </div>

                          <div class="form-group">
                              <label for="">Password</label>
                              <input required="" name="password" type="password" placeholder="password"
                                  class="form-control"></input>
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
                              <label for="pengguna_status">Aktivasi</label>
                              <select name="pengguna_status" class="form-control">
                                  <option value="1">Active</option>
                                  <option value="0">Non-Active</option>
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



  <!-- Edit Data Modal -->
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
              <form method="post" action="<?= base_url('admin/Master_Pengguna/update_user') ?>">
                  <div class="modal-body">
                      <div class="form-group">
                          <input required="" id="id_pengguna" name="id_pengguna" type="text" readonly
                              class="form-control" hidden></input>
                      </div>
                      <div class="form-group">
                          <label for="">Nama</label>
                          <input required="" id="nama" name="nama" placeholder="nama" class="form-control"></input>
                      </div>
                      <div class="form-group">
                          <label for="">Email</label>
                          <input required="" id="email" name="email" type="email" placeholder="email"
                              class="form-control"></input>
                      </div>

                      <div class="form-group">
                          <label for="">Password</label>
                          <input id="oldpassword" type="hidden" name="oldpassword" placeholder="password"
                              class="form-control"></input>
                          <input id="password" name="newpassword" placeholder="password" class="form-control"></input>
                          <small class="text-danger text-italic">Kosongkan jika tidak akan di ubah</small>
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
                          <label for="pengguna_status">Aktivasi</label>
                          <select id="pengguna_status" name="pengguna_status" class="form-control">
                              <option value="1">Active</option>
                              <option value="0">Non-Active</option>
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




  <script type="text/javascript">
$(document).ready(function() {

    $(".btn-edit").click(function() {
        let id_pengguna = $(this).attr("id")
        $.get("<?= base_url('admin/Master_Pengguna/show_user/') ?>" + id_pengguna, function(response) {
            let result = JSON.parse(response)
            $("#modal-edit").modal("show")
            $("#id_pengguna").val(result.id_pengguna)
            $("#nama").val(result.nama)
            $("#email").val(result.email)
            $("#oldpassword").val(result.password)
            $("#pengguna_status").val(result.pengguna_status)
            $("#jabatan").val(result.jabatan)
            $("#jk").val(result.jk)
            $("#alamat").val(result.alamat)
            $("#nik_nip").val(result.nik_nip)
        })
    })


    $(".btn-switch-user").click(function() {
        let id_pengguna = $(this).attr("id")
        let pengguna_status = $(this).val()
        $.ajax({
            url: "<?= base_url('admin/Master_Pengguna/switch_access_user/') ?>",
            type: "GET",
            data: {
                id_pengguna: id_pengguna,
                pengguna_status: pengguna_status
            },
            success: function() {
                document.location.href = "<?= base_url('admin/master-pengguna') ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

});
  </script>
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
                          <li>Tombol <i class="fa  fa-plus" style="color: red"></i> berfungsi untuk tambah data
                              pengguna.</li>
                          <li>Tombol <i class="fa  fa-edit" style="color: red"></i> berfungsi untuk edit data pengguna.
                          </li>
                          <li>Tombol <i class="fa  fa-trash" style="color: red"></i> berfungsi untuk hapus data
                              pengguna.</li>
                      </ol>
                      <i>
                          <b>Perhatian!</b> <br>
                          <ul>
                              <li>Tombol hapus <i class="fa  fa-trash" style="color: red"></i> akan hilang
                                  ketika data pengguna digunakan proyek </li>
                          </ul>
                      </i>
                  </div>
              </div>
              <div class="modal-footer">
              </div>
          </div>
      </div>
  </div>